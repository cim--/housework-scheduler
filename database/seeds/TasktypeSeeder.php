<?php

use Illuminate\Database\Seeder;

use App\Scheduler;
use App\Tasktype;

class TasktypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $types = [
            ['INTERNAL', 7, 'Vacuum ground floor', 0],
            ['INTERNAL', 7, 'Vacuum first floor', 0],
            ['INTERNAL', 28, 'Clean oven', 0],
            ['INTERNAL', 14, 'Clean hob', 0],
            ['EXTERNAL', 14, 'Put out recycling', 1],
            ['EXTERNAL', 14, 'Put out rubbish', 1],
            ['ONCE', null, 'Let electrician in', 0]
        ];

        foreach ($types as $info) {
            $scheduler = Scheduler::where('code', $info[0])->first();
            $type = new Tasktype;
            $type->name = $info[2];
            $type->scheduler_id = $scheduler->id;
            $type->schedule = $info[1];
            $type->visibility = $info[3];
            $type->save();
        }
    }
}
