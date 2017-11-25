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
            ['INTERNAL', 7, 'Vacuum ground floor'],
            ['INTERNAL', 7, 'Vacuum first floor'],
            ['INTERNAL', 28, 'Clean oven'],
            ['INTERNAL', 14, 'Clean hob'],
            ['EXTERNAL', 14, 'Put out recycling'],
            ['EXTERNAL', 14, 'Put out rubbish'],
            ['ONCE', null, 'Let electrician in']
        ];

        foreach ($types as $info) {
            $scheduler = Scheduler::where('code', $info[0])->first();
            $type = new Tasktype;
            $type->name = $info[2];
            $type->scheduler_id = $scheduler->id;
            $type->schedule = $info[1];
            $type->save();
        }
    }
}
