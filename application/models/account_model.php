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

    function update_entry()
    {
        $this->title   = $_POST['title'];
        $this->content = $_POST['content'];
        $this->date    = time();

        $this->db->update('entries', $this, array('id' => $_POST['id']));
    }
    function login()
    {
        $loginarray = array('email' => $this->input->post('loginEmail', TRUE), 'password' => sha1($this->input->post('loginPwd', TRUE)));
        $this->db->from('account')->where($loginarray);

        $query = $this->db->get();
        return $query;
    }

}