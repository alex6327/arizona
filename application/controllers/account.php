<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Account extends CI_Controller {

	
    function __construct() {
        parent::__construct();
        $this->load->library('form_validation');
    }
    public function index()
    {
        $useremail=$this->session->userdata('useremail');
        if($useremail=='')
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
        $this->form_validation->set_rules('email','Emal address','trim|required|valid_email');
        $this->form_validation->set_rules('pwd','Password','trim|required|min_length[4]|matches[pwd_confir]');
        $this->form_validation->set_rules('pwd_confir', 'Password Confirmation', 'trim|required|min_length[4]');
        $this->form_validation->set_rules('uname', 'Username', 'trim|required|min_length[2]|max_length[5]');
        if($this->form_validation->run()!==false){
            
            $this->load->model('account_model');
            $this->account_model->insert_entry();

        }else
        {
            $data = array();
            $data['pagetitle']='用户注册';
            $data['pagebody'] = 'account/register';
            $data['sitenavi']='account/register_sitenavi';
            $data['data']=&$data;
            $this->load->view('template',$data);
        }
    }
    function login()
    {
        
        $data =array();
        
        $this->form_validation->set_rules('loginEmail','Emal address','trim|required|valid_email');
        $this->form_validation->set_rules('loginPwd','Password','trim|required|min_length[4]');
        if($this->form_validation->run()!==false)
        {
            $this->load->model('account_model');
            $query_result=$this->account_model->login();
            $row = $query_result->row();
            $accountName = $row->accountName;
            if($query_result->num_rows()>0)
            {
                $this->session->set_userdata('username', $accountName);
                $this->session->set_userdata('useremail', $this->input->post('loginEmail',TRUE));
                $data['pagebody'] = $this->input->post('pagebody', TRUE);
                $data['pagetitle']=$this->input->post('pagetitle', TRUE);
                $data['sitenavi']=$this->input->post('sitenavi', TRUE);
                $data['data']=&$data;
                $this->load->view('template',$data);
            }  else {
                
            }
        }else{
            $data['slideDown']='TRUE';
            $pagebody = $this->input->post('pagebody', TRUE);
            
            if($pagebody=='')
            {
                $data['pagetitle']='生物产品仓库';
                $data['pagebody'] = 'home';
                $data['sitenavi']='slide';
                
            }
            else
            {
                $data['pagebody'] = $pagebody;
                $data['pagetitle']=$this->input->post('pagetitle', TRUE);
                $data['sitenavi']=$this->input->post('sitenavi', TRUE);
            }
            $data['data']=&$data;
            $this->load->view('template',$data);
        }
        
    }
    function  forgot_password()
    {
            $data = array();
            $data['pagetitle']='忘记密码';
            $data['pagebody'] = 'account/fp';
            $data['sitenavi']='account/fp_sitenavi';
            $data['data']=&$data;
            $this->load->view('template',$data);
    }
    function change_password()
    {
            $data = array();
            $data['pagetitle']='修改密码';
            $data['pagebody'] = 'account/cp';
            $data['sitenavi']='account/cp_sitenavi';
            $data['data']=&$data;
            $this->load->view('template',$data);
    }
    function update_password()
    {
        $this->form_validation->set_rules('newpwd','New Password','trim|required|min_length[4]|matches[pwd_confir]');
        $this->form_validation->set_rules('newpwd_confir', 'New Password Confirmation', 'trim|required|min_length[4]');
        $this->form_validation->set_rules('oldpwd', 'Old Password', 'trim|required|min_length[4]');
        if($this->form_validation->run()!==false){
            
            $this->load->model('account_model');
            $this->account_model->insert_entry();

        }else
        {
            $data = array();
            $data['pagetitle']='用户注册';
            $data['pagebody'] = 'account/register';
            $data['sitenavi']='account/register_sitenavi';
            $data['data']=&$data;
            $this->load->view('template',$data);
        }
    }


    function logout()
    {
        $this->session->sess_destroy();
        redirect('');
    }
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */