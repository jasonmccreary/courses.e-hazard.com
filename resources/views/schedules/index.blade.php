@extends('app')

@section('content')
    {!! link_to_route('classes.create', 'New Class', null, ['class' => 'btn btn-default']) !!}

    <h1 class="page-header">Classes</h1>

    <div class="table-responsive">
        <table class="table table-striped">
            <thead>
            <tr>
                <th width="80%">Name</th>
                <th width="20%">Actions</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($schedules as $schedule)
                <tr>
                    <td width="80%">{{ $schedule->name }}</td>
                    <td width="20%">
                        {!! Form::open(['method' => 'DELETE', 'route' => ['classes.destroy', $schedule->id]]) !!}
                        {!! link_to_route('classes.edit', 'Edit', [$schedule->id], ['class' => 'btn btn-default']) !!}
                        {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
                        {!! Form::close() !!}
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>

    {!! $schedules->render() !!}
@stop