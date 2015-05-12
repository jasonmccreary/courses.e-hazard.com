@extends('app')

@section('content')

    <h1 class="page-header">Edit Course</h1>

    @include('partials.errors.list')

    {!! Form::model($course, ['method' => 'PATCH', 'route' => ['courses.update', $course->id]]) !!}
        @include('courses.form', ['submit_button' => 'Update Course'])
    {!! Form::close() !!}

@stop

