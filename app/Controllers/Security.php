<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\Email\Email;

class Security extends BaseController
{
    public function login()
    {
        // Recupando os parametros enviados
        $post = $this->request->getPost();

        $login = $post['email'];
        $password = md5($post['password']);

        $db = db_connect();

        $builder = $db->table('user AS U');
        $builder->select('U.id, U.name, U.email');
        $builder->join('user_nest AS UN', 'UN.user_id = U.id');
        $builder->where(array('U.admin' => 1, 'U.email' => trim($login), 'U.password' => trim($password), 'U.status' => 1));

        $query = $builder->get();
        $user = $query->getResultArray();

        if (!empty($user)) {
            $user = $user[0];
            session()->set([
                'user_id' => $user['id'],
                'user'    => $user['name'],
                'email'   => $user['email']
            ]);
            $redirect = site_url('home');
            $resposta_json = array('status' => 1, 'mensagem' => 'Dados verificados com sucesso!', 'redirect' => $redirect);     
            
        } else {
            $redirect = site_url();
            $resposta_json = array('status' => 0, 'mensagem' => 'Login ou senha incorretos. Verifique!');     
        }

        echo json_encode($resposta_json);
    }

    public function logout(){

        session()->destroy();
        return redirect()->to(site_url());

    }

    public function lostpassword($action = ''){

        $data['action'] = site_url('security/lostpassword/recovery');
        $data['scripts_url'] = base_url("/assets/js/");
        $data['vendor'] = base_url("/assets/vendor/");
        $data['template_url'] = base_url("/assets/vegefoods/");
        $data['lead_id'] = (isset($post['lead_id']) ? $post['lead_id'] : '');
        $data['user_id'] = null;
      
        if ($action == 'recovery') {
  
            // Recupando os parametros enviados
            $post = $this->request->getPost();

            $email = $post['email'];

            if ($email != '') {

                $userModel = new \App\Models\UserModel();
                $user  = $userModel->where('email',trim($email))->find();

                if ($user){
                    // Verifico se o usuário esta ativo para realizar o envio do novo e-mail. Caso
                    // não, notifico que o usuário esta bloqueado
                    if ($user[0]['status']==1) {
                        if ($this->notificaEmail($user[0]['id'],$email)) {
                            $resposta_json = array('status'=>1,'mensagem'=>'Um e-mail foi enviado para seu e-mail com instruções para sua redefinifição de senha. Verifique sua caixa de e-mail.');
                        } else {
                            $resposta_json = array('status'=>0,'mensagem'=>'Houve algum problema ao enviar o e-mail. Tente novamente mais tarde.');
                        }
                    } else {
                        $resposta_json = array('status'=>0,'mensagem'=>'E-mail informado encontra-se bloqueado. Entre em contato com o atendimento para mais informações.');
                    }    
                } else {
                   $resposta_json = array('status'=>0,'mensagem'=>'E-mail informado não localizado no cadastro. Verifique!');
                }    

                echo json_encode($resposta_json);    

            }
        } else {
            return view("vegefoods/lostpassword", $data);
        }
        
    }

    private function notificaEmail($id, $emaildestino) {
        
        $to = $emaildestino;
        $subject = 'Nest Travel - Esqueci minha senha';
        $message = 'Corpo da mensagem';
        
        $email = \Config\Services::email();

        $email->setTo($to);
        $email->setFrom('mensageiro@grupoaguia.com.br', 'Confirm Registration');

        // Montando o corpo da mensagem
        $message = $this->mensagemlostpassword($id, $emaildestino);
        
        $email->setSubject($subject);
        $email->setMessage($message);

        if ($email->send()) 
		{
            return true;
        } 
		else 
		{
            //$data = $email->printDebugger(['headers']);
            //print_r($data);
            return false;
        }
       

    }

    private function mensagemlostpassword($id, $email) {

        $monta_hash = array(
            'id'=>$id,
            'email'=> $email
        );

        // Gerando o Hash do ID 	
        $hash = $this->getHash(1, $monta_hash);	
        $link = site_url('security/updatepass/'.$hash );

        // Recuperando dados do usuário
        $userModel = new \App\Models\UserModel();
        $user  = $userModel->where('id',$id)->find();

        // Adicionando a logo na mensagem
        $data['logo'] = base_url('assets/img/nesttravel.png');
        $data['nome_destinatario'] = $user[0]['name'];
        $data['link_formulario'] = $link;

        $parser = \Config\Services::parser();

        $mensagem = $parser->setData($data)->render('vegefoods/email/redefinirsenha');

        return $mensagem;

    }

    public function updatepass($hash){

        $decrypt = json_decode($this->getHash(2, $hash),true);

        echo 'Em construção';

        /*
        $data['action'] = site_url('security/lostpassword/recovery');
        $data['scripts_url'] = base_url("/assets/js/");
        $data['vendor'] = base_url("/assets/vendor/");
        $data['template_url'] = base_url("/assets/vegefoods/");
        $data['lead_id'] = (isset($post['lead_id']) ? $post['lead_id'] : '');
        $data['user_id'] = null;

        return view("vegefoods/updatedpass", $data);
        */

    }

    private function getHash( $type, $input ) {
		//$type: 1 - Encrypt | 2 - Decrypt
		$response = '';
		$string = $input;
		if( $type == 1 ) {
			if ( is_array($input)){
				$string = json_encode($input);
			}
			$response = strtr(base64_encode($string), '+/=', '-_.');
		}
		if( $type == 2 ) {
			$response = base64_decode(strtr($string, '-_.', '+/='));
		}
		
		return $response;
	}

}
