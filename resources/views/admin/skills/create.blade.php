@extends('layouts.app')

@section('content')
    <div class='col-md-12 text-center'>
        <h1>New Skill</h1>
    </div>

    {!! Form::open(['route' => 'admin.skills.store']) !!}
        @include('admin.skills._form')
    {!! Form::close() !!}
@endsection
