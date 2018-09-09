@extends('Cockpit.Layout.MainLayout')

@section('content')
  @if(Auth::user())
   <div class="container-fluid page-body-wrapper">
      <!-- partial:partials/_settings-panel.html -->
      <div class="theme-setting-wrapper">
        <div id="theme-settings" class="settings-panel">
          <i class="settings-close mdi mdi-close"></i>
          <div class="d-flex align-items-center justify-content-between border-bottom">
            <p class="settings-heading font-weight-bold border-top-0 mb-3 pl-3 pt-0 border-bottom-0 pb-0">Template Skins</p>
          </div>
          <div class="sidebar-bg-options selected" id="sidebar-dark-theme"><div class="img-ss rounded-circle bg-dark border mr-3"></div>Dark</div>
          <div class="sidebar-bg-options" id="sidebar-light-theme"><div class="img-ss rounded-circle bg-light border mr-3"></div>Light</div>
          <p class="settings-heading font-weight-bold mt-2">Header Skins</p>
          <div class="color-tiles mx-0 px-4">
            <div class="tiles primary"></div>
            <div class="tiles success"></div>
            <div class="tiles warning"></div>
            <div class="tiles danger"></div>
            <div class="tiles pink"></div>
            <div class="tiles info"></div>
            <div class="tiles dark"></div>
            <div class="tiles default"></div>
          </div>
        </div>
      </div>
      <div id="right-sidebar" class="settings-panel">
        <i class="settings-close mdi mdi-close"></i>
        <div class="d-flex align-items-center justify-content-between border-bottom">
          <p class="settings-heading font-weight-bold border-top-0 mb-3 pl-3 pt-0 border-bottom-0 pb-0">Friends</p>
        </div>
        <ul class="chat-list">
          <li class="list active">
            <div class="profile"><img src="./images/faces/face1.jpg" alt="image" /><span class="online"></span></div>
            <div class="info">
              <p>Thomas Douglas</p>
              <p>Available</p>
            </div>
            <small class="text-muted my-auto">19 min</small>
          </li>
          <li class="list">
            <div class="profile"><img src="./images/faces/face2.jpg" alt="image" /><span class="offline"></span></div>
            <div class="info">
              <div class="wrapper d-flex">
                <p>Catherine</p>
              </div>
              <p>Away</p>
            </div>
            <div class="badge badge-success badge-pill my-auto mx-2">4</div>
            <small class="text-muted my-auto">23 min</small>
          </li>
          <li class="list">
            <div class="profile"><img src="./images/faces/face3.jpg" alt="image" /><span class="online"></span></div>
            <div class="info">
              <p>Daniel Russell</p>
              <p>Available</p>
            </div>
            <small class="text-muted my-auto">14 min</small>
          </li>
          <li class="list">
            <div class="profile"><img src="./images/faces/face4.jpg" alt="image" /><span class="offline"></span></div>
            <div class="info">
              <p>James Richardson</p>
              <p>Away</p>
            </div>
            <small class="text-muted my-auto">2 min</small>
          </li>
          <li class="list">
            <div class="profile"><img src="./images/faces/face5.jpg" alt="image" /><span class="online"></span></div>
            <div class="info">
              <p>Madeline Kennedy</p>
              <p>Available</p>
            </div>
            <small class="text-muted my-auto">5 min</small>
          </li>
          <li class="list">
            <div class="profile"><img src="./images/faces/face6.jpg" alt="image" /><span class="online"></span></div>
            <div class="info">
              <p>Sarah Graves</p>
              <p>Available</p>
            </div>
            <small class="text-muted my-auto">47 min</small>
          </li>
        </ul>
      </div>
      <!-- partial -->
      <div class="main-panel">
        <div class="content-wrapper">
          <div class="row">
            <div class="col-12 grid-margin">
              <div class="card card-statistics">
                <div class="row">
                  <div class="card-col col-xl-3 col-lg-3 col-md-3 col-6">
                      <div class="card-body">
                          <div class="d-flex align-items-center justify-content-center flex-column flex-sm-row">
                            <i class="mdi mdi-checkbox-marked-circle-outline text-primary mr-0 mr-sm-4 icon-lg"></i>
                            <div class="wrapper text-center text-sm-left">
                              <p class="card-text mb-0">Days Spent</p>
                              <div class="fluid-container">
                                <h3 class="card-title mb-0">10 Days</h3>
                              </div>
                            </div>
                          </div>
                        </div>
                  </div>
                  <div class="card-col col-xl-3 col-lg-3 col-md-3 col-6">
                 
                      <div class="card-body">
                          <div class="d-flex align-items-center justify-content-center flex-column flex-sm-row">
                            <i class="mdi mdi-account-multiple-outline text-primary mr-0 mr-sm-4 icon-lg"></i>
                            <div class="wrapper text-center text-sm-left">
                              <p class="card-text mb-0">{{Auth::user()->department->dep_name}}</p>
                              <div class="fluid-container">
                                <h3 class="card-title mb-0">{{count($teamcount)}}</h3>
                              </div>
                            </div>
                          </div>
                        </div>
                  </div>
                  <div class="card-col col-xl-3 col-lg-3 col-md-3 col-6">
                    <div class="card-body">
                        <div class="d-flex align-items-center justify-content-center flex-column flex-sm-row">
                          <i class="mdi mdi-trophy-outline text-primary mr-0 mr-sm-4 icon-lg"></i>
                          <div class="wrapper text-center text-sm-left">
                            <p class="card-text mb-0">Your Rating</p>
                            <div class="fluid-container">
                              <h3 class="card-title mb-0">{{Auth::user()->rating}}</h3>
                            </div>
                          </div>
                        </div>
                      </div>
                  </div>
                  <div class="card-col col-xl-3 col-lg-3 col-md-3 col-6">
                    <div class="card-body">
                        <div class="d-flex align-items-center justify-content-center flex-column flex-sm-row">
                          <i class="mdi mdi-target text-primary mr-0 mr-sm-4 icon-lg"></i>
                          <div class="wrapper text-center text-sm-left">
                            <p class="card-text mb-0">Task Pending</p>
                            <div class="fluid-container">
                              <h3 class="card-title mb-0">10x</h3>
                            </div>
                          </div>
                        </div>
                      </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="row">
						<div class="col-md-4 grid-margin stretch-card">
							<div class="card">
								<div class="card-body">
									<h4 class="card-title">Tasks</h4>
									<!-- <div class="add-items d-flex">
										<input type="text" class="form-control todo-list-input" placeholder="What do you need to do today?" />
										<button class="add btn btn-primary font-weight-bold todo-list-add-btn">Add</button>
                  </div> -->
                  
									<div class="list-wrapper">
                    <!--if needed to show crossed task add this to every new task checked="" -->
										<ul class="d-flex flex-column-reverse todo-list todo-list-custom">
                    @if(count($tasks)>0)
                    @foreach($tasks as $task)
											<li>
												<div class="form-check form-check-flat">
													<label class="form-check-label">
														<input class="checkbox" type="checkbox" />
														{{$task->description}}
													</label>
												</div>
                      </li>
                    @endforeach
                    @else
                    <li>No task alloted</li>
                    @endif  
                      
                    </ul><br><br>
                    <div class="btn btn-block btn-primary"><a style="color: white;" href="./pages/apps/todo.html">Add New</a> </div>
									</div>
								</div>
							</div>
						</div>
            
						<div class="col-md-4 grid-margin stretch-card">
							<div class="card">
								<div class="card-body">
									<h4 class="card-title">Meetings</h4>
									<ul class="bullet-line-list">
                  @if(count($meetings)>0)
                  @foreach($meetings as $meeting)
										<li>
											<h6>{{$meeting->name}}</h6>
											<p class="mb-0">{{$meeting->details}}</p>
											<p class="text-muted">
												<i class="mdi mdi-clock"></i>
												{{$meeting->created_at->diffForHumans()}}
											</p>
										</li>
                  @endforeach
                  @endif   
									</ul>
								</div>
							</div>
            </div>
            <div class="col-md-4 grid-margin stretch-card">
                <div class="card text-center">
                  <div class="card-body">
                    <img src="storage/cover_image/{{Auth::user()->cover_image}}" class="img-lg rounded-circle mb-2" alt="profile image" />
                    <h4>{{Auth::user()->name}}</h4>
                    <p class="text-muted">{{Auth::user()->roles->role_name}}</p>
                    <p class="mt-4 card-text">
                        Lorem ipsum dolor sit amet, consectetuer adipiscing elit.
                        Aenean commodo ligula eget dolor. Lorem
                    </p>
                    <button class="btn btn-info btn-sm mt-3 mb-4">View</button>
                    <div class="border-top pt-3">
                      <div class="row">
                        <div class="col-4">
                          <h6>5896</h6>
                          <p>Post</p>
                        </div>
                        <div class="col-4">
                          <h6>1596</h6>
                          <p>Followers</p>
                        </div>
                        <div class="col-4">
                          <h6>7896</h6>
                          <p>Likes</p>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
					</div>
          
          @if(Auth::user()->role_id == 1)
            @if(count($grievances)>0)      
                  <div class="row">
                    <div class="col-12 grid-margin">
                      <div class="card">
                        <h1 style="padding: 10px;">Grievances</h1>
                        <div class="table-responsive">

                          <table class="table center-aligned-table">
                            <thead>
                              <tr class="bg-light">
                                <th class="border-bottom-0">ID</th>
                                <th class="border-bottom-0">Date</th>
                                <th class="border-bottom-0">Name</th>
                                <th class="border-bottom-0">Message</th>
                                <th class="border-bottom-0">Staus</th>
                                <!-- <th class="border-bottom-0">Amount</th>
                                <th class="border-bottom-0">Tracking Number</th> -->
                              </tr>
                            </thead>
                            <tbody>
                            @foreach($grievances as $grievance)
                              <tr>
                                <td>{{$grievance->_id}}</td>
                                <td>{{$grievance->created_at->diffForHumans()}}</td>
                                @if(Auth::user()->user_id==1)
                                <td>{{$grievance->user_name}}</td>
                                @endif
                                <td>{{$grievance->msg}}</td>
                                <td><label class="badge badge-info">Approved</label></td>
                                <!-- <td>$12,245</td>
                                <td>JPBBN435893458</td> -->
                            @endforeach    
                              </tr>
                            </tbody>
                          </table>
                        </div>
                      </div>
                    </div>
                  </div>
             @endif     
          @endif        
  
 

        </div>
   @endif     
@endsection        