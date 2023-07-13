<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\Email\Email;

class Contact extends BaseController
{

    public $template = 'vegefoods';

    private $session;

    public function __construct(){

        $this->session = session()->get();

        if (!isset($this->session)) {
            return redirect()->to(site_url('/'));
        }
		
    }

    public function index()
    {
        $data['template_url'] = base_url("/assets/$this->template/");
        $data['scripts_url'] = base_url("/assets/js/");
        $data['vendor'] = base_url("/assets/vendor/");
        $data['actioncontact'] = site_url("/contact/sendcontact/");
        $data['voltar'] = site_url();
        $data['user_id'] = (isset($this->session['user_id']) ? $this->session['user_id'] : null);
        $data['username'] = (isset($this->session['user']) ? $this->session['user'] : null);

        return view("$this->template/contato", $data);
    }

    public function sendcontact() {

        $post = $this->request->getPost();

        $to = getenv('contact_email');
        $subject = 'Nest Travel - Fale Conosco';
        
        $email = \Config\Services::email();

        $email->setTo($to);

        // Remover após os testes
        $email->setCc($post['email']);

        $email->setFrom('mensageiro@grupoaguia.com.br', 'Fale Conosco');

        // Adicionando a logo na mensagem
        $post['logo'] = base_url('assets/img/nesttravel.png');

        // Montando o corpo da mensagem
        $message = $this->mensagemcontact($post);
        
        $email->setSubject($subject);
        $email->setMessage($message);

        if ($email->send()) 
		{
            $resposta_json = array('status'=>1,'mensagem'=>'Mensagem enviada com sucesso! Retornaremos o contato o mais breve possivel.');
        } 
		else 
		{
            $resposta_json = array('status'=>0,'mensagem'=>'Houve algum problema ao enviar a sua mensagem. Tente novamente mais tarde.');
        }

        echo json_encode($resposta_json);
    }

    private function mensagemcontact($dados){

        $parser = \Config\Services::parser();

        $mensagem = $parser->setData($dados)->render('vegefoods/email/contato');

        return $mensagem;

    }

}
