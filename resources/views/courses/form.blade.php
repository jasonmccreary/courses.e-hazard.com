<div class="form-group">
    {!! Form::label('name') !!}
    {!! Form::text('name', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::submit($submit_button, ['class' => 'btn btn-primary form-control']) !!}
</div>
