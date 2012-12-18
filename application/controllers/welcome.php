<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Welcome extends CI_Controller {

    /**
     * Index Page for this controller.
     *
     * Maps to the following URL
     * 		http://example.com/index.php/welcome
     * 	- or -  
     * 		http://example.com/index.php/welcome/index
     * 	- or -
     * Since this controller is set as the default controller in 
     * config/routes.php, it's displayed at http://example.com/
     *
     * So any other public methods not prefixed with an underscore will
     * map to /index.php/welcome/<method_name>
     * @see http://codeigniter.com/user_guide/general/urls.html
     */
    function __construct() {
        parent::__construct();
    }

    public function index() {
        $data = array();
        $this->load->model('products_model');
        $data['grpNames'] = $this->products_model->get_grpNames();
        $data['reagents'] = $this->products_model->get_catNames('1');
        $data['services'] = $this->products_model->get_catNames('2');
        $data['equipments'] = $this->products_model->get_catNames('3');
        $data['softwares'] = $this->products_model->get_catNames('4');
        $data['pagetitle'] = '生物产品仓库';
        $data['pagebody'] = 'home';
        $data['sitenavi'] = 'slide';
        $data['data'] = &$data;
        $this->load->view('template', $data);
    }

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */