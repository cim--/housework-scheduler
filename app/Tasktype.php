<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tasktype extends Model
{
    public function tasks()
    {
        return $this->hasMany('App\Task');
    }
    
    public function scheduler()
    {
        return $this->belongsTo('App\Scheduler');
    }
}
