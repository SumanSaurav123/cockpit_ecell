@extends('Cockpit.Layout.MainLayout')

@section('content')

<div class="main-panel"> 
    <div class="content-wrapper">
        <div class="row">
        <div class="col-md-12">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Create User</h4>
                  <p class="card-description">
                        @if(session('success')) 
                        <div class="alert alert-success">
                            {{session('success')}}
                        </div>
                        @endif  
                  </p>
                    {!! Form::open( ['action' => 'AdminController@CreateUser', 'method' => 'POST','enctype' => 'multipart/form-data'] ) !!}
                        <div class="form-group">
                            {!! Form::label('name', 'Name')!!}
                            {!! Form::text('name',' ', ['class' => 'form-control input-rounded', 'placeholder'=>'Enter the name'] )!!}
                            @if(($errors)->has('email'))  <p>{{$errors->first('email')}}</p> @endif
                         </div>
                        <div class="form-group">
                            {!! Form::label('email', 'E-mail')!!}
                            {!! Form::email('email',' ', ['class' => 'form-control input-rounded', 'placeholder'=>'Enter the email'] )!!}
                            @if(($errors)->has('email'))  <p>{{$errors->first('email')}}</p> @endif
                         </div>
                        <div class="form-group">
                            {!! Form::label('password', 'Password')!!}
                            {!! Form::password('password', ['class' => 'form-control input-rounded'] )!!}
                            @if(($errors)->has('password'))  <p>{{$errors->first('password')}}</p> @endif
                        </div>
                        <div class="form-group">
                            {!! Form::label('cpassword', 'Confirm Password')!!}
                            {!! Form::password('cpassword', ['class' => 'form-control input-rounded'] )!!}
                            @if(($errors)->has('cpassword'))  <p>{{$errors->first('password')}}</p> @endif
                        </div>  
                        <div class="form-group">
                            {!! Form::label('role', 'Role')!!}
                            {!! Form::select('role',[' '=>'Chosse Option'] + $roles ,null,['class' => 'form-control input-rounded'] )!!}
                            @if(($errors)->has('role'))  <p>{{$errors->first('role')}}</p> @endif
                        </div>
                        <div class="form-group">
                            {!! Form::label('department', 'Department')!!}
                            {!! Form::select('department',[' '=>'Chosse Option'] + $department ,null,['class' => 'form-control input-rounded'] )!!}
                            @if(($errors)->has('role'))  <p>{{$errors->first('role')}}</p> @endif
                        </div>
                        <div class="form-group">
                            {!! Form::label('facebook', 'Facebook')!!}
                            {!! Form::text('facebook',null,['class' => 'form-control input-rounded'] )!!}
                            @if(($errors)->has('facebook'))  <p>{{$errors->first('facebook')}}</p> @endif
                        </div>
                        <div class="form-group">
                            {!! Form::label('github', 'github')!!}
                            {!! Form::text('github',null,['class' => 'form-control input-rounded'] )!!}
                            @if(($errors)->has('github'))  <p>{{$errors->first('github')}}</p> @endif
                        </div>
                        <div class="form-group">
                            {!! Form::label('linkedin', 'linkedin')!!}
                            {!! Form::text('linkedin',null,['class' => 'form-control input-rounded'] )!!}
                            @if(($errors)->has('linkedin'))  <p>{{$errors->first('linkedin')}}</p> @endif
                        </div>
                        <div class="form-group">
                            {!! Form::label('phone', 'Phone Number')!!}
                            {!! Form::text('phone',null,['class' => 'form-control input-rounded'] )!!}
                            @if(($errors)->has('phone'))  <p>{{$errors->first('phone')}}</p> @endif
                        </div>
                         <div class="form-group">
                            {!! Form::label('rollno', 'Roll no')!!}
                            {!! Form::text('rollno',null,['class' => 'form-control input-rounded'] )!!}
                            @if(($errors)->has('phone'))  <p>{{$errors->first('phone')}}</p> @endif
                        </div>
                        <div class="form-group">
                            {!! Form::label('year', 'year')!!}
                            {!! Form::text('year',null,['class' => 'form-control input-rounded'] )!!}
                            @if(($errors)->has('phone'))  <p>{{$errors->first('phone')}}</p> @endif
                        </div>
                        <div class="form-group">
                            {!! Form::label('rating', 'Rating')!!}
                            {!! Form::text('rating',null,['class' => 'form-control input-rounded'] )!!}
                            @if(($errors)->has('rating'))  <p>{{$errors->first('rating')}}</p> @endif
                        </div>
                        <div class="form-group">
                            {!! Form::file('file',['class'=>'file-upload-browse btn btn-info ']) !!}
                        </div>      
                        {!! Form::hidden('_method','POST') !!}
                        {!! Form::submit('Submit', array('class'=>'btn btn-success ru')) !!}
                    {!! Form::close() !!}
                </div>
              </div>
            </div> 
            </div>  
        </div>
     </div>                 
@endsection