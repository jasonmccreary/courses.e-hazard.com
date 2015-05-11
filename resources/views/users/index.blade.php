@extends('app')

@section('content')
    {!! link_to_route('users.create', 'New User', null, ['class' => 'btn btn-default']) !!}

    <h1 class="page-header">Users</h1>

    <div class="table-responsive">
        <table class="table table-striped">
            <thead>
            <tr>
                <th width="80%">Email</th>
                <th width="20%">Actions</th>
            </tr>
            </thead>
            <tbody>
        @foreach ($users as $user)
            <tr>
                <td width="80%">{{ $user->email }}</td>
                <td width="20%">
                    {!! Form::open(['method' => 'DELETE', 'route' => ['users.destroy', $user->id]]) !!}
                    {!! link_to_route('users.edit', 'Edit', [$user->id], ['class' => 'btn btn-default']) !!}
                    {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
            </tbody>
        </table>
    </div>
@stop