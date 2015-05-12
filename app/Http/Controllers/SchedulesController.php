<?php namespace App\Http\Controllers;

use App\Schedule;
use App\Course;
use App\Http\Requests;
use App\State;
use Illuminate\Http\Request;

class SchedulesController extends Controller {

    public function __construct() {
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
        $states = State::orderBy('name')->lists('name', 'id');

        return view('schedules.create', compact('courses', 'states'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(Request $request)
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
        $states = State::orderBy('name')->lists('name', 'id');

        return view('schedules.edit', compact('schedule', 'courses', 'states'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update($id, Request $request)
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
