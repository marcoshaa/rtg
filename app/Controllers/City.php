<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class City extends BaseController
{
    public function index()
    {
        //
    }

    public function getcitybycode($code){

        //$code = $_GET['q'];

        $cityModel = new \App\Models\CityModel;

        $db = db_connect();

        $builder = $db->table('city');
        $builder->select('id,name,code');
        $builder->where('code',$code);
        $builder->orderBy('name');

        $query = $builder->get();
        $lista_cidades = $query->getRowArray();

        echo json_encode($lista_cidades);        

    }

    public function getcitybyname(){

        $name = $_GET['q'];

        $cityModel = new \App\Models\CityModel;

        $db = db_connect();

        $builder = $db->table('city');
        $builder->select('id,name,code');
        $builder->like('name',$name);
        $builder->orderBy('name');

        $query = $builder->get();
        $lista_cidades = $query->getResultArray();

        echo json_encode($lista_cidades);        

    }

}
