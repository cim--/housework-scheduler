<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(SchedulerSeeder::class);
        $this->call(TasktypeSeeder::class);
        $this->call(TaskSeeder::class);
    }
}
