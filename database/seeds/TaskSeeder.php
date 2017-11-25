<?php

use Illuminate\Database\Seeder;

use App\Tasktype;
use App\Task;
use Carbon\Carbon;

class TaskSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tasks = [
            'Vacuum ground floor' => 'Saturday',
            'Vacuum first floor' => 'Sunday',
            'Clean hob' => 'next Saturday',
            'Clean oven' => '2 weeks Saturday',
            'Put out rubbish' => 'Wednesday',
            'Put out recycling' => '1 weeks Wednesday',
            'Let electrician in' => '15 December'
        ];

        foreach ($tasks as $type => $start) {
            $tasktype = Tasktype::where('name', $type)->first();
            $task = new Task;
            $task->tasktype_id = $tasktype->id;
            $task->date = new Carbon($start);
            $task->save();
        }
    }
}
