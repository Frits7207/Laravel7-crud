@extends('layouts.layout')

@section('content')

<h1 class="mt-5"> Tasks</h1>

<nav class="nav">
        <ul class="nav nav-tabs">
            <li class="nav nav-item">

                <a class="nav-link active" href="{{ route('tasks.index') }}">Index</a>

            </li>
            <li class="nav nav-item">
                <a class="nav-link" href="{{ route('tasks.create') }}">Product aanmaken</a>
            </li>
       
            
        </ul>
    </nav>

<table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Task</th>
      <th scope="col">Begindate</th>
      <th scope="col">Enddate</th>
      <th scope="col">Project</th>
      <th scope="col">Edit</th>
      @hasanyrole('Admin')
      <th scope="col">Delete</th>
      @endhasanyrole

    </tr>
  </thead>
  <tbody>
  @foreach( $task as $task)
    <tr>
      <th scope="row">{{$task->id}}</th>
      <td>{{$task->task}}</td>
      <td>{{$task->begindate}}</td>
      <td>{{$task->enddate}}</td>
      <td>{{$task->project->name}}</td>
      <td> <a href="{{ route('tasks.edit', ['task'=> $task->id]) }}"> Edit</a></td>
      @hasanyrole('Admin')
      <td> <a href="{{ route('tasks.delete', ['task'=> $task->id]) }}"> Delete</a></td>
      @endhasanyrole
    @endforeach
    </tr>
    </tbody>
</table>
@endsection