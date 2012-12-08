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
    function category($grpId,$catId,$alpha,$page)
    {
        $this->load->model('products_model');
        $this->load->library('pagination');
        $config['base_url'] = 'http://newwebsite/product/category';
        $config['total_rows'] = $this->products_model->get_category_rows($grpId,$catId);
//        echo $config['total_rows'];
        $config['per_page'] = 60;
        $config['num_links'] = 20;
        $this->pagination->initialize($config);
        $data['records'] = $this->products_model->get_category($grpId,$catId,$alpha,$page);
        #page a, #page strong
{
	background: #e3e3e3;
	padding: 4px 7px;
	text-decoration:none;
	border: 1px solid #cac9c9;
	color: #292929;
	font-size:13px;
}
#page strong, #page a:hover{
	font-weight:normal;
	background: #cac9c9;
	
}
        
    }
}
