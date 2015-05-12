@extends('app')

@section('content')

    <h1 class="page-header">Create Course</h1>

    @include('partials.errors.list')

    {!! Form::open(['method' => 'POST', 'route' => 'courses.store']) !!}
        @include('courses.form', ['submit_button' => 'Create Course'])
    {!! Form::close() !!}

@stop

