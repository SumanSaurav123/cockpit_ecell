<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\user;
use App\Roles;
use Validator;
use Redirect;
use Hash;
use Auth;
use App\department;
use App\meeting;
use App\Notification;
use App\Grievances;
use App\Task;

class AdminController extends Controller
{
    /*---------------------------------------------------------------------------------------------------------------------
                                                  FUNCTION FOR PASSING VIEW TO DASHBOARD PAGE
    ----------------------------------------------------------------------------------------------------------------------*/ 
    public function ShowDashboard()
    {
        $grievances = Grievances::all();
        $meetings = Meeting::orderBy('created_at', 'DESC')->get();
        if(Auth::user())
        {
            $tasks = Task::where('alotname',Auth::user()->name)->orderBy('created_at','desc')->get();
            $teamcount = User::where('dep_id',Auth::user()->dep_id)->orderBy('created_at','desc')->get();
            return view('Cockpit.inc.DashboardPage')->with('grievances',$grievances)->with('meetings',$meetings)->with('teamcount',$teamcount)->with('tasks',$tasks);
        }
        return view('Cockpit.inc.DashboardPage')->with('grievances',$grievances)->with('meetings',$meetings);

    }
    /*---------------------------------------------------------------------------------------------------------------------
                                                  FUNCTION FOR PASSING VIEW TO CREATE USER PAGE
    ----------------------------------------------------------------------------------------------------------------------*/ 
    public function ShowCreateUser()
    {
        $roles=Roles::pluck('role_name','role_id')->all();
        $department=Department::pluck('dep_name','dep_id')->all();

        return view('Cockpit.Admin.CreateUserPage')->with('roles',$roles)->with('department',$department);
    }

    public function CreateUser(Request $request)
    {
        // Validating the data
        $data=$request->all();
        
                $rule=array(
                    'name' => 'required',
                    'email' => 'required|email',
                    'password' => 'required|min:6',
                    'cpassword' => 'required|same:password',
                    'role'=>'required',
                    'file'=>'image|nullable',
                    'facebook' => 'required',
                    'github' => 'required',
                    'linkedin' => 'required',
                );
        
                $message=array(
                    'cpassword.required' => 'the confirm password is required',
                    'cpassword.min' => 'the confirm password must be at leat 6 characters',
                    'cpssword.same' => 'the confirm password and password must be same',
                );
                    
                $validator=Validator::make($data,$rule,$message);
        
                if($validator->fails())
                      return Redirect::to('/AdminCreateUser')->withErrors($validator);
                else 
                {  
                            //checking for the file
                            if($request->hasFile('file'))
                            {
                                $fileNameWithExt=$request->file('file')->getClientOriginalName();
                                //get only name
                                $filename=pathinfo($fileNameWithExt,PATHINFO_FILENAME);
                                //get ext
                                $fileNameExt=$request->file('file')->getClientOriginalExtension();
                                //file name to store
                                $fileNameToStore=$filename.'_'.time().'.'.$fileNameExt;
                    
                                $path=$request->file('file')->storeAs('public/cover_image',$fileNameToStore);
                            }
                            else
                            {
                                $fileNameToStore='noimage.jpg';
                            }
                            // Storing data into database
                            $user = new User;
                            $user->role_id=(int)$request->input('role');
                            $user->dep_id=(int)$request->input('department');
                            $user->name=$request->input('name');
                            $user->email=$request->input('email');
                            $user->password=Hash::make($request->input('password'));
                            $user->facebook=$request->input('facebook');
                            $user->github=$request->input('github');
                            $user->linkedin=$request->input('linkedin');
                            $user->phone_number=(int)$request->input('phone');
                            $user->roll_no=(int)$request->input('rollno');
                            $user->year=(int)$request->input('year');
                            $user->cover_image=$fileNameToStore;
                            $user->rating=(int)$request->input('rating');
                            $user->save();

                            return Redirect::to('/AdminCreateUser')->with('success','Succesfully Registered');
                }             
    }
    /*---------------------------------------------------------------------------------------------------------------------
                                                  FUNCTION FOR PASSING VIEW TO CREATE MEETING PAGE
    ----------------------------------------------------------------------------------------------------------------------*/
    public function ShowCreateMeeting()
    {
        $department=Department::pluck('dep_name','dep_id')->all();
        return view('Cockpit.Admin.CreateMeetingPage')->with('department',$department);
    }



    /*---------------------------------------------------------------------------------------------------------------------
                                                  FUNCTION FOR CREATING MEETING
    ----------------------------------------------------------------------------------------------------------------------*/
    public function CreateMeeting(Request $request)
    {
        $data=$request->all();
        
                $rule=array(
                    'name' => 'required',
                    'time' => 'required',
                    'venue' => 'required',
                    'department'=>'required',
                    'details' => 'required',
                );  
                $validator=Validator::make($data,$rule);
        
                if($validator->fails())
                      return Redirect::to('/AdminCreateMeeting')->withErrors($validator);
                else 
                {  
                     // Storing data into database
                    $mem = new Meeting;
                    $mem->name=$request->input('name');
                    $mem->dep_id=(int)$request->input('department');
                    $mem->time=$request->input('time');
                    $mem->date=$request->input('date');
                    $mem->venue=$request->input('venue');
                    $mem->details=$request->input('details');
                    $mem->creator=Auth::user()->name;
                    $mem->creator_id=Auth::user()->id;
                    $mem->creator_image=Auth::user()->cover_image;
                    $mem->save();

                    $not=new Notification;
                    $not->creator=Auth::user()->name;
                    $not->status=0;
                    $not->name=$request->input('name');
                    $not->meeting_id=$mem->id;
                    $not->save();

                   return Redirect::to('/AdminCreateMeeting')->with('success','Succesfully Created');
                }           
    }
    
    /*--------------------------------------------------------------------------------------------------------------------- 
                                            FUNCTION FOR SHOWING MEETING ONLY BY CEO
    -----------------------------------------------------------------------------------------------------------------------*/
    public function ShowMeeting()
    {
        $meetings=Meeting::orderBy('created_at','desc')->get();
        return view('Cockpit.Admin.ShowMeetingPage')->with('meetings',$meetings);
    }
    /*--------------------------------------------------------------------------------------------------------------------- 
                                            FUNCTION FOR SHOWING CREAT TASK PAGE
    -----------------------------------------------------------------------------------------------------------------------*/
    public function ShowTaskPage()
    {
        $departments=Department::pluck('dep_name','dep_id')->all();
        return view('Cockpit.admin.CreateTaskPage')->with('departments',$departments);
    }
    /*--------------------------------------------------------------------------------------------------------------------- 
                                            FUNCTION FOR FETCHING USERS
    -----------------------------------------------------------------------------------------------------------------------*/
    public function fetch(Request $request)
    {
      
      $output = '';
      $value = (int)$request->get('value');
      if($value==0)
        $data = User::all();
      else
      {
        $data = User::where('dep_id',$value)->get();
      }
        foreach ($data as $user)
        {
            //$output='<option value="'.$dat->name.'" id="'.$dat->name.'">'.$dat->name.'</option>';
            $output .= '
            <li style="list-style-type:none;"><input type="checkbox" value='.$user->user_id.' name="get[]">'.$user->name.'</li>
            
            ';
        }
        $data =  array('card_data'  => $output);
        echo $output;
    
    }

     /*--------------------------------------------------------------------------------------------------------------------- 
                                            FUNCTION FOR CREATING TASK
    -----------------------------------------------------------------------------------------------------------------------*/
    public function CreateTask(Request $request)
    {
       
       $dep_id = (int)$request->input('department');
       if(empty($request->input('get')))
       {
            if($dep_id==0)
               $users = User::all();
            else   
               $users = User::where('dep_id',$dep_id)->get();
            foreach($users as $user)
            {
                $data = User::where('user_id',$user->user_id)->first();
                $task = new Task;
                $task->creator = Auth::user()->name;
                $task->title = $request->input('name');
                $task->description = $request->input('description');
                $task->date = $request->input('date');
                $task->department = $request->input('department');
                $task->alotname = $data->name;
                $task->save();
            }
       }
       else
       { 
            $users=$request->input('get');
            foreach($users as $user)
            {
                $data = User::where('user_id',(int)$user)->first();
                $task = new Task;
                $task->creator = Auth::user()->name;
                $task->title = $request->input('name');
                $task->description = $request->input('description');
                $task->date = $request->input('date');
                $task->department = $request->input('department');
                $task->alotname = $data->name;
                $task->save();
            }
        }
    return Redirect::back()->with('success',"task alloted");
    }
}
