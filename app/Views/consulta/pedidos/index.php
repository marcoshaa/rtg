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
                    <li class="breadcrumb-item active" aria-current="page">Pedidos</li>
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
                            <h4 class="card-title mg-b-0">Lista de Pedidos</h4>
                        </div>
                        <div class="col-md-4">
                        </div>
                        <div class="col-md-2">
                            <div style="text-align: right;">
                                
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <form class="form-horizontal" id="form-consulta-pedidos" method="post" action="<?=$urlgetrequest.'/excel';?>">
                        <div class="row">
                            <input type="hidden" id="urlgetrequest" value=<?=$urlgetrequest;?> />
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label class="form-label" for="request_date_ini">Venda Inicio</label>  
                                    <input class="form-control" id="request_date_ini" name="request_date_ini" type="date" value="<?=$data_inicial;?>">
                                </div>
                            </div>   
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label class="form-label" for="request_date_fim">Venda Fim</label>  
                                    <input class="form-control" id="request_date_fim" name="request_date_fim" type="date" value="<?=$data_final;?>">
                                </div>
                            </div>    
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label class="form-label" for="travel_reason">Motivo da viagem</label>  
                                    <select id="travel_reason" name="travel_reason"  class="form-control input-md">
                                        <option value="-1">Todos</option>
                                        <option value="5fb9b25d-38c4-11ec-be3d-886fd4fc5c44">Lazer/Bussiness</option>
                                        <option value="7e27560c-38c4-11ec-be3d-886fd4fc5c44">Esporte</option>
                                    </select>   
                                </div>
                            </div>         
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label class="form-label" for="customer">Cliente</label>  
                                    <input class="form-control" id="customer" name="customer" type="text" value="">
                                </div>
                            </div>   
                            <div class="col-md-2">
                                <div class="form-group text-right">
                                    <label class="form-label" for="customer">&nbsp;</label>  
                                    <button type="button" id="btn-buscar" class="btn btn-primary"><i class="fa fa-search"></i></button>
                                    <button type="submit" id="btn-export-excel" class="btn btn-primary"><i class="fas fa-file-excel"></i></i></button>
                                </div>    
                            </div>    
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div aria-multiselectable="true" class="accordion" id="accordion" role="tablist">
                                    <div class="card mb-0">
                                        <div class="card-header" id="headingOne" role="tab">
                                            <a aria-controls="collapseOne" aria-expanded="false" data-toggle="collapse" href="#collapseOne"><i class="fas fa-plus-circle"></i> Mais filtros</a>
                                        </div>
                                        <div aria-labelledby="headingOne" class="collapse" data-parent="#accordion" id="collapseOne" role="tabpanel">
                                            <div class="card-body">
                                                <div class="row">
                                                    <div class="col-md-3">
                                                        <div class="form-group">
                                                            <label class="form-label" for="start_date_ini">Inicio da viagem de</label>  
                                                            <input class="form-control" id="start_date_ini" name="start_date_ini" type="date" value="">
                                                        </div>
                                                    </div>   
                                                    <div class="col-md-3">
                                                        <div class="form-group">
                                                            <label class="form-label" for="start_date_fim">Até</label>  
                                                            <input class="form-control" id="start_date_fim" name="start_date_fim" type="date" value="">
                                                        </div>
                                                    </div>    
                                                    <div class="col-md-3">
                                                        <div class="form-group">
                                                            <label class="form-label" for="end_date_ini">Fim da viagem de</label>  
                                                            <input class="form-control" id="end_date_ini" name="end_date_ini" type="date" value="">
                                                        </div>
                                                    </div>   
                                                    <div class="col-md-3">
                                                        <div class="form-group">
                                                            <label class="form-label" for="end_date_fim">Até</label>  
                                                            <input class="form-control" id="end_date_fim" name="end_date_fim" type="date" value="">
                                                        </div>
                                                    </div>    
                                                </div>    
                                                <div class="row">
                                                    <div class="col-md-3">
                                                        <div class="form-group">
                                                            <label class="form-label" for="request_number">Número do Pedido</label>  
                                                            <input class="form-control" id="request_number" name="request_number" type="text" value="">
                                                        </div>
                                                    </div>   
                                                    <div class="col-md-3">
                                                        <div class="form-group">
                                                            <label class="form-label" for="ticket_number">Número do bilhete</label>  
                                                            <input class="form-control" id="ticket_number" name="ticket_number" type="text" value="">
                                                        </div>
                                                    </div>    
                                                    <div class="col-md-3">
                                                        <div class="form-group">
                                                            <label class="form-label" for="document">CPF/CNPJ do Cliente</label>  
                                                            <input class="form-control" id="document" name="document" type="text" value="">
                                                        </div>
                                                    </div>  
                                                    <div class="col-md-3">
                                                        <div class="form-group">
                                                            <label class="form-label" for="status">Situação do Pedido</label>  
                                                            <select id="status" name="status"  class="form-control input-md">
                                                                <option value="-1">Todos</option>
                                                                <option value="1">Aberto</option>
                                                                <option value="2">Parcialmente emitido</option>
                                                                <option value="3">Emitido</option>
                                                                <option value="0">Cancelado</option>
                                                            </select>   
                                                        </div>
                                                    </div>           
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-3">
                                                        <div class="form-group">
                                                            <label class="form-label" for="destiny">Destino</label>  
                                                            <select id="destiny" name="destiny"  class="form-control input-md">
                                                                <option value="-1">Todos</option>
                                                                <option value="1115aa66-3041-11ec-be3d-886fd4fc5c44">África</option>
                                                                <option value="1117caea-3041-11ec-be3d-886fd4fc5c44">América Central</option>
                                                                <option value="1119a6a8-3041-11ec-be3d-886fd4fc5c44">Asia</option>
                                                                <option value="111c5035-3041-11ec-be3d-886fd4fc5c44">Europa</option>
                                                                <option value="111f1dfa-3041-11ec-be3d-886fd4fc5c44">América do Norte</option>
                                                                <option value="1120c8d1-3041-11ec-be3d-886fd4fc5c44">Oceania</option>
                                                                <option value="11226834-3041-11ec-be3d-886fd4fc5c44">América do Sul</option>
                                                                <option value="112432e9-3041-11ec-be3d-886fd4fc5c44">Brasil</option>
                                                            </select>   
                                                        </div>
                                                    </div>           
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div><!-- accordion -->
                            </div>          
                        </div>
                        </form>                      
                    <div class="row">
                        <div class="col-md-12">
                            <div id="pedidos"></div>
                        </div>
                    </div>
                </div><!-- bd -->
            </div><!-- bd -->
        </div>
        <!--/div-->

    </div>
    <!-- row closed -->

</div>  

<script src="<?=base_url('assets/vendor/mask-money/dist/jquery.maskMoney.js');?>"></script>
<script src="<?=base_url('assets/js/consultas/pedidos.js');?>"></script>

<?= $this->endsection()?>