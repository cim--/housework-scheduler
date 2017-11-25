<?php

use Illuminate\Database\Seeder;

use App\Scheduler;

class SchedulerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $schedulers = [
            'ONCE' => "One-off",
            'EXTERNAL' => "External repetition",
            'INTERNAL' => "Internal repetition"
        ];
        foreach ($schedulers as $code => $desc) {
            $scheduler = new Scheduler;
            $scheduler->code = $code;
            $scheduler->description = $desc;
            $scheduler->save();
        }
    }
}
