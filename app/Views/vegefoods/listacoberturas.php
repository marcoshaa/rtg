<style>
    .span_plano{
		color: #fff;
	}
	.span_textoplano{
		font-size: 18px;
		font-style: normal; 
		font-weight: bold; 
		color: #fff;
	}
	.informacoes_adicionais{
		font-size: 12px;
	}
    .tb_cobertura {
		padding: 10px;
		width: 100%;
		table-layout: fixed;
		border-collapse: separate;
	}
	.td_cobertura1{
		width: 40%;
		padding: 10px;
	}
	.tb_cobertura td{
		text-align: center; 
  		vertical-align: middle;
	}
	.tb_cobertura .tb_cabecalho_nacional{
		color:#02a2b1;
		font-size: 24px;
		font-family: PlayfairDisplay,
	}
	.tb_cobertura .tb_cabecalho_internacional{
		color:#8ac270;
		font-size: 24px;
		font-family: PlayfairDisplay,
	}
	.tb_cobertura .tb_cobertura_cabecalho_cobertura{
		background-color: #B2B2B2;
		height: 120px;
		border-radius: 5px;
	}
	.tb_cobertura .tb_cobertura_cobertura{
		height: 120px;
		border-radius: 5px;
	}
	.tb_cobertura .tb_cabecalho_nest30{
		background-color: #02a2b1;
		height: 120px;
		border-radius: 5px;
	}
	.tb_cobertura .tb_cabecalho_nest60{
		background-color: #0c8b99;
		height: 120px;
		border-radius: 5px;
	}
	.tb_cobertura .tb_cabecalho_nest50{
		background-color: #8ac270;
		height: 120px;
		border-radius: 5px;
	}
	.tb_cobertura .tb_cabecalho_nest100{
		background-color: #6eba70;
		height: 120px;
		border-radius: 5px;
	}
	.tb_cobertura .tb_cabecalho_nest250{
		background-color: #4d834f;
		height: 120px;
		border-radius: 5px;
	}
	.tr_hover1{
		background-color:#ededed;
	}
	.tr_hover2{
		background-color:#dadada;
	}
</style>    


<table class="tb_cobertura" id="tbl_coberturas">
    <tr>
        <td colspan="2" class="td_cobertura1">
            <div class="float-left">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i class="far fa-times-circle"></i>
                </button>
            </div>		
        </td>
    <tr>
        <td class="tb_cobertura_cabecalho_cobertura" colspan="2"><div><span class="span_plano">Lista de</span></div><div><span class="span_textoplano">Coberturas</span></div></td>
        <td class="tb_cabecalho_nest30"><div><span class="span_plano">Plano</span></div><div><span class="span_textoplano" id="span_textoplano">Nest30</span></div></td>
    </tr>
    <?php foreach($lista_insurance as $insurance) { ?>
    <tr class="tr_hover1">
        <td class="tb_cobertura_cobertura" colspan="2" style="text-align:left; padding: 15px;"><?=$insurance['description'];?></td>
        <td><?=($insurance['value']==null ? '*****' : ($insurance['days']==null ? $insurance['currency'].' '.number_format($insurance['value'],2,',','.') : $insurance['days'].' dias | '.$insurance['currency'].' '.number_format($insurance['value'],2,',','.') ) );?></td>
    </tr>
    <?php } ?>	
</table>    	