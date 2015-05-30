<?php namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Schedule;
use Carbon\Carbon;

class RemovePastSchedules extends Command
{

    /**
     * The console command name.
     *
     * @var string
     */
    protected $name = 'remove-past-schedules';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Removes schedules that have already began';

    /**
     * Execute the command.
     *
     * @return void
     */
    public function handle()
    {
        Schedule::where('start', '<=', Carbon::today()->toDateString())->delete();
    }
}
