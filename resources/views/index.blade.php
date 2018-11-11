@extends('layouts.app')

@section('content')
    <div class='col-md-8 offset-md-2'>
        <h1 class='text-center mb-4'>Faça parte da nossa equipe / Join our team</h1>

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

        {!! Form::open(['route' => 'candidates.store']) !!}
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
@endsection