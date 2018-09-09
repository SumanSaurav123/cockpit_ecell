<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Validator;
use Redirect;
use Auth;
use App\User;
use Hash;


class LoginController extends Controller
{
    //
    public function index()
    {
        return view('blog.login');
    }

    public function CheckUser(Request $request)
    {
        $data=$request->all();
        
        $rule=array(
            'email' => 'required|email',
            'password' => 'required|min:6',
        );
            
        $validator=Validator::make($data,$rule);

        if($validator->fails())
              return Redirect::to('/')->withErrors($validator);
        else
        {
             $user=User::where('email',$request->input('email'))->first();
             $userdata=array(
                'email' =>$request->input('email'), 
                'password' => $request->input('password'),
            );
            // if(Auth::attempt($userdata))
            //     return Redirect::to('/');
            // else 
            //     return Redirect::to('login')->with('msg','This does not match with our credentials');
            if($user && !Hash::check($request->input('password'),$user->password))
                return Redirect::back()->with('succes','Password is incorrect');
            else
            {
                
                $userdata=array(
                    'email' =>$request->input('email'), 
                    'password' => $request->input('password'),
                );
                if(Auth::attempt($userdata))
                    return Redirect::to('/');
                else 
                    return Redirect::back()->with('msg','This does not match with our credentials');
           }
        }
        
    }
}
