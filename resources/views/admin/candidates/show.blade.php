@extends('layouts.app')

@section('content')
    <h1 class='center'>{{$candidate->name}}</h1>
    
    <h2 class='mt-4'>Personal Info</h2>
    <strong>Email:</strong> <a href='mailto:{{$candidate->email}}'>{{$candidate->email}}</a><br/>
    <strong>Phone:</strong> <a href='tel:{{$candidate->phone}}'>{{$candidate->phone}}</a><br/>
    <strong>Skype:</strong> <a href='skype:{{$candidate->skype}}?chat'>{{$candidate->skype}}</a><br/>
    <strong>City:</strong> {{$candidate->city}}<br/>
    <strong>State:</strong> {{$candidate->state}}<br/>
    @if(isset($candidate->linkedin))
        <strong>Linkedin:</strong> <a href='{{$candidate->linkedin}}' target='_blank'>{{$candidate->linkedin}}</a><br/>
    @endif
    @if(isset($candidate->portfolio))
        <strong>Portfolio:</strong> <a href='{{$candidate->portfolio}}' target='_blank'>{{$candidate->portfolio}}</a><br/>
    @endif
    <strong>Availability:</strong>
    <ul>
        @php
        $availability =  explode('; ', $candidate->availability);

        foreach($availability as $av) {
            echo "<li>{$av}</li>";
        }
        @endphp
    </ul>
    <strong>Best Time:</strong>

    <ul>
        @php
        $best_time =  explode('; ', $candidate->best_time);

        foreach($best_time as $t) {
            echo "<li>{$t}</li>";
        }
        @endphp
    </ul>
    <strong>Salary:</strong> {{$candidate->salary}} hourly<br/>
    <strong>Crud:</strong> <a href='{{$candidate->crud}}' target='_blank'>{{$candidate->crud}}</a><br/><br/>

    <h2 class='mt-2'>Bank Info</h2>
    <strong>Bank Information:</strong> {{$candidate->bankInformation->bank_information}}<br/>
    <strong>Owner:</strong> {{$candidate->bankInformation->owner}}<br/>
    @if(isset($candidate->bankInformation->cpf))
        <strong>CPF:</strong> {{$candidate->bankInformation->cpf}}<br/>
    @endif
    <strong>Bank:</strong> {{$candidate->bankInformation->bank}}<br/>
    <strong>Agency:</strong> {{$candidate->bankInformation->agency}}<br/>
    <strong>Account:</strong> {{$candidate->bankInformation->account}}<br/>
    <strong>Account Type:</strong> {{$candidate->bankInformation->account_type}}<br/>

    <h2 class='mt-4'>Skills</h2>
    @foreach ($candidate->skills as $skill)
        @if(isset($skill->skill_id))
            <strong>{{$skill->skill->name}}</strong>: {{$skill->rate}}<br/>
        @elseif(isset($skill->other))
            {{$skill->other}}<br/>
        @endif
    @endforeach
@endsection
