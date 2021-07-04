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

         
       
            </ul>
    </nav>

<form method="POST" action="{{ route('tasks.destroy',  ['task' => $task->id])}}">`
@method('DELETE')
@csrf


<div class="form-group">
    <label for="task"> Task</label>
    <input type="text" name="task" class="form-control" id="task" aria-describedby="taskHelp"  value="{{ $task->task }}" disabled>
</div>`

<div class="form-group">
    <label for="begindate"> Begindate</label>
    <input type="date" name="begindate" class="form-control" id="begindate" aria-describedby="begindateHelp"  value="{{$task->begindate }}" disabled>
</div>`
<div class="form-group">
    <label for="enddate"> Enddate</label>
    <input type="date" name="enddate" class="form-control" id="enddate" aria-describedby="begindateHelp"  value="{{ $task->enddate }}" disabled>
</div> 

<div class="form-group">
<label for="project_id"> Project</label>
    <input type="text" name="project_id" class="form-control" id="enddate" aria-describedby="begindateHelp"  value="{{$task->project->name}}" disabled> 
      
</div>
<div class="form-group">
<label for="activity_id"> Activity</label>
    <input type="text" name="activity_id" class="form-control" id="activity_id" aria-describedby="begindateHelp"  value="{{$task->activity->name}}" disabled>   
</div>

<div class="form-group">
<label for="user_id"> User</label>
    <input type="text" name="user_id" class="form-control" id="user_id" aria-describedby="begindateHelp"  value="{{ $task->user->name}}" disabled>   
</div>





<button type="submit" class="btn btn-success">submit</button>

</form>

@endsection