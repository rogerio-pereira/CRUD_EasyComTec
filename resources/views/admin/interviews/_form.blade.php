<div class="col-md-12 form-group">
    {!! Form::label('appointment', 'Appointment') !!}
    {!! Form::text('appointment', null, ['class' => 'form-control timestamp', 'id' => 'appointment', 'placeholder' => 'aaaa/mm/dd hh:mm', 'autofocus']) !!}
    @if ($errors->has('appointment'))
        <div class="text-danger">{{ $errors->first('appointment') }}</span>
    @endif
</div>