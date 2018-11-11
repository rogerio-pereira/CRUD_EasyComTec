@extends('layouts.app')

@section('content')
    <div class='col-md-12 text-center'>
        <h1>Interviews</h1>
    </div>

    <div class='col-12'>
        @include('layouts._errors')
    </div>

    <table class="table table-striped table-bordered table-hover">
        <thead class="thead">
            <tr>
                <th width="120px"></th>
                <th width="100px">ID</th>
                <th>Candidate</th>
                <th>Appointment</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($interviews as $interview)
            @php
                $date = \Carbon\Carbon::parse($interview->appointment)->format('d M Y').' at '.\Carbon\Carbon::parse($interview->appointment)->format('g:i A')
            @endphp
            <tr>
                <td>
                    {!! Form::open(['route' => ['admin.interviews.destroy', $interview->id], 'method' => 'delete', 'style' => 'display: inline']) !!}
                        {!! Form::button('<i class="fas fa-trash-alt"></i>', ['type' => 'submit', 'class' => 'btn btn-danger', 'title' => 'Delete', 'id' => 'delete_'.$interview->id]) !!}
                    {!! Form::close() !!}

                    <a href='interviews/{{$interview->id}}/edit' class='btn btn-primary' title='Edit'>
                        <i class="fas fa-pencil-alt"></i>
                    </a>
                </td>
                <td>{{$interview->id}}</td>
                <td>{{$interview->candidate->name}}</td>
                <td>{{$date}}</td>
            </tr>
            @empty
            <tr>
                <td colspan='4' class='text-center'>
                    No Interview
                </td>
            </tr>
            @endforelse
        </tbody>
    </table>

    <div class='col-md-12 text-center'>
        {{$interviews->render()}}
    </div>
@endsection
