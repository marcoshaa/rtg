<?= $this->extend('default') ?>

	<?= $this->section('content')?>

    <section class="ftco-section" style="padding: 1em; margin-bottom:120px;">
        <div class="container">    
            <hr/>
            <div class="row justify-content-center">
                <div class="col-md-12 heading-section ftco-animate">
                    <h4 class="mb-4 title-page text-center" id="title-page">Redefinição de senha</h4>
                    <div class="row">
                        <div class="col-md-8" style="padding-left: 60px;">
                            <h5>ALTERAÇÃO DE SENHA</h5>

                            <form id="form-lostpassword" accept-charset="UTF-8" role="form" action="<?=$action;?>" method="post"> 
                                <input type="hidden" id="lead_id" name="lead_id" value="<?=$lead_id;?>"/>      
                                <div id="msg"></div>
                                <fieldset>
                                    <div class="form-group">
                                        <input class="form-control" placeholder="E-mail" name="email" type="text">
                                    </div>
                                    <input class="btn btn-primary float-right" type="button" id="btn-lostpassword" value="Continuar">
                                </fieldset>
                            </form>
                        </div>    
                    </div>    
                </div>
            </div>     
        </div>   		
    </section>

    <script src="<?=$scripts_url?>/identification.js"></script>
<?= $this->endsection()?>