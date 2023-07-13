$(document).ready(function() {

    $("#credit_line").maskMoney({showSymbol:true, symbol:"", decimal:",", thousands:"."});
    $("#commission_default").maskMoney({showSymbol:true, symbol:"", decimal:",", thousands:"."});

});    


$('.btn-ativar').on('click', function() {
    var id = $(this).data('id');
    var cliente = $(this).data('name');

    $('#id_customer_status').val(id);

    // Recuperando dados das configurações do cliente
    $.get( $('#getcustomerstatus').val() + id, function( data ) {
        retorno = JSON.parse(data);
        $('#status').val(retorno.status_customer);
    });    

    var modal = $('#confirmacao');
    modal.find('.modal-header #label_cliente').html(cliente);
    $('#confirmacao').modal('show');
});

$('.btn-editar').on('click', function() {
    var id = $(this).data('id');
    var cliente = $(this).data('name');
    var status = $(this).data('status');

    $('#customer_id').val(id);
    $('#msg_error').empty().empty();

    // Recuperando dados das configurações do cliente
    $.get( $('#getcustomerconfig').val() + id, function( data ) {
        retorno = JSON.parse(data);
        $('#lista-valores').empty().html(retorno.tabela).show();
    });    

    $('#status').val(status);

    var modal = $('#credito');
    modal.find('.modal-header #label_cliente').html(cliente);
    $('#credito').modal('show');
});

$('#btn-alterar-status').on('click', function() {

    let dados = {id: $('#id_customer_status').val(),status: $('#status').val()};   

    $.ajax({
      url: $('#setstatus').val(),
      dataType: 'json',
      data: dados,
      type: 'post'
    })
    .always(function (data) {
    })
    .fail(function (data) {
    })
    .done(function (data) {
      
      if (data.status=1){

      }
      
    });
    return false;  

});

$('#btn-confirmar-operacao').on('click', function() {

    $.ajax({
        url: $('#setconfig').val(),
        dataType: 'json',
        data: $('#form-customer-config').serialize(),
        type: 'post'
      })
      .always(function (data) {
      })
      .fail(function (data) {
      })
      .done(function (data) {
        
        if (data.status==1){
          $('#lista-valores').empty().html(data.tabela).show();
          $('#tarifas').modal('show');	
          limpavalores();
        } else {

          $msg = '';
          $.each(data.mensagem, function(key, value) {
            $msg += '<div class="alert alert-danger" role="alert">';
            $msg += value;
            $msg += '</div>';
            $('#msg_error').empty().html($msg).show();
          });

        }
        
      });
      return false;  

});

$('#lista-valores').on('click', '.btn-excluir-valor', function() {

  // Salvando valores no contrato
  $.ajax({
    url: $(this).data('action'),
    dataType: 'json',
    type: 'post'
  })
  .always(function (data) {
  })
  .fail(function (data) {
  })
  .done(function (data) {
    
    if (data.status==1){
      $('#lista-valores').empty().html(data.tabela).show();	
    } else {
      $msg = '';
      $.each(data.mensagem, function(key, value) {
        $msg += '<div class="alert alert-danger" role="alert">';
        $msg += value;
        $msg += '</div>';
        $('#msg_error').empty().html($msg).show();
      });
    }
    
  });
  return false;  

});

$('#lista-valores').on('click', '.btn-editar-valor', function() {

  $('#id').val($(this).data('id'));
  $('#credit_line').val($(this).data('creditline'));
  $('#commission_default').val($(this).data('commission'));
  $('#valid_initial').val($(this).data('validinitial'));

});

function limpavalores() {
  $('#id').val('');
  $('#credit_line').val('');
  $('#commission_default').val('');
  $('#valid_initial').val('');
}			




