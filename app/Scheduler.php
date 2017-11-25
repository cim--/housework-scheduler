<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Scheduler extends Model
{
    public function tasktypes()
    {
        return $this->hasMany('App\Tasktype');
    }
}
