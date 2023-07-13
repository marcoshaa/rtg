<style>
    .span_plano{
		font-size: 20px;
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
		color: '#003c5c';
	}
	.tb_cobertura .tb_cobertura_cobertura{
		height: 60px;
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
        <td class="tb_cobertura_cabecalho_cobertura" colspan="2"><div><span class="span_plano">Com o cancelamento premium você não se preocupa com multas ou despesas não reembolsáveis, <strong>de até R$ 20.000,00</strong>, nos serviços contratados para a viagem. E mais...</td>
    </tr>
    <?php foreach($lista_detalhes as $detalhe) { ?>
    <tr class="tr_hover1">
        <td class="tb_cobertura_cobertura" colspan="2" style="text-align:left; padding: 15px;"><?=$detalhe['description'];?></td>
    </tr>
    <?php } ?>	
</table>    	