@extends('app')

@section('content')
    {!! link_to_route('courses.create', 'New Course', null, ['class' => 'btn btn-default']) !!}

    <h1 class="page-header">Courses</h1>

    <div class="table-responsive">
        <table class="table table-striped">
            <thead>
            <tr>
                <th width="80%">Name</th>
                <th width="20%">Actions</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($courses as $course)
                <tr>
                    <td width="80%">{{ $course->name }}</td>
                    <td width="20%">
                        {!! Form::open(['method' => 'DELETE', 'route' => ['courses.destroy', $course->id]]) !!}
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