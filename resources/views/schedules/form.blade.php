<div class="form-group">
    {!! Form::label('city') !!}
    {!! Form::text('city', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::label('state_id', 'State') !!}
    {!! Form::select('state_id', $states, null, ['class' => 'form-control']) !!}
</div>

<?php
$start = empty($schedule->start) ? null : $schedule->start->format('m/d/Y');
$end = empty($schedule->end) ? null : $schedule->end->format('m/d/Y');
?>
<div class="form-group">
    {!! Form::label('start') !!}
    {!! Form::text('start', $start, ['class' => 'form-control date-picker', 'placeholder' => 'mm/dd/yyyy']) !!}
</div>

<div class="form-group">
    {!! Form::label('end') !!}
    {!! Form::text('end', $end, ['class' => 'form-control date-picker', 'placeholder' => 'mm/dd/yyyy']) !!}
</div>

<div class="form-group">
    {!! Form::label('schedule_status_id', 'Status') !!}
    {!! Form::select('schedule_status_id', $schedule_statuses, null, ['class' => 'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::label('url', 'URL') !!}
    {!! Form::text('url', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group">
    <input name="has_sponsor" type="hidden" value="0">
    <label data-toggle="collapse" data-target="#collapseOne">{!! Form::checkbox('has_sponsor', 1) !!} Sponsored</label>
</div>

<?php
$toggle = is_null(old('has_sponsor')) ? !empty($schedule->has_sponsor) : old('has_sponsor');
?>
<div id="collapseOne" class="collapse{{ $toggle ? ' in' : '' }}">
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