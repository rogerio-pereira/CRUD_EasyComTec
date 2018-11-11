<div class="col-md-12 form-group">
    {!! Form::label('name', 'Name') !!}
    {!! Form::text('name', null, ['class' => 'form-control']) !!}
    @if ($errors->has('name'))
        <div class="text-danger">{{ $errors->first('name') }}</span>
    @endif
</div>

<div class='col-md-12 text-center margin-top'>
    {!! Form::button('<i class="fa fa-check" aria-hidden="true"></i> Save', ['type' => 'submit', 'class' => 'btn btn-primary', 'id' => 'submit']) !!}
</div>