@extends('layouts.app')

@section('content')

    <div class='col-md-8 offset-md-2'>
        <h1 class='text-center mb-4'>Edit Candidate: {{$candidate->name}} - ID: {{$candidate->id}}</h1>

        <div class='col-12'>
            @include('layouts._errors')
        </div>

        <ul class="nav nav-tabs">
            <li class="nav-item">
                <a class="nav-link active" data-toggle="tab" href="#personal-info" id='personalInfoTab'>
                    Informações pessoais
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-toggle="tab" href="#bankInformation" id='bankTab'>
                    Informações Bancárias
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-toggle="tab" href="#knowledge" id='knowledgeTab'>
                    Conhecimento
                </a>
            </li>
        </ul>

        {!! Form::model($candidate, ['route' => ['admin.candidates.update', $candidate->id], 'method' => 'put']) !!}
            <div class="tab-content py-3 container">
                <div class="tab-pane active" id="personal-info">
                    @include('crud.personal-info')
                </div>
                <div class="tab-pane" id="bankInformation">
                    @include('crud.bank')
                </div>
                <div class="tab-pane" id="knowledge">
                    @include('crud.knowledge')
                </div>
            </div>
        {!! Form::close() !!}
    </div>


    <script>
        @php
            $availability = explode('; ', $candidate->availability);
            $best_time = explode('; ', $candidate->best_time);
        @endphp
        @foreach ($availability as $av)
            $("input[value='{{$av}}']").prop('checked', true);
        @endforeach
        @foreach ($best_time as $time)
            $("input[value='{{$time}}']").prop('checked', true);
        @endforeach

        $('#bank_information').val('{{$candidate->bankInformation->bank_information}}');
        $('#owner').val('{{$candidate->bankInformation->owner}}');
        $('#cpf').val('{{$candidate->bankInformation->cpf}}');
        $('#bank').val('{{$candidate->bankInformation->bank}}');
        $('#agency').val('{{$candidate->bankInformation->agency}}');
        $('#account').val('{{$candidate->bankInformation->account}}');
        $("input[value='{{$candidate->bankInformation->account_type}}']").prop('checked', true);

        @foreach ($candidate->skills as $candidateSkills)
            @if(isset($candidateSkills->skill_id))
                $("input[name='knowledge[{{$candidateSkills->skill_id}}]']").each(function(){
                    if($(this).val() == {{$candidateSkills->rate}})
                        $(this).prop('checked', true);
                });
            @elseif(isset($candidateSkills->other))
                $('#other').val('{{$candidateSkills->other}}');
            @endif
        @endforeach
    </script>
@endsection