<div class="form-group">
    {!! Form::label('course_id', 'Course') !!}
    {!! Form::select('course_id', $courses, null, ['class' => 'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::label('description') !!}
    {!! Form::textarea('description', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::label('start') !!}
    {!! Form::text('start', \Carbon\Carbon::now(), ['class' => 'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::label('end') !!}
    {!! Form::text('end', \Carbon\Carbon::now(), ['class' => 'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::label('city') !!}
    {!! Form::text('city', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::label('state_id', 'State') !!}
    {!! Form::select('state_id', $states, null, ['class' => 'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::submit($submit_button, ['class' => 'btn btn-primary form-control']) !!}
</div>