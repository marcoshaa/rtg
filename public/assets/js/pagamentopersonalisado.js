var amount = $('#amount').val();
//var amount = "600.00";

pagamento();


function pagamento() {

    //alert('valor ' + amount);

    $('.bankName').hide();
    $('.creditCard').hide();
    //Endereco padrão do projeto
    var endereco = jQuery('.endereco').attr("data-endereco");
    $.ajax({

        //URL completa do local do arquivo responsável em buscar o ID da sessão
        url: endereco,
        type: 'POST',
        dataType: 'json',
        success: function (retorno) {

            //ID da sessão retornada pelo PagSeguro
            PagSeguroDirectPayment.setSessionId(retorno.id);
        },
        complete: function (retorno) {
            listarMeiosPag();
        }
       
    });
    
}

function listarMeiosPag() {
    PagSeguroDirectPayment.getPaymentMethods({
        amount: $('#amount').val(),
        success: function (retorno) {
            //Recuperar as bandeiras do cartão de crédito
            //$('.meio-pag').append("<div>Cartão de Crédito</div>");
            $.each(retorno.paymentMethods.CREDIT_CARD.options, function (i, obj) {
                $('.meio-pag-cartao').append("<span class='img-band'><img src='https://stc.pagseguro.uol.com.br" + obj.images.SMALL.path + "'></span>");
            });

            //Recuperar as bandeiras do boleto
            //$('.meio-pag').append("<div>Boleto</div>");
            $('.meio-pag-boleto').append("<span class='img-band'><img src='https://stc.pagseguro.uol.com.br" + retorno.paymentMethods.BOLETO.options.BOLETO.images.SMALL.path + "'><span>");

            //Recuperar as bandeiras do débito online
            //$('.meio-pag').append("<div>Débito Online</div>");
            $.each(retorno.paymentMethods.ONLINE_DEBIT.options, function (i, obj) {
                $('.meio-pag-debito').append("<span class='img-band'><img src='https://stc.pagseguro.uol.com.br" + obj.images.SMALL.path + "'></span>");
                $('#bankName').show().append("<option value='" + obj.name + "'>" + obj.displayName + "</option>");
                $('.bankName').hide();
            });
        },
        error: function (retorno) {
            //console.log('error ' + retorno);
            // Callback para chamadas que falharam.
        },
        complete: function (retorno) {
            // Callback para todas chamadas.
            //recupTokemCartao();
        }
    });
}

//Receber os dados do formulário, usando o evento "keyup" para receber sempre que tiver alguma alteração no campo do formulário
$('#numCartao').on('keyup', function () {

    //Receber o número do cartão digitado pelo usuário
    var numCartao = $(this).val();

    //Contar quantos números o usuário digitou
    var qntNumero = numCartao.length;

    //Validar o cartão quando o usuário digitar 6 digitos do cartão
    if (qntNumero == 6) {

        //Instanciar a API do PagSeguro para validar o cartão
        PagSeguroDirectPayment.getBrand({
            cardBin: numCartao,
            success: function (retorno) {
                $('#msg').empty();

                //Enviar para o index a imagem da bandeira
                var imgBand = retorno.brand.name;
                $('.bandeira-cartao').html("<img src='https://stc.pagseguro.uol.com.br/public/img/payment-methods-flags/42x20/" + imgBand + ".png'>");
                $('#bandeiraCartao').val(imgBand);
                recupParcelas(imgBand);
            },
            error: function (retorno) {

                //Enviar para o index a mensagem de erro
                $('.bandeira-cartao').empty();
                $('#msg').html("Cartão inválido");
            }
        });
    }
});

//Recuperar a quantidade de parcelas e o valor das parcelas no PagSeguro
function recupParcelas(bandeira) {
    var noIntInstalQuantity = $('#noIntInstalQuantity').val();
    $('#qntParcelas').html('<option value="">Selecione</option>');
    PagSeguroDirectPayment.getInstallments({
        
        //Valor do produto
        amount: $('#amount').val(),

        //Quantidade de parcelas sem juro        
        maxInstallmentNoInterest: noIntInstalQuantity,

        //Tipo da bandeira
        brand: bandeira,
        success: function (retorno) {
            $.each(retorno.installments, function (ia, obja) {
                $.each(obja, function (ib, objb) {

                    //Converter o preço para o formato real com JavaScript
                    var valorParcela = objb.installmentAmount.toFixed(2).replace(".", ",");

                    //Acrecentar duas casas decimais apos o ponto
                    var valorParcelaDouble = objb.installmentAmount.toFixed(2);
                    //Apresentar quantidade de parcelas e o valor das parcelas para o usuário no campo SELECT
                    $('#qntParcelas').show().append("<option value='" + objb.quantity + "' data-parcelas='" + valorParcelaDouble + "'>" + objb.quantity + " parcelas de R$ " + valorParcela + "</option>");
                });
            });
        },
        error: function (retorno) {
            // callback para chamadas que falharam.
        },
        complete: function (retorno) {
            // Callback para todas chamadas.
        }
    });
}

//Enviar o valor parcela para o formulário
$('#qntParcelas').change(function () {
    $('#valorParcelas').val($('#qntParcelas').find(':selected').attr('data-parcelas'));
});

function tipoPagamento(paymentMethod){
    $('#formapagamento').val(paymentMethod);
    if(paymentMethod == "pagarnaentrega"){
        $('.creditCard').hide();
        $('.bankName').hide();
        $('.meio-pag-boleto').html('');
    }
    if(paymentMethod == "creditCard"){
        $('.creditCard').show();
        $('.bankName').hide();
        $('.meio-pag-boleto').html('');
    }
    if(paymentMethod == "boleto"){
        $('.creditCard').hide();
        $('.bankName').hide();

        var $msg_boleto = '<small><p>Após clicar em "Finalizar compra" você receberá o seu boleto bancário. ';
        $msg_boleto += 'É possível imprimi-lo e pagar pelo site do seu banco ou em uma casa lotérica.';
        $msg_boleto += '<br><b>Nota:</b> O pedido será confirmado apenas após a confirmação do pagamento.</small>';

        $('.meio-pag-boleto').html($msg_boleto);
    }
    if(paymentMethod == "eft"){
        $('.creditCard').hide();
        $('.bankName').show();
        $('.meio-pag-boleto').html('');
    }
}