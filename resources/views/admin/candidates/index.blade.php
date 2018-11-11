@extends('layouts.app')

@section('content')
    <div class='col-md-12 text-center'>
        <h1>Candidates</h1>
    </div>

    <div class='col-md-12 text-center mb-2'>
        <a href='{{route('admin.candidates.create')}}' alt='New' title='New' class='btn btn-primary'>
            <i class="fa fa-plus-circle fa-lg" aria-hidden="true"></i>&nbsp;
            New Candidate
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
                <th>Name</th>
                <th>Email</th>
                <th>Phone</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($candidates as $candidate)
            <tr>
                <td>
                    {!! Form::open(['route' => ['admin.candidates.destroy', $candidate->id], 'method' => 'delete', 'style' => 'display: inline']) !!}
                        {!! Form::button('<i class="fas fa-trash-alt"></i>', ['type' => 'submit', 'class' => 'btn btn-danger', 'title' => 'Delete', 'id' => 'delete_'.$candidate->id]) !!}
                    {!! Form::close() !!}

                    <a href='candidates/{{$candidate->id}}/edit' class='btn btn-primary' title='Edit'>
                        <i class="fas fa-pencil-alt"></i>
                    </a>

                    <a href='candidates/{{$candidate->id}}' class='btn btn-success mt-2' title='Show'>
                        <i class="fas fa-search"></i>
                    </a>

                    <a href='#' class='btn btn-primary mt-2' title='Interview' id='interview_{{$candidate->id}}' data-toggle="modal" data-target="#interviewModal" data-id='{{$candidate->id}}'>
                        <i class="far fa-calendar-alt"></i>
                    </a>
                </td>
                <td>{{$candidate->id}}</td>
                <td>{{$candidate->name}}</td>
                <td>{{$candidate->email}}</td>
                <td>{{$candidate->phone}}</td>
            </tr>
            @empty
            <tr>
                <td colspan='3' class='text-center'>
                    No Candidate
                </td>
            </tr>
            @endforelse
        </tbody>
    </table>

    <div class='col-md-12 text-center'>
        {{$candidates->render()}}
    </div>

    @include('admin.interviews._modal')
@endsection

@section('scripts')
    {!! Html::script('/js/common/jquery.maskedinput.min.js') !!}
    {!! Html::script('/js/common/jquery.price_format.min.js') !!}
    {!! Html::script('/js/common/jsMascaras.min.js') !!}
@endsection