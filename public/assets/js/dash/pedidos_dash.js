$(document).ready(function() {
    BuscaDados();
});   

$('#btn-buscar').on('click', function() {
    BuscaDados();
});

function BuscaDados($op = '') {
    
    $.ajax({
        url: $('#urlgetrequest').data('url') + $op,
        dataType: 'json',
        data: {},
        type: 'post'
    })
    .always(function (data) {
    })
    .fail(function (data) {
    })
    .done(function (data) {

    //retorno = JSON.parse(data);
    console.log(data);
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