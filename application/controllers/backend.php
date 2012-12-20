<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Backend extends CI_Controller {

    function __construct() {
        parent::__construct();
    }

    public function index() {
        $data = array();
        $data['pagetitle'] = '用户注册';
        $data['pagebody'] = 'backend/index';
        $data['data'] = &$data;
        $this->load->view('backend/template', $data);
    }
}

/* End of file backend.php */
/* Location: ./application/controllers/welcome.php */