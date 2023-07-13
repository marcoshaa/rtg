<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use PhpOffice\PhpSpreadsheet\Spreadsheet; 
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

use \App\Entities\Request as RequestEntity;
use \App\Models\RequestModel;
use \App\Entities\RequestPax;
use \App\Models\RequestPaxModel;
use \App\Models\DestinyModel;

class Request extends BaseController
{
    private $session;

    public function __construct(){

        $this->session = session()->get();
		
    }

    public function index(){

        $data['scripts_url'] = base_url("/assets/js/");
        $data['vendor'] = base_url("/assets/vendor/");
        $data['template_url'] = base_url("/assets/");
        $data['urlgetrequest'] = site_url('request/getlistapedidos');
        $data['viewticket'] = site_url('/request/viewticket/');
        $data['data_inicial'] = date('Y-m-d', strtotime('-7 days'));
        $data['data_final'] = date('Y-m-d', strtotime('+0 days'));
        
        return view("consulta/pedidos/index", $data);

    }

    public function paxs(){

        $data['scripts_url'] = base_url("/assets/js/");
        $data['contato'] = site_url('contact');
        $data['vendor'] = base_url("/assets/vendor/");
        $data['template_url'] = base_url("/assets/");
        $data['urlgetrequest'] = site_url('request/getListaPaxs/');
        $data['urlgetexport'] = site_url('request/exportexcel/');
        $data['viewticket'] = site_url('/request/viewticket/');

        $data['data_inicial'] = date('Y-m-d', strtotime('-7 days'));
        $data['data_final'] = date('Y-m-d', strtotime('+0 days'));
        
        return view("consulta/paxs/index", $data);
    }

    public function getlistapedidos($tiporetorno = ''){

        $post = $this->request->getPost();

        $data_inicial = $post['request_date_ini'];
        $data_final = $post['request_date_fim'];
        $travel_reason = $post['travel_reason'];
        $start_inicial = $post['start_date_ini'];
        $start_final = $post['start_date_fim'];
        $end_inicial = $post['end_date_ini'];
        $end_final = $post['end_date_fim'];
        $customer = $post['customer'];
        $request_number = $post['request_number'];
        $ticket_number = $post['ticket_number'];
        $document = $post['document'];
        $status = $post['status'];
        $destiny = $post['destiny'];

        $filtroInicial = [];

        if (!empty($data_inicial)) array_push($filtroInicial,array('request_date >=' => $data_inicial));
        if (!empty($data_final)) array_push($filtroInicial,array('request_date <=' => $data_final));
        if (!empty($start_inicial)) array_push($filtroInicial,array('start_date >=' => $start_inicial));
        if (!empty($start_final)) array_push($filtroInicial,array('start_date <=' => $start_final));
        if (!empty($end_inicial)) array_push($filtroInicial,array('end_date >=' => $end_inicial));
        if (!empty($end_final)) array_push($filtroInicial,array('end_date <=' => $end_final));
        if (!empty($document)) array_push($filtroInicial,array('customer.code' => $document));
        if ($travel_reason != -1) array_push($filtroInicial,array('travel_reason_id' => $travel_reason));
        if ($status != -1) array_push($filtroInicial,array('request.status' => $status));
        if ($destiny != -1) array_push($filtroInicial,array('request.destiny_id' => $destiny));

        $lista_pedidos = $this->getPedidos($filtroInicial,$customer,$request_number,$ticket_number);

        if ($tiporetorno == ''){

            $dados['lista_pedidos'] = $lista_pedidos;
            $tabela = view("consulta/pedidos/lista_pedidos", $dados);

            $resposta_json = array('status'=>1,'tabela' => $tabela);

            echo json_encode($resposta_json);

        } else {

            $fileName = 'pedidos.xlsx';  
            $spreadsheet = new Spreadsheet();
       
            $sheet = $spreadsheet->getActiveSheet();
            $sheet->setCellValue('A1', 'Nº Pedido');
            $sheet->setCellValue('B1', 'Data do Pedido');
            $sheet->setCellValue('C1', 'Nº da Apólice');
            $sheet->setCellValue('D1', 'Embarque');
            $sheet->setCellValue('E1', 'Retorno');
            $sheet->setCellValue('F1', 'Nº de dias');
            $sheet->setCellValue('G1', 'Cliente');
            $sheet->setCellValue('H1', 'Pacote');
            $sheet->setCellValue('I1', 'Paxs');       
            $sheet->setCellValue('J1', 'Total');
            $sheet->setCellValue('K1', 'Comissão Nest');
            $sheet->setCellValue('L1', 'Comissão B2B');
            $sheet->setCellValue('M1', 'Net');
            $sheet->setCellValue('N1', 'Situação');
            $rows = 2;
       
            foreach ($lista_pedidos as $item){
                $sheet->setCellValue('A' . $rows, $item['request_number']);
                $sheet->setCellValue('B' . $rows, date('d/m/Y',strtotime($item['request_date'])));
                $sheet->setCellValue('C' . $rows, $item['ticket_number']);
                $sheet->setCellValue('D' . $rows, date('d/m/Y',strtotime($item['start_date'])));
                $sheet->setCellValue('E' . $rows, date('d/m/Y',strtotime($item['end_date'])));
                $sheet->setCellValue('F' . $rows, $item['nroofdays']);
                $sheet->setCellValue('G' . $rows, $item['customer']);
                $sheet->setCellValue('H' . $rows, $item['product']);
                $sheet->setCellValue('I' . $rows, $item['paxs']);
                $sheet->setCellValue('J' . $rows, $item['amount']);
                $sheet->setCellValue('K' . $rows, $item['commission_nest']);
                $sheet->setCellValue('L' . $rows, $item['commission_b2b']);
                $sheet->setCellValue('M' . $rows, $item['net']);

                switch ($item['status']) {
                    case 0:
                        $sheet->setCellValue('N' . $rows, 'Pedido Cancelado');
                        break;
                    case 1:
                        $sheet->setCellValue('N' . $rows, 'Pedido aberto');
                        break;    
                    case 2:
                        $sheet->setCellValue('N' . $rows, 'Parcialmente emitido');
                        break;                            
                    case 3:
                        $sheet->setCellValue('N' . $rows, 'Emitido');
                        break;      
                    default:
                        break;                                          
                }

                $rows++;
            } 
            $writer = new Xlsx($spreadsheet);
            $writer->save($fileName);

            header("Content-Type: application/vnd.ms-excel");
            header("Content-Disposition: attachment; filename=".basename($fileName));
            header('Expires: 0');
            header('Cache-Control: must-relative');
            header('Pragma: public');
            header('Content-Length:' . filesize($fileName));
            ob_clean();

            flush();
            readfile($fileName);
            exit;

        }

    }

    private function getPedidos($filtro,$customer,$request_number,$ticket_number){

        $db = db_connect();

        $builder = $db->table('request');
        $builder->select('request.id,request_date,request_number,ticket_number, customer.name as customer, start_date, end_date, nroofdays, paxs, product.name as product, amount , commission_nest, commission_b2b, net, request.status, request.integrated');
        $builder->join('customer','request.customer_id=customer.id');
        $builder->join('request_item','request_item.request_id=request.id and request_item.optional=0');
        $builder->join('product','product.id=request_item.product_id');

        foreach($filtro as $where){
            $builder->where($where);
        }

        $builder->like('customer.name',$customer);
        $builder->like('request_number',$request_number);

        if (!empty($ticket_number)){
            $builder->like('ticket_number',$ticket_number);
        }
        
        $builder->orderBy('request_date','desc');

        $query = $builder->get();

        return $query->getResultArray();

    }

    public function getListaPaxs($tiporetorno = ''){

        $post = $this->request->getPost();

        $data_inicial = $post['request_date_ini'];
        $data_final = $post['request_date_fim'];
        $travel_reason = $post['travel_reason'];
        $start_inicial = $post['start_date_ini'];
        $start_final = $post['start_date_fim'];
        $end_inicial = $post['end_date_ini'];
        $end_final = $post['end_date_fim'];
        $customer = $post['customer'];
        $request_number = $post['request_number'];
        $ticket_number = $post['ticket_number'];
        //$pax_name = $post['pax_name'];
        $status = $post['status'];

        $filtroInicial = [];

        if (!empty($data_inicial)) array_push($filtroInicial,array('request_date >=' => $data_inicial));
        if (!empty($data_final)) array_push($filtroInicial,array('request_date <=' => $data_final));
        if (!empty($start_inicial)) array_push($filtroInicial,array('start_date >=' => $start_inicial));
        if (!empty($start_final)) array_push($filtroInicial,array('start_date <=' => $start_final));
        if (!empty($end_inicial)) array_push($filtroInicial,array('end_date >=' => $end_inicial));
        if (!empty($end_final)) array_push($filtroInicial,array('end_date <=' => $end_final));
        //if (!empty($pax_name)) array_push($filtroInicial,array('request_pax.firstname like %'.$pax_name.'%'));
        //if (!empty($pax_name)) array_push($filtroInicial,array('request_pax.lastname like %'.$pax_name.'%'));
        if ($travel_reason != -1) array_push($filtroInicial,array('travel_reason_id' => $travel_reason));
        if ($status != -1) array_push($filtroInicial,array('request.status' => $status));

        $lista_pedidos = $this->getPaxs($filtroInicial,$customer,$request_number,$ticket_number);

        //echo '<pre>'; print_r($lista_pedidos);

        if ($tiporetorno == ''){

            $dados['lista_pedidos'] = $lista_pedidos;
            $tabela = view("consulta/paxs/lista_pedidos", $dados);

            $resposta_json = array('status'=>1,'tabela' => $tabela);

            echo json_encode($resposta_json);

        } else {

            $fileName = 'pedidos.xlsx';  
            $spreadsheet = new Spreadsheet();
       
            $sheet = $spreadsheet->getActiveSheet();
            $sheet->setCellValue('A1', 'Nº Pedido');
            $sheet->setCellValue('B1', 'Data do Pedido');
            $sheet->setCellValue('C1', 'Nº da Apólice');
            $sheet->setCellValue('D1', 'Nº do bilhete');
            $sheet->setCellValue('E1', 'Nome');
            $sheet->setCellValue('F1', 'Sobrenome');
            $sheet->setCellValue('G1', 'Embarque');
            $sheet->setCellValue('H1', 'Retorno');
            $sheet->setCellValue('I1', 'Nº de dias');
            $sheet->setCellValue('J1', 'Cliente');
            $sheet->setCellValue('K1', 'Pacote');    
            $sheet->setCellValue('L1', 'Paxs'); 
            $sheet->setCellValue('M1', 'Total');
            $sheet->setCellValue('N1', 'Valor Pax');
            $sheet->setCellValue('O1', 'IOF');
            $sheet->setCellValue('P1', 'Valor S/ IOF');
            $sheet->setCellValue('Q1', 'IRRF');
            $sheet->setCellValue('R1', 'Comissão Nest');
            $sheet->setCellValue('S1', 'Comissão B2B');
            $sheet->setCellValue('T1', 'Representação');
            $sheet->setCellValue('U1', 'Net');
            $sheet->setCellValue('V1', 'Situação');
            $sheet->setCellValue('W1', 'Data do Cancelamento');
            $rows = 2;
       
            foreach ($lista_pedidos as $item){
                $sheet->setCellValue('A' . $rows, $item['request_number']);
                $sheet->setCellValue('B' . $rows, date('d/m/Y',strtotime($item['request_date'])));
                $sheet->setCellValue('C' . $rows, $item['certificado']);
                $sheet->setCellValue('D' . $rows, $item['ticket_number']);
                $sheet->setCellValue('E' . $rows, $item['firstname']);
                $sheet->setCellValue('F' . $rows, $item['lastname']);
                $sheet->setCellValue('G' . $rows, date('d/m/Y',strtotime($item['start_date'])));
                $sheet->setCellValue('H' . $rows, date('d/m/Y',strtotime($item['end_date'])));
                $sheet->setCellValue('I' . $rows, $item['nroofdays']);
                $sheet->setCellValue('J' . $rows, $item['customer']);
                $sheet->setCellValue('K' . $rows, $item['product']);
                $sheet->setCellValue('L' . $rows, $item['paxs']);
                $sheet->setCellValue('M' . $rows, $item['amount']);

                $sheet->setCellValue('N' . $rows, round($item['amount'] / $item['paxs'],2));
                $sheet->setCellValue('O' . $rows, round($item['tax_iof'] / $item['paxs'],2));
                $sheet->setCellValue('P' . $rows, round(($item['amount'] - $item['tax_iof']) / $item['paxs'],2));
                $sheet->setCellValue('Q' . $rows, round($item['tax_irrf'] / $item['paxs'],2));
                $sheet->setCellValue('R' . $rows, round($item['commission_nest'] / $item['paxs'],2));
                $sheet->setCellValue('S' . $rows, round($item['commission_b2b'] / $item['paxs'],2));
                $sheet->setCellValue('T' . $rows, round((($item['amount'] - $item['tax_iof']) / $item['paxs'] * 0.0099)/100,2));
                $sheet->setCellValue('U' . $rows, round($item['net'] / $item['paxs'],2));

                switch ($item['status']) {
                    case 0:
                        $sheet->setCellValue('V' . $rows, 'Pedido Cancelado');
                        break;
                    case 1:
                        $sheet->setCellValue('V' . $rows, 'Pedido aberto');
                        break;    
                    case 2:
                        $sheet->setCellValue('V' . $rows, 'Parcialmente emitido');
                        break;                            
                    case 3:
                        $sheet->setCellValue('V' . $rows, 'Emitido');
                        break;      
                    default:
                        break;                                          
                }

                $sheet->setCellValue('W' . $rows, (is_null($item['cancel_date']) ? '' : date('d/m/Y',strtotime($item['cancel_date']))));

                $rows++;
            } 
            $writer = new Xlsx($spreadsheet);
            $writer->save($fileName);

            header("Content-Type: application/vnd.ms-excel");
            header("Content-Disposition: attachment; filename=".basename($fileName));
            header('Expires: 0');
            header('Cache-Control: must-relative');
            header('Pragma: public');
            header('Content-Length:' . filesize($fileName));
            ob_clean();

            flush();
            readfile($fileName);
            exit;

        }

    }

    private function getPaxs($filtro,$customer,$request_number,$ticket_number){

        $db = db_connect();

        $builder = $db->table('request');
        $builder->select('request.id,request_date,request_number, request.ticket_number as certificado, customer.name as customer, start_date, end_date, nroofdays, paxs, product.name as product, amount , tax_iof, tax_irrf, commission_nest, commission_b2b, net, request.status, request_pax.firstname, request_pax.lastname,request_pax.ticket_number as ticket_number, request_pax.cancel_date');
        $builder->join('customer','request.customer_id=customer.id');
        $builder->join('request_pax','request.id=request_pax.request_id');
        $builder->join('request_item','request_item.request_id=request.id and request_item.optional=0');
        $builder->join('product','product.id=request_item.product_id');

        foreach($filtro as $where){
            $builder->where($where);
        }

        $builder->like('customer.name',$customer);
        $builder->like('request_number',$request_number);

        if (!empty($ticket_number)){
            $builder->like('request.ticket_number',$ticket_number);
        }
        
        $builder->orderBy('request_number','asc');
        $builder->orderBy('request_pax.ticket_number','asc');

        $query = $builder->get();

        return $query->getResultArray();

    }

    public function viewticket($request_id, $retorno){

        // Recuperando dados do pedido
        $data = $this->getdadosrequest($request_id);

        $data['id'] = $request_id;
        $data['urlintegrar'] = site_url('/request/integrarsot/');
        $data['urlprintfile'] = getenv('WsSOT_URLPrintFile');

        $data['urlretornar'] = site_url('/request');
        if ($retorno == 2) {
            $data['urlretornar'] = site_url('/request/paxs');
        } 
        
        return view("consulta/pedidos/viewticket", $data);

    }

    private function getdadosrequest($request_id){

        // Recuperando dados para apresentação na tela de confirmação
        $requestModel = new \App\Models\RequestModel();

        $db = db_connect();

        // Recuperando dados do pedido para confirmação
        $request = $requestModel->where('id',$request_id)->find();

        // Trato a situação do bilhete
        $request[0]['descricao_situacao'] = $this->ajustaStatusRequest($request[0]['status']);
        $request[0]['status'] = $request[0]['status'];

        $builder = $db->table('request');
        $builder->select('customer.name, customer.code, address, address_nro, zipcode, state.code as uf, city.name as cidade, customer.district, phone, email, customer.complement, commission_nest, commission_b2b, net');
        $builder->join('customer','customer.id=request.customer_id');
        $builder->join('city','customer.city_id=city.id');
        $builder->join('state','city.id_estado=state.id');
        $builder->where(array('request.id'=>$request_id));
        $query = $builder->get();
        $customer = $query->getResultArray(); 

        // Recuperando dados dos paises
        $builder = $db->table('request_country');
        $builder->select('name');
        $builder->join('country','request_country.country_id=country.id');
        $builder->where(array('request_id'=>$request_id));
        $query = $builder->get();
        $requestCountry = $query->getResultArray();

        // Recuperando dados dos estados
        $builder = $db->table('request_states');
        $builder->select('name');
        $builder->join('state','request_states.state_id=state.id');
        $builder->where(array('request_id'=>$request_id));
        $query = $builder->get();
        $requestState = $query->getResultArray();

        // Recuperando os itens do pedido
        $builder = $db->table('request_item');
        $builder->select('prod.id as product_id,prod.code,type.code as tipoproduto,prod.name,prod.agetext,request.nroofdays,request.paxs,request.paxsenior,amount_item as total, request_item.optional as optional, destiny.name as destino');
        $builder->join('product prod','request_item.product_id=prod.id');
        $builder->join('request','request_item.request_id=request.id');
        $builder->join('destiny','request.destiny_id=destiny.id');
        $builder->join('type','prod.type_id=type.id');
        $builder->where(array('request_item.request_id'=>$request_id));
        $query = $builder->get();
        $requestItem = $query->getResultArray(); 

        // Recuperando os paxs do pedido
        $builder = $db->table('request_pax');
        $builder->where(array('request_id'=>$request_id));
        $builder->orderBy('sequence');
        $query = $builder->get();
        $requestPax = $query->getResultArray();

        // Recuperando informações do pagamento
        $builder = $db->table('payment');
        $builder->where(array('request_id'=>$request_id));
        $builder->orderBy('created_at');
        $query = $builder->get();
        $requestPayment = $query->getResultArray();

        $mensagememissao = '';
        if (!empty($op) && $request[0]['status'] == 3) {
            $mensagememissao = 'Tudo certo. Bilhete(s) emitido(s) com sucesso! Você pode baixar os bilhete(s) clicando no número do bilhete abaixo. Ah, seu bilhete também será enviado para o e-mail de cadastro.';
        } 

        // ##### Verifica ações permitidas ############
        /*
        if ($request[0]['end_date'] <= date('Y-m-d')){
            $acoes['cancelar'] = 'N';
            $acoes['estender'] = 'N';
        } else {
            $intervalo = date_diff($request[0]['start_date'],date('Y-m-d'));
        }
        */

        $data['id'] = $request_id;
        $data['mensagem'] = $mensagememissao;
        $data['scripts_url'] = base_url("/assets/js/");
        $data['vendor'] = base_url("/assets/vendor/");
        $data['template_url'] = base_url("/assets/");
        $data['request'] = $request[0];
        $data['customer'] = $customer[0];
        $data['requestpax'] = $requestPax;
        $data['requestitem'] = $requestItem;
        $data['requestcountry'] = $requestCountry;
        $data['requeststate'] = $requestState;    
        $data['payment'] = $requestPayment;
        //$data['username'] = $this->session['user'];
        //$data['user_id'] = $this->session['user_id'];
        $data['urlcancelar'] = site_url('/request/cancel/');
        $data['urlextender'] = site_url('/request/extend/');

        // Recupero os status de operações no pedido
        $status_operacoes = $this->VerificaOperacoes($request[0]);

        $data['cancelar'] = $status_operacoes['cancelar'];
        $data['extender'] = $status_operacoes['extender'];

        return $data;

    }

    public function integrarsot($request_id) {

        // Setando o client SOAP
        $url = getenv('WsSOT_Host');

        $client = new \SoapClient($url);

        // Autenticando a operação
        $auth = $this->WSSOT_Auth($client);

        $db = db_connect();

        // Recuperando dados do pedido para integração
        $builder = $db->table('request');
        $builder->select("request.request_number, destiny_id, pax.id as pax_id,customer.name, customer.code, customer.address, customer.address_nro, customer.zipcode, state.code as uf, city.name as cidade, country.name as country,customer.district, customer.complement,
            pax.firstname,
            pax.lastname,
            pax.genre,
            request.ticket_number as localizador,
            pax.ticket_number as bilhete,
            request.start_date,
            request.end_date,
            request_date,
            (amount / request.paxs) as tarifa,
            (commission_nest / request.paxs) as comissao,
            (commission_b2b / request.paxs) as desconto,
            (net / request.paxs) as liquido,
            (case payment_type when 'TMA' then 2 when 'TVI' then 2 else 3 end) as forma_pagamento");
        $builder->join('customer','customer.id=request.customer_id');
        $builder->join('city','customer.city_id=city.id');
        $builder->join('state','city.id_estado=state.id');
        $builder->join('country','state.id_pais=country.id');
        $builder->join('request_pax pax','request.id=pax.request_id');
        $builder->where(array('request.id'=>$request_id, 'pax.integrated' => null));
        $builder->orderBy('pax.sequence','asc');
        $query = $builder->get();
        $request_pax = $query->getResultArray(); 

        if ($request_pax){
            foreach ($request_pax as $pax) {

                // Extraindo o ID do pax para atualização
                $pax_id = $pax['pax_id'];

                $bilheteTrecho = $this->getTrechoDestino($pax['destiny_id']);

                $addbilhete = array( 'Sdtbilhete' =>
                        array(
                                'Sessionid' => $auth['chave'],
                                'BilheteEmpresa' => 77,
                                'BilheteReservaOrigem' => $pax['localizador'],
                                'BilheteReservaClienteCod' => '',
                                'BilheteReservaClienteCnpj' => $pax['code'],
                                'BilheteReservaClienteNome' => $pax['name'],
                                'BilheteReservaClienteEndereco' => $pax['address'],
                                'BilheteReservaClienteBairro' => $pax['district'],
                                'BilheteReservaClienteCep' => $pax['zipcode'],
                                'BilheteReservaClienteCidade' => $pax['cidade'],
                                'BilheteReservaClienteEstado' => $pax['uf'],
                                'BilheteReservaClienteNumero' => $pax['address_nro'],
                                'BilheteReservaClienteComplemento' => $pax['complement'],
                                'BilheteReservaClientePais' => $pax['country'],
                                'BilheteCRD' => getenv('WsSOT_CRD'),
                                'BilheteTipoEmissao' => 2,
                                'BilheteFornecedorEmissao' => getenv('WsSOT_Fornecedor_SOT'),
                                'BilhetePassageiroNome' => $pax['firstname'],
                                'BilhetePassageiroSobrenome' => $pax['lastname'],
                                'BilhetePassageiroSexo' => $pax['genre'],
                                'BilheteCiaSigla' => 'OM',
                                'BilheteLocalizador' => $pax['localizador'],
                                'BilheteTrecho' => $bilheteTrecho,
                                'BilheteNumero' => $pax['bilhete'],
                                'BilheteDtEmbarque' => substr($pax['start_date'],0,10),
                                'BilheteDtEmissao' => substr($pax['request_date'],0,10),
                                'BilheteDtRetorno' => substr($pax['end_date'],0,10),
                                'BilheteCambioEmissao' => 1,
                                'BilheteMoedaEmissao' => 'BRL',
                                'BilheteTarifaUSD' => 0,
                                'BilheteTarifaBRL' => $pax['tarifa'],
                                'BilheteTxEmb' => 0,
                                'BilheteComissao' => 0,
                                'BilheteIncentivo' => $pax['comissao'],
                                'BilheteDesconto' => $pax['desconto'],
                                'BilheteDU' => 0,
                                'BilheteISS' => 0,
                                'BilheteLiquido' => $pax['liquido'],
                                'BilheteFormaPag' => $pax['forma_pagamento'],
                                'BilheteRegularFretamento' => 'R',
                                'BilheteTrechoPrincipal' => $bilheteTrecho
                            )
                        );     
            
                $response = $client->ADDBILHETE($addbilhete);
                    
                $array = $this->_toArray( $response );

                // Verifico o status da integração
                if ($array['Sdtret']['OpStatus'] == 1) {
                    // Recuperando dados do retorno
                    $reserta_sot = $array['Sdtret']['OpListaDescricao']['OpListaDescricao2.OpListaDescricao2Item']['OpDescricao'];

                    //echo '<pre>'; print_r($array['Sdtret']['OpListaDescricao']['OpListaDescricao2.OpListaDescricao2Item']['OpDescricao']);

                    $requestPax = new RequestPax();
                    $requestPaxModel = new RequestPaxModel();
                    $requestPax->id = $pax_id;
                    $requestPax->integrated = $reserta_sot.'|'.$pax['bilhete'];

                    // Atualizando o pax
                    $requestPaxModel->save($requestPax);
                    
                }  
            } 

            // Verifico se todos os paxs foram integrados para sinalizar o pedido como integrado
            $integrated = $this->SetRequestIntegrated($request_id, $reserta_sot);

            if ($integrated) {
                $resposta_json = array('status' => 1, 'reserva_sot' => $reserta_sot);
            } else {
                $resposta_json = array('status' => 0, 'reserva_sot' => '', 'mensagem' => 'Houve algum problema ao realizar a integração com o SOT. Tente novamente mais tarde.');
            }

        } else {
            $resposta_json = array('status' => 0, 'reserva_sot' => '', 'mensagem' => 'Passageiros já integrados no SOT');
        }

        echo json_encode($resposta_json);
    }

    private function getTrechoDestino($destiny_id) {
        $trecho = 'BRL/BRL';
        $destinyModel = new DestinyModel();

        $array_destino = $destinyModel->where('id', $destiny_id)->find();

        $sigla_destino = $array_destino[0]['sigla'];

        switch ($sigla_destino) {
            case 'AF':
                $trecho = 'BRL/AFR/BRL';
            case 'AN':
                $trecho = 'BRL/AME/BRL';
            case 'NA':
                $trecho = 'BRL/AME/BRL';                
            case 'SA':
                $trecho = 'BRL/AME/BRL';   
            case 'AS':
                $trecho = 'BRL/ASI/BRL';             
            case 'EU':
                $trecho = 'BRL/EUR/BRL';
            case 'OC':
                $trecho = 'BRL/OCE/BRL';                
        }

        return $trecho;

    }

    private function SetRequestIntegrated($request_id, $reserta_sot) {

        $integrated = 0;

        $db = db_connect();

        // Recuperando dados do pedido para integração
        $builder = $db->table('request_pax');
        $builder->select("id");
        $builder->where(array('request_id'=>$request_id, 'integrated' => null));
        $query = $builder->get();
        $request_pax = $query->getResultArray(); 

        if (!$request_pax) {
            // Todos os passageiros integrados
            $request = new RequestEntity();
            $requestModel = new RequestModel();

            $request->id = $request_id;
            $request->integrated = $reserta_sot;
            $requestModel->save($request);

            $integrated = 1;
        }
        return $integrated;

    }

    private function WSSOT_Auth($client) {

		$msg_erro = '';
		$chave = '';
		$status = 0;

		try {

            $auth = array( 'Sdtautenticalogin' =>
						array(
                                "AppLogin"		=> getenv('WsSOT_Login'),
                                "AppHost" 		=> getenv('WsSOT_LoginHost'),
                                "AppKey" 		=> getenv('WsSOT_Key'),
                                "AppEmpresa"	=> getenv('WsSOT_Empresa')
                            )
					);
            
            $response = $client->AUTENTICALOGIN($auth);
                
			$array = $this->_toArray( $response );
						
			$rs = $array['Sdtret'];
			$status = $rs['OpStatus'];
			
			if ( $status === 1 ) {
				$chave = $rs['OpUkey'];
			} else {
				$erro = $rs['OpListaDescricao']['OpListaDescricao.OpListaDescricaoItem'];
				$msg_erro = 'Erro(s) encontrado(s) na autenticação!';
				foreach ( $erro as $err ) {
					if ( $err['OpDescricao'] !== '' ) {
						$msg_erro .= '<br>' . $err['OpDescricao'];
					}
				}
			}

		} catch (SoapFault $exception) {
			$msg_erro = $exception->getMessage();
		}
		
		return array( 'status' => $status, 'erro' => $msg_erro, 'chave' => $chave );

    }

    private function _toArray( $Std ) {
		return json_decode( json_encode( $Std ), true );
	}

    private function VerificaOperacoes($request){

        $status_operacoes['cancelar'] = 'N';
        $status_operacoes['extender'] = 'N';

        // ###### Precisarei refinar essa regra mais adiante
        // ###### Não esquece de voltar aqui

        // Verifico se a data de embarque é menor do que hoje. Caso seja, não permito o cancelamento
        // nem a extensão
        //$start_date = new DateTime($request['start_date']);
        //$hoje = date('Y-m-d');

        //$intervalo = $start_date->diff($hoje);

        //echo 'intervalo '.strval($start_date);


        if ($request['start_date'] <= date('Y-m-d')){
            return $status_operacoes;
        }

        if ($request['status'] >= 2) {
            $status_operacoes['cancelar'] = 'S';
            $status_operacoes['extender'] = 'N';
        }

        return $status_operacoes;

    }

    private function ajustaStatusRequest($status){

        $descricao_situacao = '';

        switch ($status) {
            case 0:
                $descricao_situacao = '<span class="badge badge-danger" style="font-size: 18px; color: #ffffff; width:100%;">Pedido Cancelado</span>';
                break;
            case 1:
                $descricao_situacao = '<span class="badge badge-info" style="font-size: 18px; color: #ffffff; width:100%;">Pedido aberto</span>';
                break;    
            case 2:
                $descricao_situacao = '<span class="badge badge-warning" style="font-size: 18px; color: #ffffff; width:100%;">Parcialmente emitido</span>';
                break;                            
            case 3:
                $descricao_situacao = '<span class="badge badge-success" style="font-size: 18px; color: #ffffff; width:100%;">Emitido</span>';
                break;      
            default:
                break;                                          

        }

        return $descricao_situacao;

    }

    
}

