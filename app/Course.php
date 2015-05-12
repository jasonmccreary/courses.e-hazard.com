<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name'];

    public function schedules()
    {
        return $this->hasMany('App\Schedule');
    }

    public function state()
    {
        return $this->belongsTo('App\State');
    }
}
