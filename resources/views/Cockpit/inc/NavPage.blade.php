  <nav class="navbar horizontal-layout col-lg-12 col-12 p-0">
      <div class="container d-flex flex-row">
        <div class="text-center navbar-brand-wrapper d-flex align-items-top">
          <a class="navbar-brand brand-logo" href="/"><img style="height:60px;" src="storage/images/logo.png" alt="logo" /></a>
          <a class="navbar-brand brand-logo-mini" href="/"><img src="images/logo.png" alt="logo" /></a>
        </div>
        <div class="navbar-menu-wrapper d-flex align-items-center">
          <form class="search-field" action="#" />
            <div class="form-group mb-0">
              <div class="input-group">
                <div class="input-group-prepend">
                  <span class="input-group-text"><i class="mdi mdi-magnify"></i></span>
                </div>
                <input type="text" class="form-control" />
              </div>
            </div>
          </form>
          <ul class="navbar-nav navbar-nav-right ml-auto">
            <li class="nav-item dropdown">
              <a class="nav-link count-indicator dropdown-toggle" id="notificationDropdown" href="#" data-toggle="dropdown">
                <i class="mdi mdi-bell-outline"></i>
                <span class="count bg-primary notify"></span>
              </a>
              <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list" aria-labelledby="notificationDropdown">
              <div class="read">
          
              </div>  
                <div class="noti">
                
                </div>
                <div class="dropdown-divider"></div>
                    <a href="/ShowNotificationAll" class="dropdown-item preview-item">
                      <div class="preview-item-content">
                        <h6 class="preview-subject font-weight-normal text-dark mb-1">Check All Notification ></h6>
                      </div>
                    </a>
            </li>
            <li class="nav-item dropdown d-none d-xl-inline-block">
              <a class="nav-link dropdown-toggle" id="UserDropdown" href="#" data-toggle="dropdown" aria-expanded="false">
                <span class="mr-3">{{Auth::user()->name}}</span><img class="img-xs rounded-circle" src="storage/cover_image/{{Auth::user()->cover_image}}" alt="Profile image" />
              </a>
              <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="UserDropdown">
                <a class="dropdown-item p-0">
                  <div class="d-flex border-bottom">
                    <div class="py-3 px-4 d-flex align-items-center justify-content-center"><i class="mdi mdi-bookmark-plus-outline mr-0 text-gray"></i></div>
                    <div class="py-3 px-4 d-flex align-items-center justify-content-center border-left border-right"><i class="mdi mdi-account-outline mr-0 text-gray"></i></div>
                    <div class="py-3 px-4 d-flex align-items-center justify-content-center"><i class="mdi mdi-alarm-check mr-0 text-gray"></i></div>
                  </div>
                </a>
                <a class="dropdown-item mt-2">
                  Manage Accounts
                </a>
                <a class="dropdown-item" data-toggle="modal" data-target="#exampleModal">
                  Change Password
                </a>
                <a class="dropdown-item">
                  Check Inbox
                </a>
                <a href="/logout" class="dropdown-item">
                  Sign Out
                </a>
              </div>
            </li>
          </ul>
          <button class="navbar-toggler align-self-center" type="button" data-toggle="minimize">
            <span class="mdi mdi-menu"></span>
          </button>
        </div>
        <div class="nav-bottom">
          <ul class="nav page-navigation">
            <li class="nav-item active">
              <a href="/" class="nav-link"><i class="link-icon mdi mdi-television"></i><span class="menu-title">DASHBOARD</span></a>
            </li>
            <li class="nav-item ">
              <a href="/Grievances" class="nav-link"><i class="link-icon mdi mdi-apple-safari"></i><span class="menu-title">GRIEVANCES</span></a>
              
            </li>
            <li class="nav-item mega-menu">
              <a href="#" class="nav-link"><i class="link-icon mdi mdi-atom"></i><span class="menu-title">MEMBERS</span></a>
              <div class="submenu">
                <div class="col-group-wrapper row">
                  <div class="col-group col-md-4">
                    <div class="row">
                      <div class="col-12">
                        <p class="category-heading">TEAM</p>
                      </div>
                      <div class="col-md-6">
                        <ul class="submenu-item">
                          <li><a href="/ShowAll">All</a></li>
                          <li><a href="/ShowCatMember?id=1">Technology</a></li>
                          <li><a href="/ShowCatMember?id=2">R&D</a></li>
                          <li><a href="/ShowCatMember?id=3">PCR</a></li>
                          <li><a href="/ShowCatMember?id=5">OPERATION</a></li>
                        </ul>
                      </div>
                    </div>
                  </div>
                  @if(Auth::user()->role_id==1)
                      <div class="col-group col-md-4">
                        <div class="row">
                          <div class="col-12">
                            <p class="category-heading">ADMIN</p>
                          </div>
                          <div class="col-md-6">
                            <ul class="submenu-item">
                              <li><a href="/AdminCreateUser">Create User</a></li>
                            </ul>
                          </div>
                        </div>
                      </div>
                  @endif
                </div>
              </div>
            </li>
            <li class="nav-item mega-menu">
              <a href="#" class="nav-link"><i class="link-icon mdi mdi-flag-outline"></i><span class="menu-title">TASK</span></a>
              <div class="submenu">
                <div class="col-group-wrapper row">
                  <div class="col-group col-md-3">
                    <p class="category-heading">Meeting</p>
                    <ul class="submenu-item">
                      <li><a href="/ShowMemberMeeting">Meetings</a></li>
                      <li><a href="./pages/samples/login-2.html">Events And Details</a></li>
                      <li><a href="/task">Task</a></li>
                      <li><a href="./pages/samples/register-2.html">Discussion Forum</a></li>
                      <li><a href="./pages/samples/lock-screen.html">Lockscreen</a></li>
                    </ul>
                  </div>
                  @if(Auth::user()->role_id!=3 )
                  <div class="col-group col-md-3">
                    <p class="category-heading">Admin</p>
                    <ul class="submenu-item">
                        <li><a href="/AdminCreateMeeting">Create Meeting</a></li>
                        <li><a href="/ShowTaskPage">Create Task</a></li>
                        @if(Auth::user()->role_id==1)
                            <li><a href="/ShowMeeting">Show All Meetings</a></li>
                        @endif     
                    </ul>
                  </div>
                  @endif   
                </div>
              </div>
            </li>
            <li class="nav-item mega-menu">
              <a href="#" class="nav-link"><i class="link-icon mdi mdi-android-studio"></i><span class="menu-title">GRIEVANCES</span></a>
              <!-- <div class="submenu">
                <div class="col-group-wrapper row">
                  <div class="col-group col-md-3">
                    <p class="category-heading">Basic Elements</p>
                    <ul class="submenu-item">
                      <li><a href="./pages/forms/basic_elements.html">Basic Elements</a></li>
                      <li><a href="./pages/forms/advanced_elements.html">Advanced Elements</a></li>
                      <li><a href="./pages/forms/validation.html">Validation</a></li>
                      <li><a href="./pages/forms/wizard.html">Wizard</a></li>
                      <li><a href="./pages/forms/text_editor.html">Text Editor</a></li>
                      <li><a href="./pages/forms/code_editor.html">Code Editor</a></li>
                    </ul>
                  </div>
                  <div class="col-group col-md-3">
                    <p class="category-heading">Charts</p>
                    <ul class="submenu-item">
                      <li><a href="./pages/charts/chartjs.html">Chart Js</a></li>
                      <li><a href="./pages/charts/morris.html">Morris</a></li>
                      <li><a href="./pages/charts/flot-chart.html">Flaot</a></li>
                      <li><a href="./pages/charts/google-charts.html">Google Chart</a></li>
                      <li><a href="./pages/charts/sparkline.html">Sparkline</a></li>
                      <li><a href="./pages/charts/c3.html">C3 Chart</a></li>
                      <li><a href="./pages/charts/chartist.html">Chartist</a></li>
                      <li><a href="./pages/charts/justGage.html">JustGage</a></li>
                    </ul>
                  </div>
                  <div class="col-group col-md-3">
                    <p class="category-heading">Maps</p>
                    <ul class="submenu-item">
                      <li><a href="./pages/maps/mapeal.html">Mapeal</a></li>
                      <li><a href="./pages/maps/vector-map.html">Vector Map</a></li>
                      <li><a href="./pages/maps/google-maps.html">Google Map</a></li>
                    </ul>
                  </div>
                </div>
              </div> -->
            </li>
            <li class="nav-item">
              <a href="#" class="nav-link"><i class="link-icon mdi mdi-asterisk"></i><span class="menu-title">TOOLS</span></a>
              <div class="submenu">
                <ul class="submenu-item">
                  <li><a href="javascript:;" data-toggle="modal" data-target="#changePassModals">Email</a></li>
                  <li><a href="/ShowCalendar">Calendar</a></li>
                  <li><a href="/ShowProfile?id={{Auth::user()->_id}}">Profile</a></li>
                  <li><a href="./pages/apps/gallery.html">Gallery</a></li>
                </ul>
              </div> 
            </li>
          </ul>
        </div>
      </div>
    </nav>

<!-- Change Password Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Change Password</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
            {!! Form::open( ['action' => 'MemberController@ChangePassword', 'method' => 'POST','enctype' => 'multipart/form-data'] ) !!}
                 <div class="form-group">
                    {!! Form::label('password', 'New Password')!!}
                    {!! Form::password('password', ['class' => 'form-control input-rounded'] )!!}
                    @if(($errors)->has('password'))  <p>{{$errors->first('password')}}</p> @endif
                  </div>
                  <div class="form-group">
                    {!! Form::label('cpassword', 'Confirm Password')!!}
                    {!! Form::password('cpassword', ['class' => 'form-control input-rounded'] )!!}
                    @if(($errors)->has('cpassword'))  <p>{{$errors->first('password')}}</p> @endif
                  </div>  
                  {!! Form::hidden('_method','POST') !!}
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                  <button class="btn btn-outline-success" onclick="showSwal('success-message')">Click here!</button>                         
            {!! Form::close() !!}
      </div>
      
    </div>
  </div>
</div>       
<!-- End Of Change Password Modal -->   




<div class="modal fade" id="changePassModals" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Change Password</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
              <div class="radio">
    {!! Form::open( ['action' => 'MailController@genre', 'method' => 'POST','enctype' => 'multipart/form-data'] ) !!}
    <label><input type="radio" name="optradio" style="cursor: pointer;" value="Public" id="rad"> &nbspPublic</label>
</div>
<div class="radio">
  <label><input type="radio" name="optradio" style="cursor: pointer;" value="Private" id="rad"> &nbspPrivate</label>
</div>
<div class="radio">
  <label><input type="radio" name="optradio" style="cursor: pointer;" value="Mass" id="rad"> &nbspMass Mailing</label>
</div>
                  {!! Form::hidden('_method','POST') !!}
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                  <button class="btn btn-outline-success" >Proceed</button>                         
            {!! Form::close() !!}                      
        
      </div>
      
    </div>
  </div>
</div>       


@section('script1')
  
<script>
    $(document).ready(function(){
     var check=0;
    fetch_notify_data();

    function fetch_notify_data(query = '')
    {
       
        $.ajax({
            url:"{{ route('Member.NotifiMeeting') }}",
            method:'GET',
            data:{query:query},
            dataType:'json',
            success:function(data)
            {
                console.log(data);
                if(data.hasOwnProperty("card_data")){
                        $(".noti").html(data.card_data);
                        $(".notify").html(data.card_count); 
                       // console.log(data.card_data);
                        if(check==0)
                        {
                            $(".read").append(' <a href="/markallread" class="dropdown-item py-3 read"><span>Mark All Read</span></a>');
                            check=1;
                        }
                    }
                    else
                    {
                        $(".notify").html(data.card_count); 
                         $(".read").append("suman");
                        $(".noti").html(data.no_data);
                    }
            }
        })
    }

    setInterval(fetch_notify_data, 5000);
});
</script>

@endsection
    