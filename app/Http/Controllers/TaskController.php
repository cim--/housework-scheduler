<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Task;
use App\Tasktype;
use App\Scheduler;
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

    public function construct()
    {
        $schedules = Scheduler::all();
        return view('construct', [
            'schedules' => $schedules
        ]);
    }

    public function create(Request $request)
    {
        $tasktype = new Tasktype;
        $tasktype->name = $request->input('taskname');
        $tasktype->schedule = $request->input('frequency');
        $tasktype->scheduler_id = $request->input('schedule');
        $tasktype->visibility = $request->input('visibility');
        $tasktype->save();

        $first = new Task;
        $first->date = new Carbon($request->input('date'));
        $first->tasktype_id = $tasktype->id;
        $first->save();
        return redirect()->route('dashboard');
    }
}
