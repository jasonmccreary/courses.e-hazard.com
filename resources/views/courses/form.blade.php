<div class="form-group">
    {!! Form::label('program_id', 'Program') !!}
    {!! Form::select('program_id', $programs, null, ['class' => 'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::submit($submit_button, ['class' => 'btn btn-primary form-control']) !!}
</div>
