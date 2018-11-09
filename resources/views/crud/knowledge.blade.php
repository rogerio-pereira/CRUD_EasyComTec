<h1>Conhecimento / Knowledge</h1>

<div class='row'>
    
</div>

<div class='row my-2'>
    <div class='col-md-6'>
        {!! Form::button('VOLTAR', ['class' => 'btn btn-default', 'id' => 'btnKnowledgeBack']) !!}
        {!! Form::button('ENVIAR', ['class' => 'btn btn-primary']) !!}
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