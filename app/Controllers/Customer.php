<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\CustomerConfigModel;
use App\Models\CustomerModel;
use App\Entities\Customer as CustomerEntitie;
use App\Entities\CustomerConfig;
use App\Libraries\Uuid;
use PHPUnit\Util\Json;

class Customer extends BaseController
{

    public function index() {

        $db = db_connect();

        $builder = $db->table('user');
        $builder->select('customer.*,city.name as cidade,user.id as user_id,user.email as user_email,user.name as user_name');
        $builder->join('customer','user.customer_id=customer.id');
        $builder->join('city','customer.city_id=city.id');

        $query = $builder->get();
        $customer = $query->getResultArray();

        //echo '<pre>'; print_r($customer);

        $data['customer'] = $customer;
        $data['template_url'] = base_url("/assets/");
        $data['scripts_url'] = base_url("/assets/js/");
        $data['getcustomerstatus'] = site_url("customer/getcustomerstatus/");
        $data['getcustomerconfig'] = site_url("customer/getcustomerconfig/");
        $data['setstatus'] = site_url("customer/setstatus/");
        $data['setconfig'] = site_url("customer/setconfig/");

        return view("cadastro/customer/index", $data);

    }

    public function editar($id){

        $db = db_connect();

        $builder = $db->table('customer');
        $builder->select('customer.*,city.id as id_cidade,city.name as cidade');
        $builder->join('city','customer.city_id=city.id');
        $builder->where(array('customer.id'=>$id));

        $query = $builder->get();
        $customer = $query->getResultArray();
        $customer = $customer[0];

        //echo '<pre>'; print_r($customer);

        $data['customer'] = $customer;
        $data['template_url'] = base_url("/assets/");
        $data['scripts_url'] = base_url("/assets/js/");
        $data['voltar'] = site_url("cadastros/customer");
        $data['salvardados'] = site_url("cadastros/customer/salvar/");

        return view("cadastro/customer/edit", $data);

    }

    public function getcustomerstatus($id){

        $customerModel = new customerModel();

        $customer  = $customerModel->find($id);
        //$customerConfig = $customerConfig_array[0];

        //echo $customer;

        echo json_encode(array('status'=>1,'status_customer' => $customer->status)); 

    }

    public function getcustomerconfig($id){

        $customerConfigModel = new CustomerConfigModel();

        $customerConfig_array  = $customerConfigModel->where('customer_id',$id)->find();

        $dados['lista_config'] = $customerConfig_array;

        $tabela = view("cadastro/customer/lista_valores", $dados);

        $json_response = array('status'=>1,'tabela'=>$tabela);
                     
        echo json_encode($json_response);
    
    }

    public function setstatus(){

        $post = $this->request->getPost();

        $customerModel = new CustomerModel();
        $customer = new CustomerEntitie();

        $customer->id = $post['id'];
        $customer->status = ($post['status'] == '1' ? 1 : 0);

        $registro_atualizado = $customerModel->save($customer);

        if ($registro_atualizado==1){
            echo json_encode(array('status'=>1,'mensagem'=>'Cliente atualizado com sucesso.'));
        } else {
            echo json_encode(array('status'=>0,'mensagem'=>'Houve algum problema ao atualizado o registro. Tente novamente mais tarde.'));
        }

    }

    public function setconfig(){

        $post = $this->request->getPost();

        $customerConfig = new CustomerConfig();
        $customerConfigModel = new CustomerConfigModel();

        $dadosconfig = $this->preparaDados($post);
        $customerConfig->fill($dadosconfig);

        $errors = [];
        if ($customerConfig->id==''){
            $customerConfig->id = Uuid::getUuid();
            $status_op = $customerConfigModel->insert($customerConfig);

        } else {
            $status_op = $customerConfigModel->save($customerConfig);
        }

        if ($status_op!=1){
            $errors = $customerConfigModel->errors();
        } 

        if (empty($errors) || $errors==1){

            // Atualização ok, recupero a lista de itens incluidos
            $customerConfig_array  = $customerConfigModel->where('customer_id',$customerConfig->customer_id)->find();
            $dados['lista_config'] = $customerConfig_array;
            $tabela = view("cadastro/customer/lista_valores", $dados);

            echo json_encode(array('status'=>1,'mensagem' => 'Dados salvos com sucesso!','tabela'=>$tabela));
        } else {
            echo json_encode(array('status'=>0,'mensagem' => $errors));
        }
        
    }

    public function delconfig($customer_id,$id) {

        $customerConfigModel = new CustomerConfigModel();

        $status_op = $customerConfigModel->delete($id);

        if ($status_op==1){

            // Atualização ok, recupero a lista de itens incluidos
            $customerConfig_array  = $customerConfigModel->where('customer_id',$customer_id)->find();
            $dados['lista_config'] = $customerConfig_array;
            $tabela = view("cadastro/customer/lista_valores", $dados);

            echo json_encode(array('status'=>1,'mensagem'=>'Registro excluído com sucesso!','tabela'=>$tabela));
        } else {
            echo json_encode(array('status'=>0,'mensagem'=>'Erro ao excluir o registro.'));
        }

    }

    private function preparaDados($dados){

        $dados['credit_line'] = str_replace(',', '.', str_replace('.','',$dados['credit_line']));
        $dados['commission_default'] = str_replace(',', '.', str_replace('.','',$dados['commission_default']));

        return $dados;

    }

}

