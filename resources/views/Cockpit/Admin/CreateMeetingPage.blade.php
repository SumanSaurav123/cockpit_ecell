@extends('Cockpit.Layout.MainLayout')

@section('content')

<div class="main-panel"> 
    <div class="content-wrapper">
        <div class="row">
        <div class="col-md-12">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Create Meeting</h4>
                  <p class="card-description">
                        @if(session('success')) 
                        <div class="alert alert-success">
                            {{session('success')}}
                        </div>
                        @endif  
                  </p>
                    <div class="col -md-6">
                    {!! Form::open( ['action' => 'AdminController@CreateMeeting', 'method' => 'POST','enctype' => 'multipart/form-data'] ) !!}
                        <div class="form-group">
                            {!! Form::label('name', 'Meeting Name')!!}
                            {!! Form::text('name',' ', ['class' => 'form-control input-rounded', 'placeholder'=>'Enter the name'] )!!}
                            @if(($errors)->has('name'))  <p>{{$errors->first('name')}}</p> @endif
                         </div>
                        <div class="form-group">
                            {!! Form::label('time', 'Time')!!}
                            {!! Form::text('time',' ', ['class' => 'form-control input-rounded',] )!!}
                            @if(($errors)->has('time'))  <p>{{$errors->first('time')}}</p> @endif
                         </div>
                        <div class="form-group">
                            {!! Form::label('venue', 'Venue')!!}
                            {!! Form::text('venue',' ', ['class' => 'form-control input-rounded',] )!!}
                            @if(($errors)->has('venue'))  <p>{{$errors->first('venue')}}</p> @endif
                        </div>
                        <div class="form-group">
                            {!! Form::label('date', 'Date')!!}
                            {!! Form::date('date',' ', ['class' => 'form-control input-rounded',] )!!}
                            @if(($errors)->has('date'))  <p>{{$errors->first('date')}}</p> @endif
                        </div>
                        <div class="form-group">
                            {!! Form::label('department', 'Department')!!}
                            {!! Form::select('department',[' '=>'Choose Option'] + $department ,null,['class' => 'form-control input-rounded'] )!!}
                            @if(($errors)->has('role'))  <p>{{$errors->first('role')}}</p> @endif
                        </div>
                        <div class="form-group">
                            {!! Form::label('details', 'Details')!!}
                            {!! Form::textarea('details',' ', ['class' => 'form-control input-rounded'])!!}
                            @if(($errors)->has('details'))  <p>{{$errors->first('venue')}}</p> @endif
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
     </div>                 
@endsection