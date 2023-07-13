<?= $this->extend('layouts/default') ?>

<?= $this->section('content')?>

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
            <div class="card">
                <div class="card-header pb-0 pd-t-25">
                    <div class="row">
                        <div class="col-md-6">
                            <h4 class="card-title mg-b-0">Lista de Produtos</h4>
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
                                    <th class="wd-15p border-bottom-0">Referência</th>
                                    <th class="wd-15p border-bottom-0">Nome</th>
                                    <th class="wd-15p border-bottom-0">Descrição</th>
                                    <th class="wd-15p border-bottom-0">Label</th>
                                    <th style="width: 68px; text-align: right;">Ações</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if ($product!=false){ ?>
                                    <?php foreach($product as $item) { ?>
                                    <tr>
                                        <td><?=$item['code'];?></td>
                                        <td><?=$item['name'];?></td>
                                        <td><?=$item['description'];?></td>
                                        <td><?=$item['label'];?></td>
                                        <td nowrap>
                                            <div class="float-sm-right">
                                                <a href="<?=site_url('product/edit/');?>" class="btn btn-primary btn-rounded btn-editar" data-id="<?=$item['id'];?>" data-name="<?=$item['name'];?>" role="button">
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

<script src="<?=base_url('assets/vendor/mask-money/dist/jquery.maskMoney.js');?>"></script>
<script src="<?=base_url('assets/js/cadastros/customer.js');?>"></script>

<?= $this->endsection()?>