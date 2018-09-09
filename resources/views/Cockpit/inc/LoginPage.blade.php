<div class="container-scroller">
    <div class="container-fluid page-body-wrapper full-page-wrapper">
      <div class="content-wrapper auth p-0 theme-two">
        <div class="row d-flex align-items-stretch">
          <div class="col-md-4 banner-section d-none d-md-flex align-items-stretch justify-content-center">
            <div class="slide-content bg-1">
                <img style="height:200px; margin-top:190px;" src="/storage/images/logo.png">
            </div>
          </div>
          <div class="col-12 col-md-8 h-100 bg-white">
            <div class="auto-form-wrapper d-flex align-items-center justify-content-center flex-column">
              <div class="nav-get-started">
                <p>Don't have an account?</p>
                <a class="btn get-started-btn" href="./register-2.html">GET STARTED</a>
              </div>
              
                {!! Form::open( ['action' => 'LoginController@CheckUser', 'method' => 'POST','enctype' => 'multipart/form-data'] ) !!}
                    <h3 class="mr-auto">Hello! let's get started</h3>
                    <p class="mb-5 mr-auto">Enter your details below.</p>
                    <div class="form-group">
                        <h6>{!! Form::label('email', 'E-mail')!!}</h6>
                        {!! Form::email('email',' ', ['class' => 'form-control', 'placeholder'=>'Enter the body'] )!!}
                        @if(($errors)->has('email'))  <p style="color:#c25858;">{{$errors->first('email')}}</p> @endif
                    </div>
                    <div class="form-group">
                        <h6>{!! Form::label('password', 'Password')!!}</h6>
                        {!! Form::password('password', ['class' => 'form-control'] )!!}
                        @if(($errors)->has('password'))  <p style="color:#c25858;">{{$errors->first('password')}}</p> @endif
                        @if(session('succes')) <p style="color:#c25858;"> {{session('succes')}}</p>@endif
                    </div> 
                        @if(session('msg')) <div class="alert alert-danger">{{session('msg')}} </div> @endif
                    {!! Form::hidden('_method','POST') !!}
                    {!! Form::submit('Submit', array('class'=>'btn btn-primary submit-btn')) !!}
                    <div class="wrapper mt-5 text-gray">
                        <p class="footer-text">Copyright © 2018 Urbanui. All rights reserved.</p>
                        <ul class="auth-footer text-gray">
                            <li><a href="#">Terms & Conditions</a></li>
                            <li><a href="#">Cookie Policy</a></li>
                        </ul>
                    </div>
                {!! Form::close() !!}
            </div>
          </div>
        </div>
      </div>
      <!-- content-wrapper ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
