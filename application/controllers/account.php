<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Account extends CI_Controller {

	
    function __construct() {
        parent::__construct();
    }
    public function index()
    {
        $username=$this->session->userdata('username');
        echo 'hello';
        echo $username;
        if( !isset($username))
        {
            redirect('/');
        }
           $this->load->view('test');
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
        
        $data =array();
        $this->load->library('form_validation');
        $this->form_validation->set_rules('loginEmail','Emal address','required|valid_email');
        $this->form_validation->set_rules('loginPwd','Password','required|min_length[4]');
        if($this->form_validation->run()!==false)
        {
            $this->load->model('account_model');
            $query_result=$this->account_model->login();
            if($query_result->num_rows()>0)
            {
                $this->session->set_userdata('username', $this->input->post('loginEmail',TRUE));
                $data['pagebody'] = $this->input->post('pagebody', TRUE);
                $data['pagetitle']=$this->input->post('pagetitle', TRUE);
                $data['sitenavi']=$this->input->post('sitenavi', TRUE);
                $data['data']=&$data;
                $this->load->view('template',$data);
            }
        }
        $data['slideDown']='TRUE';
        $data['pagebody'] = $this->input->post('pagebody', TRUE);
        $data['pagetitle']=$this->input->post('pagetitle', TRUE);
        $data['sitenavi']=$this->input->post('sitenavi', TRUE);
        $data['data']=&$data;
        $this->load->view('template',$data);
        
        
    }
    
    function logout()
    {
        $this->session->userdata('username');
    }
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */