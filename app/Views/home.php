<?= $this->extend('layouts/default') ?>

<?= $this->section('content')?>

<!-- container -->
<div class="container-fluid mg-t-20">

    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div class="left-content">
            <h4 class="content-title mb-2">Painel Geral</h4>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Analytics &amp; Monitoring</li>
                </ol>
            </nav>
        </div>
    </div>
    <!-- /breadcrumb -->

    <div class="row row-sm">
        <div class="col-xl-12">
            <div class="row row-sm">
                <div class="col-xl-3 col-lg-3 col-md-3 col-sm-12">
                    <div class="card">
                        <div class="card-body iconfont text-left">
                            <div class="d-flex justify-content-between">
                                <h4 class="card-title mb-3">Pedidos Hoje</h4>
                                <div class="card-options ml-auto">
                                </div>
                            </div>
                            <div class="d-flex mb-0">
                                <div class="">
                                    <h4 class="mb-1 font-weight-bold"><?=$total_pedidos; ?></h4>
                                    <!--<p class="mb-2 tx-12 text-muted"><i class="fas fa-arrow-circle-up text-success"></i> Compared to Last week</p>-->
                                </div>
                                <div class="card-chart bg-primary-transparent brround ml-auto mt-0">
                                    <i class="typcn typcn-shopping-cart text-primary tx-24"></i>
                                </div>
                            </div>
                            <!--<div class="progress progress-sm mt-2 bg-primary-transparent">
                                <div aria-valuemax="100" aria-valuemin="0" aria-valuenow="70" class="progress-bar bg-primary wd-70p" role="progressbar"></div>
                            </div>
                            <small class="mb-0 text-muted">No mês<span class="float-right text-muted mg-t-2">70%</span></small>-->
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-3 col-md-3 col-sm-12">
                    <div class="card">
                        <div class="card-body iconfont text-left">
                            <div class="d-flex justify-content-between">
                                <h4 class="card-title mb-3">Vendas de Hoje</h4>
                                <div class="card-options ml-auto">
                                </div>
                            </div>
                            <div class="d-flex mb-0">
                                <div class="">
                                    <h4 class="mb-1 font-weight-bold">R$ <?=number_format($total_pedidos_valor, 2, ',', '.'); ?></h4>
                                    <!--<p class="mb-2 tx-12 text-muted"><i class="fas fa-arrow-circle-down text-danger"></i> Compared to Last week</p>-->
                                </div>
                                <div class="card-chart bg-warning-transparent brround ml-auto mt-0">
                                    <i class="typcn typcn-chart-line-outline text-warning tx-24"></i>
                                </div>
                            </div>

                            <!--<div class="progress progress-sm mt-2 bg-warning-transparent">
                                <div aria-valuemax="100" aria-valuemin="0" aria-valuenow="70" class="progress-bar bg-warning wd-50p" role="progressbar"></div>
                            </div>
                            <small class="mb-0  text-muted">No mês<span class="float-right text-muted mg-t-2">50%</span></small>-->
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-3 col-md-3 col-sm-12">
                    <div class="card">
                        <div class="card-body iconfont text-left">
                            <div class="d-flex justify-content-between">
                                <h4 class="card-title mb-3">Vendas no mês</h4>
                                <div class="card-options ml-auto">
                                </div>
                            </div>
                            <div class="d-flex mb-0">
                                <div class="">
                                    <h4 class="mb-1 font-weight-bold">R$ <?=number_format($total_pedidos_mes_valor, 2, ',', '.'); ?></h4>
                                    <!--<p class="mb-2 tx-12 text-muted"><i class="fas fa-arrow-circle-up text-success"></i> Compared to Last week</p>-->
                                </div>
                                <div class="card-chart bg-info-transparent brround ml-auto mt-0">
                                    <i class="typcn typcn-chart-bar-outline text-info tx-20"></i>
                                </div>
                            </div>
                            <!--<div class="progress progress-sm mt-2">
                                <div aria-valuemax="100" aria-valuemin="0" aria-valuenow="70" class="progress-bar bg-info wd-60p" role="progressbar"></div>
                            </div>
                            <small class="mb-0  text-muted">No ano<span class="float-right text-muted mg-t-2">60%</span></small>-->
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-3 col-md-3 col-sm-12">
                    <div class="card">
                        <div class="card-body iconfont text-left">
                            <div class="d-flex justify-content-between">
                                <h4 class="card-title mb-3">Tickets no mês</h4>
                                <div class="card-options ml-auto">
                                </div>
                            </div>
                            <div class="d-flex mb-0">
                                <div class="">
                                    <h4 class="mb-1 font-weight-bold"><?=$total_pedidos_mes; ?></h4>
                                    <!--<p class="mb-2 tx-12 text-muted"><i class="fas fa-arrow-circle-down text-success"></i> Compared to Last week</p>-->
                                </div>
                                <div class="card-chart bg-danger-transparent brround ml-auto mt-0">
                                    <i class="typcn typcn-briefcase text-danger tx-24"></i>
                                </div>
                            </div>
                            <!--<div class="progress progress-sm mt-2">
                                <div aria-valuemax="100" aria-valuemin="0" aria-valuenow="70" class="progress-bar bg-danger wd-40p" role="progressbar"></div>
                            </div>
                            <small class="mb-0  text-muted">No ano<span class="float-right text-muted mg-t-2">40%</span></small>-->
                        </div>
                    </div>
                </div>
            </div>    
        </div>
    </div>

    <div class="row row-sm">
        <div class="col-xl-12 col-lg-12 col-md-12">
            <div class="card">
                <div class="card-header pb-0 pd-t-25">
                    <div class="d-flex justify-content-between">
                        <h3 class="card-title mb-0">Últimos Pedidos (7 dias)</h3>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive" id="pedidos">
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- row close -->

    <p style="display:none;" data-url="<?=$urlgetrequest; ?>" id="urlgetrequest"></p>

</div>    

<script src="<?=base_url('assets/vendor/mask-money/dist/jquery.maskMoney.js');?>"></script>
<script src="<?=base_url('assets/js/dash/pedidos_dash.js');?>"></script>

<?= $this->endsection()?>