
<?= $this->extend('default') ?>

<?= $this->section('content')?>


<!--
<link href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.7.2/themes/base/jquery-ui.css" rel="stylesheet" />
<script src="https://code.jquery.com/ui/1.11.3/jquery-ui.js"></script>
-->


<!--
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/smoothness/jquery-ui.css">
<script src="//code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
-->

<style>
	.error{
		color:red
	}
	.bullet-carrousel{
		position: absolute;
		margin-top: -70px;
		margin-right: 40px;
		color: #fff;
		font-family: Ubuntu;
	}
	.subtitulo{
		color: #fff;
		font-size: 32px; 
		font-family: Ubuntu_Bold;
	}
	.texto{
		color: #fff;
		font-size: 20px; 
		font-family: Ubuntu_light;
	}
	.textplanos{
		color: #fff;
		font-size: 22px; 
		font-family: Ubuntu_light;
	}
	.cotador {
		position: relative;
		margin-top:-480px; 
	}
	.div_fundo_cotador {
		position: absolute;
		height: 100%;
		width: 100%;
		background-color: #fff;
		opacity: 0.7;
		border-radius: 5px;
	}
	.card_info {
		border: solid 2px;
		border-color: #02a2b1;
		height: calc(100% - 40px);
   	 	margin-bottom: 40px;
		padding-bottom: 40px;
		box-shadow: 7px 9px 3px #8ac270;
	}
	.card_info_texto {
		font-size: 1.5rem;
		font-family: Ubuntu_Light;
		font-weight: bold;
		text-align: center;
		padding-bottom: 15px;
	}
	.rodape_diferenciais {
		font-size: 1.1rem;
		font-family: Ubuntu_light;
		font-style: italic;
		text-align: justify;
		padding-bottom: 10px;
		margin-top: -20px;
	}
	.fit-image{
		width: 100%;
		object-fit: cover;
		height: 400px; /* only if you want fixed height */
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


</style>
								
<section id="home-section" class="hero">
	<div class="home-slider owl-carousel" style="max-height:520px;">
	  <div class="slider-item" style="background-image: url(<?=$template_url?>/images/f02.jpg);">
		<div class="overlay"></div>
		<div class="container-fluid">
			<div class="row slider-text justify-content-right align-items-center" data-scrollax-parent="true">
				<div class="col-md-4 offset-md-7 d-none d-md-block bullet-carrousel">
					<span class="subtitulo">Esportes de competição</span>
					<div>
						<span class="texto">A única seguradora do mercado que cobre imprevistos e acidentes em práticas de esportes por competição. Em coberturas especiais, fale com a gente.</span>
					</div>	
				</div>
			</div>
		</div>
	  </div>

	  <div class="slider-item" style="background-image: url(<?=$template_url?>/images/f01.jpg);">
		<div class="overlay"></div>
		<div class="container-fluid">	
			<div class="row slider-text justify-content-right align-items-center" data-scrollax-parent="true">
				<div class="col-md-4 offset-md-7 d-none d-md-block bullet-carrousel">
					<span class="subtitulo">Lazer ou negócios</span>
					<div>
						<span class="texto">Viagens pessoais e profissionais protegidas em caso de eventos inesperados. A Nest conta com a melhor rede internacional do mercado com a qualidade e segurança Omint.</span>
					</div>	
				</div>
			</div>
		</div>
	  </div>

	  <div class="slider-item" style="background-image: url(<?=$template_url?>/images/f03.jpg);">
		<div class="container-fluid">
			<div class="row slider-text justify-content-right align-items-center" data-scrollax-parent="true">
				<div class="col-md-4 offset-md-7 d-none d-md-block bullet-carrousel">
					<span class="subtitulo">Esportes amadores</span>
					<div>
						<span class="texto">Cobertura de esportes de lazer incluindo diversos esportes radicais, de neve e de aventura.</span>
					</div>	
				</div>
			</div>
		</div>
	  </div>
	  
	</div>
</section>

<div class="container">
	<div class="cotador col-md-9">
		<div class="col-md-12">
			<div class="row justify-content-start">
				<div class="heading-section ftco-animate deal-of-the-day ftco-animate">
					<form id="formCotacao" action="<?=$actionQuote;?>" method="post">
						<div class="div_fundo_cotador">	
						</div>											
						<div class="col-md-12">
							<div class="row">
								<div class="col-md-12">
									<h4 class="mb-1" style="color:#003c5c; font-weight:bold; letter-spacing: 0.2em;">FAÇA SUA COTAÇÃO</h4>
									<h5 class="mb-4" style="color:#003c5c; font-family: Ubuntu_Regular; font-weight: bold;">Viaje com a Nest Travel!</h5>
									<div class="form-group">
										<select id="travel_reason" name="travel_reason" class="form-control" required>
											<option value="">Motivo da viagem</option>
											<option value="L">Lazer/Bussiness</option>
											<!--
											<?php if( $list_travelreasons ) : foreach( $list_travelreasons as $reason ): ?>
												<option value="<?= $reason['code'] ?>"><?=$reason['description'];?></option>
											<?php endforeach; endif; ?>
											-->
										</select>
									</div>	
								</div>
							</div>	
							<div class="row">
								<div class="col-md-12">
									<div class="form-group">
										<select id="destiny" name="destiny" class="form-control" required>
											<option value="">Destino</option>
											<?php if( $list_destinys ) : foreach( $list_destinys as $destiny ): ?>
												<option value="<?= $destiny['sigla'] ?>"><?=$destiny['name'];?></option>
											<?php endforeach; endif; ?>
										</select>
									</div>	
								</div>
							</div>	
							<div class="row">					
								<div class="col-md-4 col-sm-12 col-12">
									<div class="form-group">
										<input class="form-control" type="text" name="start_date" id="start_date" placeholder="Embarque" autocomplete = "off" required/>
									</div>	
								</div>	
								<div class="col-md-4 col-sm-12 col-12">
									<div class="form-group">
										<input class="form-control" type="text" name="end_date" id="end_date" placeholder="Retorno" autocomplete = "off" required/>
									</div>	
								</div>	
								<div class="col-md-4 col-sm-12 col-12">
									<div class="form-group">	
										<input id="paxs" name="paxs" type="number" placeholder="Passageiros" class="form-control" value="" required min=1 max=99>
										<label for="destino" style="color:#ffffff">0 a 75 anos</label>
									</div>	
								</div>
							</div>	
							<input type="hidden" id="esportesamador" name="esportesamador" value="N" />
							<div class="row" style="margin-bottom: 20px;">
								<div class="col-md-12">
									<div class="form-group">
										<button type="submit" id="btn-cotar" class="btn btn-primary float-right"><span id="icone-botao" class="" aria-hidden="true"></span><span id="texto-botao">Veja quanto ficou!</span></button>
									</div>	
								</div>	
							</div>
						</div>	
					</form>
				</div>
			</div>   
		</div>	
	</div>		
</div>

<section class="ftco-section ftco-category ftco-no-pt ftco-animate" id="onest" style="background-image: url(<?=$template_url?>/images/fundograma.png); height:100%; width: 100%; text-align: center; margin-top:125px;">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div style="padding-top: 40px; padding-bottom: 35px; ">
					<img src="<?=base_url('assets/img/nesttravel.png');?>" style="width:360px;">
				</div>
				<div style="font-family: Ubuntu_Regular; font-size: 18px; text-align: justify;"> 	
					<p>										
					Profissional ou amador, viver sua paixão pelo esporte é mais seguro com Nest Travel.
					</p>	
					<p>										
					O Grupo Águia, em parceria com o Grupo OMINT, apresenta sua nova solução em seguros-viagem. Nest Travel é o único seguro-viagem que conta com uma cobertura específica para esportistas profissionais e amadores. Viaje com muito mais tranquilidade para competições ou atividades esportivas com a solidez e assistência dos Grupos Águia e OMINT.
					</p>
					<p>										
					Em três décadas de história, o Grupo Águia já realizou a logística de mais de 23 mil partidas de futebol profissional. São mais de 2 milhões de bilhetes aéreos emitidos, 1,2 milhão de hospedagens reservadas e 14 milhões de km percorridos em transporte de delegações.
					</p>
					<p>										
					O Grupo OMINT conta com ampla rede internacional de saúde, possui estrutura de atendimento nos 5 continentes, com mais de 2.700 hospitais credenciados em 170 países. Além disso, são 211 hospitais de referência, 46 Centros de Atendimento em 5 idiomas e 68 ambulâncias aéreas.
					</p>
					<p>
					Essa parceria de sucesso reúne o que há de melhor no mundo em turismo e assistência em viagens. A solidez e experiência do Grupo Águia combinado à excelência e confiança do Grupo OMINT. Converse com seu corretor. Você irá se surpreender com a qualidade. Leve ao mundo a sua paixão pelo esporte, viaje com Nest Travel.
					</p>								
				</div>	
				<div style="padding-top: 40px; padding-bottom: 15px; align-self: flex-end;">
					<img src="<?=base_url('assets/img/logoga.png');?>" style="width:240px; max-height: auto;">
				</div>	
		</div>
	</div>
</section>

<section class="ftco-section ftco-category ftco-no-pt ftco-animate" id="planos">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div style="padding-top: 10px; padding-bottom: 2px; text-align: center;">
					<div style="text-align: center; font-size: 60px; color: #188acb; font-family: PlayfairDisplay; letter-spacing: 0.1em; height: 80px;">
						&nbsp;PLANOS
					</div>	
					<div style="text-align: center; font-size: 22px; color: #003c5c; font-family: Ubuntu; font-weight: bold; padding-bottom:15px;">
						&nbsp;&nbsp;Nacionais e Internacionais
					</div>	
				</div>	
			</div>	
		</div>
	</div>
	<div class="row" class="row_planos">
		<div class="col-md-6" style="padding:0px; height: 400px;">
			<img src="<?=base_url('assets/img/imglazer.png');?>" class="img-responsive fit-image">
			<div class="col-md-7 offset-md-4" style="position: relative; margin-top: -290px; text-align: center;">
				<span class="subtitulo">Lazer</span>
				<div>
					<span class="texto">Seguro viagem ideal para quem tem uma viagem marcada para curtir suas férias ou negócios no Brasil ou no exterior.</span>
				</div>	
			</div>	
		</div>
		<div class="col-md-6" style="padding:0px; height: 400px;">
			<img src="<?=base_url('assets/img/imgesporte.png');?>" class="img-responsive fit-image">
			<div class="col-md-7 offset-md-2" style="position: relative; margin-top: -290px; text-align: center;">
				<span class="subtitulo">Esporte</span>
				<div>
					<span class="texto">Cobertura EXCLUSIVA para esportistas federados em viagem de competição e cobertura de esporte de lazer, sem custo adicional.</span>
				</div>	
			</div>
		</div>	
	</div>	
</section>

<section class="ftco-section" style="padding:2em;">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div>
					<div style="text-align: center; font-size: 38px; color: #188acb; font-family: PlayfairDisplay; letter-spacing: 0.2em; padding-bottom: 20px;">
						DIFERENCIAIS
					</div>	
				</div>	
			</div>	
		</div>	
		<div class="row">
			<div class="col-md-4 text-center align-self-stretch ftco-animate" style="padding-right:45px;padding-left:45px;">
				<div class="card card_info">
					<div class="card-body d-flex flex-column align-items-center">
						<div class="card-title"><img src="<?=base_url('assets/img/rede.png');?>" style="width:160px;"></div>
						<div class="card_info_texto">
							A melhor rede internacional do mercado
						</div>	
					</div>    
				</div>
			</div>
			<div class="col-md-4 text-center align-self-stretch ftco-animate" style="padding-right:45px;padding-left:45px;">
				<div class="card card_info">
					<div class="card-body d-flex flex-column align-items-center">
						<div class="card-title"><img src="<?=base_url('assets/img/doencas.png');?>" style="width:160px;"></div>
						<div class="card_info_texto">
							Cobertura para doenças preexistentes
						</div>	
					</div>    
				</div>
			</div>
			<div class="col-md-4 text-center align-self-stretch ftco-animate" style="padding-right:45px;padding-left:45px;">
				<div class="card card_info">
					<div class="card-body d-flex flex-column align-items-center">
						<div class="card-title"><img src="<?=base_url('assets/img/atendimento.png');?>" style="width:160px;"></div>
						<div class="card_info_texto">
							Atendimento 24h por dia em português
						</div>	
					</div>    
				</div>
			</div>
		</div>	
		<div class="row">	
			<div class="col-md-4 text-center align-self-stretch ftco-animate" style="padding-right:45px;padding-left:45px;">
				<div class="card card_info">
					<div class="card-body d-flex flex-column align-items-center">
						<div class="card-title"><img src="<?=base_url('assets/img/covid.png');?>" style="width:160px;"></div>
						<div class="card_info_texto">
							Cobertura para COVID em casos de emergências médicas hospitalares
						</div>	
					</div>    
				</div>
			</div>

			<div class="col-md-4 text-center align-self-stretch ftco-animate" style="padding-right:45px;padding-left:45px;">
				<div class="card card_info">
					<div class="card-body d-flex flex-column align-items-center">
						<div class="card-title"><img src="<?=base_url('assets/img/esportesamador.png');?>" style="width:160px;"></div>
						<div class="card_info_texto">
							Cobertura para os esportes amadores* inclusa
						</div>	
					</div>    
				</div>
			</div>

			<div class="col-md-4 text-center align-self-stretch ftco-animate" style="padding-right:45px;padding-left:45px;">
				<div class="card card_info">
					<div class="card-body d-flex flex-column align-items-center">
						<div class="card-title"><img src="<?=base_url('assets/img/esportecompeticao.png');?>" style="width:160px;"></div>
						<div class="card_info_texto">
							Planos com coberturas para esportes de lazer e competição*
						</div>	
					</div>    
				</div>
			</div>
			<div class="rodape_diferenciais" style="padding-right:45px;padding-left:45px; font-style:normal;">
				*Esportes amadores cobertos em nossos planos: surf, stand up paddle, ski em pista regulamentada, vela, balonismo (atração turística guiada), vôlei, futebol, handebol,
				basquete, corrida, ciclismo, críquete, ginástica, golf, motociclismo (em estradas normais), natação e/ou tênis.
			</div>	
		</div>
		<div class="text-center" style="padding-bottom: 40px; padding-top: 40px;">		
			<div class="col-md-12">											
				<button class="btn btn-primary btn-lg btn-coberturas" style="width: 220px; margin:5px;">Veja as coberturas</button>         
				<button class="btn btn-secondary btn-lg btn-cotar" style="width: 220px; margin:5px;" onclick="scrollToCotador()">Faça sua cotação</button>         
			</div>	
		</div>	
	</div>
	<!--
	<div class="faixaazul1"></div>	
	-->
</section>

<div class="modal animated fadeIn" id="modal-coberturas" tabindex="-1" role="dialog">
  <div class="modal-dialog modal-xl" role="document">
    <div class="modal-content">
      <div class="modal-body">
		<table class="tb_cobertura" id="tbl_coberturas">
			<tr>
				<td colspan="2" class="td_cobertura1">
					<div class="float-left">
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<i class="far fa-times-circle"></i>
						</button>
					</div>		
				</td>
				<td colspan="2"><span class="tb_cabecalho_nacional">Nacional</span></td>
				<td colspan="3"><span class="tb_cabecalho_internacional">Internacional</span></td>
			<tr>
				<td class="tb_cobertura_cabecalho_cobertura" colspan="2"><div><span class="span_plano">Lista de</span></div><div><span class="span_textoplano">Coberturas</span></div></td>
				<td class="tb_cabecalho_nest30"><div><span class="span_plano">Plano</span></div><div><span class="span_textoplano">Nest30</span></div></td>
				<td class="tb_cabecalho_nest60"><div><span class="span_plano">Plano</span></div><div><span class="span_textoplano">Nest60</span></div></td>
				<td class="tb_cabecalho_nest50"><div><span class="span_plano">Plano</span></div><div><span class="span_textoplano">Nest50</span></div></td>
				<td class="tb_cabecalho_nest100"><div><span class="span_plano">Plano</span></div><div><span class="span_textoplano">Nest100</span></div></td>
				<td class="tb_cabecalho_nest250"><div><span class="span_plano">Plano</span></div><div><span class="span_textoplano">Nest250</span></div></td>	
			</tr>
			<tr class="tr_hover1">
				<td class="tb_cobertura_cobertura" colspan="2" style="text-align:left; padding: 15px;">Despesas médico-hospitalares em viagem - Sendo esta a soma da cobertura básica e complementar*, como descrito abaixo:</td>
				<td>R$ 30.000,00</td>
				<td>R$ 60.000,00</td>
				<td>$ 50.000,00</td>
				<td>$ 100.000,00</td>
				<td>$ 250.000,00</td>
			</tr>		
			<tr class="tr_hover2">
				<td class="tb_cobertura_cobertura" colspan="2" style="text-align:left; padding: 15px;">Cobertura Básica: Cobertura para doenças preexistentes, gravidez até 34 semanas e prorrogação involuntária</td>
				<td>R$ 30.000,00</td>
				<td>R$ 60.000,00</td>
				<td>$ 50.000,00</td>
				<td>$ 50.000,00</td>
				<td>$ 50.000,00</td>
			</tr>		
			<tr class="tr_hover1">
				<td class="tb_cobertura_cobertura" colspan="2" style="background-color:#ededed; text-align:left; padding: 15px;">Cobertura Complementar: Cobertura para gravidez até 34 semanas e prorrogação involuntária</td>
				<td>*****</td>
				<td>*****</td>
				<td>*****</td>
				<td>$ 50.000,00</td>
				<td>$ 200.000,00</td>
			</tr>	
			<tr class="tr_hover2">
				<td class="tb_cobertura_cobertura" style="background-color:#dadada; text-align:left; padding: 15px;" colspan="2">Despesas farmacêuticas</td>
				<td>R$ 300,00</td>
				<td>R$ 300,00</td>
				<td>$ 800,00</td>
				<td>$ 1.000,00</td>
				<td>$ 1.500,00</td>
			</tr>	
			<tr class="tr_hover1">
				<td class="tb_cobertura_cobertura" style="background-color:#ededed; text-align:left; padding: 15px;" colspan="2">Despesas odontológicas em viagem</td>
				<td>R$ 300,00</td>
				<td>R$ 300,00</td>
				<td>$ 800,00</td>
				<td>$ 1.000,00</td>
				<td>$ 2.500,00</td>
			</tr>	
			<tr class="tr_hover2">
				<td class="tb_cobertura_cobertura" style="background-color:#dadada; text-align:left; padding: 15px;" colspan="2">Morte acidental em viagem ao exterior</td>
				<td>R$ 25.000,00</td>
				<td>R$ 25.000,00</td>
				<td>R$ 20.000,00</td>
				<td>R$ 30.000,00</td>
				<td>R$ 60.000,00</td>
			</tr>	
			<tr class="tr_hover1">
				<td class="tb_cobertura_cobertura" style="background-color:#ededed; text-align:left; padding: 15px;" colspan="2">Invalidez permanente e total por acidente em viagem</td>
				<td>R$ 25.000,00</td>
				<td>R$ 25.000,00</td>
				<td>R$ 20.000,00</td>
				<td>R$ 30.000,00</td>
				<td>R$ 60.000,00</td>
			</tr>	
			<tr class="tr_hover2">
				<td class="tb_cobertura_cobertura" style="background-color:#dadada; text-align:left; padding: 15px;" colspan="2">Traslado Médico</td>
				<td>R$ 5.000,00</td>
				<td>R$ 5.000,00</td>
				<td>$ 50.000,00</td>
				<td>$ 80.000,00</td>
				<td>$ 150.000,00</td>
			</tr>	
			<tr class="tr_hover1">
				<td class="tb_cobertura_cobertura" style="background-color:#ededed; text-align:left; padding: 15px;" colspan="2">Traslado de corpo</td>
				<td>R$ 15.000,00</td>
				<td>R$ 15.000,00</td>
				<td>$ 40.000,00</td>
				<td>$ 60.000,00</td>
				<td>$ 60.000,00</td>
			</tr>	
			<tr class="tr_hover2">
				<td class="tb_cobertura_cobertura" style="background-color:#dadada; text-align:left; padding: 15px;" colspan="2">Visita ao Segurado Hospitalizado</td>
				<td>R$ 1.000,00</td>
				<td>R$ 1.000,00</td>
				<td>$ 2.000,00</td>
				<td>$ 2.200,00</td>
				<td>$ 2.200,00</td>
			</tr>	
			<tr class="tr_hover1">
				<td class="tb_cobertura_cobertura" style="background-color:#ededed; text-align:left; padding: 15px;" colspan="2">Acompanhamento de Menores e Seniores</td>
				<td>R$ 2.000,00</td>
				<td>R$ 2.000,00</td>
				<td>$ 2.200,00</td>
				<td>$ 2.500,00</td>
				<td>$ 3.000,00</td>
			</tr>		
			<tr class="tr_hover2">
				<td class="tb_cobertura_cobertura" style="background-color:#dadada; text-align:left; padding: 15px;" colspan="2"><span>Regresso do segurado<br>
				&#8226; Regresso devido a acidente/enfermidade que impossibilite a continuidade da viagem.<br>
				&#8226; Regresso devido a morte ou doença de familiar.<br>
				&#8226; Regresso devido a notificação judicial improrrogável.<br>
				&#8226;Retorno por sinistro no Domicílio.</span></td>
				<td>R$ 2.000,00</td>
				<td>R$ 2.000,00</td>
				<td>$ 2.000,00</td>
				<td>$ 2.500,00</td>
				<td>$ 2.500,00</td>
			</tr>	
			<tr class="tr_hover1">
				<td class="tb_cobertura_cobertura" style="background-color:#ededed; text-align:left; padding: 15px;" colspan="2">Regresso Sanitário</td>
				<td>R$ 15.000,00</td>
				<td>R$ 15.000,00</td>
				<td>$ 50.000,00</td>
				<td>$ 100.000,00</td>
				<td>$ 250.000,00</td>
			</tr>	
			<tr class="tr_hover2">
				<td class="tb_cobertura_cobertura" style="background-color:#dadada; text-align:left; padding: 15px;" colspan="2">Bagagem</td>
				<td>R$ 1.000,00</td>
				<td>R$ 1.000,00</td>
				<td>R$ 3.800,00</td>
				<td>R$ 4.275,00</td>
				<td>R$ 4.750,00</td>
			</tr>	
			<tr class="tr_hover1">
				<td class="tb_cobertura_cobertura" style="background-color:#ededed; text-align:left; padding: 15px;" colspan="2">Compensação por demora na localização de bagagem</td>
				<td>*****</td>
				<td>*****</td>
				<td>R$ 300,00</td>
				<td>R$ 400,00</td>
				<td>R$ 500,00</td>
			</tr>	
			<tr class="tr_hover2">
				<td class="tb_cobertura_cobertura" style="background-color:#dadada; text-align:left; padding: 15px;" colspan="2">Cancelamento de viagem ao exterior</td>
				<td>R$ 1.200,00</td>
				<td>R$ 1.200,00</td>
				<td>R$ 4.000,00</td>
				<td>R$ 4.000,00</td>
				<td>R$ 4.000,00</td>
			</tr>	
			<tr class="tr_hover1">
				<td class="tb_cobertura_cobertura" style="background-color:#ededed; text-align:left; padding: 15px;" colspan="2">Interrupção de viagem ao exterior</td>
				<td>R$ 1.200,00</td>
				<td>R$ 1.200,00</td>
				<td>R$ 4.000,00</td>
				<td>R$ 4.000,00</td>
				<td>R$ 4.000,00</td>
			</tr>	
			<tr class="tr_hover2">
				<td class="tb_cobertura_cobertura" style="background-color:#dadada; text-align:left; padding: 15px;" colspan="2">Atraso de Embarque</td>
				<td>R$ 300,00</td>
				<td>R$ 300,00</td>
				<td>*****</td>
				<td>*****</td>
				<td>*****</td>
			</tr>
			<tr class="tr_hover1">
				<td class="tb_cobertura_cobertura" style="background-color:#ededed; text-align:left; padding: 15px;" colspan="2">Hospedagem após alta hospitalar</td>
				<td> 2 dias | R$ 175,00 </td>
				<td> 2 dias | R$ 175,00 </td>
				<td> 10 dias | $ 150,00 </td>
				<td> 10 dias | $ 150,00 </td>
				<td> 10 dias | $ 200,00 </td>
			</tr>
			<tr class="tr_hover2">
				<td class="tb_cobertura_cobertura" style="background-color:#dadada; text-align:left; padding: 15px;" colspan="2">Hospedagem de Acompanhante</td>
				<td>*****</td>
				<td>*****</td>
				<td> 5 dias | $ 150,00 </td>
				<td> 5 dias | $ 150,00 </td>
				<td> 5 dias | $ 200,00 </td>
			</tr>	
			<tr class="tr_hover1">
				<td class="tb_cobertura_cobertura" style="background-color:#ededed; text-align:left; padding: 15px;" colspan="2">Reembolso por Gastos de Emissão de Passaporte Provisório</td>
				<td>*****</td>
				<td>*****</td>
				<td>$ 500,00</td>
				<td>$ 500,00</td>
				<td>$ 800,00</td>
			</tr>	
			<tr class="tr_hover2">
				<td class="tb_cobertura_cobertura" style="background-color:#dadada; text-align:left; padding: 15px;" colspan="2">Adiantamento de Fiança</td>
				<td>*****</td>
				<td>*****</td>
				<td>$ 12.000,00</td>
				<td>$ 12.000,00</td>
				<td>$ 12.000,00</td>
			</tr>	
			<tr class="tr_hover1">
				<td class="tb_cobertura_cobertura" style="background-color:#ededed; text-align:left; padding: 15px;" colspan="2">Adiantamento de Fundos no Exterior</td>
				<td>*****</td>
				<td>*****</td>
				<td>$ 3.000,00</td>
				<td>$ 3.500,00</td>
				<td>$ 5.000,00</td>
			</tr>	
			<tr class="tr_hover2">
				<td class="tb_cobertura_cobertura" style="background-color:#dadada; text-align:left; padding: 15px;" colspan="2">Assistência Jurídica em acidente de trânsito</td>
				<td>*****</td>
				<td>*****</td>
				<td>$ 1.500,00</td>
				<td>$ 1.500,00</td>
				<td>$ 2.000,00</td>
			</tr>	
			<tr class="tr_hover1">
				<td class="tb_cobertura_cobertura" style="background-color:#ededed; text-align:left; padding: 15px;" colspan="2">Cancelamento de Viagem Premium **</td>
				<td>*****</td>
				<td>*****</td>
				<td>$ 20.000,00</td>
				<td>$ 20.000,00</td>
				<td>$ 20.000,00</td>
			</tr>															
		</table>	
		<div class="informacoes_adicionais">
			<div>
			* Esta Cobertura somente incidirá após o esgotamento do Capital Segurado da Cobertura Básica de Despesas Médico-Hospitalares em Viagem ao exterior.						
			</div>	
			<div>
			** Cobertura de contratação opcional.						
			</div>	
		</div>
		<div id="editor"></div>									
      </div>
      <div class="modal-footer">
        <!-- <button type="button" class="btn btn-primary" id="btn-print-pdf">PDF</button> -->
        <button type="button" class="btn btn-white" data-dismiss="modal">Voltar</button>
      </div>
    </div>
  </div>
</div>


<!--
<section class="fto-section fto-counter ftco-animate" id="section-counter">
	<div class="container">
		<div class="row">
			<div class="col-md-3">
				<div class="block-18 text-center">
					<div class="text">
						<h3><strong class="number" data-number="9.7">9,7</strong></h3>
						<div>
							<span>Mil profissionais</span>
						</div>	
					</div>	
				</div>	
			</div>	
		</div>							
	</div>	
</section> 		
-->							

<script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script> 
<script src="<?=$scripts_url?>/pt-br.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/locales/bootstrap-datepicker.pt-BR.min.js"></script>
<script src="<?=$scripts_url?>/home.js"></script>
<script src="<?=$template_url?>/js/jquery.animateNumber.min.js"></script>
<script src="<?=$vendor?>/masked-input/dist/jquery.maskedinput.min.js"></script>
<script src="<?=$vendor?>/jquery-validation/jquery.validate.min.js"></script>
<?= $this->endsection()?>






