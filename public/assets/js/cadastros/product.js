$(document).ready(function() {

    //$("#credit_line").maskMoney({showSymbol:true, symbol:"", decimal:",", thousands:"."});
    //$("#commission_default").maskMoney({showSymbol:true, symbol:"", decimal:",", thousands:"."});

});    

$('#btn-salvar').on('click', function() {
    $.ajax({
      url: $('#btn-salvar').data('action'),
      dataType: 'json',
      data: $('#form-product').serialize(),
      type: 'post'
    })
    .always(function (data) {
    })
    .fail(function (data) {
    })
    .done(function (data) {
      
      if (data.status=1){
        swal("Seus dados foram enviados com sucesso!", data.mensagem, "success");
      } else {
        swal("Erro ao salvar os dados", data.mensagem, "error");
      }
      
    });
    return false;  
});

$('#btn-insurance').on('click', function() {
  //var id = $('#id').val();
  
  //$('#product_id').val(id);
  //$('#msg_error').empty().empty();

  // Recuperando dados das configurações do cliente
  /*
  $.get( $('#getinsurance').val() + id, function( data ) {
      retorno = JSON.parse(data);
      $('#lista_insurance').empty().html(retorno.tabela).show();
  });    
  */

  alert('clicou');

  //var modal = $('#modal-insurance');
  //modal.find('.modal-header #label_cliente').html(cliente);
  //$('#modal-insurance').modal('show');
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




