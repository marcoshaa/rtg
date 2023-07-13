<?= $this->extend('default') ?>

	<?= $this->section('content')?>

    <link rel="stylesheet" href="<?=$template_url?>/css/progress.css">

    <style>
       .error{
             color:red
       }
    </style>

    <section class="ftco-section" style="padding: 1em; margin-bottom:120px;">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-12 heading-section ftco-animate">
                    <hr/>
                    <!-- <h4 class="mb-4 text-center" id="title-page">CONTATO</h4> -->

                    <div style="text-align: center; font-size: 48px; color: #188acb; font-family: PlayfairDisplay; letter-spacing: 0.2em; height: 80px;">
                        CONTATO
					</div>	

                    <form id="form-contact" accept-charset="UTF-8" role="form" action="<?=site_url("/contact/sendcontact/");?>" method="post">         
                        <input type="hidden" id="actioncontact" value="<?=$actioncontact;?>" />
                        <input type="hidden" id="voltar" value="<?=$voltar;?>" />
                        <fieldset>
                            <h5 class="mb-2" id="title-page" style="letter-spacing:0.1em;">Fale conosco</h5>
                            <span>Olá! Preencha o formulário e retornaremos seu e-mail!!</span>
                            <div id="msg"></div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="name" class="control-label">Nome *</label>
                                        <input class="form-control" placeholder="Digite seu nome" id="name" name="name" type="text" value="" required>
                                    </div>    
                                </div>      
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="email" class="control-label">E-mail *</label>
                                        <input class="form-control" placeholder="Digite seu e-mail" id="email" name="email" type="email" value="" required>
                                    </div>    
                                </div>           
                            </div>  
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="phone" class="control-label">Telefone Celular *</label>
                                        <input class="form-control" placeholder="Digite seu telefone" id="phone" name="phone" type="text" value="" required>
                                    </div>    
                                </div> 
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="code" class="control-label">CPF/CNPJ</label>
                                        <input class="form-control" placeholder="Digite seu CPF ou CNPJ" id="code" name="code" type="text" value="">
                                    </div>    
                                </div>                 
                            </div>  
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="message" class="control-label">Mensagem</label>
                                        <textarea class="form-control" placeholder="Digite sua mensagem" id="message" name="message" rows="3" required></textarea>
                                    </div>    
                                </div>           
                            </div>  
                            <div class="float-left">
                            <input class="btn btn-secondary float-right" type="button" id="btn-voltar" value="Voltar">
                            </div>
                            <button type="button" id="btn-enviar" class="btn btn-primary float-right"><span id="icone-botao" class="" aria-hidden="true"></span><span id="texto-botao">Enviar mensagem</span></button>
                        </fieldset>
                    </form>   
                </div>
            </div>     
        </div>   		
    </section>

    <script src="<?=$scripts_url?>/contact.js"></script>
    <script src="<?=$scripts_url?>/valida_cpf_cnpj.js"></script>
    <script src="<?=$vendor?>/masked-input/dist/jquery.maskedinput.min.js"></script>
    <script src="<?=$vendor?>/jquery-validation/jquery.validate.min.js"></script>
<?= $this->endsection()?>