<?= $this->extend('default') ?>

	<?= $this->section('content')?>

    <link rel="stylesheet" href="<?=$template_url?>/css/progress.css">

    <style>
        .error{
            color:red
        }
            
        label_icone {
            display: block;
            border: 1px solid #FFFFFF;
            width: 48px;
            float: left;
        }

        input[type="radio"]:checked+label {
            border-color: #ccf;
        }
        img_brand {
            max-height: 30px;
            max-width: 48px;
            padding: 5px;
        }

    </style>

    <section class="ftco-section" style="padding: 1em;">

        <!-- Breadcrumb -->
        <div class="container">

            <hr/>

            <h4 class="mb-2 text-center title-page" id="title-page">PAGAMENTO</h4>

            <ul class="progressbar">
                <li id="li-plano" class="active">Escolha o Plano</li>
                <li id="li-opcionais" class="active">Opcionais</li>
                <li id="li-viajantes" class="active">Viajantes</li>
                <li id="li-confirmacao" class="active">Confirmação</li>
                <li id="li-pagamento" class="active">Pagamento</li>
                <li id="li-concluido">Concluído</li>
            </ul>    
        </div> 

        <div class="container">
            <div class="row justify-content-center" style="padding-top: 25px;">
                <div class="col-md-12 heading-section ftco-animate">
                    <form id="form-checkout" accept-charset="UTF-8" role="form" action="<?=$action;?>" method="post"> 
                        
                        <!-- Div para exibição de mensagem caso a emissão apresente algum erro -->
                        <div id="mensagem"></div>

                        <input type="hidden" id="id" name="id" value="<?=$request['id'];?>"/> 
                        <input type="hidden" id="lista_parcelas" value='<?=$formapagamento['parcelas'];?>' /> 
                        <input type="hidden" id="voltar" value='<?=$voltar;?>' /> 

                        <fieldset>    
                            <h5 class="mb-4" id="title-page">Selecione a Forma de pagamento</h5>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <?php if ($formapagamento!=null) { ?>
                                            <?php foreach($formapagamento['tipo'] as $key=>$value) { ?> 
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" name="formapagto" id="<?=$key;?>" value="<?=$key;?>"/>
                                                    <label class="label_icone" for="<?=$key;?>"><img src="<?=$formapagamento['icone'][$key];?>" alt="" class="img_brand"><span> <?=$formapagamento['label'][$key];?></span></label>   
                                                </div>      
                                            <?php } ?>
                                        <?php } ?>  
                                    </div>
                                </div>                                      
                            </div>  
                  
                            <div id="div_dados_cartao">
                                <h5 class="mb-4" id="title-page">Informe os Dados do Cartão</h5>
                                <div class="row">            
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="titular" class="control-label">Titular *</label>
                                            <input class="form-control" id="titular" name="titular" type="text" value="">
                                        </div>    
                                    </div>  
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="numerocartao" class="control-label">Número *</label>
                                            <input class="form-control" id="numerocartao" name="numerocartao" type="text" value="">
                                        </div>    
                                    </div>                                                          
                                </div>     
                                <div class="row">          
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="validade" class="control-label">Validade *</label>
                                            <input class="form-control" id="validade" name="validade" type="text" value="">
                                        </div>    
                                    </div>  
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="codigoseguranca" class="control-label">Código de Segurança *</label>
                                            <input class="form-control" id="codigoseguranca" name="codigoseguranca" type="text" value="">
                                        </div>    
                                    </div>                                                          
                                </div>   
                            </div>       
                    
                            <h5 class="mb-4" id="title-page">Número de Parcelas</h5>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <select name="parcelas" id="parcelas" class="form-control" required>
                                        <option value="-1">Selecione a(s) parcela(s)</option>
                                        </select>    
                                    </div>       
                                </div>                                             
                            </div>    

                            <h5 class="mb-4" id="title-page">Dados Para Contato de Emergência</h5>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="emailemergency" class="control-label">E-mail para emergências *</label>
                                        <input class="form-control" placeholder="E-mail de emergência" id="emailemergency" name="emailemergency" type="email" value="" required>
                                    </div>       
                                </div>  
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="phoneemergency" class="control-label">Telefone para emergências *</label>
                                        <input class="form-control" placeholder="Telefone de emergência" id="phoneemergency" name="phoneemergency" type="text" value="" required>
                                    </div>       
                                </div>     
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="contactemergency" class="control-label">Nome do contato para emergências *</label>
                                        <input class="form-control" placeholder="Contato de emergência" id="contactemergency" name="contactemergency" type="text" value="" required>
                                    </div>       
                                </div>                                               
                            </div>    
                            <button class="btn btn-secondary float-left" id="btn-voltar" type="button">Voltar</button>                                                            
                            <button type="submit" id="btn-checkout" class="btn btn-primary float-right"><span id="icone-botao" class="" aria-hidden="true"></span><span id="texto-botao">Confirmar</span></button>
                        </fieldset>                    
                    </form>   
                </div>
            </div>     
        </div>   		
    </section>

    <script src="<?=$scripts_url?>/checkout.js"></script>
    <script src="<?=$scripts_url?>/valida_cpf_cnpj.js"></script>
    <script src="<?=$vendor?>/masked-input/dist/jquery.maskedinput.min.js"></script>
    <script src="<?=$vendor?>/jquery-validation/jquery.validate.min.js"></script>

<?= $this->endsection()?>