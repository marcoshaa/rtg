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
    
</style>

<!-- container -->
<div class="container-fluid mg-t-20">

    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div class="left-content">
            <h4 class="content-title mb-2">Configuration</h4>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Cadastros</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Configuration</li>
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
                        <h4 class="card-title mg-b-0">Editar Configurações</h4>
                    </div>
                </div>
                <div class="card-body">
                    <form class="form-horizontal" id="form-configuration" method="post" action="<?=$salvardados;?>">
                        <input name="id" id="id" value="<?=$configuration->id;?>" type="hidden">
                        <fieldset <?php if(!empty($disabled)) echo $disabled ?> >
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label class="form-label" for="type">Comissão Padrão Nest Travel (%)</label>  
                                        <input class="form-control" placeholder="Nome completo" id="commission_nest" name="commission_nest" type="text" value="<?=$configuration->commission_nest;?>" required>
                                    </div>
                                </div>
                            </div>  
                        </fildset>
                    </form>
                </div><!-- bd -->
                <div class="card-footer bd-t tx-right">
                    <button id="btn-voltar" data-action="<?=$voltar;?>" class="btn btn-warning btn-rounded"><i class="far fa-arrow-alt-circle-left"></i> Voltar</button>
                    <button id="btn-salvar" data-action="<?=$salvardados;?>" type="button" class="btn btn-primary btn-rounded"><i class="far fa-save"></i> Salvar</button>
                </div>
            </div><!-- bd -->
        </div>
        <!--/div-->

    </div>
    <!-- row closed -->
</div>
<!-- Container closed -->
</div>
<!-- main-content closed -->

<!--Internal  Sweet-Alert js-->
<script src="<?=base_url('assets/plugins/sweet-alert/sweetalert.min.js');?>"></script>
<script src="<?=base_url('assets/plugins/sweet-alert/jquery.sweet-alert.js');?>"></script>
<!-- Internal Jquery.steps js -->
<script src="<?=base_url('assets/plugins/jquery-steps/jquery.steps.min.js');?>"></script>
<script src="<?=base_url('assets/plugins/parsleyjs/parsley.min.js');?>"></script>

<script src="<?=base_url('assets/vendor/mask-money/dist/jquery.maskMoney.js');?>"></script>
<script src="<?=base_url('assets/js/cadastros/configuration.js');?>"></script>

<?= $this->endsection()?>