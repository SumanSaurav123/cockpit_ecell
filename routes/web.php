<?php

use App\user;
use App\Roles;
use App\Department;
use App\Meeting;
use App\publicmailing;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/','AdminController@ShowDashboard');
Route::POST('/CheckUser','LoginController@CheckUser');

Route::get('/logout',function(){
    Auth::logout();
    return view('Cockpit.Layout.MainLayout');
});

Route::group(['middleware'=>'admin'],function(){
    
         // Route::resource('admin','AdminController');
            Route::get('/AdminCreateUser','AdminController@ShowCreateUser');
            Route::POST('/AddUser','AdminController@CreateUser');
            Route::get('/AdminCreateMeeting','AdminController@ShowCreateMeeting');
            Route::POST('/CreateMeeting','AdminController@CreateMeeting');
            Route::get('/ShowMeeting','AdminController@ShowMeeting');

    });

Route::get('/ShowAll',function(){
        return view('Cockpit.Member.AllMemberPage');
    });
Route::get('/NotifiMeeting','MemberController@NotifiMeeting')->name('Member.NotifiMeeting');
Route::get('/markallread','MemberController@MarkAllRead');
Route::get('/ShowNotification','MemberController@ShowNotification');
Route::get('/ShowNotificationAll','MemberController@ShowNotificationAll');    
Route::get('/ShowCatMember','MemberController@ShowCatMember');
Route::get('/Grievances','MemberController@ShowGrievances');
Route::POST('/StoreGrievances','MemberController@StoreGrievances');
Route::get('/ShowMemberMeeting','MemberController@ShowMeeting');
Route::get('/ShowTaskPage','AdminController@ShowTaskPage');
Route::POST('/CreateTaskPage','AdminController@CreateTask');
Route::get('/ShowProfile','MemberController@ShowProfilePage');
Route::POST('/EditUser','MemberController@EditUser');
Route::POST('/ChangePassword','MemberController@ChangePassword');
Route::get('/ShowCalendar','MemberController@ShowCalendar');
Route::get('/ShowAllMember','MemberController@ShowAllMember')->name('member.ShowAllMember');
 Route::get('MemberTaskPage','MemberController@MemberTaskPage');
Route::post('/compose','MailController@genre');
Route::post('confirm_compose','MailController@compose_mails');
Route::POST('assign/fetch', 'AdminController@fetch')->name('AdminController.fetch');
Route::get('/task','MemberController@task');

Route::get('/Check',function(){
   
    $data = publicmailing::all();

    foreach($data as $d)
    {
        echo $d->subject;
    }
    
});   