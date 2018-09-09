@extends('Cockpit.Layout.MainLayout')

@section('content')
<div class="main-panel"> 
<div class="content-wrapper">
    <div class="container">
         <div class="col-lg-12">
        <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Notifications </h4>
                    <div class="table-responsive">
                        <table class="table table-hover ">
                            <thead>
                                <tr>
                                    <th>Meeting Name</th>
                                    <th>Time</th>
                                    <th>Date</th>
                                    <th>Venue</th>
                                    <th>Creator</th>
                                    <th>Meeting Details</th>
                                </tr>
                            </thead>
                                <tbody>
                                   @foreach($data as $d)
                                        @if($d->meeting->dep_id==Auth::user()->dep_id || $d->meeting->dep_id==0)
                                            <tr>
                                            <td>{{$d->name}}</td>
                                            <td>{{$d->meeting->time}}</td>
                                            <td>{{$d->meeting->date}}</td>
                                            <td>{{$d->meeting->venue}}</td>
                                            <td style="color:#4680ff;">{{$d->creator}}</td>
                                            <td>{{$d->meeting->details}}</td>
                                            </tr>
                                         @endif   
                                    @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
     </div>
    </div> 
</div>
</div>     
@endsection