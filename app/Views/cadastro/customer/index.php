<?= $this->extend('layouts/default') ?>

<?= $this->section('content')?>

<!-- container -->
<div class="container-fluid mg-t-20">

    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div class="left-content">
            <h4 class="content-title mb-2">Clientes</h4>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Cadastros</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Clientes</li>
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
                            <h4 class="card-title mg-b-0">Lista de Clientes</h4>
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
                    <div class="table-responsive">
                        <table class="table text-md-nowrap table-striped" id="example1">
                            <thead>
                                <tr>
                                    <th class="wd-15p border-bottom-0">Nome</th>
                                    <th class="wd-15p border-bottom-0">Tipo</th>
                                    <th class="wd-15p border-bottom-0">CPF/CNPJ</th>
                                    <th class="wd-15p border-bottom-0">Cidade</th>
                                    <th style="width: 68px; text-align: right;">Ações</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if ($customer!=false){ ?>
                                    <?php foreach($customer as $item) { ?>
                                    <tr>
                                        <td><?=$item['name'];?></td>
                                        <td><?=($item['type']=='F' ? 'Pessoa física' : 'Pessoa jurídica');?></td>
                                        <td><?=$item['code'];?></td>
                                        <td><?=$item['cidade'];?></td>
                                        <td nowrap>
                                            <div class="float-sm-right">
                                                <a href="javascript:void(0);" class="btn btn-primary btn-rounded btn-ativar" data-id="<?=$item['id'];?>" data-name="<?=$item['name'];?>" data-status="<?=$item['status'];?>" role="button">
                                                    <i class="far fa-check-circle"></i>
                                                </a>
                                                <a href="javascript:void(0);" class="btn btn-primary btn-rounded btn-editar" data-id="<?=$item['id'];?>" data-name="<?=$item['name'];?>" data-status="<?=$item['status'];?>" role="button">
                                                    <i class="far fa-edit"></i>
                                                </a>
                                            </div>   
                                        </td>
                                    </tr>
                                    <?php } ?>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div><!-- bd -->
            </div><!-- bd -->
        </div>
        <!--/div-->

    </div>
    <!-- row closed -->

</div>  

<div class="modal fade" id="confirmacao" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <input type="hidden" id="getcustomerstatus" value="<?=$getcustomerstatus;?>" />
    <input type="hidden" id="setstatus" value="<?=$setstatus;?>" />
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4><span id="titulo-confirmar-acao"><i class="far fa-edit"></i> <span id="label_cliente"></span></span></h4>
            </div>
            <div class="modal-body">
                <form class="form-horizontal" id="form-project" method="post">
                    <input name="id_customer_status" id="id_customer_status" value="" type="hidden">   
                    <fieldset>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="form-label" for="status">Status</label>    
                                    <select name="status" id="status" class="form-control input-md" required>
                                        <option value="0">Inativo</option>
                                        <option value="1">Ativo</option>
                                    </select>                                    
                                </div>
                            </div>
                        </div>
                    </fieldset>                
                </form>    
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default btn-rounded" data-dismiss="modal">Cancelar</button>
                <button id="btn-alterar-status" type="button" class="btn btn-primary btn-rounded" data-dismiss="modal">Confirmar</button>
            </div>
        </div>
    </div> 
</div>

<div class="modal fade" id="credito" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <input type="hidden" id="getcustomerconfig" value="<?=$getcustomerconfig;?>" />
    <input type="hidden" id="setconfig" value="<?=$setconfig;?>" />
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4><span id="titulo-confirmar-acao"><i class="far fa-edit"></i> <span id="label_cliente"></span></span></h4>
            </div>
            <div class="modal-body">
                <form class="form-horizontal" id="form-customer-config" method="post">
                    <input name="id" id="id" value="" type="hidden">   
                    <input name="customer_id" id="customer_id" value="" type="hidden">   
                    <fieldset>
                        <div id="msg_error"></div>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="form-label" for="credit_line">Limite de Crédito</label>    
                                    <input class="form-control" id="credit_line" name="credit_line" type="text" value="" required>                                
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="form-label" for="comission_default">Comissão (%)</label>    
                                    <input class="form-control" id="commission_default" name="commission_default" type="text" value="" required>                                
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="form-label" for="valid_initial">A partir de:</label>    
                                    <input class="form-control" id="valid_initial" name="valid_initial" type="date" value="" required>                                
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div id="lista-valores"></div>
                            </div>
                        </div>
                    </fieldset>                
                </form>    
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default btn-rounded" data-dismiss="modal">Cancelar</button>
                <button id="btn-confirmar-operacao" type="button" class="btn btn-primary btn-rounded" data-dismiss="modal">Confirmar</button>
            </div>
        </div>
    </div> 
</div>

<script src="<?=base_url('assets/vendor/mask-money/dist/jquery.maskMoney.js');?>"></script>
<script src="<?=base_url('assets/js/cadastros/customer.js');?>"></script>

<?= $this->endsection()?>