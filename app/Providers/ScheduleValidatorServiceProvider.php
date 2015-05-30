<?php namespace App\Providers;

use App\Services\ScheduleValidator;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\ServiceProvider;

class ScheduleValidatorServiceProvider extends ServiceProvider
{

    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        Validator::resolver(function ($translator, $data, $rules, $messages) {
        
            return new ScheduleValidator($translator, $data, $rules, $messages);
        });
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
