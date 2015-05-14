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
    public function index()
    {
        $schedules = Schedule::all();
        return view('schedules.index', compact('schedules'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        $schedule = Schedule::findOrFail($id);

        return view('schedules.show', compact('schedule'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        $courses = Course::orderBy('name')->lists('name', 'id');
        $schedule_statuses = ScheduleStatus::lists('name', 'id');
        $states = State::orderBy('name')->lists('name', 'id');

        return view('schedules.create', compact('courses', 'states', 'schedule_statuses'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param ScheduleFormRequest $request
     * @return Response
     */
    public function store(ScheduleFormRequest $request)
    {
        Schedule::create($request->all());

        return redirect()->route('classes.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        $schedule = Schedule::findOrFail($id);
        $courses = Course::orderBy('name')->lists('name', 'id');
        $schedule_statuses = ScheduleStatus::lists('name', 'id');
        $states = State::orderBy('name')->lists('name', 'id');

        return view('schedules.edit', compact('schedule', 'courses', 'states', 'schedule_statuses'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update($id, ScheduleFormRequest $request)
    {
        $schedule = Schedule::findOrFail($id);

        $schedule->update($request->all());

        return redirect()->route('classes.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        $schedule = Schedule::findOrFail($id);

        $schedule->delete();

        return redirect()->route('classes.index');
    }
}
