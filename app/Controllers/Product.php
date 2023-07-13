<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ProductModel;
use App\Models\CategoryModel;
use App\Models\TypeModel;
use App\Entities\Product as ProductEntity;
use App\Libraries\Uuid;

class Product extends BaseController
{
    public $template = 'vegefoods';

    public function index()
    {
        $productModel = new ProductModel();

        $data['product'] = $productModel->findAll();
        $data['template_url'] = base_url("/assets/");
        $data['scripts_url'] = base_url("/assets/js/");
        $data['addproduct'] = site_url("product/new/");
        $data['editproduct'] = site_url("product/edit/");

        return view("cadastro/product/index", $data);
    }

    public function edit($id)
    {
        $productModel = new ProductModel();
        $categoryModel = new CategoryModel();
        $typeModel = new TypeModel();

        $data['product'] = $productModel->find($id);
        $data['template_url'] = base_url("/assets/");
        $data['scripts_url'] = base_url("/assets/js/");
        $data['voltar'] = site_url('product');
        $data['saveproduct'] = site_url("product/save/");
        $data['modal'] = 
        $data['list_category'] = $categoryModel->findAll();
        $data['list_type'] = $typeModel->findAll();

        return view("cadastro/product/edit", $data);
    }

    public function save(){

        $post = $this->request->getPost();

        $product = new ProductEntity();
        $productModel = new ProductModel();

        if ($post['id']==''){
            $post['id'] =  Uuid::getUuid();
        }

        $product->fill($post);

        if ($productModel->save($product)){
            $response_json = array('status' => 1,'mensagem' => 'Produto criado/atualizado com sucesso!');                
        } else {
            $response_json = array('status' => 0,'mensagem' => $productModel->errors());                
        }

        echo json_encode($response_json);

    }

}
