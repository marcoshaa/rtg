$(document).ready(function() {

    BuscaDados();

    $('#error').hide();
    if ($('#integrated').val()===''){
        $('#btn-integrar').show();	
        $('#btn-reserva-sot').hide();	
    } else {
        $('#btn-integrar').hide();	
        $('#btn-reserva-sot').show();	
    }    

});   

$('#btn-buscar').on('click', function() {
    BuscaDados();
});

function BuscaDados($op = ''){

    $url = $('#urlgetrequest').val() 
    if ($op !== '') {
        $url = $('#urlgetrequest').val() + '/' + $op;
    }
    
    $.ajax({
        url: $url,
        dataType: 'json',
        data: $('#form-consulta-pedidos').serialize(),
        type: 'post'
    })
    .always(function (data) {
    })
    .fail(function (data) {
    })
    .done(function (data) {

    //retorno = JSON.parse(data);
    
    if (data.status==1){
        $('#pedidos').empty().html(data.tabela).show();
    }
    
    });
    return false;

}

$('#pedidos').on('click','.btn-visualizar-pedido',function() {
    window.location.href = $(this).data('action');
});

$('#btn-voltar').on('click', function() {
    window.location.href = $(this).data('action');
});

$('#btn-integrar').on('click', function() {

    $url = $(this).data('action') + $('#request_id').val(); 

    $(this).attr('disabled',true);
    $('#icone-botao').removeClass("fas fa-cogs");
    $('#icone-botao').addClass("fas fa-circle-notch fa-spin");
    $('#texto-botao').html(' processando a integração...');

    $.ajax({
        url: $url,
        dataType: 'json',
        type: 'post'
    })
    .always(function (data) {
    })
    .fail(function (data) {
        $('#icone-botao').removeClass("fas fa-circle-notch fa-spin");
        $('#icone-botao').addClass("fas fa-cogs");
        $('#texto-botao').html(' Integração');
    })
    .done(function (data) {

    //retorno = JSON.parse(data);
    
    if (data.status==1){
        $('#integrated').val(data.reserva_sot);
        $('#btn-integrar').hide();	
        $('#text-reserva').html('Reserva SOT: ' + data.reserva_sot);
        $('#btn-reserva-sot').show();	
    } else {
        $('#error-msg').html(data.mensagem);
        $('#error').show();

        $('#btn-integrar').prop('disabled',false);
        $('#btn-integrar').attr('enabled',true);
        $('#icone-botao').removeClass("fas fa-circle-notch fa-spin");
        $('#icone-botao').addClass("fas fa-cogs");
        $('#texto-botao').html(' Integração');
    }
    
    });
    return false;
});

$('#btn-reserva-sot').on('click', function() {
    $print_file = $('#urlprintfile').val()+$('#integrated').val()+',,V,S';
    window.open($print_file, '_blank');
});