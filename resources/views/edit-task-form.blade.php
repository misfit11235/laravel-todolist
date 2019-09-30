@extends('layouts.app')
@section('content')
<div class='container'>
        <span class='h1'>Edit task:</span>
        <form action='{{route("add-task")}}' method='post' class='py-5'>
            @csrf
            <div class='py-3'>
                <label for="title" class='h3'>Title</label>
                <input type="text" class="form-control" id="title" name='title'>
            </div>
            <div class='py-3'>
                <label for="description" class='h3'>Description</label>
                <textarea class="form-control" id="description" name='description' rows="5" cols='10'></textarea>
            </div>
            <div class='py-3'>
                <label for="assignee" class='h3'>Assignee</label>
                <select class="form-control" id="assignee" name='assignee'>
                    <option selected>None</option>
                    @foreach($users as $user)
                        <option>{{$user->email}}</option>
                    @endforeach
                </select>
            </div>
            <button type="submit" class="btn btn-lg btn-success py-3 my-3">
                <span class='h3'>Submit edited task</span>
            </button>
        </form>
    </div>
@endsection