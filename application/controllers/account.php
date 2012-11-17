<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Account extends CI_Controller {

	
    function __construct() {
        parent::__construct();
    }
    public function index()
    {
           
    }
    function register()
    {
             $data = array();
            $data['pagetitle']='用户注册';
            $data['pagebody'] = 'account/register';
            $data['sitenavi']='account/register_sitenavi';
            $data['data']=&$data;
            $this->load->view('template',$data);
    }
    function create_account()
    {
        
        $this->load->model('account_model');
        $this->account_model->insert_entry();
    }
    function login()
    {
        $this->load->model('account_model');
        $query_result=$this->account_model->login();
        if($query_result->num_rows()>0)
        {
            echo 'yes';
        }else
        {
            echo 'no';
        }
    }
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */