<?= $this->extend('default') ?>

	<?= $this->section('content')?>

    <link rel="stylesheet" href="<?=$template_url?>/css/progress.css">

    <style>
       .error{
             color:red
       }
    </style>

    <section class="ftco-section" style="padding: 1em;">

        <div class="container">

            <hr/>

            <h4 class="mb-4 text-center title-page" id="title-page">Meus Pedidos</h4>

            <div class="row justify-content-center" style="padding-top: 5px; margin-bottom: 10px;">
                <div class="col-md-12 heading-section ftco-animate">
                    
                    <?php foreach($lista_pedidos as $item) { ?>
                    <div class="card" style="margin-bottom: 15px; margin-top: 15px;">
                        <div class="card-header">
                            <label for="request_number" class="control-label">Nº do Pedido: <strong><?=$item['request_number'];?></strong></label>
                            <div class="float-right">
                                <label for="request_date" class="control-label">Data do Pedido: <strong><?=date("d/m/Y",strtotime($item['request_date']));?></strong></label>
                            </div>    
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="product" class="control-label">Pacote: <strong><?=$item['product'];?></strong></label>
                                    </div>    
                                </div>   
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="periodo" class="control-label">Período da viagem: <strong><?=date("d/m/Y",strtotime($item['start_date'])).' a '.date("d/m/Y",strtotime($item['end_date']));?></strong></label>
                                    </div>    
                                </div>  
                                <div class="col-md-4">
                                    <div class="float-right">
                                        <label for="situacao" class="control-label">Situação: <?php echo $item['descricao_situacao'];?></label>                                  
                                    </div>    
                                </div> 
                            </div>   
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="paxs" class="control-label">Passageiros: <strong><?=$item['paxs'];?></strong></label>
                                    </div>    
                                </div>   
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="paxs" class="control-label">Total do pedido: <strong><?=number_format($item['total_pedido'],2,',','.');?></strong></label> 
                                    </div>    
                                </div>  
                            </div>         
                            <div class="float-left" style="padding-top:15px;">
                                <button class="btn btn-primary btn-detalhes" data-link="<?=$viewticket;?>" data-id="<?=$item['id'];?>">Mais Detalhes</button>
                            </div>                                 
                        </div>
                    </div>                    
                    <?php } ?>
                </div>
            </div>     
        </div>   		
    </section>

    <script src="<?=$scripts_url?>/meuspedidos.js"></script>

<?= $this->endsection()?>