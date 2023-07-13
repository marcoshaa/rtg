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

       .selecionar_todos {
           color: #ffffff;
           
       }

    </style>

    <section class="ftco-section" style="padding: 1em;">
        <div class="container">
            <div class="row justify-content-center" style="padding-top: 20px;">
                <div class="col-md-12 heading-section ftco-animate">
                       
                    <form id="form-cancelamento" accept-charset="UTF-8" role="form" action="<?=$action_cancelar;?>" method="post"> 
                        <input type="hidden" id="id" name="id" value="<?=$request['id'];?>"/>   
                        <input type="hidden" id="urlretornar" value="<?=$urlretornar;?>" />
                        <input type="hidden" id="action_cancelar" value="<?=$action_cancelar;?>" />
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

                        <h4 class="mb-4" id="title-page">Meu pedido</h4>
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
                        
                        <h4 class="mb-4" id="title-page">Sobre a Viagem</h4>
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
      
                        <h4 class="mb-4" id="title-page">Meus bilhetes</h4>
                        <div>
                            <table class="table" id="lista-pedidos">
                                <thead class="thead-primary">
                                    <tr class="text-center">
                                        <th>Nome</th>
                                        <th>Sobrenome</th>
                                        <th>Nº do bilhete</th>
                                        <th><a class="selecionar_todos" id="selecionartodos" href="javascript:void(0)">Selecionar todos</a></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach($requestpax as $pax) { ?> 
                                        <tr>
                                            <td><?=$pax['firstname'];?></td>
                                            <td><?=$pax['lastname'];?></td>
                                            <td><?=$pax['ticket_number'];?></td>
                                            <td><?= ($pax['status']==1 ? '<input class="form-control check" id="child" name="paxselecionado['.$pax['id'].']" type="checkbox" value="" style="height:32px;">' : '<span class="badge badge-danger" style="font-size: 18px; color: #ffffff;">Bilhete Cancelado</span>');?></td>
                                            <!--<td><?php echo '<span class="badge badge-danger" style="font-size: 18px; color: #ffffff;">Bilhete Cancelado</span>';?></td>-->
                                        </tr>     
                                    <?php } ?>       
                                  </tbody> 
                            </table>    
                        </div> 
                        <input class="btn btn-danger float-right" id="btn-cancelar" type="button" value="Cancelar">       
                        <input class="btn btn-primary float-left" id="btn-voltar" type="button" value="Voltar pra lista">
                    </form>   
                </div>
            </div>     
        </div>   		
    </section>

    <div class="modal fade" id="confirmacao" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <input type="hidden" id="tela" value="" />
        <input type="hidden" id="tela-confirmei-btn-ok" value="" />
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4><span id="titulo-confirmar-acao">Confirmar a operação ?</span></h4>
                </div>
                <div class="modal-body">

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                    <button id="btn-confirmar-operacao" type="button" class="btn btn-primary" data-dismiss="modal">Confirmar</button>
                </div>
            </div>
        </div> 
    </div>

    <script src="<?=$scripts_url?>/cancelarticket.js"></script>
    <script src="<?=$scripts_url?>/valida_cpf_cnpj.js"></script>
    <script src="<?=$vendor?>/masked-input/dist/jquery.maskedinput.min.js"></script>
    <script src="<?=$vendor?>/jquery-validation/jquery.validate.min.js"></script>

<?= $this->endsection()?>