<?= $this->extend('layouts/default') ?>

<?= $this->section('content')?>

<!-- container -->
<div class="container-fluid mg-t-20">

    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div class="left-content">
            <h4 class="content-title mb-2">Pedidos</h4>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Consultas</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Vizualizar Pedido</li>
                </ol>
            </nav>
        </div>
    </div>
    <!-- /breadcrumb -->

    <!-- row -->
    <div class="row row-sm">

        <div class="col-xl-12">
            <div class="card">
                <div class="card-header pb-0 pd-t-25">
                    <div class="row">
                        <div class="col-md-6">
                            <h4 class="card-title mg-b-0">Dados do Pedido #<?=$request['request_number'];?></h4>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <form class="form-horizontal" id="form-consulta-pedidos" method="post">
                        <div class="row">
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label class="form-label" for="request_number">Número do Pedido</label>  
                                    <input class="form-control" id="request_number" name="request_number" type="text" value="<?=$request['request_number'];?>" readonly="readonly">
                                    <input type="hidden" id="request_id" value="<?=$id;?>">
                                    <input type="hidden" id="integrated" value="<?=$request['integrated'];?>">
                                    <input type="hidden" id="urlprintfile" value="<?=$urlprintfile;?>">
                                </div>
                            </div>   
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label class="form-label" for="request_date">Data do Pedido</label>  
                                    <input class="form-control" id="request_date" name="request_date" type="date" value="<?=date('Y-m-d',strtotime($request['request_date']));?>" readonly="readonly">
                                </div>
                            </div>   
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label class="form-label" for="ticket_number">Número do Bilhete</label>  
                                    <input class="form-control" id="ticket_number" name="ticket_number" type="text" value="<?=$request['ticket_number'];?>" readonly="readonly">
                                </div>
                            </div>   
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label class="form-label" for="descstatus">Situação</label>  
                                    <span><?=$request['descricao_situacao'];?></span> 
                                </div>
                            </div>   
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <input class="btn btn-primary btn-rounded" id="btn-extender" type="button" value="Extender viagem">
                                <input class="btn btn-danger float-right btn-rounded" id="btn-cancelar" type="button" value="Cancelar">
                            </div>    
                        </div>
                    </form>                      
                </div><!-- bd -->
            </div><!-- bd -->

            <div class="card">
                <div class="card-header pb-0 pd-t-25">
                    <div class="row">
                        <div class="col-md-6">
                            <h4 class="card-title mg-b-0">Dados do Cliente</h4>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="form-label" for="customer_name">Nome do cliente</label>  
                                <input class="form-control" id="customer_name" name="customer_name" type="text" value="<?=$customer['name'];?>" readonly="readonly">
                            </div>    
                        </div>    
                        <div class="col-md-2">
                            <div class="form-group">
                                <label class="form-label" for="customer_code">CPF/CNPJ</label>  
                                <input class="form-control" id="customer_code" name="customer_code" type="text" value="<?=$customer['code'];?>" readonly="readonly">
                            </div>    
                        </div>    
                        <div class="col-md-3">
                            <div class="form-group">
                                <label class="form-label" for="customer_email">E-mail</label>  
                                <input class="form-control" id="customer_email" name="customer_email" type="text" value="<?=$customer['email'];?>" readonly="readonly">
                            </div>    
                        </div>   
                        <div class="col-md-3">
                            <div class="form-group">
                                <label class="form-label" for="customer_phone">Telefone</label>  
                                <input class="form-control" id="customer_phone" name="customer_phone" type="text" value="<?=$customer['phone'];?>" readonly="readonly">
                            </div>    
                        </div>  
                    </div>
                    <div class="row">
                        <div class="col-md-3">
                            <div class="form-group">
                                <label class="form-label" for="customer_address">Endereço</label>  
                                <input class="form-control" id="customer_address" name="customer_address" type="text" value="<?=$customer['address'];?>" readonly="readonly">
                            </div>    
                        </div>
                        <div class="col-md-1">
                            <div class="form-group">
                                <label class="form-label" for="customer_address_nro">Número</label>  
                                <input class="form-control" id="customer_address_nro" name="customer_address_nro" type="text" value="<?=$customer['address_nro'];?>" readonly="readonly">
                            </div>    
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <label class="form-label" for="customer_complement">Complemento</label>  
                                <input class="form-control" id="customer_complement" name="customer_complement" type="text" value="<?=$customer['complement'];?>" readonly="readonly">
                            </div>    
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <label class="form-label" for="customer_district">Bairro</label>  
                                <input class="form-control" id="customer_district" name="customer_district" type="text" value="<?=$customer['district'];?>" readonly="readonly">
                            </div>    
                        </div>
                        <div class="col-md-1">
                            <div class="form-group">
                                <label class="form-label" for="customer_zipcode">CEP</label>  
                                <input class="form-control" id="customer_zipcode" name="customer_zipcode" type="text" value="<?=$customer['zipcode'];?>" readonly="readonly">
                            </div>    
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label class="form-label" for="customer_cidade">Cidade</label>  
                                <input class="form-control" id="customer_cidade" name="customer_cidade" type="text" value="<?=$customer['cidade'].'/'.$customer['uf'];?>" readonly="readonly">
                            </div>    
                        </div>
                    </div>
                </div>    
            </div>

            <div class="card">
                <div class="card-header pb-0 pd-t-25">
                    <div class="row">
                        <div class="col-md-6">
                            <h4 class="card-title mg-b-0">Dados dos Passageiros</h4>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="table-responsive">
                                <table class="table text-md-nowrap table-striped">
                                    <thead>
                                        <tr>
                                            <th class="wd-15p border-bottom-0">Nome</th>
                                            <th class="wd-15p border-bottom-0">Sobrenome</th>
                                            <th class="wd-15p border-bottom-0">CPF</th>
                                            <th class="wd-15p border-bottom-0">Dt. Nascimento</th>
                                            <th class="wd-15p border-bottom-0">Situação</th>
                                            <th class="wd-15p border-bottom-0 text-right">Ticket</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php if ($requestpax!=false){ ?>
                                            <?php foreach($requestpax as $item) { ?>
                                            <tr>   
                                                <td><?=$item['firstname'];?></td>        
                                                <td><?=$item['lastname'];?></td>        
                                                <td><?=$item['document'];?></td>        
                                                <td><?=date('d/m/Y',strtotime($item['birth_date']));?></td>        
                                                <td><?=($item['status']==1 ? 'Ativo' : 'Cancelado');?></td>   
                                                <td class="text-right"><a href="<?=$item['ticket_print'];?>" download target="_blank" class="alert-link"><?=$item['ticket_number'];?> <i class="fas fa-print"></i></a></td>  
                                            </tr> 
                                            <?php } ?>    
                                        <?php } ?>    
                                    </tbody>  
                                </table>  
                            </div>   
                        </div>       
                    </div>
                </div>
            </div>   

            <div class="card">
                <div class="card-header pb-0 pd-t-25">
                    <div class="row">
                        <div class="col-md-6">
                            <h4 class="card-title mg-b-0">Dados do Pacote</h4>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="table-responsive">
                                <table class="table text-md-nowrap table-striped">
                                    <thead>
                                        <tr>
                                            <th class="wd-15p border-bottom-0">Produto</th>
                                            <th class="wd-15p border-bottom-0">Destino</th>
                                            <th class="wd-15p border-bottom-0 text-right">Preço</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $total=0;?>
                                        <?php if ($requestitem!=false){ ?>
                                            <?php foreach($requestitem as $item) { ?>
                                            <tr>   
                                                <td><?=$item['name'];?></td>        
                                                <td><?=$item['destino'];?></td>   
                                                <td class="text-right"><?='R$ '.number_format($item['total'],2,',','.');?></td>        
                                            </tr>
                                            <?php $total+= floatval($item['total']); ?> 
                                            <?php } ?>    
                                        <?php } ?>    
                                    </tbody> 
                                    <tfooter>
                                        <tr>
                                            <th colspan="2">Total</th>
                                            <th class="text-right"><?='R$ '.number_format($total,2,',','.');?></th>
                                        </tr>
                                    </tfooter>        
                                </table>  
                            </div>   
                        </div>        
                    </div>
                </div>        
            </div>

            <div class="card">
                <div class="card-header pb-0 pd-t-25">
                    <div class="row">
                        <div class="col-md-6">
                            <h4 class="card-title mg-b-0">Dados Financeiro</h4>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <?php if ($payment!=false){ ?>
                        <?php foreach($payment as $item) { ?>
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label class="form-label" for="payment_date">Data de Pagamento</label>  
                                        <input class="form-control" id="payment_date" name="payment_date" type="date" value="<?=date('Y-m-d',strtotime($item['payment_date']));?>" readonly="readonly">
                                    </div>    
                                </div>     
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label class="form-label" for="payment_type">Forma de Pagamento</label>  
                                        <input class="form-control" id="payment_type" name="payment_type" type="text" value="<?=$item['payment_type'];?>" readonly="readonly">
                                    </div>    
                                </div>   
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label class="form-label" for="payment_amount">Valor do Pagamento</label>  
                                        <input class="form-control" id="payment_amount" name="payment_amount" type="text" value="<?='R$ '.number_format($item['amount'],2,',','.');?>" readonly="readonly">
                                    </div>    
                                </div>         
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label class="form-label" for="payment_installments">Parcelas</label>  
                                        <input class="form-control" id="payment_installments" name="payment_installments" type="text" value="<?=$item['installments'];?>" readonly="readonly">
                                    </div>    
                                </div>         
                            </div>
                        <?php } ?>    
                    <?php } ?>   
                    <div class="row">
                        <div class="col-md-3">
                            <div class="form-group">
                                <label class="form-label" for="commission_nest">Comissão Nest</label>  
                                <input class="form-control" id="commission_nest" name="commission_nest" type="text" value="<?='R$ '.number_format($request['commission_nest'],2,',','.');?>" readonly="readonly">
                            </div>    
                        </div>    
                        <div class="col-md-3">
                            <div class="form-group">
                                <label class="form-label" for="commission_b2b">Comissão B2B</label>  
                                <input class="form-control" id="commission_b2b" name="commission_b2b" type="text" value="<?='R$ '.number_format($request['commission_b2b'],2,',','.');?>" readonly="readonly">
                            </div>    
                        </div>      
                        <div class="col-md-3">
                            <div class="form-group">
                                <label class="form-label" for="net">Valor NET</label>  
                                <input class="form-control" id="net" name="net" type="text" value="<?='R$ '.number_format($request['net'],2,',','.');?>" readonly="readonly">
                            </div>    
                        </div>      
                    </div>     
                </div>        
            </div>

            <div class="card">
                <div class="card-body">

                    <div class="row">
                        <div class="col-md-12">
                            <div id="error" class="alert alert-danger" role="alert">
                                <button aria-label="Close" class="close" data-dismiss="alert" type="button">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                                <strong>Erro!</strong> <span id="error-msg"></span>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <button id="btn-voltar" data-action="<?=$urlretornar;?>" class="btn btn-warning btn-rounded"><i class="far fa-arrow-alt-circle-left"></i> Voltar</button>
                            <button id="btn-integrar" data-action="<?=$urlintegrar;?>" class="btn btn-primary btn-rounded float-right"><i id="icone-botao" class="fas fa-cogs"></i><span id="texto-botao"> Integração</span></button>
                            <button id="btn-reserva-sot" class="btn btn-success float-right mt-1 mb-1 btn-reserva-sot"><span id="text-reserva">Reserva SOT: <?=$request['integrated'];?></span></button>
                        </div>    
                    </div>
                </div>
            </div>           
            
        </div>
        <!--/div-->

    </div>
    <!-- row closed -->

</div>  

<script src="<?=base_url('assets/vendor/mask-money/dist/jquery.maskMoney.js');?>"></script>
<script src="<?=base_url('assets/js/consultas/pedidos.js');?>"></script>

<?= $this->endsection()?>