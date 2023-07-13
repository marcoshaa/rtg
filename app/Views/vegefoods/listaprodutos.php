<?= $this->extend('default') ?>

	<?= $this->section('content')?>

    <link rel="stylesheet" href="<?=$template_url?>/css/progress.css">

    <style>
        .cambio_quote{
            position: relative;
            margin-top: 100px;
        }
    </style>  

    <section class="ftco-section" style="padding: 1em; margin-bottom:120px;">
        <div class="container">
            <?php if (isset($cambiocotacao)) { ?>
                <div class="row" style="margin:0;">
                    <div class="col-md-12">
                        <div class="float-right">                       
                            Cotação do Dólar nesta cotação: <strong><?=number_format($cambiocotacao,3,',','.');?></strong></span>
                        </div>  
                    </div>    
                </div>    
            <?php } ?>  
            <hr style="margin:0;">
            <form id="form-produtos" method="post" action="<?=$actionidentificacao;?>">
                <input type="hidden" id="urloptional" value=<?=$actionQuote;?> />
                <input type="hidden" id="urlcoberturas" value=<?=$coberturas;?> />
                <input type="hidden" id="urladdoptional" value="<?=$addoptional;?>" />
                <input type="hidden" id="urlremoveoptional" value="<?=$removeoptional;?>" />
                <input type="hidden" id="urlproductdetail" value="<?=$urlproductdetail?>" />
                <input type="hidden" id="lead_id" name="lead_id"/>
                <input type="hidden" id="travel_reason" value=<?=$travel_reason;?> />
                <input type="hidden" id="destiny" value=<?=$destiny;?> />
                <input type="hidden" id="start_date" value=<?=$start_date;?> />
                <input type="hidden" id="end_date" value=<?=$end_date;?> />
                <input type="hidden" id="nroofdays" value=<?=$nroofdays;?> />
                <input type="hidden" id="paxsquote" value=<?=$paxsquote;?> />
                <input type="hidden" id="esportesamador" value=<?=$esportesamador;?> />
                <input type="hidden" id="voltar" value=<?=$voltar;?> />
                <div class="row justify-content-center mb-3 pb-3">
                <div class="col-md-12 heading-section text-center ftco-animate">
                    <!-- <span class="subheading">Nossos produtos</span> -->
                    <h4 class="mb-2 title-page" id="title-page">CONFIRA NOSSOS PLANOS</h4>
                    
                    <div class="container">
                        <ul class="progressbar">
                            <li id="li-plano" class="active">Escolha o Plano</li>
                            <li id="li-opcionais">Opcionais</li>
                            <li id="li-viajantes">Viajantes</li>
                            <li id="li-confirmacao">Confirmação</li>
                            <li id="li-pagamento">Pagamento</li>
                            <li id="li-concluido">Concluído</li>
                        </ul>    
                    </div>    
                    
                </div>
            </form>    
        </div>   		
        <div class="container">

            <div class="row row_produto">
                <?php foreach($result_data['produtos'] as $produto) { ?>
                    <div class="col-md-3">
                        <div class="card" style="text-align: center; margin-bottom: 20px; border-radius: 10px; border-color: #8ac270;">
                            <div class="card-header" style="background-color: #003c5c; color: #ffffff;">
                                <?=$produto['DescricaoProduto'];?>
                            </div>
                            <div class="card-body">
                                <div style="font-size:14px;">
                                    <?=$produto['description'];?>
                                </div>
                                <span class="heading"><strong><?=$produto['label'];?></strong></span>
                                <div style="font-family: Ubuntu_Regular;">
                                    <?=$produto['agetext'];?>
                                </div> 
                                <div style="font-family: Ubuntu_Regular;">
                                    <span><strong>R$ <?=number_format($produto['ValorProduto'],2,',','.');?></strong></span>
                                </div> 
                                <div style="">
                                    Valor total em reais.
                                </div>    
                                <div style="padding-top:15px;">
                                    <button class="btn btn-primary btn-block btn-selecionar" data-produto="<?=$produto['id'];?>" data-code-produto="<?=$produto['CodigoProduto'];?>" data-price="<?=$produto['ValorProduto'];?>" data-optional='<?=json_encode((isset($produto['opcionais']) ? $produto['opcionais'] : []));?>' data-parcelas='<?=json_encode($produto['parcelas']);?>' data-valor-usd='<?=json_encode($produto['produtosdolar']);?>'>Comprar</button>
                                </div>  
                                <div style="padding-top:15px;">
                                    <button class="btn btn-white btn-block btn-coberturas" data-produto="<?=$produto['id'];?>" data-nomeproduto="<?=$produto['DescricaoProduto'];?>">Veja as coberturas</button>
                                </div>                
                            </div>    
                        </div>
                    </div>    
                <?php } ?>    
            </div>
        </div>
        <div id="opcionais"></div>        
        <div id="resumo"></div>
    </section>
    

    <div class="modal animated fadeIn" id="modal-coberturas" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
            <div class="modal-body">
                <div id="lista_coberturas"></div>	
                <div class="informacoes_adicionais">
                    <div>
                    * Esta Cobertura somente incidirá após o esgotamento do Capital Segurado da Cobertura Básica de Despesas Médico-Hospitalares em Viagem ao exterior.						
                    </div>	
                    <div>
                    ** Cobertura de contratação opcional.						
                    </div>	
                </div>							
            </div>
            <div class="modal-footer">
                <!-- <button type="button" class="btn btn-primary" id="btn-print-pdf">PDF</button> -->
                <button type="button" class="btn btn-white" data-dismiss="modal">Voltar</button>
            </div>
            </div>
        </div>
    </div>

    <div class="modal animated fadeIn" id="modal-saiba-mais" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
            <div class="modal-body">
                <div id="lista_detalhes"></div>	
                				
            </div>
            <div class="modal-footer">
                <!-- <button type="button" class="btn btn-primary" id="btn-print-pdf">PDF</button> -->
                <button type="button" class="btn btn-white" data-dismiss="modal">Voltar</button>
            </div>
            </div>
        </div>
    </div>

    <script src="<?=$scripts_url?>/quote.js"></script>
<?= $this->endsection()?>