<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use Carbon\Carbon;

class Task extends Model
{
    protected $dates = ['date', 'created_at', 'updated_at'];
    
    public function tasktype()
    {
        return $this->belongsTo('App\Tasktype');
    }


    public function reschedule()
    {
        switch ($this->tasktype->scheduler->code) {
        case "ONCE":
            return; // don't reschedule
        case "INTERNAL":
            $date = new Carbon();
            $interval = $this->tasktype->schedule;
            break;
        case "EXTERNAL":
            $date = $this->date;
            $interval = $this->tasktype->schedule;
            break;
        default:
            return; // unsupported type
        }

        $date = $date->copy()->addDays($interval);

        $task = new Task;
        $task->date = $date;
        $task->tasktype_id = $this->tasktype_id;
        $task->save();
        return $task;
    }
}
