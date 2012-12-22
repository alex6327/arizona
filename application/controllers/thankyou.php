<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Thankyou extends CI_Controller {
    
    function __construct() {
        parent::__construct();
        
    }

    public function index($table = "reagent_cate") {

        $query = $this->db->query("select * from $table;");
        $data['pagebody'] = 'thankyou';
        $data['names'] = $query->result_array();
        $data['sitenavi'] = '/account/cp_sitenavi';
        $data['pagebody'] = 'thankyou';
        $data['table'] = $table;
        $data['data'] = &$data;
        $this->load->view('template', $data);
    }
    function modify(){
        $id = $this->input->post('id');
        $name = $this->input->post('name');
        
        $table = $this->input->post('table');
        $fieldname = 'Category ID';
        $ok= $this->db->query("UPDATE `biocompdb`.`$table` SET `cname` = '".$name."' WHERE `".$fieldname."` = '$id';");
        if($ok>0)
        {
            echo "<script language=javascript>alert('successful');history.go(-1);</script>";
        }  else {
            echo "<script language=javascript>alert('faied, try again or call alex');history.go(-1);</script>";
        }
        
    }
}