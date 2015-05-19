<?php namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Schedule extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
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

    protected $dates = ['start', 'end'];

    public function setStartAttribute($value)
    {
        $this->attributes['start'] = Carbon::createFromFormat('m/d/Y', $value);
    }

    public function setEndAttribute($value)
    {
        $this->attributes['end'] = Carbon::createFromFormat('m/d/Y', $value);
    }

    public function course()
    {
        return $this->belongsTo('App\Course');
    }

    public function scheduleStatus()
    {
        return $this->belongsTo('App\ScheduleStatus');
    }

    public function state()
    {
        return $this->belongsTo('App\State');
    }

    public function scopeUpcoming($query)
    {
        // UTC inconsistency forced use of 'yesterday'
        return $query->where('end', '>=', Carbon::yesterday()->toDateString());
    }
}
