
<div class="card-deck">
    <?php foreach($lista_opcionais as $opcional) {?>

        <?php if ($opcional['CodigoCoberturaOpcional']=='CV') { ?>
        <div class="col-md-5 text-center">    
            <div class="card text-center">
                <div class="card-header" style="background-color: #003c5c; color: #ffffff;">
                    <?=$opcional['NomeCoberturaOpcional'];?>
                </div>
                <div class="card-body d-flex flex-column align-items-center">
                    <div style="font-size:12px;">
                        <?=$opcional['DescricaoCoberturaOpcional'];?>
                    </div>  
                    <div style="font-family: Ubuntu_Regular;">
                        <span><strong>R$ <?=number_format($opcional['ValorCoberturaOpcional'],2,',','.');?></strong></span>
                    </div>   
                    <button class="btn btn-primary btn-block btn-selecionar-opcional mt-auto" data-opcional="<?=$opcional['CodigoCoberturaOpcional'];?>" data-price="<?=$opcional['ValorCoberturaOpcional'];?>">Incluir opcional</button>   
                    <div style="padding-top:15px;">
                        <button class="btn btn-white btn-block btn-saiba-mais" data-opcional="<?=$opcional['CodigoCoberturaOpcional'];?>">Saiba mais</button>
                    </div>    
                </div>    
            </div>
        </div>    
        <?php } ?>

    <?php } ?>     
</div>
