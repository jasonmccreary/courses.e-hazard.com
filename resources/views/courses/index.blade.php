@extends('app')

@section('content')
    {!! link_to_route('courses.create', 'New Course', null, ['class' => 'btn btn-default']) !!}

    <h1 class="page-header">Courses</h1>

    <div class="table-responsive">
        <table class="table table-striped">
            <thead>
            <tr>
                <th width="70%">Name</th>
                <th>&nbsp;</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($courses as $course)
                <tr>
                    <td>{{ $course->name }}</td>
                    <td align="right">
                        {!! Form::open(['method' => 'DELETE', 'route' => ['courses.destroy', $course->id]]) !!}
                        {!! link_to_route('courses.classes.index', 'View', [$course->id], ['class' => 'btn btn-default']) !!}
                        {!! link_to_route('courses.edit', 'Edit', [$course->id], ['class' => 'btn btn-default']) !!}
                        {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
                        {!! Form::close() !!}
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>

    {!! $courses->render() !!}
@stop