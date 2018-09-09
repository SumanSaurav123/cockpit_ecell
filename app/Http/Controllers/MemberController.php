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
use App\checknotifi;
use App\Grievances;
use App\task;

class MemberController extends Controller
{

    /*----------------------------------------------------------------------------------------------------------------------------- 
                                                Function For Showing Member Pages
    -------------------------------------------------------------------------------------------------------------------------------*/ 
    public function ShowCatMember(Request $request)
    {
        $id = (int)$request->input('id'); 
        $users = user::where('dep_id',$id)->get();
        if($id==1)
            return view('Cockpit.Member.TechMemberPage')->with('users',$users);
        else if($id==2)
            return view('Cockpit.Member.PCRMemberPage')->with('users',$users);
        else if($id==3)
            return view('Cockpit.Member.RDMemberPage')->with('users',$users);
        else if($id==4)
            return view('Cockpit.Member.DesignMemberPage')->with('users',$users);
        else if($id==5)
            return view('Cockpit.Member.OperationMemberPage')->with('users',$users);
        
    }
    /*------------------------------------------------------------------------------------------------------------------------------- 
                                                Function for ajax search in member page
    ---------------------------------------------------------------------------------------------------------------------------------*/
    public function ShowAllMember(Request $request)
    {
        
        if($request->ajax())
        {
            $output = '';
            $query = $request->get('query');
            if($query != '')
            {
                $data = user::where('name', 'like', '%'.$query.'%')->get();
            }
            else
            {
                $data = user::all();
            }
            $total_row = $data->count();
            if($total_row > 0)
            {
            foreach($data as $user)
            {
                $output .= '
                <div class="col-md-4 grid-margin stretch-card">
                    <div class="card text-center">
                        <div class="card-body">
                            <img src="storage/cover_image/'.$user->cover_image.'" class="img-lg rounded-circle mb-2" alt="profile image">
                            <h4>'.$user->name.'</h4>
                            <p class="text-muted">'.$user->roles->role_name.'</p>
                            <p class="mt-4 card-text">
                                Lorem ipsum dolor sit amet, consectetuer adipiscing elit.
                                Aenean commodo ligula eget dolor. Lorem
                            </p>
                            <a href="/ShowProfile?id='.$user->_id.'"><button class="btn btn-info btn-sm mt-3 mb-4">View</button></a>
                            <div class="border-top pt-3">
                                <div class="row">
                                     <div class="contacts">
                                        <a style="margin-left:36px;margin-right:20px;" class="btn btn-icons btn-rounded btn-outline-primary" href="'.$user->github.'"><i class="fa fa-github"></i></a>
                                        <a style="margin-left:36px;margin-right:20px;" class="btn btn-icons btn-rounded btn-outline-primary" href="'.$user->facebook.'"><i class="fa fa-facebook"></i></a>
                                        <a style="margin-left:36px;margin-right:20px;" class="btn btn-icons btn-rounded btn-outline-primary" href="'.$user->linkedin.'"><i class="fa fa-linkedin"></i></a>
                                    <div class="clear"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
                ';
            }
         }
        else
        {
            $output = '<div>No match found</div>';
        }
        $data = array('card_data'  => $output,);
        echo json_encode($data);
        }
        // else
        // {
        //     $data = user::where('name', 'like', '%s%')->get();
        //     echo $data;
        // }
    }

    /*--------------------------------------------------------------------------------------------------------------------- 
                                            FUNCTION FOR SHOWING NOTIFICATION
    -----------------------------------------------------------------------------------------------------------------------*/
    public function NotifiMeeting(Request $request)
    { 
        //$count=0;
        if($request->ajax())
        {
            $output = '';
            $count=0;
            $query = $request->get('query');
            // $checks = checknotifi::all();
            $data = Notification::where('status',0)->get();
            $total_row = $data->count();
            if($total_row > 0)
            {
            foreach($data as $d)
            {
                $notid =NULL;
                $checks = checknotifi::where("notifi_id",$d->_id)->get();
                if(count($checks)>0)
                {
                foreach($checks as $check)
                {
                    if($check->user_id == Auth::user()->user_id)
                    {
                        $notid = $check->notifi_id;
                    }
                }
                }
                if($d->_id == $notid)
                    continue;
                else
                {    
                        if($d->meeting->dep_id==0)
                        {
                            $output .= '
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item preview-item">
                              <div class="preview-thumbnail">
                                    <img src="storage/cover_image/'.$d->meeting->creator_image.'" class="img-lg rounded-circle mb-2" alt="profile image">
                              </div>
                              <div class="preview-item-content">
                                <h5>'.$d->creator.'</h5>
                                <h6 class="preview-subject font-weight-normal text-dark mb-1">'.$d->name.'</h6>
                                <p class="font-weight-light small-text mb-0">
                                '.$d->meeting->created_at->diffForHumans().'
                                </p>
                              </div>
                            </a>
                        ';
                        $count++;
                        }
                        else if($d->meeting->dep_id==Auth::user()->dep_id)
                        {
                            $output .= '
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item preview-item">
                              <div class="preview-thumbnail">
                                    <img src="storage/cover_image/'.$d->meeting->creator_image.'" class="img-lg rounded-circle mb-2" alt="profile image">
                              </div>
                              <div class="preview-item-content">
                                <h5>'.$d->creator.'</h5>
                                <h6 class="preview-subject font-weight-normal text-dark mb-1">'.$d->name.'</h6>
                                <p class="font-weight-light small-text mb-0">
                                  '.$d->meeting->created_at->diffForHumans().'
                                </p>
                              </div>
                            </a>
                            ';
                            $count++;
                        } 
                }        
            }
            $data = array('card_data'  => $output,'card_count' => $count);
         }
        else
        {
            $count=0;
            $output = ' <div class="dropdown-divider"></div>
            <a class="dropdown-item preview-item">
            <div class="preview-item-content">
              <h7 class="preview-subject font-weight-normal text-dark mb-1">No Notification</h6>
            </div>
          </a>
           ';
           $data = array('no_data'  => $output,'card_count' => $count);
        }
        echo json_encode($data);
        }
        // else
        // {
        //     $data = user::where('name', 'like', '%s%')->get();
        //     echo $data;
        // }
    }

    /*--------------------------------------------------------------------------------------------------------------------- 
                                            FUNCTION FOR MARKING ALL NOTIFICATION AS READ
    -----------------------------------------------------------------------------------------------------------------------*/
    
    public function MarkAllRead()
    {
        $data=Notification::where('status',0)->get();
        foreach($data as $d)
        {
            $user = new checknotifi;
            $user->user_id = Auth::user()->user_id;
            $user->notifi_id = $d->_id;
            $user->save();
        }

        return Redirect::back();
    }
    /*--------------------------------------------------------------------------------------------------------------------- 
                                            FUNCTION FOR SHOWING ALL NOTIFICATION AS READ
    -----------------------------------------------------------------------------------------------------------------------*/
    public function ShowNotificationAll()
    {
        $data=Notification::orderBy('created_at','desc')->get();
        return view('cockpit.member.ShowAllNotificationPage')->with('data',$data);
    }
    /*--------------------------------------------------------------------------------------------------------------------- 
                                            FUNCTION FOR SHOWING GRIVANCES PAGE
    -----------------------------------------------------------------------------------------------------------------------*/
    public function ShowGrievances()
    {
        return view('cockpit.member.GrievancesPage');
    }
    /*--------------------------------------------------------------------------------------------------------------------- 
                                            FUNCTION FOR SAVING GRIVANCES INTO DATABASE
    -----------------------------------------------------------------------------------------------------------------------*/
    public function StoreGrievances(Request $request)
    {
        $data = $request->all();
        $rule=array(
            'details' => 'required',
        );  
        $validator=Validator::make($data,$rule);
        if($validator->fails())
              return Redirect::to('/Grievances')->withErrors($validator);

        $tostore = new Grievances;
        $tostore->user_id = Auth::user()->id;
        $tostore->user_name = Auth::user()->name;
        $tostore->msg = $request->input('details');
        $tostore->save();

        return Redirect::to('/Grievances')->with('success','Thanks for your message,We will keep it secret');
    }
    /*--------------------------------------------------------------------------------------------------------------------- 
                                            FUNCTION FOR SHOWING MEETING  PAGES
    -----------------------------------------------------------------------------------------------------------------------*/
    public function ShowMeeting()
    {
        $meetings = Meeting::orderBy('created_at','desc')->get();;
        return view('cockpit.Member.ShowMeetingPage')->with('meetings',$meetings);
    }

     /*--------------------------------------------------------------------------------------------------------------------- 
                                            FUNCTION FOR SHOWING USER PROFILE  PAGES
    -----------------------------------------------------------------------------------------------------------------------*/
    public function ShowProfilePage(Request $request)
    {
        $id = $request->id;
        $user = User::where("_id","$id")->first();
        $name = $user->name;
        $data = Task::where("alotname",$name)->orderBy('created_at','desc')->get();
        return view('cockpit.Member.ProfilePage')->with('user',$user)->with('data',$data);
    }
     /*--------------------------------------------------------------------------------------------------------------------- 
                                            FUNCTION FOR SHOWING USER EDITING USER INFORMATION
    -----------------------------------------------------------------------------------------------------------------------*/
    public function EditUser(Request $request)
    {
        $data=$request->all();
        
        $rule=array(
            'name' => 'required',
            'email' => 'required|email',
            'facebook' => 'required',
            'github' => 'required',
            'linkedin' => 'required',
        );
            
        $validator=Validator::make($data,$rule);
        
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
            $user = User::where('name',$request->input('name'))->first();
            $user->name=$request->input('name');
            $user->email=$request->input('email');
            $user->facebook=$request->input('facebook');
            $user->github=$request->input('github');
            $user->linkedin=$request->input('linkedin');
            $user->phone_number=(int)$request->input('phone');
            $user->year=(int)$request->input('year');
            $user->rating=(int)$request->input('rating');
            // $user->cover_image=$fileNameToStore;
            $user->save();
            return Redirect::back()->with('success','Profile has been updated');
        }    
    }

    public function MemberTaskPage()
    {
        $data = Task::where('alotname',Auth::user()->name);
        return view('Cockpit.Member.TaskPage')->with('data',$data);
    }
    /*--------------------------------------------------------------------------------------------------------------------- 
                                            FUNCTION FOR SHOWING CHANGING PASSWORD
    -----------------------------------------------------------------------------------------------------------------------*/
    public function ChangePassword(Request $request)
    {
        $data=$request->all();
        
        $rule=array(
            'password' => 'required|min:6',
            'cpassword' => 'required|same:password',
        );

        $message=array(
            'cpassword.required' => 'the confirm password is required',
            'cpassword.min' => 'the confirm password must be at leat 6 characters',
            'cpssword.same' => 'the confirm password and password must be same',
        );
            
        $validator=Validator::make($data,$rule,$message);

        if($validator->fails())
              return Redirect::back()->withErrors($validator);
        else 
        {  
                    // Storing data into database
                    $user = Auth::user();
                    $user->password=Hash::make($request->input('password'));
                    $user->save();
                    return Redirect::back()->with('password','Succesfully Registered');
        }          
    }
    /*--------------------------------------------------------------------------------------------------------------------- 
                                            FUNCTION FOR SHOWING CALENDAR
    -----------------------------------------------------------------------------------------------------------------------*/
    public function ShowCalendar()
    {
        return view('Cockpit.Member.CalendarPage');
    }

    public function task(){
        if(Auth::user()->role_id=="1"){
        $data=Task::all();
        }
        else{
        $data = Task::where('alotname',Auth::user()->name)->get();       
        }
        return view('Cockpit.Member.TaskPage')->with('data',$data);
    }

}
