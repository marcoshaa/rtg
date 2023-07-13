// Salvando as informações
$('#btn-cadsatro').on('click',function() {

    $('#form-cadastro').submit();
      
});

$('#btn-login').on('click',function() {

    $.ajax({
        url: $('#form-login').attr('action'),
        data: $('#form-login').serialize(),
        dataType: 'json',
        type: 'post'
    })
    .always(function (data) {
    })
    .fail(function (data) {
        msg = '<div class="alert alert-warning alert-dismissible" role="alert">';
        msg += '<i class="fa fa-exclamation-triangle" aria-hidden="true"></i>'+data.mensagem;
        msg += '</div>';
        $('#msg').empty().html(msg).show();
    })
    .done(function (data) {

        if (data.status == 1) {
            window.location.href = data.redirect;
        } else {
            msg = '<div class="alert alert-warning alert-dismissible" role="alert">';
            msg += '<i class="fa fa-exclamation-triangle" aria-hidden="true"></i>'+data.mensagem;
            msg += '</div>';
            $('#msg').empty().html(msg).show();
        }	 
        
    });
    return false;


});

$('#btn-lostpassword').on('click',function() {

    $.ajax({
        url: $('#form-lostpassword').attr('action'),
        data: $('#form-lostpassword').serialize(),
        dataType: 'json',
        type: 'post'
    })
    .always(function (data) {
    })
    .fail(function (data) {
        msg = '<div class="alert alert-warning alert-dismissible" role="alert">';
        msg += '<i class="fa fa-exclamation-triangle" aria-hidden="true"></i>'+data.mensagem;
        msg += '</div>';
        $('#msg').empty().html(msg).show();
    })
    .done(function (data) {

        if (data.status == 1) {
            msg = '<div class="alert alert-success alert-dismissible" role="alert">';
            msg += '<i class="far fa-check-circle"></i> '+data.mensagem;
            msg += '</div>';
            $('#msg').empty().html(msg).show();
        } else {
            msg = '<div class="alert alert-warning alert-dismissible" role="alert">';
            msg += '<i class="fa fa-exclamation-triangle" aria-hidden="true"></i>'+data.mensagem;
            msg += '</div>';
            $('#msg').empty().html(msg).show();
        }	 
        
    });
    return false;


});

