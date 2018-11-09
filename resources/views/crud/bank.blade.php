<h2>Informações Bancárias / Bank Information</h2>

<div class='row'>
    <div class="col-md-12 form-group">
        {!! Form::label('bank[bank_information]', 'Informações Bancárias (Banco brasileiro precisa: Nome, CPF, Banco, Agencia, Conta Corrente ou Poupança) / Bank Information') !!}
        {!! Form::text('bank[bank_information]]', null, ['class' => 'form-control']) !!}
        @if ($errors->has('bank[bank_information]'))
            <div class="text-danger">{{ $errors->first('bank[bank_information]') }}</span>
        @endif
    </div>

    <div class="col-md-6 form-group">
        {!! Form::label('bank[owner]', 'Titular da Conta / Name') !!}
        {!! Form::text('bank[owner]', null, ['class' => 'form-control']) !!}
        @if ($errors->has('bank[owner]'))
            <div class="text-danger">{{ $errors->first('bank[owner]') }}</span>
        @endif
    </div>

    <div class="col-md-6 form-group">
        {!! Form::label('bank[cpf]', 'CPF / Somente para Brasileiros') !!}
        {!! Form::text('bank[cpf]', null, ['class' => 'form-control cpf']) !!}
        @if ($errors->has('bank[cpf]'))
            <div class="text-danger">{{ $errors->first('bank[cpf]') }}</span>
        @endif
    </div>

    <div class="col-md-6 form-group">
        {!! Form::label('bank[bank]', 'Banco / Bank') !!}
        {!! Form::text('bank[bank]', null, ['class' => 'form-control']) !!}
        @if ($errors->has('bank[bank]'))
            <div class="text-danger">{{ $errors->first('bank[bank]') }}</span>
        @endif
    </div>

    <div class="col-md-6 form-group">
        {!! Form::label('bank[agency]', 'Agência / Agency') !!}
        {!! Form::text('bank[agency]', null, ['class' => 'form-control']) !!}
        @if ($errors->has('bank[agency]'))
            <div class="text-danger">{{ $errors->first('bank[agency]') }}</span>
        @endif
    </div>

    <div class="col-md-6 form-group">
        {!! Form::label('bank[account]', 'Número da Conta / Account Number') !!}
        {!! Form::text('bank[account]', null, ['class' => 'form-control']) !!}
        @if ($errors->has('bank[account]'))
            <div class="text-danger">{{ $errors->first('bank[account]') }}</span>
        @endif
    </div>

    {{--Account Type--}}
    <div class="col-md-6 form-group my-4">
        {!! Form::label('ac', "Tipo de Conta / Account Type") !!}

        @if ($errors->has('bank[account_type]'))
            <div class="text-danger">{{ $errors->first('availability') }}</span>
        @endif
        
        {{--Chain--}}
        <br/>
        {!! Form::radio('bank[account_type]', 'Corrente / Chain', false, ['id' => 'chain']) !!}
        {!! Form::label('chain', 'Corrente / Chain') !!}
        &nbsp;
        {{--Savings--}}
        {!! Form::radio('bank[account_type]', 'Poupança / Savings', false, ['id' => 'savings']) !!}
        {!! Form::label('savings', 'Poupança / Savings') !!}
    </div>
</div>

<div class='row my-2'>
    <div class='col-md-6'>
        {!! Form::button('VOLTAR', ['class' => 'btn btn-default', 'id' => 'btnBankBack']) !!}
        {!! Form::button('PRÓXIMA', ['class' => 'btn btn-default', 'id' => 'btnBankNext']) !!}
    </div>

    <div class='col-md-6 text-right'>
        <div class="progress">
            <div class="progress-bar bg-info" role="progressbar" style="width: 66%" aria-valuenow="66" aria-valuemin="0" aria-valuemax="100"></div>
        </div>

        Pagina 2/3
    </div>
</div>

@section('scripts')
    {!! Html::script('/js/common/jquery.maskedinput.min.js') !!}
    {!! Html::script('/js/common/jquery.price_format.min.js') !!}
    {!! Html::script('/js/common/jsMascaras.min.js') !!}
@endsection