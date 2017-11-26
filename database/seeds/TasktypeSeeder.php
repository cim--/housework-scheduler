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
            ['INTERNAL', 84, 'Dust ground floor', 0],
            ['INTERNAL', 84, 'Dust first floor', 0],
            ['INTERNAL', 84, 'Clean first floor windows', 0],
            ['INTERNAL', 84, 'Clean ground floor windows', 0],
            ['INTERNAL', 7, 'Clean bathroom', 0],
            ['INTERNAL', 7, 'Clean kitchen surfaces', 0],
            ['INTERNAL', 14, 'Clean shower room', 0],
            ['INTERNAL', 56, 'Clean oven', 0],
            ['INTERNAL', 28, 'Change bedding', 0],
            ['INTERNAL', 28, 'Unclog vacuum cleaner', 0],
            ['INTERNAL', 84, 'Clean vacuum filters', 0],
            ['INTERNAL', 14, 'Clean hob', 0],
            ['EXTERNAL', 14, 'Put out recycling', 1],
            ['EXTERNAL', 14, 'Put out rubbish', 1],
            ['INTERNAL', 365, 'Review paperwork', 0],
            ['INTERNAL', 28, 'Clear first floor surfaces', 0],
            ['INTERNAL', 28, 'Clear ground floor surfaces', 0],
            ['INTERNAL', 14, 'Check cat litter supply', 0],
            ['INTERNAL', 14, 'Check toilet roll supply', 0],
            ['INTERNAL', 7, 'Test CO Alarm', 0],
            ['INTERNAL', 7, 'Test Fire Alarm', 0],
            ['INTERNAL', 7, 'Test House Alarm', 0],  
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
