<?= $this->extend('default') ?>

	<?= $this->section('content')?>

    <link rel="stylesheet" href="<?=$template_url?>/css/progress.css">

    <style>
      .linha-vertical{
        position: absolute; 
        left: 50%;
        height: 100%;
        border-right: 1px solid #188acb;
      }
    </style>  

    <section class="ftco-section" style="padding: 1em; margin-bottom:120px;">
        <div class="container">          
            <hr/>
            <div class="row justify-content-center mb-3 pb-3">
                <div class="col-md-12 heading-section text-center ftco-animate">
                    <!-- <h4 class="mb-4 title-page" id="title-page">IDENTIFICAÇÃO</h4> -->

                    <div style="text-align: center; font-size: 48px; color: #188acb; font-family: PlayfairDisplay; letter-spacing: 0.2em; height: 80px; margin-bottom: 60px;">
                        LOGIN
					</div>	

                    <?php if (!empty($mensagem)) { ?>
                        <div class="alert alert-success" role="alert">
                            <div class="row">
                            <div class="col-md-1">
                                <i class="far fa-check-circle fa-4x"></i>
                            </div>    
                            <div class="col-md-11">
                                <?=$mensagem;?>
                            </div>    
                            </div>
                        </div>
                    <?php } ?>  

                    <div class="row">
                        <div class="col-md-5">
                            <form id="form-login" accept-charset="UTF-8" role="form" action="<?=$actionlogin;?>" method="post"> 
                                <input type="hidden" id="lead_id" name="lead_id" value="<?=$lead_id;?>"/>      
                                <div id="msg"></div>
                                <fieldset>
                                    <div class="form-group">
                                        <input class="form-control" placeholder="E-mail" name="email" type="text">
                                    </div>
                                    <div class="form-group">
                                        <input class="form-control" placeholder="Senha" name="password" type="password" value="">
                                    </div>
                                    <div style="margin-top: 40px;">
                                        <div class="form-group">
                                            <a href="<?= site_url('Security/lostpassword') ?>" class="float-left">Esqueci minha senha</a>
                                        </div>    
                                        <input class="btn btn-primary float-right" type="button" id="btn-login" value="Continuar">
                                    </div>    
                                </fieldset>
                            </form>
                        </div>    
                        <div class="col-md-2 text-left">
                            <div class="linha-vertical"></div>
                        </div>    
                        <div class="col-md-3" style="text-align:center;">
                            <form id="form-cadastro" accept-charset="UTF-8" role="form" action="<?=$actioncadastro;?>" method="post"> 
                                <input type="hidden" id="lead_id_cadastro" name="lead_id_cadastro" value="<?=$lead_id;?>"/>   
                                <div> 
                                    <h5 class="mb-4" id="title-page" style="letter-spacing:0.1em;">Ainda não tenho cadastro</h5>
                                    <button class="btn btn-cadsatro btn-primary">Cadastrar</button>
                                </div>    
                            </form>    
                        </div>    
                    </div>    
                </div>
            </div>     
        </div>   		
    </section>

    <script src="<?=$scripts_url?>/identification.js"></script>
<?= $this->endsection()?>