<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Test extends CI_Controller {
    
    function __construct() {
        parent::__construct();
        
    }

    public function index() {

        $data['pagebody'] = 'test';
        $data['sitenavi'] = '/account/cp_sitenavi';
        $data['data'] = &$data;
        $this->load->view('template', $data);
    }
    
}