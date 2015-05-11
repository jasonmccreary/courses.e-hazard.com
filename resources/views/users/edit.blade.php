@extends('app')

@section('content')

    <h1 class="page-header">Edit User</h1>

    @include('partials.errors.list')

    {!! Form::model($user, ['method' => 'PATCH', 'route' => ['users.update', $user->id]]) !!}
        @include('users.form', ['submit_button' => 'Update User'])
    {!! Form::close() !!}

@stop

