<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Template {

    protected $CI;
    public $layoutData = [];

    public function __construct() {
        $this->CI =& get_instance();
    }

    public function authTemplate($view = "", $data) {
        if ($view) {
            $content = $this->CI->load->view($view, [], true);
            $this->layoutData['content'] = $content;
            $this->layoutData['layout'] = $data;
            $this->CI->load->view('auth/layout',  $this->layoutData);
        }
    }

    public function dashboardTemplate($view = "", $data) {
        if ($view) {
            $content = $this->CI->load->view($view, $data, true);
            $this->layoutData['content'] = $content;
            $this->layoutData['page'] = $data;
            $this->CI->load->view('layout/index',  $this->layoutData);
        }
    }
}