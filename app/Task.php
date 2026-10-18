<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use Carbon\Carbon;

class Task extends Model
{
    protected $casts = [
	'date' => 'date',
	'created_at' => 'datetime',
	'updated_at' => 'datetime'
    ];
    
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
		$date = $date->copy()->addDays((int)$interval);
		break;
            case "EXTERNAL":
		$date = $this->date;
		$interval = $this->tasktype->schedule;
		$date = $date->copy()->addDays((int)$interval);
		break;
	    case "MONTHLY":
		$date = $this->date;
		$date = $date->copy()->addMonth(1);
		break;
	    case "YEARLY":
		$date = $this->date;
		$date = $date->copy()->addYear(1);
		break;
            default:
		return; // unsupported type
        }

        $task = new Task;
        $task->date = $date;
        $task->tasktype_id = $this->tasktype_id;
        $task->save();
        return $task;
    }
}
