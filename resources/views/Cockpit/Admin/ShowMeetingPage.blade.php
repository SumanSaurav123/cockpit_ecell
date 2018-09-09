@extends('Cockpit.Layout.MainLayout')

@section('content')
<div class="main-panel"> 
    <div class="content-wrapper">
        <div class="container">
            <?php
                $count=1; 
            ?> 
        <div class="col-lg-12">
            <div class="card">
                <div class="card-title">
                    <h4>Meetings </h4>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-hover ">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Name</th>
                                    <th>Time</th>
                                    <th>Date</th>
                                    <th>Venue</th>
                                    <th>Creator</th>
                                    <th>Details</th>
                                    <th>Created At</th>
                                    <th>Department Name</th>
                                </tr>
                            </thead>
                                <tbody>
                                    @foreach($meetings as $meeting) 
                                    <tr>
                                        <th scope="row">{{$count++}}</th>
                                        <td>{{$meeting->name}}</td>
                                        <td>{{$meeting->time}}</td>
                                        <td>{{$meeting->date}}</td>
                                        <td>{{$meeting->venue}}</td>
                                        <td class="color-primary">{{$meeting->creator}}</td>
                                        <td>{{$meeting->details}}</td>
                                        <td>{{$meeting->created_at->diffForHumans()}}</td>
                                        <td>{{$meeting->department->dep_name}}</td>
                                    </tr>
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
@endsection