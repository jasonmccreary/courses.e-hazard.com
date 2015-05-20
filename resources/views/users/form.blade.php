<div class="form-group">
    {!! Form::label('email') !!}
    {!! Form::email('email', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::label('password') !!}
    {!! Form::password('password', ['class' => 'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::label('password_confirmation', 'Confirm Password') !!}
    {!! Form::password('password_confirmation', ['class' => 'form-control']) !!}
</div>

@if (Auth::user()->is_admin)
<div class="form-group">
    <input name="is_admin" type="hidden" value="0">
    <label>{!! Form::checkbox('is_admin', 1) !!} Administrator</label>
</div>
@endif

<div class="form-group">
    {!! Form::submit($submit_button, ['class' => 'btn btn-primary form-control']) !!}
</div>