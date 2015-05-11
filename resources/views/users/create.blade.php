@extends('app')

@section('content')

    <h1 class="page-header">Create User</h1>

    @include('partials.errors.list')

    {!! Form::open(['method' => 'POST', 'route' => 'users.store']) !!}
        @include('users.form', ['submit_button' => 'Create User'])
    {!! Form::close() !!}

@stop

