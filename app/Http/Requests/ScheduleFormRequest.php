<?php namespace App\Http\Requests;

class ScheduleFormRequest extends Request
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'city' => 'required',
            'state_id' => 'required|exists:states,id',
            'start' => 'required',
            'end' => 'required',
            'schedule_status_id' => 'required|exists:schedule_statuses,id',
            'url' => 'required|url',
            'sponsor' => 'boolean',
        ];
    }
}
