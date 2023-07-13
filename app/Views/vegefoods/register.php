<?= $this->extend('default') ?>

	<?= $this->section('content')?>

    <link rel="stylesheet" href="<?=$template_url?>/css/progress.css">

    <style>
       .error{
             color:red
       }
    </style>

    <section class="ftco-section" style="padding: 1em; margin-bottom:120px;">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-12 heading-section ftco-animate">
                    <hr />
                    <h4 class="mb-4 text-center" id="title-page">MEU CADASTRO</h4>
                        <form id="form-register" accept-charset="UTF-8" role="form" action="<?=$actionregister;?>" method="post"> 
                            <input type="hidden" id="lead_id" name="lead_id" value="<?=$lead_id;?>"/>   
                            <input type="hidden" id="urlvalidacode" value="<?=$urlvalidacode;?>"/>             
                            <input type="hidden" id="urlvalidaemail" value="<?=$urlvalidaemail;?>"/>             
                            <input type="hidden" id="voltar" value="<?=$voltar;?>"/>   
                            <fieldset>
                                <div class="row">
                                    <div class='col-md-4'>
                                        <div class="form-group">
                                            <label for="type" class="control-label">Pessoa física/jurídica</label>
                                            <select name="type" id="type" class="form-control" required>
                                                <option value="F">Pessoa física</option>
                                                <option value="J">Pessoa jurídica</option>
                                            </select>    
                                        </div>
                                    </div>    
                                    <div class="col-md-4">
                                        <div class="form-group">
                                        <label for="type" class="control-label" id="label_nomecompleto">Nome Completo</label>
                                            <input class="form-control" placeholder="Nome completo" id="name" name="name" type="text" value="" required>
                                        </div>
                                    </div>  
                                    <div class="col-md-4">
                                        <div class="form-group" id="div_razaosocial">
                                            <label for="bussinessname" class="control-label">Razão social</label>
                                            <input class="form-control" placeholder="Razão social" id="bussinessname" name="bussinessname" type="text" value="">
                                        </div>
                                        <div class="form-group" id="div_dtnascimento">
                                            <label for="bussinessname" class="control-label">Data de Nascimento</label>
                                            <input class="form-control" id="birthdate" name="birthdate" type="text" autocomplete = "off" value="">
                                        </div>
                                    </div>     
                                </div>  
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="code" class="control-label" id="label_cpf">CPF</label>
                                            <input class="form-control" placeholder="CPF" id="code" name="code" type="text" value="" required>
                                        </div>
                                    </div>  
                                    <div class="col-md-4">
                                        <div class="form-group" id="div_genero">
                                            <label for="genre" class="control-label">Sexo</label>
                                            <select name="genre" id="genre" class="form-control">
                                                <option value="-1">Selecione</option>
                                                <option value="F">Feminino</option>
                                                <option value="M">Masculino</option>
                                            </select>    
                                        </div>
                                    </div>               
                                    <div class="col-md-4">
                                        <div class="form-group" id="div_ppe">
                                            <label for="ppe" class="control-label" id="label_ppe">Pessoa politicamente exposta ?</label>
                                            <div>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" name="ppe" id="inlineRadio1" value="S" required>
                                                    <label class="form-check-label" for="inlineRadio1">Sim</label>
                                                </div>    
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" name="ppe" id="inlineRadio1" value="N" required>
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
                                            <input class="form-control" placeholder="CEP" id="zipcode" name="zipcode" type="text" value="" data-url="<?=$urlcidade;?>" required>
                                        </div>
                                    </div>  
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="address" class="control-label">Endereço</label>
                                            <input class="form-control" placeholder="Endereço" id="address" name="address" type="text" value="" required>
                                        </div>
                                    </div>   
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <label for="address_nro" class="control-label">Número</label>
                                            <input class="form-control" placeholder="Número" id="address_nro" name="address_nro" type="text" value="">
                                        </div>
                                    </div>      
                                </div>   
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="complement" class="control-label">Complemento</label>
                                            <input class="form-control" placeholder="Complemento" id="complement" name="complement" type="text" value="">
                                        </div>    
                                    </div>    
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="district" class="control-label">Bairro</label>
                                            <input class="form-control" placeholder="Bairro" id="district" name="district" type="text" value="" required>
                                        </div>    
                                    </div>   
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="city_id" class="control-label">Cidade</label>
                                            <select name="city_id" id="city_id" class="form-control ">
                                            </select>    
                                        </div>    
                                    </div>                                                                           
                                </div> 
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="phone" class="control-label">Telefone</label>
                                            <input class="form-control" placeholder="Telefone" id="phone" name="phone" type="text" value="" required>
                                        </div>    
                                    </div>  
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="email" class="control-label">E-mail (este será seu e-mail de acesso)</label>
                                            <input class="form-control" placeholder="E-mail" id="email" name="email" type="email" value="" required>
                                        </div>    
                                    </div>    
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="email_retypee" class="control-label">Confirmar e-mail</label>
                                            <input class="form-control" placeholder="Confirmar E-mail" id="email_retype" name="email_retype" type="email" value="" required>
                                        </div>    
                                    </div>    
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="password" class="control-label">Senha</label>
                                            <!-- <input class="form-control" placeholder="Senha" id="password" name="password" type="password" value="" onkeyup="javascript:verifica()" required> -->
                                            <input class="form-control" placeholder="Senha" id="password" name="password" type="password" value="" required>
                                        </div>    
                                    </div>    
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="password-retype" class="control-label">Confirma senha</label>
                                            <input class="form-control" placeholder="Confirmar senha" id="password_retype" name="password_retype" type="password" value="" required>
                                        </div>    
                                    </div> 
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="mostra" class="control-label">&nbsp;</label>
                                            <div id="mostra"></div>
                                        </div>    
                                    </div>                                      
                                </div>         
                                <div class="float-left">
                                <input class="btn btn-secondary float-right" type="button" id="btn-voltar" value="Voltar">
                                </div>            
                                <input class="btn btn-primary float-right" type="submit" value="Continuar">
                            </fieldset>
                        </form>   
                </div>
            </div>     
        </div>   		
    </section>

    <script src="<?=$scripts_url?>/register.js"></script>
    <script src="<?=$scripts_url?>/valida_cpf_cnpj.js"></script>
    <script src="<?=$vendor?>/masked-input/dist/jquery.maskedinput.min.js"></script>
    <script src="<?=$vendor?>/jquery-validation/jquery.validate.min.js"></script>
<?= $this->endsection()?>