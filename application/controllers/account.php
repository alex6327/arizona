<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Account extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->library('form_validation');
    }

    public function index() {
        $useremail = $this->session->userdata('useremail');
        if ($useremail == '') {
            redirect('/');
        }
        $this->load->view('test');
    }

    function register() {
        $data = array();
        $data['pagetitle'] = '用户注册';
        $data['pagebody'] = 'account/register';
        $data['sitenavi'] = 'account/register_sitenavi';
        $data['data'] = &$data;
        $this->load->view('template', $data);
    }

    function create_account() {
        $this->form_validation->set_rules('email', 'Emal address', 'trim|required|valid_email');
        $this->form_validation->set_rules('pwd', 'Password', 'trim|required|min_length[4]|matches[pwd_confir]');
        $this->form_validation->set_rules('pwd_confir', 'Password Confirmation', 'trim|required|min_length[4]');
        $this->form_validation->set_rules('uname', 'Username', 'trim|required|min_length[2]|max_length[12]');
        if ($this->form_validation->run() !== false) {
            $this->load->helper('url');
            $this->load->model('account_model');
            $this->account_model->insert_entry();
            $url = base_url() . "/account/login_page";
            echo "<script type='text/javascript'>alert('创建帐号成功。');window.location.href = '$url';</script>";
        } else {
            $this->register();
        }
    }

    function login_page() {
        $useremail = $this->session->userdata('useremail');
        if ($useremail != '') {
            redirect('/');
        }
        $data = array();
        $data['slideDown'] = 'TRUE';
        $data['pagetitle'] = '生物产品仓库';
        $this->load->model('products_model');
        $data['grpNames'] = $this->products_model->get_grpNames();
        $data['reagents'] = $this->products_model->get_catNames('1');
        $data['services'] = $this->products_model->get_catNames('2');
        $data['equipments'] = $this->products_model->get_catNames('3');
        $data['softwares'] = $this->products_model->get_catNames('4');
        $data['sitenavi'] = 'slide';
        $data['data'] = &$data;
        $this->load->view('template', $data);
    }

    function verify() {
        $this->load->helper('email');
        $is_ajax = trim($this->input->post('ajax'));
        $email = trim($this->input->post('email'));
        $password = $this->input->post('password');

        if ($is_ajax) {
            if ($email == '') {
                echo 'Email地址不能为空';
            } else {
                if (!valid_email($email)) {
                    echo '请输入正确的Email地址';
                } else {
                    if (strlen($password) < 4) {
                        echo '密码至少是4位';
                    } else {
                        $this->load->model('account_model');
                        $query_result = $this->account_model->login($email, $password);
                        if ($query_result->num_rows() > 0) {

                            $row = $query_result->row();
                            $accountName = $row->accountName;
                            $accountID = $row->accountID;
                            $this->session->set_userdata('accountID', $accountID);
                            $this->session->set_userdata('username', $accountName);
                            $this->session->set_userdata('useremail', $email);
                            $this->load->helper('url');

                            if ($_SERVER['HTTP_REFERER'] == base_url() . "account/login_page") {
                                echo ' ';
                            }else{
                                echo 'TRUE';
                            }
                        } else {
                            echo 'Email地址或者密码不存在';
                        }
                    }
                }
            }
        }
    }

    function login() {
        $useremail = $this->session->userdata('useremail');
        if ($useremail != '') {
            redirect('/');
        }
        $this->form_validation->set_rules('loginEmail', 'Emal address', 'trim|required|valid_email');
        $this->form_validation->set_rules('loginPwd', 'Password', 'trim|required|min_length[4]');
        if ($this->form_validation->run() !== false) {
            $this->load->model('account_model');
            $query_result = $this->account_model->login($this->input->post('loginEmail', TRUE), $this->input->post('loginPwd', TRUE));
            $previousUrl = $this->session->userdata('previousUrl');
            if ($query_result->num_rows() > 0) {
                $row = $query_result->row();
                $accountName = $row->accountName;
                $this->session->set_userdata('username', $accountName);
                $this->session->set_userdata('useremail', $this->input->post('loginEmail', TRUE));


                if ($previousUrl == '') {
                    redirect($this->input->post('url', TRUE));
                } else {
                    redirect($previousUrl);
                }
            } else {
                
            }
        } else {
            $loginStatus = $this->session->userdata('login');
            if ($loginStatus == '') {

                $this->session->set_userdata('previousUrl', $this->input->post('url', TRUE));
            }
            $this->session->set_userdata('login', 'failed');
            $this->login_page();
        }
    }

    function change_password() {
        $useremail = $this->session->userdata('useremail');
        if ($useremail == '') {
            redirect('/');
        }


        $this->form_validation->set_rules('newpwd', 'New Password', 'trim|required|min_length[4]|matches[newpwd_confir]');
        $this->form_validation->set_rules('newpwd_confir', 'New Password Confirmation', 'trim|required|min_length[4]');
        $this->form_validation->set_rules('oldpwd', 'Old Password', 'trim|required|min_length[4]');
        if ($this->form_validation->run() !== false) {

            $this->load->model('account_model');
            $oldpwd = $this->input->post('oldpwd', TRUE);
            $newpwd = $this->input->post('newpwd', TRUE);
            $query_result = $this->account_model->login($useremail, $oldpwd);
            if ($query_result->num_rows() > 0) {
                $row = $query_result->row();
                $this->account_model->update_entry($row->accountID, $row->email, $newpwd, $row->newletter, $row->newsletterCategory);
            } else {
                echo "<script language=javascript>alert('您的Email地址或者密码有错误');history.go(-1);</script>";
            }
        } else {
            $data = array();
            $data['pagetitle'] = '修改密码';
            $data['pagebody'] = 'account/cp';
            $data['sitenavi'] = 'account/cp_sitenavi';
            $data['data'] = &$data;
            $this->load->view('template', $data);
        }
    }

    function forgot_password() {
        $this->load->model('account_model');
        $this->form_validation->set_rules('fpEmail', 'Emal address', 'trim|required|valid_email');
        if ($this->form_validation->run() !== false) {
            $fpEmail = $this->input->post('fpEmail', TRUE);
            $result = $this->account_model->getPwd($fpEmail);
            if ($result) {
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

                if ($this->email->send()) {
                    echo "<script language=javascript>alert('Password retrieving email has been sent to $fpEmail successfully.');location.href='/account/login';</script>";
                } else {
                    echo "<script language=javascript>alert('发送失败，请重试');history.go(-1);</script>";
                }
            } else {
                echo "<script language=javascript>alert('您的Email地址不在我们数据库中');history.go(-1);</script>";
            }
        } else {
            $data = array();
            $data['pagetitle'] = '忘记密码';
            $data['pagebody'] = 'account/fp';
            $data['sitenavi'] = 'account/fp_sitenavi';
            $data['data'] = &$data;
            $this->load->view('template', $data);
        }
    }

    function logout() {
        $this->session->sess_destroy();
        header('Location: ' . $_SERVER['HTTP_REFERER']);
    }

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */