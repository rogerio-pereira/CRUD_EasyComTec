@extends('layouts.app')

@section('content')
    <div class='col-md-12 text-center'>
        <h1>
            Edit Interview: {{$interview->name}} - ID: {{$interview->id}}
        </h1>
    </div>

    {!! Form::model($interview, ['route' => ['admin.interviews.update', $interview->id], 'method' => 'put']) !!}
        @include('admin.interviews._form')

        <div class='col-md-12 text-center margin-top'>
            {!! Form::button('<i class="fa fa-check" aria-hidden="true"></i> Save', ['type' => 'submit', 'class' => 'btn btn-primary', 'id' => 'submit']) !!}
        </div>
    {!! Form::close() !!}
@endsection

@section('scripts')
    {!! Html::script('/js/common/jquery.maskedinput.min.js') !!}
    {!! Html::script('/js/common/jquery.price_format.min.js') !!}
    {!! Html::script('/js/common/jsMascaras.min.js') !!}
@endsection