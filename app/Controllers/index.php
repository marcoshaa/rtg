<?php

namespace App\Controllers;

class Index extends BaseController
{

    //public $template = 'vegefoods';

    private $session;

    public function __construct()
    {

        $this->session = session()->get();

        if (!isset($this->session)) {
            return redirect()->to(site_url('/'));
        }
		
    }

    public function index()
    {
        $data['template_url'] = base_url("/assets");
        $data['scripts_url'] = base_url("/assets/js/");
        $data['actionlogin'] = site_url("security/login");

        return view('login', $data);

    }

}
