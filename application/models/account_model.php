<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Account_model extends CI_Model {

    

    function __construct()
    {
        parent::__construct();
    }
    
   
    function insert_entry()
    {
        $usrinput = array(
            'email' => $this->input->post('email', TRUE),
            'password' => sha1($this->input->post('pwd', TRUE)) ,
            'accountName' => $this->input->post('uname', TRUE),
            );

        $this->db->insert('account', $usrinput);
        
    }

    function update_entry($id,$email,$pwd,$newsletter,$newsletterCategory)
    {
        $data = array(
               'email' => $email,
               'password' => sha1($pwd),
               'newletter' => $newsletter,
                'newsletterCategory' => $newsletterCategory
            );

        $this->db->where('accountID', $id);
        $this->db->update('account', $data); 
    }
    function login($loginEmail,$loginPwd)
    {
        $loginarray = array('email' => $loginEmail, 'password' => sha1($loginPwd));
        $this->db->from('account')->where($loginarray);

        $query = $this->db->get();
        return $query;
    }
    function  getPwd($email)
    {
        $this->db->from('account')->where('email', $email);
        $query = $this->db->get();
        if($query->num_rows()>0)
        {
            $row=$query->row();
            return $row->password;
        }else
        {
            return false;
        }
    }
}