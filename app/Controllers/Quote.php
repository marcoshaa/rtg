<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Libraries\ConexaoOmint;
use App\Libraries\Uuid;

class Quote extends BaseController
{

    private $template = 'vegefoods';
    private $session;

    public function __construct(){

        $this->session = session()->get();

        //echo '<pre>'; print_r($this->session);

        if (!isset($this->session)) {
            return redirect()->to(site_url());
        }
		
    }

    public function getquote()
    {
        $data['template_url'] = base_url("/assets/$this->template/");
        $data['scripts_url'] = base_url("/assets/js/");
        $data['actionQuote'] = site_url("/quote/selproduct/");
        $data['contato'] = site_url('contact');
        $data['voltar'] = site_url();
        $data['addoptional'] = site_url('quote/optional/');
        $data['coberturas'] = site_url('insurance/getinsurancebyproductid/');
        $data['urlproductdetail'] = site_url('product/getproductdetail/');
        $data['removeoptional'] = site_url('quote/removeoptional');
        $data['actionidentificacao'] = site_url('quote/identification/');
        $data['username'] = (isset($this->session['user']) ? $this->session['user'] : null) ;
        $data['user_id'] = (isset($this->session['user_id']) ? $this->session['user_id'] : null);

        // Recupando os parametros enviados para a cotação
        $post = $this->request->getPost();

        //$periodo = $this->ajustaPeriodo($post['periodo']);

        $start_date = implode("-",array_reverse(explode("/",$post['start_date'])));
        $end_date = implode("-",array_reverse(explode("/",$post['end_date'])));
        
        //return $retorno;

        //Cálculo do número de dias entre a saída e o retorno
        $data_inicio = date_create($start_date);
        $data_fim = date_create($end_date);
        $diff = date_diff($data_inicio,$data_fim);

        $data['travel_reason'] = $post['travel_reason'];
        $data['destiny'] = $post['destiny'];
        $data['start_date'] = $start_date;
        $data['end_date'] = $end_date;
        $data['nroofdays'] = $diff->format("%a");
        $data['paxsquote'] = $post['paxs'];
        $data['esportesamador'] = $post['esportesamador'];

        // Vai preparar os dados para realizar a busca na omint
        $dados_omint = $this->preparaDadosCotacao($data);

        $result = ConexaoOmint::getCotacaoViagem($dados_omint);

        //echo '<pre>'; print_r(json_encode($result));

        if ($result!=null){
            $data['result_data'] = $this->formatdataresult($result);

            $data['cambiocotacao'] = $data['result_data']['cambiocotacao'];

            //echo '<pre>'; print_r($data['result_data']);

            return view("$this->template/listaprodutos", $data);

        } else {
            //echo json_encode(array('status'=>0,'mensagem'=>'Houve algum problema ao realizar a cotação'));
        }

    }

    public function removeoptional(){

        $post = $this->request->getPost();

        $leadModel = new \App\Models\LeadModel();
        $Lead = new \App\Entities\Lead;
        $LeadOptionalModel = new \App\Models\LeadOptionalModel();

        $LeadOptionalModel->where('id',$post['id'])->delete();

        // Atualizando valor total da lead
        $this->updatetotalLead($post['lead_id']);

        $dataresumo['resumo_pedido'] = $this->GetResumoPedido($post['lead_id']);

        // Preparando dados dos opcionais
        echo json_encode(array('status'=>1, 'resumo'=>view("$this->template/resumolead", $dataresumo)));

    }

    public function identification(){

        // Recupando os parametros enviados
        $post = $this->request->getPost();

        if (isset($this->session['user_id'])) {

            return redirect()->to(site_url('/request/viajantes/'.$post['lead_id']));

        } else {

            $data['template_url'] = base_url("/assets/$this->template/");
            $data['scripts_url'] = base_url("/assets/js/");
            $data['contato'] = site_url('contact');
            $data['lead_id'] = (isset($post['lead_id']) ? $post['lead_id'] : '');
            $data['actionlogin'] = site_url('security/login/');
            $data['actioncadastro'] = site_url('quote/register/');
            $data['username'] = (isset($this->session['user']) ? $this->session['user'] : null) ;
            $data['user_id'] = (isset($this->session['user_id']) ? $this->session['user_id'] : null);
            $data['mensagem'] = '';

            return view("$this->template/identificacao", $data);

        }
        
    }

    public function register(){
       // Recupando os parametros enviados
       $post = $this->request->getPost();

       $data['template_url'] = base_url("/assets/$this->template/");
       $data['scripts_url'] = base_url("/assets/js/");
       $data['contato'] = site_url('contact');
       $data['vendor'] = base_url("/assets/vendor/");
       $data['lead_id'] = $post['lead_id_cadastro'];
       $data['voltar'] = site_url();
       $data['actionlogin'] = site_url('security/login/');
       $data['actionregister'] = site_url('customer/register/');
       $data['urlcidade'] = site_url('city/getcitybycode/');
       $data['urlvalidacode'] = site_url('customer/checkcode/');
       $data['urlvalidaemail'] = site_url('customer/checkemail/');
       $data['username'] = (isset($this->session['user']) ? $this->session['user'] : null) ;
       $data['user_id'] = (isset($this->session['user_id']) ? $this->session['user_id'] : null);

       return view("$this->template/register", $data);
    }

    public function actionQuote(){

        // Recupando os parametros enviados
        $post = $this->request->getPost();

        echo json_encode($post);

    }

    public function selproduct(){

        // Recupando os parametros enviados
        $post = $this->request->getPost();

        $leadModel = new \App\Models\LeadModel();
        $Lead = new \App\Entities\Lead;

        $post['id'] = Uuid::getUuid();
        $post['status'] = 0;
        
        // Parseando dados do request para a entidade
        $Lead->fill($post);

        // Salvando dados da lead
        if ($leadModel->insert($Lead)==0){

            $dataoptional['product_id'] = $post['product_id'];
            $dataoptional['lista_opcionais'] = json_decode(json_decode($post['optional']),true);

            // Buscados da Lead
            $dataresumo['resumo_pedido'] = $this->GetResumoPedido($Lead->id);

            //echo '<pre>'; print_r($dataresumo['resumo_pedido']);

            $opcionais = false;
            if (!empty($dataoptional['lista_opcionais'])){
                $opcionais = view("$this->template/listaopcionais", $dataoptional);
            }

            // Preparando dados dos opcionais
            echo json_encode(array('status'=>1, 'lead'=>$Lead, 'opcionais'=>$opcionais, 'resumo'=>view("$this->template/resumolead", $dataresumo)));

        } else {

        }
        

    }

    private function GetResumoPedido($id){

        $db = db_connect();

        $builder = $db->table('lead');
        $builder->select('lead.id,lead.id as lead_id,prod.id as product_id,prod.name,prod.agetext,lead.nroofdays,lead.paxquote,lead.paxseniorquote,price, (price * paxquote) as total, 0 as optional');
        $builder->join('product prod','lead.product_id=prod.id');
        $builder->where(array('lead.id'=>$id));

        $query = $builder->get();
        $lista_produtos = $query->getResultArray();

        //Lista optionais
        $builder = $db->table('lead_optional');
        $builder->select('lead_optional.id,lead_id, product_id, prod.name,null as agetext,null as nroofdays,paxs as paxquote,null as paxseniorquote,total as price,total,1 as optional');
        $builder->join('product prod','lead_optional.product_id=prod.id');
        $builder->where(array('lead_id'=>$id));
        $query = $builder->get();

        $lista_opcionais = $query->getResultArray();

        if ($lista_opcionais!=null){
            foreach($lista_opcionais as $opcional){
                array_push($lista_produtos,$opcional);
            }
        }

        //echo '<pre>'; print_r($lista_produtos);

        if ($query){
            return $lista_produtos;
        } else {
            return null;
        }

    }

    public function optional(){

        // Recupando os parametros enviados
        $post = $this->request->getPost();

        $ProductModel = new \App\Models\ProductModel;
        $LeadOptionalModel = new \App\Models\LeadOptionalModel;
        $LeadOptional = new \App\Entities\LeadOptional;

        $post['id'] = Uuid::getUuid();

        // Recuperando dados do produto
        $product  = $ProductModel->where('code',$post['code'])->find();

        $post['product_id'] = $product[0]['id'];
        $post['total'] = $post['unitprice'];
        
        $LeadOptional->fill($post);

        if ($LeadOptionalModel->insert($LeadOptional)==0){

            // Atualizando valor total da lead
            $this->updatetotalLead($post['lead_id']);

            // Buscados da Lead
            $dataresumo['resumo_pedido'] = $this->GetResumoPedido($post['lead_id']);

            //echo '<pre>'; print_r($dataresumo);

            // Preparando dados dos opcionais
            echo json_encode(array('status'=>1, 'resumo'=>view("$this->template/resumolead", $dataresumo)));

        } else {

        }

        //echo '<pre>'; print_r($post);

        //$data['lead_id'] = $post['id'];
    }

    private function updatetotalLead($id){
        
        $price_optional = 0;

        $Lead  = new \App\Entities\Lead();
        $LeadModel = new \App\Models\LeadModel();
        $leadOptionalModel = new \App\Models\LeadOptionalModel();

        $lista_optional  = $leadOptionalModel->where('lead_id',$id)->find();

        foreach($lista_optional as $optional){
            $price_optional += floatVal($optional->total);
        }

        $Lead->id = $id;
        $Lead->price_optional = $price_optional;
        $LeadModel->save($Lead);

    }

    private function preparaDadosCotacao($dados){

        $sessionid = ConexaoOmint::getSession();

        // Verificar com a Omint quais são os tipos de produtos disponiveis. Fixei VI para testes
        $codigotipoproduto = 'VI';
        if ($dados['destiny']=='BR') {
            $codigotipoproduto = 'VN';
        }

        if ($sessionid!=null){
            $dadoscotacao['SessionID'] = $sessionid;
            $dadoscotacao['screenIdentification'] = 'SASFT0025';
            $dadoscotacao['Parameters'][] = ['parametername'=>'CodigoDestino','parametervalue'=>$dados['destiny']];
            $dadoscotacao['Parameters'][] = ['parametername'=>'CodigoMotivoViagem','parametervalue'=>$dados['travel_reason']];
            $dadoscotacao['Parameters'][] = ['parametername'=>'IncluiEuropa','parametervalue'=>'0'];
            $dadoscotacao['Parameters'][] = ['parametername'=>'DataInicioViagem','parametervalue'=>$dados['start_date']];
            $dadoscotacao['Parameters'][] = ['parametername'=>'DataFinalViagem','parametervalue'=>$dados['end_date']];
            $dadoscotacao['Parameters'][] = ['parametername'=>'QtdePassSenior','parametervalue'=>0];
            $dadoscotacao['Parameters'][] = ['parametername'=>'QtdePassNaoSenior','parametervalue'=>$dados['paxsquote']];
            $dadoscotacao['Parameters'][] = ['parametername'=>'CupomDesconto','parametervalue'=>''];
            $dadoscotacao['Parameters'][] = ['parametername'=>'DiasMultiviagem','parametervalue'=>'0'];
            $dadoscotacao['Parameters'][] = ['parametername'=>'CodigoTipoProduto','parametervalue'=>$codigotipoproduto];
            $dadoscotacao['Parameters'][] = ['parametername'=>'DataCotacaoMoeda','parametervalue'=>date('Y-m-d')];
            $dadoscotacao['Parameters'][] = ['parametername'=>'Canal1','parametervalue'=>'FTE'];
            $dadoscotacao['Parameters'][] = ['parametername'=>'Canal2','parametervalue'=>'TEXTO LIVRE'];
            $dadoscotacao['Parameters'][] = ['parametername'=>'Usuario','parametervalue'=>'vanderson.ramos@grupoaguia.com.br'];
            $dadoscotacao['Parameters'][] = ['parametername'=>'Agencia','parametervalue'=>'TEXTO LIVRE'];
        }

        return $dadoscotacao;

    }

    private function formatdataresult($data){

        // Busco na base a lista de produtos
        $productModel = new \App\Models\ProductModel();
        $lista_produtos = $productModel->find();

        //echo '<pre>'; print_r($lista_produtos);

        //Organiza lista de produtos
        foreach($lista_produtos as $item){
            $lista_organizada[$item['code']]['id'] = $item['id'];
            $lista_organizada[$item['code']]['description'] = $item['description'];
            $lista_organizada[$item['code']]['label'] = $item['label'];
            $lista_organizada[$item['code']]['text'] = $item['text'];
            $lista_organizada[$item['code']]['agetext'] = $item['agetext'];
        }

        //echo '<pre>'; print_r($lista_organizada);

        $dados_array = json_decode(json_encode($data), true);

        $produtoColuna = 0;

        // Preparando produtos
        foreach($dados_array as $item){

            foreach($item as $array){

                if ($array['NomeLista']=='PRODUTOS'){
                    $produtoColuna++;
                    // Preparando produtos
                    if (isset($lista_organizada[$array['CodigoProduto']])){
                        $array['id'] = $lista_organizada[$array['CodigoProduto']]['id'];
                        $array['produto_coluna'] = $produtoColuna;
                        $array['description'] = $lista_organizada[$array['CodigoProduto']]['description'];
                        $array['label'] = $lista_organizada[$array['CodigoProduto']]['label'];
                        $array['text'] = $lista_organizada[$array['CodigoProduto']]['text'];
                        $array['agetext'] = $lista_organizada[$array['CodigoProduto']]['agetext'];
                        $lista_produto[$array['CodigoProduto']] = $array;
                    }    
                }

                // Preparando Coberturdas
                if ($array['NomeLista']=='COBERTURAS'){
                    $lista_coberturas[] = $array;
                }

                // Preparando Coberturdas adicionais
                if ($array['NomeLista']=='COBERTURASADICIONAIS'){
                    $lista_coberturas_adicionais[] = $array;
                }

                // Preparando opcionais
                if ($array['NomeLista']=='COBERTURASOPCIONAIS'){
                    $lista_produto[$array['CodigoProduto']]['opcionais'][] = $array;
                }

                // Preparando parcelas
                if ($array['NomeLista']=='PRODUTOSPARCELAS'){
                    $lista_produto[$array['CodigoProduto']]['parcelas'][] = $array;
                }

                // Preparando produtos dolar
                if ($array['NomeLista']=='PRODUTOSDOLAR'){
                    $lista_produto[$array['CodigoProduto']]['produtosdolar'][] = $array;
                } 

            }

        }

        // Recupero o câmbio da busca de preços
        $câmbio = $this->getCambioDolarEmissao($lista_produto);

        //echo '<pre>'; print_r($lista_produto);
        //echo '<pre>'; print_r($lista_coberturas);

        $array_retorno['produtos'] = $lista_produto;
        //$array_retorno['coberturas'] = $this->formaCoberturaProduto($lista_coberturas);
        $array_retorno['coberturas'] = $lista_coberturas;
        $array_retorno['adicionais'] = (isset($lista_coberturas_adicionais) ? $lista_coberturas_adicionais : []);
        $array_retorno['cambiocotacao'] = $câmbio;

        //echo '<pre>'; print_r($array_retorno);

        return $array_retorno;

    }

    private function getCambioDolarEmissao($dados){

        // Recupero o câmbio utilizado para cálculo do primeiro produto
        foreach($dados as $k=>$item){
            $cambiocotacao = $item['produtosdolar'][0]['ValorDolar'];
            break;
        }

        return $cambiocotacao;

    }

    private function ajustaPeriodo($periodo){

        $data1 = str_replace('/','-',substr($periodo,0,10));
        $data2 = str_replace('/','-',substr($periodo,12,11));

        $retorno['start_date'] = date('Y-m-d',strtotime($data1));
        $retorno['end_date'] = date('Y-m-d',strtotime($data2));
        
        return $retorno;

    }

}


