<?php

use App\User;
use Illuminate\Database\Seeder;

class ScheduleStatusTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('schedule_statuses')->insert([
            ['name' => 'Register'],
            ['name' => 'Call for Details'],
            ['name' => 'Full'],
            ['name' => 'Closed']
        ]);
    }
}
