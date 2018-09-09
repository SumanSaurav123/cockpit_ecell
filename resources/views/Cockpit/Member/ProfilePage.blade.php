@extends('Cockpit.Layout.MainLayout')

@section('content')
   
<div class="main-panel"> 
    <div class="content-wrapper">
        <div class="col-lg-12">
            <div style="background: #00c6ff;  /* fallback for old browsers */background: -webkit-linear-gradient(to right, #0072ff, #00c6ff);  /* Chrome 10-25, Safari 5.1-6 */
                       background: linear-gradient(to right, #0072ff, #00c6ff); /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
                       "  class="card">
                <div class="card-body">
                    <div class="card-two">
                        <header>
                            <div class="avatar">
                                <center><img  src="storage/cover_image/{{$user->cover_image}}" class="img-lg rounded-circle mb-2" alt="Allison Walker" /></center>
                            </div>
                        </head>
                        <center><h3 style="color:white">{{$user->name}}</h3></center>
                    </div>
                </div>
            </div>
        </div>
    <div class="main-panel"> 
    <div class="content-wrapper">
        <div class="col-lg-12">
        <div class="card">
            <!-- Nav tabs -->
            <ul class="nav nav-tabs profile-tab" role="tablist">
                <li class="nav-item"> <a class="nav-link active" data-toggle="tab" href="#home" role="tab">Timeline</a> </li>
                <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#profile" role="tab">Profile</a> </li>
                @if(Auth::user()->_id==$user->_id || Auth::user()->role_id==1)
                <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#settings" role="tab">Settings</a> </li>
                @endif
            </ul>
            <!-- Tab panes -->
            <div class="tab-content">
                <div class="tab-pane active" id="home" role="tabpanel">
                    <div class="card-body">
                    <?php $count=0 ?>
                        <div class="profiletimeline">
                            @if(count($data)>0)
                            @foreach($data as $d)
                            <?php
                                $count++;
                            ?>
                            <div class="sl-item">
                                <div class="sl-left">{{$count}}</div>
                                    <div class="sl-right">
                                        <div><a href="#" class="link">{{$d->creator}}</a> <span class="sl-date">{{$d->created_at->diffForHumans()}}</span>
                                            <blockquote class="m-t-10">
                                                Task Assign {{$d->description}}
                                            </blockquote>
                                        </div>
                                    </div>
                                </div>
                            @endforeach    
                            
                            @else
                              <p>No task alloted yet</p>
                              </div>
                        
                            @endif
                        </div>
                        </div>
                                <!--second tab-->
                                <div class="tab-pane" id="profile" role="tabpanel">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-md-2 col-xs-4 b-r"> <strong>Full Name</strong>
                                                <br>
                                                <p class="text-muted">{{$user->name}}</p>
                                            </div>
                                            <div class="col-md-2 col-xs-4 b-r"> <strong>Mobile</strong>
                                                <br>
                                                <p class="text-muted">{{$user->phone_number}}</p>
                                            </div>
                                            <div class="col-md-3 col-xs-6 b-r"> <strong>Email</strong>
                                                <br>
                                                <p class="text-muted">{{$user->email}}</p>
                                            </div>
                                            <div class="col-md-2 col-xs-4"> <strong>Year</strong>
                                                <br>
                                                <p class="text-muted">{{$user->year}}</p>
                                            </div>
                                            <div class="col-md-2 col-xs-4"> <strong>Rating</strong>
                                                <br>
                                                <p class="text-muted">{{$user->rating}}</p>
                                            </div>
                                        </div>
                                        <hr>
                                        <p class="m-t-30">Donec pede justo, fringilla vel, aliquet nec, vulputate eget, arcu. In enim justo, rhoncus ut, imperdiet a, venenatis vitae, justo. Nullam dictum felis eu pede mollis pretium. Integer tincidunt.Cras dapibus. Vivamus
                                            elementum semper nisi. Aenean vulputate eleifend tellus. Aenean leo ligula, porttitor eu, consequat vitae, eleifend ac, enim.</p>
                                        <h3>Attendence</h3>
                                        <p>
        
                                            <i style="color:green;" class="fa fa-check fa-2x"></i>
                                            <i style="color:green;" class="fa fa-check fa-2x"></i>
                                            <i style="color:green;" class="fa fa-check fa-2x"></i>    
                                        </p> 
                                        <div class="col-md-12 p-r-40 m-t-30 m-b-30">
                                        <h4 class="card-title">SKILL BARS </h4>
                                        <h5 class="m-t-30">Photoshop<span class="pull-right">85%</span></h5>
                                        <div class="progress ">
                                            <div class="progress-bar bg-danger wow animated progress-animated" style="width: 100%; height:6px;" role="progressbar"> <span class="sr-only">60% Complete</span> </div>
                                        </div>
                                        <h5 class="m-t-30">Code editor<span class="pull-right">90%</span></h5>
                                        <div class="progress">
                                            <div class="progress-bar bg-info wow animated progress-animated" style="width: 90%; height:6px;" role="progressbar"> <span class="sr-only">60% Complete</span> </div>
                                        </div>
                                        <h5 class="m-t-30">Illustrator<span class="pull-right">65%</span></h5>
                                        <div class="progress">
                                            <div class="progress-bar bg-success wow animated progress-animated" style="width: 65%; height:6px;" role="progressbar"> <span class="sr-only">60% Complete</span> </div>
                                        </div>
                                    </div>
                                    <!-- Column -->
                                    </div>
                                </div>
                                <div class="tab-pane" id="settings" role="tabpanel">
                                    <div class="card-body">
                                        {!! Form::open( ['action' => 'MemberController@EditUser', 'method' => 'POST','enctype' => 'multipart/form-data'] ) !!}
                                            <div class="form-group">
                                                {!! Form::label('name', 'Name')!!}
                                                {!! Form::text('name',$user->name, ['class' => 'form-control input-rounded',] )!!}
                                                @if(($errors)->has('email'))  <p>{{$errors->first('email')}}</p> @endif
                                            </div>
                                            <div class="form-group">
                                                {!! Form::label('email', 'E-mail')!!}
                                                {!! Form::email('email',$user->email, ['class' => 'form-control input-rounded', 'placeholder'=>'Enter the email'] )!!}
                                                @if(($errors)->has('email'))  <p>{{$errors->first('email')}}</p> @endif
                                            </div> 
                                            <div class="form-group">
                                                {!! Form::label('facebook', 'Facebook')!!}
                                                {!! Form::text('facebook',$user->facebook,['class' => 'form-control input-rounded'] )!!}
                                                @if(($errors)->has('facebook'))  <p>{{$errors->first('facebook')}}</p> @endif
                                            </div>
                                            <div class="form-group">
                                                {!! Form::label('github', 'github')!!}
                                                {!! Form::text('github',$user->github,['class' => 'form-control input-rounded'] )!!}
                                                @if(($errors)->has('github'))  <p>{{$errors->first('github')}}</p> @endif
                                            </div>
                                            <div class="form-group">
                                                {!! Form::label('linkedin', 'linkedin')!!}
                                                {!! Form::text('linkedin',$user->linkedin,['class' => 'form-control input-rounded'] )!!}
                                                @if(($errors)->has('linkedin'))  <p>{{$errors->first('linkedin')}}</p> @endif
                                            </div>
                                            <div class="form-group">
                                                {!! Form::label('phone', 'Phone Number')!!}
                                                {!! Form::text('phone',$user->phone_number,['class' => 'form-control input-rounded'] )!!}
                                                @if(($errors)->has('phone'))  <p>{{$errors->first('phone')}}</p> @endif
                                            </div>
                                            <div class="form-group">
                                                {!! Form::label('year', 'year')!!}
                                                {!! Form::text('year',$user->year,['class' => 'form-control input-rounded'] )!!}
                                                @if(($errors)->has('year'))  <p>{{$errors->first('year')}}</p> @endif
                                            </div>
                                            <div class="form-group">
                                                {!! Form::label('rating', 'Rating')!!}
                                                {!! Form::text('rating',$user->rating,['class' => 'form-control input-rounded'] )!!}
                                                @if(($errors)->has('rating'))  <p>{{$errors->first('rating')}}</p> @endif
                                            </div>    
                                            {!! Form::hidden('_method','POST') !!}
                                            <button class="btn btn-outline-success" onclick="showSwal('success-message')">Click here!</button>  
                                        {!! Form::close() !!}
                                    </div>
                                </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Column -->
                </div>
                <!-- End PAge Content -->
            </div>

@endsection