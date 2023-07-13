<?= $this->extend('layouts/default') ?>

<?= $this->section('content')?>

<!-- container -->
<div class="container-fluid mg-t-20">

    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div class="left-content">
            <h4 class="content-title mb-2">Configurações</h4>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Cadastros</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Configurações</li>
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
                            <h4 class="card-title mg-b-0">Lista de Configurações</h4>
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
                                    <th class="wd-15p border-bottom-0">Comissão Nest</th>
                                    <th style="width: 68px; text-align: right;">Ações</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if ($configuration!=false){ ?>
                                    <?php foreach($configuration as $item) { ?>
                                    <tr>
                                        <td><?=$item->commission_nest;?></td>
                                        <td nowrap>
                                            <div class="float-sm-right">
                                                <a href="<?=site_url('configuration/editar/'.$item->id);?>" class="btn btn-primary btn-rounded btn-editar" data-id="<?=$item->id;?>" role="button">
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

<?= $this->endsection()?>