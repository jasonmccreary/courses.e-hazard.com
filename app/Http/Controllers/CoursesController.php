<?php namespace App\Http\Controllers;

use App\Course;
use App\Http\Requests;
use Illuminate\Http\Request;

class CoursesController extends Controller
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
        $courses = Course::paginate(10);
        return view('courses.index', compact('courses'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('courses.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(Request $request)
    {
        $course = Course::create($request->all());

        return redirect()->route('courses.index')->with('flash', ['level' => 'success', 'message' => 'Added "' . $course->name . '".']);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        $course = Course::findOrFail($id);

        return view('courses.edit', compact('course'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update($id, Request $request)
    {
        $course = Course::findOrFail($id);

        $course->update($request->all());

        return redirect()->route('courses.index')->with('flash', ['level' => 'success', 'message' => 'Updated "' . $course->name . '".']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        $course = Course::findOrFail($id);

        $course->delete();

        return redirect()->route('courses.index')->with('flash', ['level' => 'success', 'message' => 'Deleted "' . $course->name . '".']);
    }
}
