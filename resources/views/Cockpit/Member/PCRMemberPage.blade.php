@extends('Cockpit.Layout.MainLayout')

@section('content')
<div class="main-panel"> 
    <div class="content-wrapper">
                @if(count($users)>0)
                <div class="row allmem">
                 @foreach($users as $user)
                    <div class="col-md-4 grid-margin stretch-card">
                        <div class="card text-center">
                            <div class="card-body">
                                <img src="storage/cover_image/{{$user->cover_image}}" class="img-lg rounded-circle mb-2" alt="profile image">
                                <h4>{{$user->name}}</h4>
                                <p class="text-muted">{{$user->roles->role_name}}</p>
                                <p class="mt-4 card-text">
                                    Lorem ipsum dolor sit amet, consectetuer adipiscing elit.
                                    Aenean commodo ligula eget dolor. Lorem
                                </p>
                                <button class="btn btn-info btn-sm mt-3 mb-4">Follow</button>
                                <div class="border-top pt-3">
                                    <div class="row">
                                        <div class="contacts">
                                            <a style="margin-left:36px;margin-right:20px;" class="btn btn-icons btn-rounded btn-outline-primary" href="{{$user->github}}"><i class="fa fa-github"></i></a>
                                            <a style="margin-left:36px;margin-right:20px;" class="btn btn-icons btn-rounded btn-outline-primary" href="{{$user->facebook}}"><i class="fa fa-facebook"></i></a>
                                            <a style="margin-left:36px;margin-right:20px;" class="btn btn-icons btn-rounded btn-outline-primary" href="{{$user->linkedin}}"><i class="fa fa-linkedin"></i></a>
                                            <div class="clear"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div> 
                    @endforeach
                    </div>
                    @endif
                <!---<i style="color:green;" class="fa fa-check fa-2x"></i>-->
      
@endsection