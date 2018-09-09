<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\publicmailing;
use App\privatemailing;
use App\massmailing;
use App\test;
use Mail;
use DB;
use Auth;
use User;
use Illuminate\Support\Facades\Input;
class MailController extends Controller
{
    public function genre(Request $request){

      $genre=$request->input('optradio');
      $mdata = Publicmailing::where('user_email',Auth::user()->name)->get();
      if($genre==null){
         return view('Cockpit.Member.compose_mail')->with('data', 'Public')->with('mdata',$mdata); 
      }else{
    	return view('Cockpit.Member.compose_mail')->with('data', $genre)->with('mdata',$mdata);
      } 
      return $mdata;

    }

public function compose_mails(Request $request){
  try{
  $genre=$request->input('genre');
  $fileo=$request->input('residual');
  $range=$request->input('rangeimage');
  //    $range=$request->input('range');
	$to_email=$request->input('to_email');
	$from_email=$request->input('from_email');
	$subject=$request->input('subject');
	$email_content=$request->input('message');
//return view('Cockpit.mail_body')->with('body',$email_content)->with('response','datas');
    
if($from_email==Auth::user()->email_id){
    $from_name=Auth::user()->name;
}
else if($from_email=="pcr@ecell.org.in"){
    $from_name="Public Relations-Ecell";
}

else
    if($from_email=="rnd@ecell.org.in"){
    $from_name="Reasearch and Development-Ecell";
}
else if($from_email=="techies@ecell.org.in"){
    $from_name="Techies-Ecell";
}
else if($from_email=="designhub@ecell.org.in"){
    $from_name="Design Hub-Ecell";
}
else if($from_email=="learning@ecell.org.in"){
    $from_name="Learning team-Ecell";
}
else if($from_email=="hr@ecell.org.in"){
    $from_name="Hr-Ecell";
} 
else if($from_email=="ceo@ecell.org.in"){
    $from_name="Ceo-Ecell";
}



    //return view('Cockpit.compose_mail')->with('data','Public')->with('response','');

 $new_email=explode(",", $to_email);


  
 


    
  //  return redirect('compose')->with('data','Public')->with('response','datas');


 $fileo=explode(",", $fileo);
 $array=array();
 $filearray=array();
 $dataarr=array();



 for($i=2;$i<=$range;$i++){
$files = $request->file($i);

if($request->hasFile($i))
{
    foreach ($files as $file) {


  $filenamewithext=$file->getClientOriginalName();  

$array[]=$filenamewithext;
$filearray[]=$file;

}
//endof foreach
}

//2nd if
}

//print_r($array);



$replace=array();
foreach($fileo as $filo){
$replace[]=$filo;
  }
 

foreach($replace as $val){
  $array = str_replace($val, 0, $array);
}


$re=sizeof($array);

for($r=0;$r<$re;$r++){
  if($array[$r]!='0'){
$array[$r]=$filearray[$r];  
  }

}

/////////////////////////




foreach($array as $arr){
if($arr!="0"){
   $data_array= $arr->getClientOriginalName();
 array_push($dataarr, $data_array);
 if($genre=='Public'){
$arr->storeAs('assets/publicimages',$arr->getClientOriginalName());
}

else if($genre=='Private'){
$arr->storeAs('assets/privateimages',$arr->getClientOriginalName());
}

else if($genre=='Mass'){
  $arr->storeAs('assets/massimages',$arr->getClientOriginalName());

}


}


}
$data_implode= implode(", ",$dataarr);


///////File upload ends//////////////

foreach ($new_email as $email) {
if($genre=='Public'){
$db=new publicmailing;

$db->user_email="Somesh Manna";
$db->to_email=$email;
$db->from_email=$from_email;
$db->subject=$subject;
$db->email_content=$email_content;
if($data_implode==''){
$db->image_files="no image";
}
else{
$db->image_files=$data_implode;
}
$db->save();
}

else if($genre=='Private'){
  $db=new privatemailing;
$db->user_email="Somesh Manna";
$db->to_email=$email;
$db->from_email=$from_email;
$db->subject=$subject;
$db->email_content=$email_content;
$db->image_files=$data_implode;
$db->save();
}

else if($genre=='Mass'){
$db=new massmailing;
$db->user_email="Somesh Manna";
$db->to_email=$email;
$db->from_email=$from_email;
$db->subject=$subject;
$db->email_content=$email_content;
$db->image_files=$data_implode;
$db->save();
}


}

/////////////////////////////////////////////send email///////////////////////////////
$body=str_replace(" ", "&nbsp", $email_content);
$body=nl2br($body);

foreach($new_email as $new_emails){
$data=array('body'=>$email_content,'email'=>$request->input('to_email'));
    Mail::send('Cockpit.Member.mail_body',$data,function($message) use ($request,$new_emails,$from_email,$from_name,$range,$i,$array){
        $message->to($new_emails);
        $message->subject($request->input('subject'));
        $message->from($from_email,$from_name);
      
             foreach($array as $i){   
             if($i!='0'){ 
        $message->attach($i->getRealPath(), [
    'as' => $i->getClientOriginalName(), 
    'mime' => $i->getMimeType()
]);
      }
   
   }
 //   }
    
},true);

}


}

catch(Exception $e){
  echo "Please try again later";
}



}






public function testmail(Request $request){
  
 try{
$name=$request->input('sessionname');
$to=$request->input('to_person');
$message=$request->input('message');
$fileo=$request->input('residual');
  $range=$request->input('rangeimage');
 $fileo=explode(",", $fileo);
 $array=array();
 $filearray=array();


 for($i=2;$i<=$range;$i++){
$files = $request->file($i);

if($request->hasFile($i))
{
    foreach ($files as $file) {


  $filenamewithext=$file->getClientOriginalName();  

$array[]=$filenamewithext;
$filearray[]=$file;

}
//endof foreach
}
//2nd if
}

//print_r($array);



$replace=array();
foreach($fileo as $filo){
$replace[]=$filo;
  }
 

foreach($replace as $val){
  $array = str_replace($val, 0, $array);
}

print_r($array);

$re=sizeof($array);

for($r=0;$r<$re;$r++){
  if($array[$r]!='0'){
$array[$r]=$filearray[$r];  
  }

}

/////////////////////////




foreach($array as $arr){
if($arr!="0"){
   echo $arr->getClientOriginalName();
  

}

}


}
catch(Exception $e){
  throw new Exception($e->getMessage());
}


}



public function testmails(Request $request){
    $name=$request->input('texts');
    $names=explode(" ", $name);
    foreach ($names as $namess) {
        echo $namess;
        echo "<br>";
    }
    
}






///////////get_data from db for dynamic dropdown////


public function index(){
  try{

  $departments = DB::table('dropdowns')
         ->groupBy('departments')
         ->get();
     return view('Cockpit.assign_work')->with('departments', $departments);

}




catch(Exception $e){
  echo "Something went wrong";
}

}



public function fetch(Request $request)
{
  
  $value = (int)$request->get('value');
  $data = User::where('dep_id',$value)->get();

    foreach ($data as $dat)
    {
        //$output='<option value="'.$dat->name.'" id="'.$dat->name.'">'.$dat->name.'</option>';
        $output = '<div>No match found</div>';
    }
    $data = array('card_data'  => $output,);
    echo json_encode($data);

}
    ///////////


public function post_method(Request $request){
$posted_by="Somesh Manna";
$head=$request->input('head');
$desc=$request->input('desc');
$date=$request->input('date');
$departments=$request->input('departments');
$name=$request->input('get');

foreach($name as $names){
echo $names;

}

//$data=new postdata;

//$data->posted_by=$posted_by;
//$data->head=$head;
//$data->desc=$desc;
//$data->date=$date;
//$data->departments=$departments;
//$data->name=$name;

//$data->save();


}






}


