<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Insurance extends BaseController
{

    private $template = 'vegefoods';

    public function index()
    {
        //
    }

    public function getinsurancebyproductid($product_id){

        $leadModel = new \App\Models\LeadModel();
        $Lead = new \App\Entities\Lead;

        $insuranceModel = new \App\Models\InsuranceModel();

        $db = db_connect();

        $builder = $db->table('insurance');
        $builder->select('description,value,days,currency.code as currency');
        $builder->join('currency','insurance.currency_id=currency.id');
        //$builder->where(array('product_id'=>$product_id)); // Adicionar o filtro do produto em produção
        //$builder->where(array('value !='=>null)); 
        //$builder->orderBy('request_date','desc');

        $query = $builder->get();
        $data['lista_insurance']= $query->getResultArray();

        echo json_encode(array('status'=>1, 'coberturas'=>view("$this->template/listacoberturas", $data)));

    }
}
