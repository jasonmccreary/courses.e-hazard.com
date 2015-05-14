<div class="form-group">
    {!! Form::label('course_id', 'Course') !!}
    {!! Form::select('course_id', $courses, null, ['class' => 'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::label('schedule_status_id', 'Status') !!}
    {!! Form::select('schedule_status_id', $schedule_statuses, null, ['class' => 'form-control']) !!}
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
    {!! Form::label('url') !!}
    {!! Form::text('url', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::hidden('has_sponsor', 0); !!}
    <label data-toggle="collapse" data-target="#collapseOne">{!! Form::checkbox('has_sponsor', 1) !!} Sponsored</label>
</div>

<div id="collapseOne" class="collapse{{ empty($schedule->has_sponsor) ? '' : ' in' }}">
    <div class="form-group">
        {!! Form::label('sponsor_name') !!}
        {!! Form::text('sponsor_name', null, ['class' => 'form-control']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('sponsor_url') !!}
        {!! Form::text('sponsor_url', null, ['class' => 'form-control']) !!}
    </div>
</div>

<div class="form-group">
    {!! Form::submit($submit_button, ['class' => 'btn btn-primary form-control']) !!}
</div>