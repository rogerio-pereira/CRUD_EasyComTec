@extends('layouts.app')

@section('content')
    <div class='col-md-12 text-center'>
        <h1>
            Edit Skill: {{$skill->name}} - ID: {{$skill->id}}
        </h1>
    </div>

    {!! Form::model($skill, ['route' => ['admin.skills.update', $skill->id], 'method' => 'put']) !!}
        @include('admin.skills._form')
    {!! Form::close() !!}
@endsection