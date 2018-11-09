jQuery(function($)
{
    $('.date').mask('99/99/9999');
    $(".cnpj").mask("99.999.999/9999-99");
    $(".zipcode").mask("99.999-999");
    $(".cpf").mask("999.999.999-99");
    $(".time").mask("99:99:99");
    $(".creditCard").mask("9999 9999 9999 9999");
    $('.money').priceFormat({
        prefix: 'R$ ',
        centsSeparator: ',',
        thousandsSeparator: '.',
    });

    $(".cpf_cnpj").mask("999.999.999-99?999");
    $(".cpf_cnpj").focusout(function() {
        var cpfCnpj, element;
        element = $(this);
        element.unmask();
        cpfCnpj = element.val().replace(/\D/g, '');

        if(cpfCnpj.length == 14) {
            element.mask("99.999.999/9999-99");
        } else {
            element.mask("999.999.999-99?999");
        }
    }).trigger('focusout');
   
    $(".phone").mask("(99) 9999-9999?9");
    $(".phone").focusout(function(){
        var phone, element;
        element = $(this);
        element.unmask();
        phone = element.val().replace(/\D/g, '');
        if(phone.length > 10) {
            element.mask("(99) 99999-999?9");
        } else {
            element.mask("(99) 9999-9999?9");
        }
    }).trigger('focusout');

    //Busca CEP(focuslost)
    $("#zipcode").blur(function() {
        //Adiciona Classe
        $(this).addClass('waitingResponse');

        if($(this).val() != '') {
            //Valor sem . e sem - (##.###-###)
            var cep = $(this).val().split(".").join("").split("-").join("");

            $.getJSON("//viacep.com.br/ws/"+ cep +"/json/?callback=?", function(dados) {
                if (!("erro" in dados)) {
                    //Atualiza os campos com os valores da consulta.
                    $("#street").val(dados.logradouro);
                    $("#neighborhood").val(dados.bairro);
                    $("#city").val(dados.localidade);
                    $("#state").val(dados.uf);

                    $('#zipcode').removeClass('waitingResponse');

                    $("#number").focus();
                }
                else {
                    //CEP pesquisado não foi encontrado.
                    alert("CEP não encontrado.");
                }
            });
        }
    });

    $('.url').blur(function() {
        url = $(this).val();

        if(
            url.substring(0, 7) != 'http://' &&
            url.substring(0, 8) != 'https://' 
        )
            $(this).val('http://'+url);
    });
});