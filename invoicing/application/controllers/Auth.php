<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

    public $layoutData = [];
    public $ajaxRes = ['success' => true];

	public function __construct(){
		parent::__construct();
        $this->load->model('Auth_model', 'auth');
	}

	public function index(){
        $this->layoutData['title'] = 'Login';
		$this->template->authTemplate('auth/login', $this->layoutData);
	}

    public function logout() {
        $this->session->sess_destroy();
        redirect('/login');
    }

    public function verify() {
        $verify = $this->auth->checkLogin();

        if ($verify) {
            $this->session->set_userdata('employee', $verify);
            $this->ajaxRes['message'] = "Login Success!";
        } else {
            $this->ajaxRes['success'] = false;
            $this->ajaxRes['message'] = "Login Failed!";
        }

        echo json_encode($this->ajaxRes);
        exit;
    }
    
    public function register() {
        $this->layoutData['title'] = 'Register';
        $this->template->authTemplate('auth/register', $this->layoutData);
    }
}
