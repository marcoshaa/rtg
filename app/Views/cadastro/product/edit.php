<?= $this->extend('layouts/default') ?>

<?= $this->section('content')?>

<!--- Internal Sweet-Alert css-->
<link href="<?=base_url('assets/plugins/sweet-alert/sweetalert.css');?>" rel="stylesheet">

<style>
    .entry:not(:first-of-type)
    {
        margin-top: 10px;
    }
    .glyphicon
    {
        font-size: 12px;
    }

    .error { color: #FF6247;}
    
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

<!-- container -->
<div class="container-fluid mg-t-20">

    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div class="left-content">
            <h4 class="content-title mb-2">Produtos</h4>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Cadastros</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Produtos</li>
                </ol>
            </nav>
        </div>
    </div>
    <!-- /breadcrumb -->

    <!-- row -->
    <div class="row row-sm">

        <div class="col-xl-12">
            <form class="form-horizontal" id="form-product" method="post">
                <div class="card">
                    <div class="card-header pb-0 pd-t-25">
                        <div class="row">
                            <h4 class="card-title mg-b-0">Editar Produto</h4>
                        </div>
                    </div>
                    <div class="card-body">                        
                        <input name="id" id="id" value="<?=$product->id;?>" type="hidden">
                        <fieldset <?php if(!empty($disabled)) echo $disabled ?> >
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label class="form-label" for="code">Referência</label>  
                                        <input class="form-control" placeholder="Referência" id="code" name="code" type="text" value="<?=$product->code;?>" required>
                                    </div>
                                </div> 
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label class="form-label" for="name">Produto</label>  
                                        <input class="form-control" placeholder="Produto" id="name" name="name" type="text" value="<?=$product->name;?>" required>
                                    </div>
                                </div> 
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-label" for="description">Descrição</label>  
                                        <input class="form-control" placeholder="Descrição" id="description" name="description" type="text" value="<?=$product->description;?>" required>
                                    </div>
                                </div> 
                            </div>
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label class="form-label" for="category_id">Categoria</label>  
                                        <select name="category_id" id="category_id" class="form-control input-md" required>
                                            <?php foreach($list_category as $item) { ?>
                                                <option value="<?=$item->id;?>" <?=($item->id == $product->category_id ? 'selected' : '');?>><?=$item->name;?></option>
                                            <?php } ?>
                                        </select>    
                                    </div>
                                </div>
                                
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label class="form-label" for="type_id">Tipo</label>  
                                        <select name="type_id" id="type_id" class="form-control input-md" required>
                                            <?php foreach($list_type as $item) { ?>
                                                <option value="<?=$item->id;?>" <?=($item->id == $product->type_id ? 'selected' : '');?>><?=$item->name;?></option>
                                            <?php } ?>
                                        </select>    
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label class="form-label" for="label">Label</label>  
                                        <input class="form-control" placeholder="Rótulo" id="label" name="label" type="text" value="<?=$product->label;?>" required>
                                    </div>
                                </div> 
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label class="form-label" for="agetext">Texto da Idade</label>  
                                        <input class="form-control" placeholder="Texto Idade" id="agetext" name="agetext" type="text" value="<?=$product->agetext;?>" required>
                                    </div>
                                </div> 
                            </div>
                                
                        </fildset>
                    </div><!-- bd -->
                    <div class="card-footer bd-t">
                        <div class="tx-right">
                            <button id="btn-voltar" data-action="<?=$voltar;?>" class="btn btn-warning btn-rounded"><i class="far fa-arrow-alt-circle-left"></i> Voltar</button>
                            <button id="btn-insurance" class="btn btn-primary btn-rounded"><i class="fas fa-list"></i> Coberturas</button>
                            <button id="btn-salvar" data-action="<?=$saveproduct;?>" class="btn btn-primary btn-rounded"><i class="far fa-save"></i> Salvar</button>
                        </div>
                    </div>
                </div><!-- bd -->
            </form>
        </div>
        <!--/div-->

    </div>
    <!-- row closed -->
</div>
<!-- Container closed -->
</div>
<!-- main-content closed -->

<div class="modal fade" id="modal-insurance" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <input type="hidden" id="getinsurance" value="" />
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4><span id="titulo-confirmar-acao"><i class="far fa-edit"></i> <span id="label_cliente"></span></span></h4>
            </div>
            <div class="modal-body">
                <form class="form-horizontal" id="form-project" method="post">
                    <input name="product_id" id="product_id" value="" type="hidden">   
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
                <button id="btn-save-insurance" type="button" class="btn btn-primary btn-rounded" data-dismiss="modal">Confirmar</button>
            </div>
        </div>
    </div> 
</div>

<!--Internal  Parsley.min js -->
<!-- <script src="<?=base_url('assets/plugins/parsleyjs/parsley.min.js');?>"></script> -->

<!--Internal  Sweet-Alert js-->
<script src="<?=base_url('assets/plugins/sweet-alert/sweetalert.min.js');?>"></script>
<script src="<?=base_url('assets/plugins/sweet-alert/jquery.sweet-alert.js');?>"></script>
<!-- Internal Jquery.steps js -->
<script src="<?=base_url('assets/plugins/jquery-steps/jquery.steps.min.js');?>"></script>
<script src="<?=base_url('assets/plugins/parsleyjs/parsley.min.js');?>"></script>
<script src="<?=base_url('assets/js/cadastros/product.js');?>"></script>

<?= $this->endsection()?>