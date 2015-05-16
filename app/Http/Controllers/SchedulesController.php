<?php namespace App\Http\Controllers;

use App\Http\Requests\ScheduleFormRequest;
use App\Schedule;
use App\Course;
use App\ScheduleStatus;
use App\State;
use App\Http\Requests;

class SchedulesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index($course_id)
    {
        $course = Course::findOrFail($course_id);
        $schedules = Schedule::upcoming()->where('course_id', '=', $course_id)->paginate(10);

        return view('schedules.index', compact('course', 'schedules'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($course_id, $schedule_id)
    {
        $schedule = Schedule::findOrFail($schedule_id);

        return view('schedules.show', compact('schedule'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create($course_id)
    {
        $schedule_statuses = ScheduleStatus::lists('name', 'id');
        $states = State::orderBy('name')->lists('name', 'id');

        return view('schedules.create', compact('states', 'schedule_statuses', 'course_id'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param ScheduleFormRequest $request
     * @return Response
     */
    public function store($course_id, ScheduleFormRequest $request)
    {
        $course = new Schedule();
        $course->fill($request->all());
        $course->course_id = $course_id;
        $course->save();

        return redirect()->route('courses.classes.index', $course_id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($course_id, $schedule_id)
    {
        $schedule = Schedule::findOrFail($schedule_id);
        $schedule_statuses = ScheduleStatus::lists('name', 'id');
        $states = State::orderBy('name')->lists('name', 'id');

        return view('schedules.edit', compact('schedule', 'states', 'schedule_statuses'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update($course_id, $schedule_id, ScheduleFormRequest $request)
    {
        $schedule = Schedule::findOrFail($schedule_id);

        $schedule->update($request->all());

        return redirect()->route('courses.classes.index', $course_id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($course_id, $schedule_id)
    {
        $schedule = Schedule::findOrFail($schedule_id);

        $schedule->delete();

        return redirect()->route('course.classes.index', $course_id);
    }
}
