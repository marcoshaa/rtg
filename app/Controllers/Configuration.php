<?php

namespace App\Controllers;

use App\Models\ConfigurationModel;
use App\Entities\Configuration as ConfiturationEntitie;
use App\Controllers\BaseController;

class Configuration extends BaseController
{

    private $configuration;
    private $configurationModel;

    public function __construct(){

        $this->configuration = new ConfiturationEntitie();
        $this->configurationModel = new ConfigurationModel();
		
    }


    public function index()
    {
        $configurations = $this->configurationModel->findAll();

        $data['configuration'] = $configurations;
        $data['template_url'] = base_url("/assets/");
        $data['scripts_url'] = base_url("/assets/js/");

        //echo '<pre>'; print_r($data);

        return view("cadastro/configuration/index", $data);
    }

    public function editar($id){

        $this->configuration = $this->configurationModel->find($id);

        $data['configuration'] = $this->configuration;
        $data['template_url'] = base_url("/assets/");
        $data['scripts_url'] = base_url("/assets/js/");
        $data['voltar'] = site_url("configuration");
        $data['salvardados'] = site_url("configuration/salvar/");

        return view("cadastro/configuration/edit", $data);

    }

    public function salvar() {

        $post = $this->request->getPost();

        $this->configuration->fill($post);

        $registro_atualizado = $this->configurationModel->save($this->configuration);

        if ($registro_atualizado==1){
            echo json_encode(array('status'=>1,'mensagem'=>'Cadastro atualizado com sucesso.'));
        } else {
            echo json_encode(array('status'=>0,'mensagem'=>'Houve algum problema ao atualizado o registro. Tente novamente mais tarde.'));
        }

    }

}
