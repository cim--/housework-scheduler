<?php

namespace App\Http\Controllers;

use App\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $active = Task::where('complete', false)->with('tasktype')->orderBy('date')->get();
        return view('dashboard', [
            'active' => $active
        ]);
    }

    
    public function complete(Task $task)
    {
        $task->complete = true;
        $task->save();
        $rescheduled = $task->reschedule();
        return redirect()->route('dashboard');
    }

}
