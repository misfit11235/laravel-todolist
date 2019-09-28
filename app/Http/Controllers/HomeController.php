<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $tasks = Task::all();
        $statuses = array(
            Task::STATUS_TODO => 'To do',
            Task::STATUS_IN_PROGRESS => 'In progress',
            Task::STATUS_IN_REVIEW => 'In review',
            Task::STATUS_DONE => 'To do'
        );
        return view('home', ['tasks' => $tasks, 'statuses' => $statuses]);
    }
}
