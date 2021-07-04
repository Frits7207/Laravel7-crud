@extends('layouts.layout')

@section('content')

<h1 class="mt-5"> Tasks Create</h1>

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<nav class="nav">
        <ul class="nav nav-tabs">
            <li class="nav nav-item">

                <a class="nav-link active" href="{{ route('tasks.index') }}">Index</a>

            </li>
            <li class="nav nav-item">
                <a class="nav-link" href="{{ route('tasks.create') }}">Taak aanmaken</a>
            </li>
       
            
        </ul>
    </nav>

<form method="POST" action="{{ route('tasks.store')}}">
@csrf


<div class="form-group">
    <label for="task"> Task</label>
    <input type="text" name="task" class="form-control" id="task" aria-describedby="taskHelp" placeholder="Enter task" value="{{old('task') }}">
</div>`

<div class="form-group">
    <label for="begindate"> Begindate</label>
    <input type="date" name="begindate" class="form-control" id="begindate" aria-describedby="begindateHelp" placeholder="Enter Begindate" value="{{old('begindate') }}">
</div>`
<div class="form-group">
    <label for="enddate"> Enddate</label>
    <input type="date" name="enddate" class="form-control" id="enddate" aria-describedby="begindateHelp" placeholder="Enter Enddate" value="{{old('enddate') }}">
</div> 

<div class="form-group">
    <label for="project">  Project</label>
    <select name="project_id" class="form-control" id="projectId">
    @foreach($projects as $project)
    <option value="{{$project->id }}"
    @if( old( 'project_id') == $project->id)
    selected
     @endif
    >{{$project->name}}</option>
    @endforeach
    </select>

    <div class="form-group">
        <label for="activity"> Activity</label>
        <select name="activity_id" class="form-control" id="activityId">
        @foreach($activities as $activity)
        <option value="{{$activity->id }}"
        @if( old( 'activity_id') == $activity->id)
        selected
         @endif
        >{{$activity->name}}</option>
        @endforeach
        </select>
</div>

<div class="form-group">
    <label for="user"> User</label>
    <select name="user_id" class="form-control" id="userId">
    @foreach($users as $user)
    <option value="{{$user->id }}"
    @if( old( '$user_id') == $user->id)
    selected
     @endif
    >{{$user->name}}</option>
    @endforeach
    </select>
</div>



<button type="submit" class="btn btn-success">submit</button>

</form>

@endsection