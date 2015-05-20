<?php namespace App\Helpers;

use Carbon\Carbon;

class DateHelper
{
    /**
     * @param Carbon $start
     * @param Carbon $end
     */
    public static function displayRange(Carbon $start, Carbon $end)
    {
        if ($start->eq($end)) {
            return $end->format('F j, Y');
        }

        if ($start->year != $end->year) {
            return $start->format('F j, Y') . ' - ' . $end->format('F j, Y');
        }

        if ($start->month != $end->month) {
            return $start->format('F j') . ' - ' . $end->format('F j, Y');
        }

        return $start->format('F j') . ' - ' . $end->format('j, Y');
    }
}
