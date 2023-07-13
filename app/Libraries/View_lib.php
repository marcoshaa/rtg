<?php

namespace App\Libraries;



class View_lib {
    
    public function show($controller, $page, $data = array(), $page_key = '')
    {
        if (empty($page_key)) {
            $splited = explode("/", $page);
            $page_key = (isset($splited[1])) ? $splited[1] : $page;
        }
        
        $controller->load->helper('url');
        //$controller->load->library('loader');
		
		$data['page_title'] = ( !empty($data['page_title']) ? $data['page_title'] : 'Pallas Corretora' );

        $controller->load->view("$controller->template/partes/header", $data);
        //$controller->load->view('partes/menu');
        $controller->load->view($page, $data);
        $controller->load->view("$controller->template/partes/footer", $data);
    }
    
}


