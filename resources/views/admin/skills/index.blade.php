@extends('layouts.app')

@section('content')
    <div class='col-md-12 text-center'>
        <h1>Skills</h1>
    </div>

    <div class='col-md-12 text-center mb-2'>
        <a href='{{route('admin.skills.create')}}' alt='New' title='New' class='btn btn-primary'>
            <i class="fa fa-plus-circle fa-lg" aria-hidden="true"></i>&nbsp;
            New Skill
        </a>
    </div>

    <div class='col-12'>
        @include('layouts._errors')
    </div>

    <table class="table table-striped table-bordered table-hover">
        <thead class="thead">
            <tr>
                <th width="120px"></th>
                <th width="100px">ID</th>
                <th>Nome</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($skills as $skill)
            <tr>
                <td>
                    {!! Form::open(['route' => ['admin.skills.destroy', $skill->id], 'method' => 'delete', 'style' => 'display: inline']) !!}
                        {!! Form::button('<i class="fas fa-trash-alt"></i>', ['type' => 'submit', 'class' => 'btn btn-danger', 'title' => 'Delete', 'id' => 'delete_'.$skill->id]) !!}
                    {!! Form::close() !!}

                    <a href='skills/{{$skill->id}}/edit' class='btn btn-primary' title='Edit'>
                        <i class="fas fa-pencil-alt"></i>
                    </a>
                </td>
                <td>{{$skill->id}}</td>
                <td>{{$skill->name}}</td>
            </tr>
            @empty
            <tr>
                <td colspan='3' class='text-center'>
                    No Skill
                </td>
            </tr>
            @endforelse
        </tbody>
    </table>

    <div class='col-md-12 text-center'>
        {{$skills->render()}}
    </div>
@endsection
