<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Product extends CI_Controller {

	
    function __construct() {
        parent::__construct();
    }
    public function index()
    {
        
        $this->load->model('products_model');
        echo '<pre>';
        print_r($this->products_model->get_product('1','8','42','24'));

    }
    
    function detail($grpId,$catId,$ssn,$sn)
    {
            $data = array();
            $this->load->model('products_model');
            $data['product'] = $this->products_model->get_product($grpId,$catId,$ssn,$sn);
            $data['product_column'] = $this->products_model->get_product_column($grpId,$catId,$ssn,$sn);
//            echo '<pre>';
//            print_r($data['product']);
//            die();
            $data['pagetitle']='产品';
            $data['pagebody'] = 'product/detail';
            $data['sitenavi']='product/detail_sitenavi';
            $data['data']=&$data;
            $this->load->view('template',$data);
    }
    function listing()
    {
        $data = array();
        $this->load->model('products_model');
        $data['products'] = $this->products_model->get_antibody();
        $data['pagetitle']='产品列表';
        $data['pagebody'] = '/product/list';
        $data['sitenavi']='/product/list_sitenavi';
        $data['data']=&$data;
        $this->load->view('template',$data);
    }
}
