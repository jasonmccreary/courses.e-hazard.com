<?php namespace App\Services;

use Illuminate\Support\Facades\Input;
use Illuminate\Validation\Validator;

class ScheduleValidator extends Validator
{
    public function validateOnOrAfter($attribute, $value, $parameters)
    {
        $date = Input::get($parameters[0]);

        return strtotime($value) >= strtotime($date);
    }

    public function replaceOnOrAfter($message, $attribute, $rule, $parameters)
    {
        return 'End must be on or after Start.';
    }
}
