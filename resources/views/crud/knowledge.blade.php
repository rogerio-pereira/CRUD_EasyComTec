<h2>Conhecimento / Knowledge</h2>

<div class='col-12 my-3'>
    <p class='alert-info text-info rounded p-3'>
        Avalie-se de 0 a 5 quanto aos conhecimentos especificados abaixo, e tudo bem se não souber de muitas coisas, o importante é que seja sincero!<br/>
        Rate yourself from 0 to 5 for the knowledge specified below, and that's okay if you do not know many things, the important thing is to be honest!
    </p>
</div>

<div class='row'>
    <div class="col-md-12 form-group">
        @foreach($skills as $skill)
            <h3 class='mt-5'>{!! Form::label('other', $skill->name) !!}</h3>

            <div class='form-check form-check-inline'>
                {!! Form::radio('knowledge['.$skill->id.']', '0', false, ['class' => 'form-check-input', 'id' => $skill->name.'_0']) !!} 
                {!! Form::label($skill->name.'_0', ' 0') !!}
            </div>

            <div class='form-check form-check-inline'>
                {!! Form::radio('knowledge['.$skill->id.']', '1', false, ['class' => 'form-check-input', 'id' => $skill->name.'_1']) !!} 
                {!! Form::label($skill->name.'_1', '1') !!}
            </div>

            <div class='form-check form-check-inline'>
                {!! Form::radio('knowledge['.$skill->id.']', '2', false, ['class' => 'form-check-input', 'id' => $skill->name.'_2']) !!} 
                {!! Form::label($skill->name.'_2', '2') !!}
            </div>

            <div class='form-check form-check-inline'>
                {!! Form::radio('knowledge['.$skill->id.']', '3', false, ['class' => 'form-check-input', 'id' => $skill->name.'_3']) !!} 
                {!! Form::label($skill->name.'_3', '3') !!}
            </div>

            <div class='form-check form-check-inline'>
                {!! Form::radio('knowledge['.$skill->id.']', '4', false, ['class' => 'form-check-input', 'id' => $skill->name.'_4']) !!} 
                {!! Form::label($skill->name.'_4', '4') !!}
            </div>
            
            <div class='form-check form-check-inline'>
                {!! Form::radio('knowledge['.$skill->id.']', '5', false, ['class' => 'form-check-input', 'id' => $skill->name.'_5']) !!} 
                {!! Form::label($skill->name.'_5', '5') !!}
            </div>
        @endforeach
    </div>


    <div class="col-md-12 form-group my-2">
        {!! Form::label('other', 'Conhece mais alguma linguagem ou framework que não foi listado aqui em cima? Conte para nos e se auto avalie ainda de 0 a 5. / Do you know any other language or framework that was not listed above? Tell us and evaluate yourself from 0 to 5') !!}
        {!! Form::text('knowledge[other]', null, ['class' => 'form-control']) !!}
        @if ($errors->has('other'))
            <div class="text-danger">{{ $errors->first('other') }}</span>
        @endif
    </div>

    <div class="col-md-12 form-group">
        {!! Form::label('crud', 'Link CRUD') !!}
        {!! Form::text('crud', null, ['class' => 'form-control']) !!}
        @if ($errors->has('crud'))
            <div class="text-danger">{{ $errors->first('crud') }}</span>
        @endif
    </div>
</div>

<div class='row my-2'>
    <div class='col-md-6'>
        {!! Form::button('VOLTAR', ['class' => 'btn btn-default', 'id' => 'btnKnowledgeBack']) !!}
        {!! Form::submit('ENVIAR', ['class' => 'btn btn-primary']) !!}
    </div>

    <div class='col-md-6 text-right'>
        <div class="progress">
            <div class="progress-bar bg-info" role="progressbar" style="width: 99%" aria-valuenow="99" aria-valuemin="0" aria-valuemax="100"></div>
        </div>

        Pagina 3/3
    </div>
</div>

@section('scripts')
    {!! Html::script('/js/common/jquery.maskedinput.min.js') !!}
    {!! Html::script('/js/common/jquery.price_format.min.js') !!}
    {!! Html::script('/js/common/jsMascaras.min.js') !!}
@endsection