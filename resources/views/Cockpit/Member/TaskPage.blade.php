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
                <br>
                    <h4 style="margin-left:50px;">Task </h4>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                    @if(count($data)<1)
                        <center>You are not alloted any task yet</center>
                    @else
                        <table class="table table-hover ">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Name</th>
                                    <th>Time</th>
                                    <th>Description</th>
                                    <th>Alotname</th>
                                   
                                </tr>
                            </thead>
                                <tbody>
                                    @foreach($data as $d) 
                                    <tr>
                                        <th scope="row">{{$count++}}</th>
                                        <td>{{$d->creator}}</td>
                                        <td>{{$d->date}}</td>
                                        <td>{{$d->description}}</td>
                                        <td>{{$d->alotname}}</td>
                                  
                                    </tr>
                                    @endforeach
                            </tbody>
                        </table>
                        @endif
                    </div>
                </div>
            </div>
        </div>
        </div> 
    </div>
</div>     
@endsection