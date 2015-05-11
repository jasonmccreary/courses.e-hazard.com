@extends('app')

@section('content')

    <h1 class="page-header">Class</h1>

    <dl>
        <dt>Name</dt>
        <dd>{{ $schedule->name }}</dd>
        <dt>Description</dt>
        <dd>{{ $schedule->description }}</dd>
        <dt>Start</dt>
        <dd>{{ $schedule->start }}</dd>
        <dt>End</dt>
        <dd>{{ $schedule->end }}</dd>
        <dt>City</dt>
        <dd>{{ $schedule->state }}</dd>
        <dt>State</dt>
        <dd>{{ $schedule->city }}</dd>
    </dl>
@stop

