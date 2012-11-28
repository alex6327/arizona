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
            $this->register();
        }
    }
    function previous_page()
    {
                $data =array();
                $data['pagebody'] = $this->input->post('pagebody', TRUE);
                $data['pagetitle']=$this->input->post('pagetitle', TRUE);
                $data['sitenavi']=$this->input->post('sitenavi', TRUE);
                $data['data']=&$data;
                $this->load->view('template',$data);
    }
    function login_page()
    {
            $data=array();
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
    function login()
    {
        
        $this->form_validation->set_rules('loginEmail','Emal address','trim|required|valid_email');
        $this->form_validation->set_rules('loginPwd','Password','trim|required|min_length[4]');
        if($this->form_validation->run()!==false)
        {
            $this->load->model('account_model');
            $query_result=$this->account_model->login($this->input->post('loginEmail', TRUE),$this->input->post('loginPwd', TRUE));
            
            if($query_result->num_rows()>0)
            {
                $row = $query_result->row();
                $accountName = $row->accountName;
                $this->session->set_userdata('username', $accountName);
                $this->session->set_userdata('useremail', $this->input->post('loginEmail',TRUE));
                $this->previous_page();
            }  else {
                $this->login_page();
            }
        }else{
            $this->login_page();
        }
        
    }
   
    function change_password()
    {
        $useremail=$this->session->userdata('useremail');
        if($useremail=='')
        {
            redirect('/');
        }
        
        
        $this->form_validation->set_rules('newpwd','New Password','trim|required|min_length[4]|matches[newpwd_confir]');
        $this->form_validation->set_rules('newpwd_confir', 'New Password Confirmation', 'trim|required|min_length[4]');
        $this->form_validation->set_rules('oldpwd', 'Old Password', 'trim|required|min_length[4]');
        if($this->form_validation->run()!==false)
        {
            
            $this->load->model('account_model');
            $oldpwd= $this->input->post('oldpwd', TRUE);
            $newpwd=  $this->input->post('newpwd',TRUE);
            $query_result=$this->account_model->login($useremail,$oldpwd);
            if ($query_result->num_rows() > 0)
            {
               $row = $query_result->row();
               $this->account_model->update_entry($row->accountID,$row->email,$newpwd,$row->newletter,$row->newsletterCategory);
            }else
            {
                $data = array();
                $data['pagetitle']='修改密码';
                $data['pagebody'] = 'account/cp';
                $data['sitenavi']='account/cp_sitenavi';
                $data['data']=&$data;
                $this->load->view('template',$data);

            }

        }else
        {
            $data = array();
            $data['pagetitle']='修改密码';
            $data['pagebody'] = 'account/cp';
            $data['sitenavi']='account/cp_sitenavi';
            $data['data']=&$data;
            $this->load->view('template',$data);

        }
    }
    
    function forgot_password()
    {
        $this->load->model('account_model');
        $this->form_validation->set_rules('fpEmail','Emal address','trim|required|valid_email');
        if($this->form_validation->run()!==false)
        {
            $fpEmail = $this->input->post('fpEmail', TRUE);
            $result=$this->account_model->getPwd($fpEmail);
            if($result)
            {
                $this->load->library('email');

                $this->email->from('alex@abmgood.com', 'alex');
                $this->email->to($fpEmail);
                //$this->email->cc('another@another-example.com');
                //$this->email->bcc('them@their-example.com');

                $this->email->subject('ABM users password retrieving');
                $this->email->message("Dear customer : <p>Your account information is retrived as below.<p>
                        Email Address: $fpEmail;<br>
                        Password: $result;<br>
                        .<p>
                        To visit our website, please click <a href='http://www.abmgood.com'>www.abmGood.com</a>.<p>
                        Thank you for using ABM website as your products and services source.<p>
                        Best Regards,<p>
                        Applied Biological Materials Inc. <br>Suite 8-13520 Crestwood Place<br>
                        Richmond, BC<br>
                        Canada, V6V 2G2<br>
                        Email: <a href='mailto:order@abmgood.com'>order@abmGood.com</a>");

                if($this->email->send())
                {
                   echo "<script language=javascript>alert('Password retrieving email has been sent to $fpEmail successfully.');location.href='/account/login';</script>";
                }  else {
                    echo "<script language=javascript>alert('发送失败，请重试');history.go(-1);</script>";
                }

            }  else {
                echo "<script language=javascript>alert('您的Email地址不在我们数据库中');history.go(-1);</script>";
                
            }
        }  else {
             $data = array();
            $data['pagetitle']='忘记密码';
            $data['pagebody'] = 'account/fp';
            $data['sitenavi']='account/fp_sitenavi';
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