<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Product extends CI_Controller {

	
    function __construct() {
        parent::__construct();
        //$this->load->library('form_validation');
    }
    public function index()
    {
            $data = array();
            $data['pagetitle']='产品';
            $data['pagebody'] = 'product/detail';
            $data['sitenavi']='product/detail_sitenavi';
            $data['data']=&$data;
            $this->load->view('template',$data);
    }
}
/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */