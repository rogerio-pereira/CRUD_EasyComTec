<h2>Informações Pessoais / Personal Information</h2>

<div class='row'>
    <div class="col-md-6 form-group">
        {!! Form::label('name', 'Nome / Name') !!}
        {!! Form::text('name', null, ['class' => 'form-control']) !!}
        @if ($errors->has('name'))
            <div class="text-danger">{{ $errors->first('name') }}</span>
        @endif
    </div>

    <div class="col-md-6 form-group">
        {!! Form::label('email', 'E-Mail') !!}
        {!! Form::email('email', null, ['class' => 'form-control']) !!}
        @if ($errors->has('email'))
            <div class="text-danger">{{ $errors->first('email') }}</span>
        @endif
    </div>

    <div class="col-md-6 form-group">
        {!! Form::label('telephone', 'Telefone / Phone (Whatsapp)') !!}
        {!! Form::text('telephone', null, ['class' => 'form-control']) !!}
        @if ($errors->has('telephone'))
            <div class="text-danger">{{ $errors->first('telephone') }}</span>
        @endif
    </div>

    <div class="col-md-6 form-group">
        {!! Form::label('skype', 'Skype') !!}
        {!! Form::text('skype', null, ['class' => 'form-control']) !!}
        @if ($errors->has('skype'))
            <div class="text-danger">{{ $errors->first('skype') }}</span>
        @endif
    </div>

    <div class="col-md-6 form-group">
        {!! Form::label('city', 'Cidade / City') !!}
        {!! Form::text('city', null, ['class' => 'form-control']) !!}
        @if ($errors->has('city'))
            <div class="text-danger">{{ $errors->first('city') }}</span>
        @endif
    </div>

    <div class="col-md-6 form-group">
        {!! Form::label('state', 'Estado / State') !!}
        {!! Form::text('state', null, ['class' => 'form-control']) !!}
        @if ($errors->has('state'))
            <div class="text-danger">{{ $errors->first('state') }}</span>
        @endif
    </div>

    <div class="col-md-6 form-group">
        {!! Form::label('linkedin', 'Linkedin') !!}
        {!! Form::url('linkedin', null, ['class' => 'form-control']) !!}
        @if ($errors->has('linkedin'))
            <div class="text-danger">{{ $errors->first('linkedin') }}</span>
        @endif
    </div>

    <div class="col-md-6 form-group">
        {!! Form::label('portfolio', 'Portfolio') !!}
        {!! Form::url('portfolio', null, ['class' => 'form-control']) !!}
        @if ($errors->has('portfolio'))
            <div class="text-danger">{{ $errors->first('portfolio') }}</span>
        @endif
    </div>

    {{--Availability--}}
    <div class="col-md-12 form-group">
        {!! Form::label('av', 'Qual é sua disponibilidade para trabalhar hoje? / What is your willingness to work today?') !!}

        @if ($errors->has('availability'))
            <div class="text-danger">{{ $errors->first('availability') }}</span>
        @endif
        
        {{--4 hours--}}
        <br/>
        {!! Form::checkbox('availability[]', 'Até 4 horas por dia / Up to 4 hours per day', false, ['id' => 'availability_4hours']) !!}
        {!! Form::label('availability_4hours', 'Até 4 horas por dia / Up to 4 hours per day') !!}
        
        {{--4-6 hours--}}
        <br/>
        {!! Form::checkbox('availability[]', 'De 4 a 6 horas por dia / 4 to 6 hours per day', false, ['id' => 'availability_4_6hours']) !!}
        {!! Form::label('availability_4_6hours', 'De 4 a 6 horas por dia / 4 to 6 hours per day') !!}
        
        {{--6-8 hours--}}
        <br/>
        {!! Form::checkbox('availability[]', 'De 6 a 8 horas por dia / 6 to 8 hours per day', false, ['id' => 'availability_4_8hours']) !!}
        {!! Form::label('availability_4_8hours', 'De 6 a 8 horas por dia / 6 to 8 hours per day') !!}
        
        {{--6-8 hours--}}
        <br/>
        {!! Form::checkbox('availability[]', 'Acima de 8 horas por dia / Up to 8 hours per day', false, ['id' => 'availability_plus8hours']) !!}
        {!! Form::label('availability_plus8hours', 'Acima de 8 horas por dia (tem certeza?) / Up to 8 hours per day (are you sure?)') !!}
        
        {{--Weekend--}}
        <br/>
        {!! Form::checkbox('availability[]', 'Apenas finais de semana / Only weekends', false, ['id' => 'weekends']) !!}
        {!! Form::label('weekends', 'Apenas finais de semana / Only weekends') !!}
    </div>

    {{--Best Time--}}
    <div class="col-md-12 form-group my-4">
        {!! Form::label('bt', "Pra você qual é o melhor horário para trabalhar? / What's the best time to work for you?") !!}

        @if ($errors->has('best_time'))
            <div class="text-danger">{{ $errors->first('availability') }}</span>
        @endif
        
        {{--Morning--}}
        <br/>
        {!! Form::checkbox('best_time[]', 'Manhã (de 08:00 ás 12:00) / Morning (from 08:00 to 12:00)', false, ['id' => 'morning']) !!}
        {!! Form::label('morning', 'Manhã (de 08:00 ás 12:00) / Morning (from 08:00 to 12:00)') !!}
        
        {{--Afternoon--}}
        <br/>
        {!! Form::checkbox('best_time[]', 'Tarde (de 13:00 ás 18:00) / Afternoon (from 1:00 p.m. to 6:00 p.m.)', false, ['id' => 'afternoon']) !!}
        {!! Form::label('afternoon', 'Tarde (de 13:00 ás 18:00) / Afternoon (from 1:00 p.m. to 6:00 p.m.)') !!}
        
        {{--Night--}}
        <br/>
        {!! Form::checkbox('best_time[]', 'Noite (de 19:00 as 22:00) / Night (from 7:00 p.m. to 10:00 p.m.)', false, ['id' => 'night']) !!}
        {!! Form::label('night', 'Noite (de 19:00 as 22:00) / Night (from 7:00 p.m. to 10:00 p.m.)') !!}
        
        {{--Dawn--}}
        <br/>
        {!! Form::checkbox('best_time[]', 'Madrugada (de 22:00 em diante) / Dawn (from 10 p.m. onwards)', false, ['id' => 'dawn']) !!}
        {!! Form::label('dawn', 'Madrugada (de 22:00 em diante) / Dawn (from 10 p.m. onwards)') !!}
        
        {{--Business--}}
        <br/>
        {!! Form::checkbox('best_time[]', 'Comercial (de 08:00 as 18:00) / Business (from 08:00 a.m. to 06:00 p.m.)', false, ['id' => 'business']) !!}
        {!! Form::label('business', 'Comercial (de 08:00 as 18:00) / Business (from 08:00 a.m. to 06:00 p.m.)') !!}
    </div>



    <div class="col-md-12 form-group">
        {!! Form::label('salary', 'Qual sua pretensão salarial por hora? / What is your hourly salary requirements?') !!}
        {!! Form::number('salary', null, ['class' => 'form-control', 'min' => 0, 'step' => '0.01']) !!}
        @if ($errors->has('salary'))
            <div class="text-danger">{{ $errors->first('salary') }}</span>
        @endif
    </div>
</div>

<div class='row my-5'>
    <div class='col-md-6'>
        {!! Form::button('PRÓXIMA', ['class' => 'btn btn-default', 'id' => 'btnPersonalInfoNext']) !!}
    </div>

    <div class='col-md-6 text-right'>
        <div class="progress">
            <div class="progress-bar bg-info" role="progressbar" style="width: 33%" aria-valuenow="33" aria-valuemin="0" aria-valuemax="100"></div>
        </div>

        Pagina 1/3
    </div>
</div>