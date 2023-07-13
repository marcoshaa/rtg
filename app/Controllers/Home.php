<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Home extends BaseController
{
    public function index()
    {
        $data['template_url'] = base_url("/assets");
        $data['urlgetrequest'] = site_url('home/getListaPedidos/');
        
        //MONTA DASHBOARD
        $data_inicial = date('Y-m-d');
        //$data_inicial = '2022-01-01';
        $data['total_pedidos'] = $this->getPedidos('COUNT', 'R.id', $data_inicial)[0]['id'];
        $data['total_pedidos_valor'] = $this->getPedidos('PAYMENT', 'PA.amount', $data_inicial)[0]['amount'];
        $data['total_pedidos_mes_valor'] = $this->getPedidos('PAYMENT', 'PA.amount', date('Y-m-d', mktime(0, 0, 0, date('m') , 1 , date('Y'))), date('Y-m-d'))[0]['amount'];
        $data['total_pedidos_mes'] = $this->getPedidos('COUNT', 'R.id', date('Y-m-d', mktime(0, 0, 0, date('m') , 1 , date('Y'))), date('Y-m-d'))[0]['id'];

        return view('home', $data);
    }

    public function getListaPedidos() 
    {
        //$data_inicial = '2022-01-01';
        $data_inicial = date('Y-m-d', strtotime('-7 days'));

        $lista_pedidos = $this->getPedidos('DATA', 'R.id, R.request_date, R.request_number, R.ticket_number, C.name as customer, R.start_date, R.end_date, R.nroofdays, R.paxs, P.name as product, PA.amount, R.commission_nest, R.commission_b2b, R.net, R.status', $data_inicial);

        $dados['lista_pedidos'] = $lista_pedidos;
        $tabela = view("dash/lista_pedidos", $dados);

        $resposta_json = array('status' => 1, 'tabela' => $tabela);
        echo json_encode($resposta_json);
    }

    private function getPedidos($type = 'COUNT', $columns, $data_inicial, $data_final = '')
    {
        $db = db_connect();
        $response = NULL;

        $builder = $db->table('request AS R');

        if($type == 'COUNT') {
            $builder->selectCount($columns);
            $builder->join('customer AS C', 'R.customer_id = C.id');
            $builder->join('request_item AS RI','RI.request_id = R.id and RI.optional = 0');
            $builder->join('product AS P', 'P.id = RI.product_id');
        } else if($type == 'PAYMENT') {
            $builder->selectSum($columns);
            $builder->join('customer AS C', 'R.customer_id = C.id');
            $builder->join('request_item AS RI','RI.request_id = R.id and RI.optional = 0');
            $builder->join('product AS P', 'P.id = RI.product_id');
            $builder->join('payment AS PA', 'PA.request_id = R.id');
        } else if($type == 'DATA') {
            $builder->select($columns);
            $builder->join('customer AS C', 'R.customer_id = C.id');
            $builder->join('request_item AS RI','RI.request_id = R.id and RI.optional = 0');
            $builder->join('product AS P', 'P.id = RI.product_id');
            $builder->join('payment AS PA', 'PA.request_id = R.id');
        }

        $builder->where(array('R.request_date >=' => $data_inicial));
        if(!empty($data_final)) $builder->where(array('R.request_date <=' => $data_final));
        
        $query_pedidos = $builder->get();
        $response = $query_pedidos->getResultArray();

        return $response;
    }
}
