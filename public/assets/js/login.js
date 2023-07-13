/**
 * @author Copy
 */

// base url
function base_url() {
    var pathparts = location.pathname.split('/');
    if (location.host == 'localhost') {
        var url = location.origin+'/'+pathparts[1].trim('/')+'/'; // http://localhost/myproject/
    }else{
        var url = location.origin; // http://stackoverflow.com
    }
    
    url = url + '/index.php/';
    
    return url;
}

// Salvando as informações
$('#btn-novomembro').on('click',function() {
	
   var $action  = base_url() + 'security/novomembro/'; 
           	
   msg = '<div style="text-align:center">';
   msg += '<span class="fa fa-refresh fa-spin fa-3x fa-fw text-primary" aria-hidden="true"></span>';
   msg += '<div class="text-success"><h2>Solicitação em andamento...</h2></div>';	       	
   msg += '</div>';
   $('#confirmacao-acao').empty().html(msg).show();
   $('#confirm-status').modal('show');		
	   	   
   $.ajax({
       url: $action,
       data: $('#form-novo-membro').serialize(),
       dataType: 'json',
       type: 'post'				   
   })
   .always(function(data){

           
   })
   .fail(function(data){
   	
       msg = '<div class="alert alert-warning alert-dismissible" role="alert">';	           
       msg += '<i class="fa fa-exclamation-triangle fa-4x" aria-hidden="true"></i> <br>Ocorreu um erro inesperado. Tente novamente mais tarde.';
       msg += '</div>';
       $('#confirmacao-acao').empty().html(msg).show();
       
   })
   .done(function(data) {
   		   	  	   	
		//atualiza registro na tela
		if ( data.status == 1 ) {			
										
			msg = '<div style="text-align:center">';					
			msg += '<span class="fa fa-check-circle fa-5x text-success" aria-hidden="true"></span>';
			msg += '<div class="text-success"><h2>'+data.mensagem+'</h2></div>';
			msg += '</div>';	
			$('#confirmacao-acao').empty().html(msg).show();
			
			/*
			var intervalo = window.setInterval(function() {
				$('#confirm-status').modal('hide');
			}, 1000);

			window.setTimeout(function() {
				clearInterval(intervalo);
			}, 1000);
			*/
						
		}
		else {
						
		 	msg = '<div class="alert alert-warning alert-dismissible" role="alert">';
           	msg += '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>';
           	msg += '<i class="fa fa-exclamation-triangle fa-4x" aria-hidden="true"></i> <br><p>'+data.mensagem+'</p>';
           	msg += '</div>';
           	$('#confirmacao-acao').empty().html(msg).show();           	
           	
		}
					
   });             
                  
   return false;
      
});   

$('#confirm-status').on('hidden.bs.modal', function () {
	$('#email').focus();
}); 
   