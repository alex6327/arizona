<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Register extends CI_Controller {

	
    function __construct() {
        parent::__construct();
    }
    public function index()
    {
            $data = array();
            $data['pagetitle']='用户注册';
            $data['pagebody'] = 'register';
            $data['sitenavi']='register_sitenavi';
            $data['data']=&$data;
            $this->load->view('template',$data);
    }
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */