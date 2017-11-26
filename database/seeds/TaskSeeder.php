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
            'Unclog vacuum cleaner' => 'next Saturday',
            'Clean vacuum filters' => '10 weeks Saturday',
            'Dust first floor' => '11 weeks Saturday',
            'Dust ground floor' => '12 weeks Saturday',
            'Clean hob' => 'next Saturday',
            'Clean oven' => '2 weeks Saturday',
            'Put out rubbish' => 'Wednesday',
            'Put out recycling' => '1 weeks Wednesday',
            'Clean bathroom' => 'Saturday',
            'Clean kitchen surfaces' => 'Saturday',
            'Clean shower room' => 'Sunday',
            'Change bedding' => 'next Saturday',
            'Review paperwork' => '+1 year',
            'Clear first floor surfaces' => '3 weeks Saturday',
            'Clear ground floor surfaces' => '4 weeks Saturday',
            'Clean first floor windows' => '7 weeks Saturday',
            'Clean ground floor windows' => '9 weeks Saturday',
            'Check cat litter supply' => 'Saturday',
            'Check toilet roll supply' => '5 weeks Saturday',
            'Test CO Alarm' => 'Saturday',
            'Test Fire Alarm' => 'Saturday',
            'Test House Alarm' => 'Saturday',
            
        ];

        foreach ($tasks as $type => $start) {
            $tasktype = Tasktype::where('name', $type)->first();
            if (!$tasktype) { dd($type); }
            $task = new Task;
            $task->tasktype_id = $tasktype->id;
            $task->date = new Carbon($start);
            $task->save();
        }
    }
}
