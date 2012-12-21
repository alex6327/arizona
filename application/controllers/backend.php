<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Backend extends CI_Controller {

    function __construct() {
        parent::__construct();
    }

    public function index() {
        $data = array();
        $data['pagetitle'] = '用户中心';
        $data['pagebody'] = 'backend/index';
        $data['active'] = 'index';
        $data['data'] = &$data;
        $this->load->view('backend/template', $data);
    }

    function product_list() {
        $data = array();
        $data['pagetitle'] = '产品列表';
        $data['pagebody'] = 'backend/product_list';
        $data['active'] = 'product_list';
        $data['data'] = &$data;
        $this->load->view('backend/template', $data);
    }

    function product() {
        $data = array();
        $data['pagetitle'] = '增加新产品';
        $data['pagebody'] = 'backend/product';
        $data['active'] = 'product';
        $data['data'] = &$data;
        $this->load->view('backend/template', $data);
    }

    function media() {
        $data = array();
        $data['pagetitle'] = '相册';
        $data['pagebody'] = 'backend/media';
        $data['active'] = 'media';
        $data['data'] = &$data;
        $this->load->view('backend/template', $data);
    }

    function help() {
        $data = array();
        $data['pagetitle'] = '帮助';
        $data['pagebody'] = 'backend/help';
        $data['active'] = 'help';
        $data['data'] = &$data;
        $this->load->view('backend/template', $data);
    }

    function faq() {
        $data = array();
        $data['pagetitle'] = 'faq';
        $data['pagebody'] = 'backend/faq';
        $data['active'] = 'faq';
        $data['data'] = &$data;
        $this->load->view('backend/template', $data);
    }

}

/* End of file backend.php */
/* Location: ./application/controllers/welcome.php */