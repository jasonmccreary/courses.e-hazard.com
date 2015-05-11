@extends('app')

@section('content')

    <h1 class="page-header">Edit Class</h1>

    @include('partials.errors.list')

    {!! Form::model($schedule, ['method' => 'PATCH', 'route' => ['classes.update', $schedule->id]]) !!}
        @include('schedules.form', ['submit_button' => 'Update Class'])
    {!! Form::close() !!}

@stop

