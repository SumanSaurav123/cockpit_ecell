@extends('Cockpit.Layout.MainLayout')

@section('content')
<div class="main-panel"> 
    <div class="content-wrapper">
        <div class="row grid-margin">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Write Your Problem</h4>
                        @if(session('success')) 
                        <div class="alert alert-success">
                            {{session('success')}}
                        </div>
                        @endif 
                        <div class="col -md-6">
                            {!! Form::open( ['action' => 'MemberController@StoreGrievances', 'method' => 'POST','enctype' => 'multipart/form-data'] ) !!}
                                <div class="form-group">
                                    {!! Form::label('details', 'Message')!!}
                                    {!! Form::textarea('details',' ', ['class' => 'form-control input-rounded'])!!}
                                    @if(($errors)->has('details'))  <p>{{$errors->first('details')}}</p> @endif
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