@extends('app')

@section('content')

    <h1 class="page-header">Create Class</h1>

    @include('partials.errors.list')

    {!! Form::open(['method' => 'POST', 'route' => 'classes.store']) !!}
        @include('schedules.form', ['submit_button' => 'Create Class'])
    {!! Form::close() !!}

@stop

