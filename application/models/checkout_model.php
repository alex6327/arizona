<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Checkout_model extends CI_Model {

    function __construct() {
        parent::__construct();
    }

     function insert_checkout_entry() {
        $addressinput = array(
            'contactName' => $this->input->post('fullName', TRUE),
            'province' => $this->input->post('province', TRUE),
            'city' => $this->input->post('city', TRUE),
            'district' => $this->input->post('district', TRUE),
            'address' => $this->input->post('streetAddress', TRUE),
            'postCode' => $this->input->post('postCode', TRUE),
            'contactCell' => $this->input->post('phone', TRUE),
            'contactAreaCode' => $this->input->post('areaCode', TRUE),
            'contactPhoneNo' => $this->input->post('phoneNo', TRUE),
            'contactExtension' => $this->input->post('extension', TRUE),
        );
        $this->db->insert('address', $addressinput);
        $customer_addressinput = array(
            'accountID' =>$this->session->userdata('accountID'),
            'addressID' =>$this->db->insert_id(),
        );
        $this->db->insert('customer_address', $customer_addressinput);
    }


    

}