<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;
use App\User;

class TaskController extends Controller
{
    public function addTask(Request $request) {
        $task = new Task();
        $task->title = $request->input('title');
        $task->description = $request->input('description');
        if($request->input('assignee') != 'None')  $task->user_id = User::where('email', $request->input('assignee'))->first()->id;
        $task->status = $request->input('status');
        $task->save();
        return redirect()->route('home');
    }
    public function addTaskForm(){
        $users = User::all();
        return view('add-task-form', ['users' => $users]);
    }

    public function editTask(Request $request, $taskId){
        $task = Task::find($taskId);
        $task->title = $request->input('title');
        $task->description = $request->input('description');
        if($request->input('assignee') != 'None')  $task->user_id = User::where('email', $request->input('assignee'))->first()->id;
        else $task->user_id = NULL;
        if ($request->has('status')) $task->status = $request->input('status');
        $task->save();
        return redirect()->route('home');
    }
    public function editTaskForm($taskId){
        $task = Task::find($taskId);    
        $users = User::all();
        return view('edit-task-form', ['task' => $task, 'users' => $users]);
    }
    public function deleteTask($taskId){
        Task::destroy($taskId);
        return redirect()->route('home');
    }

    public function changeStatus($taskId, $status) {
        $task = Task::find($taskId);
        $task->status = $status;
        $task->save();
        return redirect()->route('home');
    }
}
