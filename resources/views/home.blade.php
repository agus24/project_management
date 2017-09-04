@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col s12">
        <div class="page-title">Dashboard</div>
    </div>
    <div class="col s12 m12 l12">
        <div class="card">
            <div class="card-content">
                <span class="card-title"></span><br>
                <div class="row">
                    <center>
                        <h4>Welcome {{ Auth::user()->name }}</h4>
                    </center>
                </div>
                <div class="row">
                    <table class="table responsive">
                        <thead>
                            <th>No.</th>
                            <th>Task Name</th>
                            <th>Date</th>
                            <th>Details</th>
                            <th>#</th>
                        </thead>
                        <tbody>
                        @foreach($tasks as $key => $task)
                        <tr>
                            <td>{{ $key+1 }}.</td>
                            <td>{{ $task->name }}</td>
                            <td>{{ $task->start_date." - ".$task->end_date}}</td>
                            <td>{{ $task->description }}</td>
                            <td><a href="{{ url("project/".$task->project_id."/task"."/".$task->id) }}" class="waves-effect waves-light btn teal">Detail</a>
                        </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
