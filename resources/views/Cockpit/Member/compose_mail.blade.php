@extends('Cockpit.Layout.MainLayout')

@section('content')
<style>
     .mail-box {
    border-collapse: collapse;
    border-spacing: 0;
    display: table;
    table-layout: fixed;
    width: 100%;
}
.mail-box aside {
    display: table-cell;
    float: none;
    height: 100%;
    padding: 0;
    vertical-align: top;
}
.mail-box .sm-side {
    background: none repeat scroll 0 0 #e5e8ef;
    border-radius: 4px 0 0 4px;
    width: 25%;
}
.mail-box .lg-side {
    background: none repeat scroll 0 0 #fff;
    border-radius: 0 4px 4px 0;
    width: 75%;
}
.mail-box .sm-side .user-head {
    background: none repeat scroll 0 0 #00a8b3;
    border-radius: 4px 0 0;
    color: #fff;
    min-height: 80px;
    padding: 10px;
}
.user-head .inbox-avatar {
    float: left;
    width: 65px;
}
.user-head .inbox-avatar img {
    border-radius: 4px;
}
.user-head .user-name {
    display: inline-block;
    margin: 0 0 0 10px;
}
.user-head .user-name h5 {
    font-size: 14px;
    font-weight: 300;
    margin-bottom: 0;
    margin-top: 15px;
}
.user-head .user-name h5 a {
    color: #fff;
}
.user-head .user-name span a {
    color: #87e2e7;
    font-size: 12px;
}
a.mail-dropdown {
    background: none repeat scroll 0 0 #80d3d9;
    border-radius: 2px;
    color: #01a7b3;
    font-size: 10px;
    margin-top: 20px;
    padding: 3px 5px;
}
.inbox-body {
    padding: 20px;
}
.btn-compose {
    background: none repeat scroll 0 0 #ff6c60;
    color: #fff;
    padding: 12px 0;
    text-align: center;
    width: 100%;
}
.btn-compose:hover {
    background: none repeat scroll 0 0 #f5675c;
    color: #fff;
}
ul.inbox-nav {
    display: inline-block;
    margin: 0;
    padding: 0;
    width: 100%;
}
.inbox-divider {
    border-bottom: 1px solid #d5d8df;
}
ul.inbox-nav li {
    display: inline-block;
    line-height: 45px;
    width: 100%;
}
ul.inbox-nav li a {
    color: #6a6a6a;
    display: inline-block;
    line-height: 45px;
    padding: 0 20px;
    width: 100%;
}
ul.inbox-nav li a:hover, ul.inbox-nav li.active a, ul.inbox-nav li a:focus {
    background: none repeat scroll 0 0 #d5d7de;
    color: #6a6a6a;
}
ul.inbox-nav li a i {
    color: #6a6a6a;
    font-size: 16px;
    padding-right: 10px;
}
ul.inbox-nav li a span.label {
    margin-top: 13px;
}
ul.labels-info li h4 {
    color: #5c5c5e;
    font-size: 13px;
    padding-left: 15px;
    padding-right: 15px;
    padding-top: 5px;
    text-transform: uppercase;
}
ul.labels-info li {
    margin: 0;
}
ul.labels-info li a {
    border-radius: 0;
    color: #6a6a6a;
}
ul.labels-info li a:hover, ul.labels-info li a:focus {
    background: none repeat scroll 0 0 #d5d7de;
    color: #6a6a6a;
}
ul.labels-info li a i {
    padding-right: 10px;
}
.nav.nav-pills.nav-stacked.labels-info p {
    color: #9d9f9e;
    font-size: 11px;
    margin-bottom: 0;
    padding: 0 22px;
}
.inbox-head {
    background: none repeat scroll 0 0 #41cac0;
    border-radius: 0 4px 0 0;
    color: #fff;
    min-height: 80px;
    padding: 20px;
}
.inbox-head h3 {
    display: inline-block;
    font-weight: 300;
    margin: 0;
    padding-top: 6px;
}
.inbox-head .sr-input {
    border: medium none;
    border-radius: 4px 0 0 4px;
    box-shadow: none;
    color: #8a8a8a;
    float: left;
    height: 40px;
    padding: 0 10px;
}
.inbox-head .sr-btn {
    background: none repeat scroll 0 0 #00a6b2;
    border: medium none;
    border-radius: 0 4px 4px 0;
    color: #fff;
    height: 40px;
    padding: 0 20px;
}
.table-inbox {
    border: 1px solid #d3d3d3;
    margin-bottom: 0;
}
.table-inbox tr td {
    padding: 12px !important;
}
.table-inbox tr td:hover {
    cursor: pointer;
}
.table-inbox tr td .fa-star.inbox-started, .table-inbox tr td .fa-star:hover {
    color: #f78a09;
}
.table-inbox tr td .fa-star {
    color: #d5d5d5;
}
.table-inbox tr.unread td {
    background: none repeat scroll 0 0 #f7f7f7;
    font-weight: 600;
}
ul.inbox-pagination {
    float: right;
}
ul.inbox-pagination li {
    float: left;
}
.mail-option {
    display: inline-block;
    margin-bottom: 10px;
    width: 100%;
}
.mail-option .chk-all, .mail-option .btn-group {
    margin-right: 5px;
}
.mail-option .chk-all, .mail-option .btn-group a.btn {
    background: none repeat scroll 0 0 #fcfcfc;
    border: 1px solid #e7e7e7;
    border-radius: 3px !important;
    color: #afafaf;
    display: inline-block;
    padding: 5px 10px;
}
.inbox-pagination a.np-btn {
    background: none repeat scroll 0 0 #fcfcfc;
    border: 1px solid #e7e7e7;
    border-radius: 3px !important;
    color: #afafaf;
    display: inline-block;
    padding: 5px 15px;
}
.mail-option .chk-all input[type="checkbox"] {
    margin-top: 0;
}
.mail-option .btn-group a.all {
    border: medium none;
    padding: 0;
}
.inbox-pagination a.np-btn {
    margin-left: 5px;
}
.inbox-pagination li span {
    display: inline-block;
    margin-right: 5px;
    margin-top: 7px;
}
.fileinput-button {
    background: none repeat scroll 0 0 #eeeeee;
    border: 1px solid #e6e6e6;
}
.inbox-body .modal .modal-body input, .inbox-body .modal .modal-body textarea {
    border: 1px solid #e6e6e6;
    box-shadow: none;
}
.btn-send, .btn-send:hover {
    background: none repeat scroll 0 0 #00a8b3;
    color: #fff;
}
.btn-send:hover {
    background: none repeat scroll 0 0 #009da7;
}
.modal-header h4.modal-title {
    font-family: "Open Sans",sans-serif;
    font-weight: 300;
}
.modal-body label {
    font-family: "Open Sans",sans-serif;
    font-weight: 400;
}
.heading-inbox h4 {
    border-bottom: 1px solid #ddd;
    color: #444;
    font-size: 18px;
    margin-top: 20px;
    padding-bottom: 10px;
}
.sender-info {
    margin-bottom: 20px;
}
.sender-info img {
    height: 30px;
    width: 30px;
}
.sender-dropdown {
    background: none repeat scroll 0 0 #eaeaea;
    color: #777;
    font-size: 10px;
    padding: 0 3px;
}
.view-mail a {
    color: #ff6c60;
}
.attachment-mail {
    margin-top: 30px;
}
.attachment-mail ul {
    display: inline-block;
    margin-bottom: 30px;
    width: 100%;
}
.attachment-mail ul li {
    float: left;
    margin-bottom: 10px;
    margin-right: 10px;
    width: 150px;
}
.attachment-mail ul li img {
    width: 100%;
}
.attachment-mail ul li span {
    float: right;
}
.attachment-mail .file-name {
    float: left;
}
.attachment-mail .links {
    display: inline-block;
    width: 100%;
}

.fileinput-button {
    float: left;
    margin-right: 4px;
    overflow: hidden;
    position: relative;
}
.fileinput-button input {
    cursor: pointer;
    direction: ltr;
    font-size: 23px;
    margin: 0;
    opacity: 0;
    position: absolute;
    right: 0;
    top: 0;
    transform: translate(-300px, 0px) scale(4);
}
.fileupload-buttonbar .btn, .fileupload-buttonbar .toggle {
    margin-bottom: 5px;
}
.files .progress {
    width: 200px;
}
.fileupload-processing .fileupload-loading {
    display: block;
}
* html .fileinput-button {
    line-height: 24px;
    margin: 1px -3px 0 0;
}
* + html .fileinput-button {
    margin: 1px 0 0;
    padding: 2px 15px;
}
@media (max-width: 767px) {
.files .btn span {
    display: none;
}
.files .preview * {
    width: 40px;
}
.files .name * {
    display: inline-block;
    width: 80px;
    word-wrap: break-word;
}
.files .progress {
    width: 20px;
}
.files .delete {
    width: 60px;
}
}
ul {
    list-style-type: none;
    padding: 0px;
    margin: 0px;
}
 
</style>
<div class="container">
<link rel='stylesheet prefetch' href='http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css'>
 <div class="mail-box">
                  <aside class="sm-side">
                      <div class="user-head">
                          <a class="inbox-avatar" href="javascript:;">
                              <img  width="64" hieght="60" src="storage/cover_image/{{Auth::user()->cover_image}}">
                          </a>
                          <div class="user-name">
                              <h5><a href="#">{{Auth::user()->name}}</a></h5>
                              <span><a href="#">{{Auth::user()->email}}</a></span>
                          </div>
                          <a class="mail-dropdown pull-right" href="javascript:;">
                              <i class="fa fa-chevron-down"></i>
                          </a>
                      </div>
                      <div class="inbox-body">
                          <a href="#myModal" data-toggle="modal"  title="Compose"    class="btn btn-compose">
                              Compose
                          </a>
                          <!-- Modal -->
                          <div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="myModal" class="modal fade" style="display: none;">
                              <div class="modal-dialog">
                                  <div class="modal-content">
                                      <div class="modal-header">
                                          <button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button>
                                          <h4 class="modal-title">Compose</h4>
                                      </div>
                                      <div class="modal-body">
                                           <form role="form" action="confirm_compose" method="post" enctype="multipart/form-data" id="myForm">
                                                 <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                 <input type="text" name="genre" value="{{$data}}">

                                                  <input type="hidden" name="residual" id="residue">  
          <input type="hidden" name="rangeimage" id="rangeimage">
                                                <div class="form-group">
                                                    <select class="form-control" id="inputGroupSelect01" style="margin-bottom:20px; color:gray" name="from_email">
                                                       <option selected value="{{Auth::user()->email}}">Mail as {{Auth::user()->email}}</option>
                                                       <option value="pcr@ecell.org.in">Mail as pcr@ecell.org.in</option>
                                                       <option value="rnd@ecell.org.in">Mail as rnd@ecell.org.in</option>
                                                       <option value="techies@ecell.org.in">Mail as techies@ecell.org.in</option>
                                                       <option value="designhub@ecell.org.in">Mail as designhub@ecell.org.in</option>
                                                       <option value="learning@ecell.org.in">Mail as learning@ecell.org.in</option>   
                                                       <option value="ceo@ecell.org.in">Mail as ceo@ecell.org.in</option>
                                                       <option value="hr@ecell.org.in">Mail as hr@ecell.org.in</option>
                                                </div>

                                                <div class="form-group">
                                                    <input type="test" class="form-control" placeholder="To" name="to_email">
                                                </div>

                                                <div class="form-group">
                                                    <input type="text" class="form-control" placeholder="Subject" name="subject">
                                                </div>
                                               <div class="form-group" >
                                        <textarea class="form-control" rows="15" placeholder="Enter text ..." style="height:300px; overflow-y: auto;" name="message" id="message" ></textarea>


                                        




                                                </div>

                                                <div class="form-group m-b-0">

<div id="alertsuccess"></div>


                                                    <div class="text-right">
                                                        <button type="button" class="btn btn-success waves-effect waves-light m-r-5" id="b2">  <label for="s2" id="1"><i class="fa fa-paperclip"></i></label></button>

                                                        <input type="file" id="s2" name="2[]" style="display:none" onchange="changeimgs()" multiple>

<div id="newattachfile"></div>

<div class="newattach" id="newattach"></div>
   




                                                        <button type="button" class="btn btn-success waves-effect waves-light m-r-5" id="del"><i class="fa fa-trash-o"></i></button>
                                                        <button class="btn btn-purple waves-effect waves-light"> <span class="send">Send</span> <i class="fa fa-send m-l-10"></i> </button>
                                                    </div>
                                                </div>

                                            </form>
                                        </div>
                                  </div><!-- /.modal-content -->
                              </div><!-- /.modal-dialog -->
                          </div><!-- /.modal -->
                      </div>
                

                  </aside>
                  <aside class="lg-side">
                      <div class="inbox-head">
                          <h3>Inbox</h3>
                          <form action="#" class="pull-right position">
                              <div class="input-append">
                                  <input type="text" class="sr-input" placeholder="Search Mail">
                                  <button class="btn sr-btn" type="button"><i class="fa fa-search"></i></button>
                              </div>
                          </form>
                      </div>
                      <div class="inbox-body">
                         <div class="mail-option">
                             <div class="chk-all">
                                 <input type="checkbox" class="mail-checkbox mail-group-checkbox">
                                 <div class="btn-group">
                                     <a data-toggle="dropdown" href="#" class="btn mini all" aria-expanded="false">
                                         All
                                         <i class="fa fa-angle-down "></i>
                                     </a>
                                     <ul class="dropdown-menu">
                                         <li><a href="#"> None</a></li>
                                         <li><a href="#"> Read</a></li>
                                         <li><a href="#"> Unread</a></li>
                                     </ul>
                                 </div>
                             </div>

                             <div class="btn-group">
                                 <a data-original-title="Refresh" data-placement="top" data-toggle="dropdown" href="#" class="btn mini tooltips">
                                     <i class=" fa fa-refresh"></i>
                                 </a>
                             </div>
                             <div class="btn-group hidden-phone">
                                 <a data-toggle="dropdown" href="#" class="btn mini blue" aria-expanded="false">
                                     More
                                     <i class="fa fa-angle-down "></i>
                                 </a>
                                 <ul class="dropdown-menu">
                                     <li><a href="#"><i class="fa fa-pencil"></i> Mark as Read</a></li>
                                     <li><a href="#"><i class="fa fa-ban"></i> Spam</a></li>
                                     <li class="divider"></li>
                                     <li><a href="#"><i class="fa fa-trash-o"></i> Delete</a></li>
                                 </ul>
                             </div>
                             <div class="btn-group">
                                 <a data-toggle="dropdown" href="#" class="btn mini blue">
                                     Move to
                                     <i class="fa fa-angle-down "></i>
                                 </a>
                                <ul class="dropdown-menu">
                                     <li><a href="#"><i class="fa fa-pencil"></i> Mark as Read</a></li>
                                     <li><a href="#"><i class="fa fa-ban"></i> Spam</a></li>
                                     <li class="divider"></li>
                                     <li><a href="#"><i class="fa fa-trash-o"></i> Delete</a></li>
                                </ul>
                             </div>

                            <ul class="unstyled inbox-pagination">
                                <li><span>1-50 of 234</span></li>
                                <li>
                                     <a class="np-btn" href="#"><i class="fa fa-angle-left  pagination-left"></i></a>
                                </li>
                                <li>
                                     <a class="np-btn" href="#"><i class="fa fa-angle-right pagination-right"></i></a>
                                </li>
                            </ul>
                         </div>
                          <table class="table table-inbox table-hover">
                            <tbody>
                            @if(count($mdata))
                                @foreach($mdata as $m)
                                    <tr class="unread">
                                          <td class="inbox-small-cells">
                                              <input type="checkbox" class="mail-checkbox">
                                          </td>
                                          <td class="inbox-small-cells"><i class="fa fa-star"></i></td>
                                          <td class="view-message  dont-show">{{$m->to_email}}</td>
                                          <td class="view-message ">{{$m->subject}}</td>
                                          <td class="view-message  inbox-small-cells"><i class="fa fa-paperclip"></i></td>
                                          <td class="view-message  text-right">{{$m->created_at}}</td>
                                      </tr>
                                @endforeach      
                            @endif
                          </tbody>
                          </table>
                      </div>
                  </aside>
              </div>
</div>

@section('script')
    <script>
var a=document.getElementById('file_id');
var b=document.getElementById('newattach');
var c=document.getElementById('newattachfile');
var d= document.getElementById('alertsuccess');
var j=3;
var r=2;
var k;
var range=document.getElementById('rangeimage');

function changeimgs(){
document.getElementById('s2').style.display="none";
document.getElementById('b2').style.display="none";
var l=-1;
r++;
l++;

var divtest= document.createElement("div");
divtest.innerHTML='<html><input type="file" id="s'+r+'" name="'+r+'[]" onchange="changeimg()" multiple style="display:none;"></html>';
c.append(divtest);


var divtests= document.createElement("div");
divtests.innerHTML='<button type="button" class="btn btn-success waves-effect waves-light m-r-5" id="b'+r+'" ><label for="s'+r+'"><i class="fa fa-paperclip"></i></label></button>';
b.append(divtests);



range.value=r-1;



//var p='s'+j;
//var av=document.getElementById('s2').value;

//var divtestss= document.createElement("div");
//divtestss.innerHTML="av";
//d.append(divtestss);
var as=document.getElementById('s2');
var result = as.files;
bs=document.getElementById('s2').value.replace('C:\\fakepath\\', '');
//var divtestss= document.createElement("div");
//divtestss.innerHTML='<html><div class="alert alert-success" id="sd2">'+bs+'<span style="float:right; margin-right:10px; color:white;" onclick="q()">&times</span></div></html>'
//d.append(divtestss);


var resultlength=result.length;

for(i=0;i<result.length;i++){
var divtestsss= document.createElement("div");
divtestsss.innerHTML='<html><div class="alert alert-success" id="b'+i+'">'+result[i].name+'<span style="float:right; margin-right:10px; color:white;" onclick="q('+i+')">&times</span></div></html>'
d.append(divtestsss);
}
}



function q(a){
   var fg='b'+a;
   document.getElementById(fg).style.display="none";
   var as=document.getElementById('s2');
   var d=document.getElementById('residue');
var result = as.files;
   d.value+=result[a].name+',';

}











function changeimg(){
//document.getElementById('s2').style.display="none";
//document.getElementById('b2').style.display="none";
j++;


var divtest= document.createElement("div");
divtest.innerHTML='<html><input type="file" id="s'+j+'" name="'+j+'[]" onchange="changeimg()" multiple style="display:none;"></html>';
c.append(divtest);


range.value=j-1;


var divtests= document.createElement("div");
divtests.innerHTML='<button type="button" class="btn btn-success waves-effect waves-light m-r-5" id="b'+j+'"><label for="s'+j+'"><i class="fa fa-paperclip"></i></label></button>';
b.append(divtests);

kl=j-1;
var p='s'+kl;
var bs;
//var av=document.getElementById('s2').value;
var as=document.getElementById(p);
var result = as.files;
 bs=document.getElementById(p).value.replace('C:\\fakepath\\', '');
var less=j-1;
 for(z=0;z<result.length;z++){
var divtestss= document.createElement("div");
divtestss.innerHTML='<html><div class="alert alert-success" id="'+less+''+z+'">'+result[z].name+'<span style="float:right; margin-right:10px; color:white;" onclick="qfalse('+less+''+z+','+less+','+z+')">&times</span></div></html>'
d.append(divtestss);

}




for(var k=j-1;k>1;k--){
    var delk='b'+k;
document.getElementById(delk).style.display="none";
}




}


function qfalse(a,v,o){
    document.getElementById(a).style.display="none";
    var n='s'+v;
    var as=document.getElementById(n);
   var d=document.getElementById('residue');
var result = as.files;
   d.value+=result[o].name+',';



  
}


</script>




<script>
    $('#myForm').submit(function(e){
 e.preventDefault();
 $('.send').html("Sending....");
$.ajax({
            type:'POST',
            url: $(this).attr('action'),
            data:new FormData(this),
            cache:false,
            contentType: false,
            processData: false,
            success:function(data){
             //   $('#successpost').html(data);
               swal("Success!", "Email Sent successfully" , "success");
 $('#myForm')[0].reset();
 $('.send').html("Send");
 $('#alertsuccess').hide();
  
            },
            error: function(data){
                swal("Success!", "Email Sent successfully" , "success");

               $('.send').html("Send");
 
            }
        });
   // });

});



</script>
@endsection



@endsection