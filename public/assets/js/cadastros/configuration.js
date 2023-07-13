$(document).ready(function() {

    $("#commission_nest").maskMoney({showSymbol:true, symbol:"", decimal:",", thousands:"."});

});   

$('#btn-voltar').on('click', function() {
    window.location.href = $(this).data('action');
});

$('#btn-salvar').on('click', function() {

    $.ajax({
        url: $(this).data('action'),
        dataType: 'json',
        data: $('#form-configuration').serialize(),
        type: 'post'
      })
      .always(function (data) {
      })
      .fail(function (data) {
      })
      .done(function (data) {
        
        if (data.status==1){
            swal("Seus dados foram enviados com sucesso!", data.mensagem, "success");
        } else {
            swal("Erro ao processa os dados", data.mensagem, "error");
        }
        
      });
      return false;  

});