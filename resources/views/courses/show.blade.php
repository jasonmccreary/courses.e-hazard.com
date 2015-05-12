@extends('app')

@section('content')

    <h1 class="page-header">Course</h1>

    <dl>
        <dt>Name</dt>
        <dd>{{ $course->name }}</dd>
        <dt>Description</dt>
        <dd>{{ $course->description }}</dd>
        <dt>Start</dt>
        <dd>{{ $course->start }}</dd>
        <dt>End</dt>
        <dd>{{ $course->end }}</dd>
        <dt>City</dt>
        <dd>{{ $course->state }}</dd>
        <dt>State</dt>
        <dd>{{ $course->city }}</dd>
    </dl>
@stop

