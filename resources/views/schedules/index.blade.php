@extends('app')

@section('content')
    {!! link_to_route('courses.classes.create', 'New Class', [$course->id], ['class' => 'btn btn-default']) !!}

    <h1 class="page-header">{{ $course->name }} Classes</h1>

    <div class="table-responsive">
        <table class="table table-striped">
            <thead>
            <tr>
                <th width="80%">Name</th>
                <th width="20%">&nbsp;</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($schedules as $schedule)
                <tr>
                    <td width="80%">{{ $schedule->name }}</td>
                    <td align="right">
                        {!! Form::open(['method' => 'DELETE', 'route' => ['courses.classes.destroy', $course->id, $schedule->id]]) !!}
                        {!! link_to_route('courses.classes.edit', 'Edit', [$course->id, $schedule->id], ['class' => 'btn btn-default']) !!}
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