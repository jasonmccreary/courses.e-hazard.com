<?php namespace App;

use Illuminate\Support\Facades\File;

class ScheduleObserver
{
    /**
     * @param Schedule $schedule
     */
    public function saved(Schedule $schedule)
    {
        $state_ids = [$schedule->state_id];

        $original_state_id = $schedule->getOriginal('state_id');
        if ($original_state_id && $original_state_id != $schedule->state_id) {
            $state_ids[] = $original_state_id;
        }

        $stale_files = ['course-schedule-' . $schedule->course_id];

        $states = State::whereIn('id', $state_ids)->get();
        foreach ($states as $state) {
            $stale_files[] = 'state-schedule-' . $state->code;
        }

        $cache_path = public_path() . '/js/cache';

        foreach($stale_files as $stale_file) {
            File::delete($cache_path . DIRECTORY_SEPARATOR . $stale_file . '.js');
        }
    }
}
