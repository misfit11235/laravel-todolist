@extends('layouts.app')
@section('content')
<div class='container'>
        <span class='h1'>Edit task:</span>
        <form action='{{route("task.edit", ["taskId" => $task->id])}}' method='post' class='py-5'>
            @csrf
            <div class='py-3'>
                <label for="title" class='h3'>Title</label>
                <input type="text" class="form-control" id="title" name='title' value='{{$task->title}}'>
            </div>
            <div class='py-3'>
                <label for="description" class='h3'>Description</label>
                <textarea class="form-control" id="description" name='description' rows="5" cols='10'>{{$task->description}}</textarea>
            </div>
            <div class='py-3'>
                <label for="assignee" class='h3'>Assignee</label>
                <select class="form-control" id="assignee" name='assignee'>
                    <option selected hidden>@if($task->user_id){{\App\User::find($task->user_id)->email}} @else None @endif</option>
                    @foreach($users as $user)
                        <option>{{$user->email}}</option>
                    @endforeach
                </select>
            </div>
            <div class='py-3'>
                <label for="status" class='h3'>Status</label>
                <select class="form-control" id="status" name='status'>
                    <option selected hidden>{{App\Models\Task::STATUS[$task->status]}}</option>
                    @foreach(App\Models\Task::STATUS as $key => $status)
                        <option value='{{$key}}'>{{$status}}</option>
                    @endforeach
                </select>
            </div>
            <button type="submit" class="btn btn-lg btn-success py-3 my-3">
                <span class='h3'>Submit edited task</span>
            </button>
        </form>
    </div>
@endsection