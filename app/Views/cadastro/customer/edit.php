<?= $this->extend('layouts/default') ?>

<?= $this->section('content')?>

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
                        <h4 class="card-title mg-b-0">Editar Cliente</h4>
                    </div>
                </div>
                <div class="card-body">
                    <form class="form-horizontal" id="form-project" method="post">
                        <input name="id" id="id" value="<?=$customer['id'];?>" type="hidden">
                        <fieldset <?php if(!empty($disabled)) echo $disabled ?> >
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="form-label" for="type">Pessoa física/jurídica</label>  
                                        <select name="type" id="type" class="form-control input-md" required>
                                            <option value="F">Pessoa física</option>
                                            <option value="J">Pessoa jurídica</option>
                                        </select>    
                                    </div>
                                </div>
                                
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="form-label" for="label_nomecompleto">Nome Completo</label>  
                                        <input class="form-control" placeholder="Nome completo" id="name" name="name" type="text" value="<?=$customer['name'];?>" required>
                                    </div>
                                </div> 

                                <div class="col-md-4">
                                    <div class="form-group" id="div_razaosocial">
                                        <label for="bussinessname" class="control-label">Razão social</label>
                                        <input class="form-control" placeholder="Razão social" id="bussinessname" name="bussinessname" type="text" value="<?=$customer['bussinessname'];?>">
                                    </div>
                                    <div class="form-group" id="div_dtnascimento">
                                        <label for="bussinessname" class="control-label">Data de Nascimento</label>
                                        <input class="form-control" id="birthdate" name="birthdate" type="text" autocomplete = "off" value="<?=$customer['birthdate'];?>">
                                    </div>
                                </div>     
                            </div>
                                
                        </fildset>
                    </form>
                </div><!-- bd -->
                <div class="card-footer bd-t tx-right">
                    <button id="btn-voltar" data-action="<?=$voltar;?>" class="btn btn-warning btn-rounded"><i class="far fa-arrow-alt-circle-left"></i> Voltar</button>
                    <button id="btn-subproject" class="btn btn-dark btn-rounded"><i class="fas fa-check-double"></i> Configurações</button>
                    <button id="btn-salvar" data-action="<?=$salvardados;?>" class="btn btn-primary btn-rounded"><i class="far fa-save"></i> Salvar</button>
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

<!-- Modal Dialog CHECK-LIST -->
<?=$modal_check_list?> 
<!-- End Modal Dialog CHECK-LIST -->

<!--Internal  Parsley.min js -->
<!-- <script src="<?=base_url('assets/plugins/parsleyjs/parsley.min.js');?>"></script> -->

<!--Internal  Sweet-Alert js-->
<script src="<?=base_url('assets/plugins/sweet-alert/sweetalert.min.js');?>"></script>
<script src="<?=base_url('assets/plugins/sweet-alert/jquery.sweet-alert.js');?>"></script>
<!-- Internal Jquery.steps js -->
<script src="<?=base_url('assets/plugins/jquery-steps/jquery.steps.min.js');?>"></script>
<script src="<?=base_url('assets/plugins/parsleyjs/parsley.min.js');?>"></script>
<script src="<?=base_url('assets/js/sgap/project.js');?>"></script>

<?= $this->endsection()?>