<?= $this->extend('default') ?>

	<?= $this->section('content')?>

    <link rel="stylesheet" href="<?=$template_url?>/css/progress.css">
    <link rel="stylesheet" href="<?=$vendor?>/jquery-fancyfileuploader-master/fancy-file-uploader/fancy_fileupload.css">
    <script src="<?=$vendor?>/jquery-fancyfileuploader-master/fancy-file-uploader/jquery.ui.widget.js"></script> 
    <script src="<?=$vendor?>/jquery-fancyfileuploader-master/fancy-file-uploader/jquery.fileupload.js"></script>
    <script src="<?=$vendor?>/jquery-fancyfileuploader-master/fancy-file-uploader/jquery.iframe-transport.js"></script>
    <script src="<?=$vendor?>/jquery-fancyfileuploader-master/fancy-file-uploader/jquery.fancy-fileupload.js"></script>
    
    <style>
        .error{
             color:red
        }

		.select2-result-repository{padding-top:4px;padding-bottom:3px}
		.select2-result-repository__meta{margin-left:5px}
		.select2-result-repository__title{color:black;font-weight:700;word-wrap:break-word;line-height:1.1;margin-bottom:4px}
		.select2-result-repository__cnpj{display:inline-block;color:#000;font-size:12px}
		.cnpj-code{font-weight:bold}
		.select2-result-repository__fantasia{font-size:11px;color:#777;margin-left:10px}
		.select2-results__option--highlighted .select2-result-repository__title{color:white}
		.select2-results__option--highlighted .select2-result-repository__fantasia,
		.select2-results__option--highlighted .select2-result-repository__cnpj{color:#c6dcef}

    </style>

    <section class="ftco-section" style="padding: 1em;">

        <div class="container">
        <hr/>
        <h4 class="mb-2 text-center title-page" id="title-page">CONFIRMAÇÃO DE DADOS DOS VIAJANTES</h4>

        <!-- Breadcrumb -->
        <div class="container">
            <ul class="progressbar">
                <li id="li-plano" class="active">Escolha o Plano</li>
                <li id="li-opcionais" class="active">Opcionais</li>
                <li id="li-viajantes" class="active">Viajantes</li>
                <li id="li-confirmacao">Confirmação</li>
                <li id="li-pagamento">Pagamento</li>
                <li id="li-concluido">Concluído</li>
            </ul>    
        </div>    

            <div class="row justify-content-center" style="padding-top: 20px; padding-bottom: 20px;">
                <div class="col-md-12 heading-section ftco-animate">
                    
                    <div class="container">
                        
                        <?php if ($paxs > 9) { ?>
                            <div class="alert alert-warning" role="alert">
                                <div class="row align-middle">
                                    <div class="col-md-1">
                                        <i class="fas fa-info-circle fa-4x"></i>
                                    </div>    
                                    <div class="col-md-11 align-middle">
                                        <span class="">
                                            Reservas com mais de 9 passageiros são consideradas reservas de grupo. Você pode informar a lista de passageiros importando dados via arquivo em formato excel. 
                                            <div>
                                                Deseja importar os dados via <a id="btn-excel" href="javascript:void(0)"><i class="fas fa-file-excel" style="color: green;"></i> Excel clique aqui ?</a>
                                            </div> 
                                        </span>    
                                    </div>    
                                </div>
                            </div>
                        <?php } ?>  

                        <form id="form-viajantes-excel" role="form" action="<?=$action_upload;?>" method="post" enctype="multipart/form-data">  
                            <input type="hidden" id="destiny_id" value="<?=$request['destiny_id'];?>"/>   
                            <input type="hidden" id="id" name="id" value="<?=$request['id'];?>"/>  
                            <input type="hidden" id="confirm" value="<?=$action_confirma_upload;?>"/>

                            <h4 class="mb-4" id="title-page">Download do modelo em Excel</h4>
                            <div class="row" style="margin-bottom: 20px;">
                                <div class="col-md-12">
                                    <a href="<?=$downloadmodelo;?>"><i class="fas fa-download"></i> Clique aqui para baixar o modelo do arquivo</a>
                                </div>    
                            </div>    

                            <h4 class="mb-4" id="title-page">Upload do arquivo preenchido</h4>
                            <div class="row">
                                <div class="col-md-12">
                                    <input id="upload-file" type="file" name="file" accept=".xls, .xlsx" />  
                                </div>    
                            </div> 
                            <div class="row">
                                <div class="col-md-12">
                                    <div id="mensagem_erro"></div>
                                </div>    
                            </div>    

                            <div class="col-md-12" style="margin-top: 20px;">
                                <input class="btn btn-primary float-right" type="button" id="btn-continuar" value="Continuar">
                            </div>    

                        </form>

                        <form id="form-viajantes" accept-charset="UTF-8" role="form" action="<?=$action;?>" method="post">                        
                            
                            <fieldset>                            
                                <input type="hidden" id="destiny_id" value="<?=$request['destiny_id'];?>"/>   
                                <input type="hidden" id="id" name="id" value="<?=$request['id'];?>"/>   

                                <?php foreach($requestpax as $pax) { ?>
                                <div>
                                    <?php if ($pax['sequence']=='001') {?>
                                        <h4 class="mb-4" id="title-page">Passageiro Responsável</h4>
                                    <?php } else { ?>
                                        <h4 class="mb-4" id="title-page"><?=intval($pax['sequence']).'º Passageiro';?></h4>
                                    <?php } ?>    
                                    
                                        <div class="row">
                                            <div class='col-md-4'>
                                                <div class="form-group">
                                                    <label for="firstname" class="control-label">Primeiro nome</label>
                                                    <input class="form-control" placeholder="Primeiro nome" id="firstname" name="firstname[<?=$pax['id'];?>]" type="text" value="<?=$pax['firstname'];?>" required>
                                                </div>    
                                            </div>
                                            <div class='col-md-4'>
                                                <div class="form-group">
                                                    <label for="lastname" class="control-label">Último nome</label>
                                                    <input class="form-control" placeholder="Último nome" id="lastname" name="lastname[<?=$pax['id'];?>]" type="text" value="<?=$pax['lastname'];?>" required>
                                                </div>    
                                            </div>
                                            <div class='col-md-2'>
                                                <div class="form-group">
                                                    <label for="document" class="control-label">CPF</label>
                                                    <input class="form-control document" placeholder="CPF" id="document" name="document[<?=$pax['id'];?>]" type="text" value="<?=$pax['document'];?>" style="font-size:14px;">
                                                </div>    
                                            </div>
                                            <div class='col-md-2'>
                                                <div class="form-group">
                                                    <label for="child" class="control-label">Menor sem CPF</label>
                                                    <input class="form-control" id="child" name="child[<?=$pax['id'];?>]" type="checkbox" value="">
                                                </div>    
                                            </div>
                                        </div>   
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="birth_date" class="control-label">Dt. de Nascimento</label>
                                                    <input class="form-control birth_date" placeholder="Dt. Nascimento" id="birth_date" name="birth_date[<?=$pax['id'];?>]" type="text" autocomplete="off" value="<?=($pax['birth_date']!=null ? date("d/m/Y",strtotime($pax['birth_date'])) : '');?>">
                                                </div>    
                                            </div>    
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="genre" class="control-label">Sexo</label>
                                                    <div>
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="radio" name="genre[<?=$pax['id'];?>]" id="genre" value="M" <?=($pax['genre']=='M' ? 'checked' : '');?> required>
                                                        <label class="form-check-label" for="inlineRadio1">Masculino</label>
                                                    </div>    
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="radio" name="genre[<?=$pax['id'];?>]" id="genre" value="F" <?=($pax['genre']=='F' ? 'checked' : '');?> required>
                                                        <label class="form-check-label" for="inlineRadio1">Feminino</label>
                                                    </div>   
                                                </div>     
                                                </div>    
                                            </div> 
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="ppe" class="control-label" id="label_ppe">Pessoa politicamente exposta ?</label>
                                                    <div>
                                                        <div class="form-check form-check-inline">
                                                            <input class="form-check-input" type="radio" name="ppe[<?=$pax['id'];?>]" id="inlineRadio1" value="S" <?=($pax['ppe']=='S' ? 'checked' : '');?> required>
                                                            <label class="form-check-label" for="inlineRadio1">Sim</label>
                                                        </div>    
                                                        <div class="form-check form-check-inline">
                                                            <input class="form-check-input" type="radio" name="ppe[<?=$pax['id'];?>]" id="inlineRadio1" value="N" <?=($pax['ppe']=='N' ? 'checked' : '');?> required>
                                                            <label class="form-check-label" for="inlineRadio1">Não</label>
                                                        </div>   
                                                        <span class="d-inline-block" tabindex="0">
                                                            <i class="fas fa-question-circle fa-2x" data-toggle="tooltip" data-placement="top" title="São consideradas pessoas politicamente expostas os agentes públicos, que desempenham ou tenham desempenhado, nos cinco anos anteriores (no Brasil ou em países e dependências estrangeiras), cargos, empregos ou funções públicas relevantes. Familiares (parentes da pessoa politicamente exposta, na linha direta, até o primeiro grau, cônjuge, o companheiro, a companheira, o enteado, a enteada) e pessoas de relacionamento próximo também serão consideradas politicamente expostas. (Definição com base na circular da SUSEP 445/12)"></i>
                                                        </span>
                                                    </div>     
                                                </div>
                                            </div>           
                                        </div>   

                                        <?php if ($pax['sequence']=='001') {?>

                                            <div class="row">
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label for="email" class="control-label">E-mail</label>
                                                        <input class="form-control" placeholder="E-mail" id="email" name="email[<?=$pax['id'];?>]" type="text" value="<?=$pax['email'];?>">
                                                    </div>    
                                                </div>    
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label for="phone" class="control-label">Telefone</label>
                                                        <input class="form-control" placeholder="Telefone" id="phone" name="phone[<?=$pax['id'];?>]" type="text" value="<?=$pax['phone'];?>">
                                                    </div>    
                                                </div>  
                                            </div>     

                                            <div class="row">
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label for="zipcode" class="control-label">CEP</label>
                                                        <input class="form-control" placeholder="CEP" id="zipcode" name="zipcode[<?=$pax['id'];?>]" type="text" value="<?=$pax['zipcode'];?>" data-url="<?=$urlcidade;?>" data-url2="<?=$urlcidade2;?>" required>
                                                    </div>
                                                </div>  
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="address" class="control-label">Endereço</label>
                                                        <input class="form-control" placeholder="Endereço" id="address" name="address[<?=$pax['id'];?>]" type="text" value="<?=$pax['address'];?>" required>
                                                    </div>
                                                </div>   
                                                <div class="col-md-2">
                                                    <div class="form-group">
                                                        <label for="address_nro" class="control-label">Número</label>
                                                        <input class="form-control" placeholder="Número" id="address_nro" name="address_nro[<?=$pax['id'];?>]" type="text" value="<?=$pax['address_nro'];?>">
                                                    </div>
                                                </div>      
                                            </div>   
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label for="complement" class="control-label">Complemento</label>
                                                        <input class="form-control" placeholder="Complemento" id="complement" name="complement[<?=$pax['id'];?>]" type="text" value="<?=$pax['complement'];?>">
                                                    </div>    
                                                </div>    
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label for="district" class="control-label">Bairro</label>
                                                        <input class="form-control" placeholder="Bairro" id="district" name="district[<?=$pax['id'];?>]" type="text" value="<?=$pax['district'];?>" required>
                                                    </div>    
                                                </div>   
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label for="city_id" class="control-label">Cidade</label>
                                                        <select name="city_id[<?=$pax['id'];?>]" id="city_id" class="form-control city" data-url="<?=$urlcidade;?>" >
                                                        <?php if ($pax['city_id']!='') {?>
                                                            <option value="<?=$pax['city_id'];?>" selected><?=$pax['cidade'];?></option>
                                                        <?php } ?>	
                                                        </select>    
                                                    </div>    
                                                </div>                                                                           
                                            </div> 
                                        
                                        <?php } ?> 

                                        <hr/>       
                                </div>            
                                <?php } ?>   

                                <?php if ($paxs < 10) { ?>
                                    <h4 class="mb-4" id="title-page">Outras informações</h4>
                                    <div class="row">
                                        <div class="col-md-6" id="div_country">
                                            <div class="form-group">
                                                <label for="country_id" class="control-label">Selecione os países que irá visitar</label>
                                                <select id="country_id" name="country_id[]" multiple="multiple">
                                                    <option value="-1">Selecione o país</option>
                                                    <?php foreach ($lista_pais as $pais): ?>				                            
                                                        <option value="<?= $pais['id']; ?>"><?= $pais['name']; ?></option>
                                                    <?php endforeach; ?>
                                                </select>	
                                            </div>    
                                        </div>    
                                        <div class="col-md-6" id="div_states">
                                            <div class="form-group">
                                                <label for="state_id" class="control-label">Selecione os estados que irá visitar</label>
                                                <select id="state_id" name="state_id[]" multiple="multiple" >
                                                    <option value="-1">Selecione o Estado</option>
                                                    <?php foreach ($lista_estados as $estado): ?>				                            
                                                        <option value="<?= $estado['id']; ?>"><?= $estado['name']; ?></option>
                                                    <?php endforeach; ?>
                                                </select>	
                                            </div>    
                                        </div>    
                                    </div>    
                                    <button class="btn btn-secondary float-left" id="btn-voltar" type="button">Voltar</button>
                                    <input class="btn btn-primary float-right" type="submit" value="Continuar">
                                <?php } ?>                                                        
                            </fieldset> 
                        </form>   
                    </div>    
                </div>
            </div>     
        </div>   		
    </section>

    <script src="<?=$scripts_url?>/viajantes.js"></script>
    <script src="<?=$scripts_url?>/valida_cpf_cnpj.js"></script>
    <script src="<?=$vendor?>/masked-input/dist/jquery.maskedinput.min.js"></script>
    <script src="<?=$vendor?>/jquery-validation/jquery.validate.min.js"></script>

    <!--
    <script src="<?=$vendor?>/jquery-fancyfileuploader-master/fancy-file-uploader/jquery.ui.widget.js"></script>
    <script type="text/javascript" src="<?=$vendor?>/jquery-fancyfileuploader-master/fancy-file-uploader/jquery.fileupload.js"></script>
    <script type="text/javascript" src="<?=$vendor?>/jquery-fancyfileuploader-master/fancy-file-uploader/jquery.iframe-transport.js"></script>
    <script type="text/javascript" src="<?=$vendor?>/jquery-fancyfileuploader-master/fancy-file-uploader/jquery.fancy-fileupload.js"></script>
    -->                                                    

<?= $this->endsection()?>