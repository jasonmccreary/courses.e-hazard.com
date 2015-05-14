<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Schedule extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'course_id',
        'name',
        'start',
        'end',
        'city',
        'state_id',
        'schedule_status_id',
        'url',
        'has_sponsor',
        'sponsor_name',
        'sponsor_url'
    ];

    public function course()
    {
        return $this->belongsTo('App\Course');
    }

    public function scheduleStatus()
    {
        return $this->belongsTo('App\ScheduleStatus');
    }
}
