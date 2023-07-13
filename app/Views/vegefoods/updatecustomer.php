<?= $this->extend('default') ?>

	<?= $this->section('content')?>

    <link rel="stylesheet" href="<?=$template_url?>/css/progress.css">

    <style>
       .error{
            color:red
        }
        select[readonly] {
            background: #eee; /*Simular campo inativo - Sugestão @GabrielRodrigues*/
            pointer-events: none;
            touch-action: none;
        }
        .inputreadnonly{
            background: #eee; /*Simular campo inativo - Sugestão @GabrielRodrigues*/
        }
    </style>

    <section class="ftco-section" style="padding: 1em; margin-bottom:120px;">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-12 heading-section ftco-animate">
                    <hr />
                    <h4 class="mb-4 text-center" id="title-page">MEU CADASTRO</h4>
                        <form id="form-register" accept-charset="UTF-8" role="form" method="post"> 
                            <input type="hidden" id="id" name="id" value="<?=$customer['id'];?>"/>   
                            <input type="hidden" id="urlvalidacode" value="<?=$urlvalidacode;?>"/>             
                            <input type="hidden" id="urlvalidaemail" value="<?=$urlvalidaemail;?>"/>             
                            <input type="hidden" id="voltar" value="<?=$voltar;?>"/>   
                            <input type="hidden" id="action" value="<?=$actionregister;?>"/>   
                            <fieldset>
                                <div id="msg"></div>
                                <div class="row">
                                    <div class='col-md-4'>
                                        <div class="form-group">
                                            <label for="type" class="control-label">Pessoa física/jurídica</label>
                                            <select name="type" id="type" class="form-control inputreadnonly" required readonly="readonly">
                                                <option value="F" <?=($customer['type']=='F' ? 'selected' : '');?>>Pessoa física</option>
                                                <option value="J" <?=($customer['type']=='J' ? 'selected' : '');?>>Pessoa jurídica</option>
                                            </select>    
                                        </div>
                                    </div>    
                                    <div class="col-md-4">
                                        <div class="form-group">
                                        <label for="type" class="control-label" id="label_nomecompleto">Nome Completo</label>
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
                                            <input class="form-control" id="birthdate" name="birthdate" type="text" autocomplete = "off" value="<?=date("d/m/Y",strtotime($customer['birthdate']));?>">
                                        </div>
                                    </div>     
                                </div>  
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="code" class="control-label" id="label_cpf">CPF</label>
                                            <input class="form-control inputreadnonly" placeholder="CPF" id="code" name="code" type="text" value="<?=$customer['code'];?>" required  readonly="readonly">
                                        </div>
                                    </div>  
                                    <div class="col-md-4">
                                        <div class="form-group" id="div_genero">
                                            <label for="genre" class="control-label">Sexo</label>
                                            <select name="genre" id="genre" class="form-control">
                                                <option value="-1">Selecione</option>
                                                <option value="F" <?=($customer['genre']=='F' ? 'selected' : '');?>>Feminino</option>
                                                <option value="M" <?=($customer['genre']=='M' ? 'selected' : '');?>>Masculino</option>
                                            </select>    
                                        </div>
                                    </div>               
                                    <div class="col-md-4">
                                        <div class="form-group" id="div_ppe">
                                            <label for="ppe" class="control-label" id="label_ppe">Pessoa politicamente exposta ?</label>
                                            <div>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" name="ppe" id="inlineRadio1" value="S" <?=($customer['ppe']=='S' ? 'checked' : '');?> required>
                                                    <label class="form-check-label" for="inlineRadio1">Sim</label>
                                                </div>    
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" name="ppe" id="inlineRadio1" value="N" <?=($customer['ppe']=='N' ? 'checked' : '');?> required>
                                                    <label class="form-check-label" for="inlineRadio1">Não</label>
                                                </div>   
                                                <span class="d-inline-block" tabindex="0">
                                                    <i class="fas fa-question-circle fa-2x" data-toggle="tooltip" data-placement="top" title="São consideradas pessoas politicamente expostas os agentes públicos, que desempenham ou tenham desempenhado, nos cinco anos anteriores (no Brasil ou em países e dependências estrangeiras), cargos, empregos ou funções públicas relevantes. Familiares (parentes da pessoa politicamente exposta, na linha direta, até o primeiro grau, cônjuge, o companheiro, a companheira, o enteado, a enteada) e pessoas de relacionamento próximo também serão consideradas politicamente expostas. (Definição com base na circular da SUSEP 445/12)"></i>
                                                </span>
                                            </div>     
                                        </div>
                                    </div>      
                                </div>   
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="zipcode" class="control-label">CEP</label>
                                            <input class="form-control" placeholder="CEP" id="zipcode" name="zipcode" type="text" value="<?=$customer['zipcode'];?>" data-url="<?=$urlcidade;?>" required>
                                        </div>
                                    </div>  
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="address" class="control-label">Endereço</label>
                                            <input class="form-control" placeholder="Endereço" id="address" name="address" type="text" value="<?=$customer['address'];?>" required>
                                        </div>
                                    </div>   
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <label for="address_nro" class="control-label">Número</label>
                                            <input class="form-control" placeholder="Número" id="address_nro" name="address_nro" type="text" value="<?=$customer['address_nro'];?>">
                                        </div>
                                    </div>      
                                </div>   
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="complement" class="control-label">Complemento</label>
                                            <input class="form-control" placeholder="Complemento" id="complement" name="complement" type="text" value="<?=$customer['complement'];?>">
                                        </div>    
                                    </div>    
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="district" class="control-label">Bairro</label>
                                            <input class="form-control" placeholder="Bairro" id="district" name="district" type="text" value="<?=$customer['district'];?>" required>
                                        </div>    
                                    </div>   
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="city_id" class="control-label">Cidade</label>
                                            <select name="city_id" id="city_id" class="form-control">
                                                <?php if ($customer['city_id']!='') {?>
                                                    <option value="<?=$customer['city_id'];?>" selected><?=$customer['cidade'];?></option>
                                                <?php } ?>	
                                            </select>    
                                        </div>    
                                    </div>                                                                           
                                </div> 
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="phone" class="control-label">Telefone</label>
                                            <input class="form-control" placeholder="Telefone" id="phone" name="phone" type="text" value="<?=$customer['phone'];?>" required>
                                        </div>    
                                    </div>                             
                                </div>         
                                <div class="float-left">
                                <input class="btn btn-secondary float-right" type="button" id="btn-voltar" value="Voltar">
                                </div>            
                                <input class="btn btn-primary float-right" type="button" id="btn-salvar" value="Continuar">
                            </fieldset>
                        </form>   
                </div>
            </div>     
        </div>   		
    </section>

    <script src="<?=$scripts_url?>/updateregister.js"></script>
    <script src="<?=$scripts_url?>/valida_cpf_cnpj.js"></script>
    <script src="<?=$vendor?>/masked-input/dist/jquery.maskedinput.min.js"></script>
    <script src="<?=$vendor?>/jquery-validation/jquery.validate.min.js"></script>
<?= $this->endsection()?>