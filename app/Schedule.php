<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Schedule extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['course_id', 'name', 'description', 'start', 'end', 'city'];

    public function course()
    {
        return $this->belongsTo('App\Course');
    }
}
