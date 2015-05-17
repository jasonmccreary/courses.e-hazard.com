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
            'url' => 'url|required_if:schedule_status_id,1',
            'has_sponsor' => 'boolean',
            'sponsor_name' => 'required_if:has_sponsor,1'
        ];
    }

    public function messages() {
        return [
            'url.required_if' => 'URL is required when Status is Register.',
            'sponsor_name.required_if' => 'Sponsor Name is required when Sponsored is checked.'
        ];
    }
}
