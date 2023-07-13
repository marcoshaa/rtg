<?= $this->extend('default') ?>

	<?= $this->section('content')?>

    <link rel="stylesheet" href="<?=$template_url?>/css/progress.css">

    <style>
       .error{
             color:red
       }
       .numero_apolice {
           font-size: 18px;
       }
    </style>

    <section class="ftco-section" style="padding: 1em;">

        <!-- Breadcrumb -->
        <div class="container">

            <hr/>

            <h4 class="mb-4 text-center title-page" id="title-page">CONCLUÍDO</h4>
            <ul class="progressbar">
                <li id="li-plano" class="active">Escolha o Plano</li>
                <li id="li-opcionais" class="active">Opcionais</li>
                <li id="li-viajantes" class="active">Viajantes</li>
                <li id="li-confirmacao" class="active">Confirmação</li>
                <li id="li-pagamento" class="active">Pagamento</li>
                <li id="li-concluido" class="active">Concluído</li>
            </ul>    
        </div> 

        <div class="container">
            <div class="row justify-content-center" style="padding-top: 20px;">
                <div class="col-md-12 heading-section ftco-animate">
                       
                    <form id="form-confirmacao" accept-charset="UTF-8" role="form" action="" method="post"> 
                        <input type="hidden" id="id" name="id" value="<?=$request['id'];?>"/>   
                        <input type="hidden" id="urlretornar" value="<?=$urlretornar;?>" />
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

                        <h5 class="mb-4" id="title-page">Meu pedido</h5>
                        <div class="row">
                            <div class="col-md-4">
                                <label for="request_number" class="control-label">Número do pedido: <strong style="font-size: 18px;"><?=$request['request_number'];?></strong></label>                                  
                            </div> 
                            <div class="col-md-8">
                                <div class="float-right">
                                    <label for="ticket_number" class="control-label">Número do Bilhete: <strong class="numero_apolice"><?=$request['ticket_number'];?></strong></label>                                  
                                </div>    
                            </div>               
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <label for="request_date" class="control-label">Data do pedido: <strong style="font-size: 18px;"><?=date('d/m/Y',strtotime($request['request_date']));?></strong></label>                                  
                            </div> 
                            <div class="col-md-8">
                                <div class="float-right">
                                    <label for="situacao" class="control-label">Situação: <?php echo $request['descricao_situacao'];?></label>                                  
                                </div>    
                            </div>               
                        </div>
                        
                        <h5 class="mb-4" id="title-page">Meus bilhetes</h5>
                        <div class="row">
                            <div class="col-md-12">
                                <?php foreach($requestpax as $pax) { ?>
                                    <div class="alert alert-primary" role="alert">
                                        <div class="row">
                                            <div class="col-md-3" style=>
                                                <?=$pax['firstname'];?>
                                            </div>    
                                            <div class="col-md-3">
                                                <?=$pax['lastname'];?>
                                            </div>    
                                            <div class="col-md-6">
                                                <div class="float-right">
                                                    <a href="<?=$pax['ticket_print'];?>" download target="_blank" class="alert-link"><?=$pax['ticket_number'];?> <i class="fas fa-print"></i></a>
                                                </div>    
                                            </div>   
                                        </div>         
                                    </div>                                      
                                <?php } ?>   
                            </div> 
                        </div>    
                        
                        <h5 class="mb-4" id="title-page">Sobre a Viagem</h5>
                        <div class="row">
                            <?php if (!empty($requestcountry)) { ?>
                                <div class="col-md-4">
                                    <label for="country" class="control-label">País(es)</label>
                                </div> 
                                <div class="col-md-8">
                                    <?php foreach($requestcountry as $country) { ?>     
                                        <div class="float-right">                                  
                                            <label for="dados_country" class="control-label"><strong><?=$country['name'].', ';?></strong></label>
                                        </div>    
                                    <?php }?>  
                                </div>  
                            <?php } ?>    
                            <?php if (!empty($requeststate)) { ?>
                                <div class="col-md-4">
                                    <label for="state" class="control-label">Estado(s)</label>
                                </div>   
                                <div class="col-md-8">
                                    <?php foreach($requeststate as $state) { ?>  
                                        <div class="float-right">                                      
                                            <label for="state_country" class="control-label"><strong><?=$state['name'];?></strong></label>  
                                        </div>
                                    <?php }?>   
                                </div>      
                            <?php } ?>     
                            <div class="col-md-4">
                                <label for="periodo" class="control-label">Período da viagem</label>
                            </div>    
                            <div class="col-md-8">
                                <div class="float-right">
                                    <label for="periodo" class="control-label"><strong><?=date("d/m/Y",strtotime($request['start_date'])).' a '.date("d/m/Y",strtotime($request['end_date']));?></strong></label>
                                </div>    
                            </div>   
                        </div>  
                        
                        <h5 class="mb-4" id="title-page">Comprador</h5>
                        <div>
                            <fieldset>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="nome" class="control-label">Nome: <strong><?=$customer['name'];?></strong></label>
                                        </div>    
                                    </div>    
                                </div>    
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="CPF" class="control-label">CPF: <strong class="document"><?=$customer['code'];?></strong></label>
                                        </div>    
                                    </div>    
                                </div>   
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="email" class="control-label">E-mail: <strong><?=$customer['email'];?></strong></label>
                                        </div>    
                                    </div>    
                                </div>  
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="phone" class="control-label">Telefone: <strong><?=$customer['phone'];?></strong></label>
                                        </div>    
                                    </div>    
                                </div>  
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="endereco" class="control-label">Endereço: <strong><?=$customer['address'].', '.$customer['address_nro'].' - '.$customer['district'].' - '.$customer['cidade'].'/'.$customer['uf'].' - CEP: '.$customer['zipcode'];?></strong></label>
                                        </div>    
                                    </div>    
                                </div>         
                            </fieldset>    
                        </div>   
                             
                        <h5 class="mb-4" id="title-page">Pacote</h5>
                        <div>
                            <table class="table" id="lista-pedidos">
                                <thead class="thead-primary">
                                    <tr class="text-center">
                                        <th>Produto</th>
                                        <th>Preço</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $indice=0; $total=0;?>
                                    <?php foreach($requestitem as $item) { ?>
                                        <?php if ($indice==0) { ?>
                                            <tr>
                                                <td><?=$item['paxs'].' Passageiro(s) - '.$item['nroofdays'].' dias'?></td>
                                                <td>&nbsp;</td>
                                            </tr>    
                                            <tr>
                                                <td><?=$item['paxs'].' X '.$item['name'].' '.$item['destino'].' '.$item['agetext']?></td>
                                                <td><?='R$ '.number_format($item['total'],2,',','.');?></td>
                                            </tr>     
                                        <?php } else { ?>    
                                            <tr>
                                                <td><?=$item['paxs'].' X '.$item['name'].' '.$item['destino'].' '.$item['agetext']?></td>
                                                <td><?='R$ '.number_format($item['total'],2,',','.');?></td>
                                            </tr>    
                                        <?php } ?>    
                                        <?php $total+= floatval($item['total']); $indice++; ?>  
                                    <?php } ?>    
                                </tbody> 
                                <tfooter>
                                    <tr class="text-center">
                                        <th>Total</th>
                                        <th><?='R$ '.number_format($total,2,',','.');?></th>
                                    </tr>
                                </tfooter>   
                            </table>    
                        </div>         
                            
                        <input class="btn btn-primary float-right" id="btn-finalizar" type="button" value="Finalizar">
                    </form>   
                </div>
            </div>     
        </div>   		
    </section>

    <script src="<?=$scripts_url?>/concluido.js"></script>
    <script src="<?=$scripts_url?>/valida_cpf_cnpj.js"></script>
    <script src="<?=$vendor?>/masked-input/dist/jquery.maskedinput.min.js"></script>
    <script src="<?=$vendor?>/jquery-validation/jquery.validate.min.js"></script>

<?= $this->endsection()?>