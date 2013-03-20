<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Checkout_model extends CI_Model {

    function __construct() {
        parent::__construct();
    }

     function insert_checkout_entry() {
         $accountID = $this->session->userdata('accountID');
         //address
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
        $addressID = $this->db->insert_id();
        //customer_address
        $customer_addressinput = array(
            'accountID' =>$accountID,
            'addressID' =>$addressID,
        );
        $this->db->insert('customer_address', $customer_addressinput);
        //creditcard
        $expireDate = $this->input->post('expireYear', TRUE)."-".$this->input->post('expireMonth', TRUE)."-00";
        $creditCardinput = array(
            'creditCardNo' => $this->input->post('creditCardNo', TRUE),
            'expirationDate' => $expireDate,
        );
        $this->db->insert('creditcard',$creditCardinput);
        $creditCardID= $this->db->insert_id();
        //payment
        $beforetax = $this->cart->total();
        $tax = 0;
            
        $paymentinput = array(
            'total_beforetax' => $beforetax,
            'tax' =>$tax,
            'total_aftertax' => $beforetax+$tax,
        );
        $this->db->insert('payment',$paymentinput);
        $paymentID= $this->db->insert_id();
        //creditcard_payment
        $creditcard_paymentinput=array(
            'paymentID' =>$paymentID,
            'creditCardID' =>$creditCardID,
        );
        $this->db->insert('creditcard_payment',$creditcard_paymentinput);
        $creditcard_paymentID= $this->db->insert_id();
        //shipment
        $shipmentdate = "2013-10-10";
        $shippingMethod = "UPS";
        $shipmentinput =array(
            'addressID' => $addressID,
            'date' =>$shipmentdate,
            'shippingMethod' =>$shippingMethod,
        );
        $this->db->insert('shipment',$shipmentinput);
        $shipmentID= $this->db->insert_id();
        //order
        $supplierID="1";
        $orderinput =array(
            'accountID' => $accountID,
            'supplierID'=>$supplierID,
            'paymentID' =>$paymentID,
            'shipmentID' =>$shipmentID,
            'orderDate'=>date("Y-m-d"),
            'total' =>$beforetax+$tax,
        );
        $this->db->insert('order',$orderinput);
        $orderID= $this->db->insert_id();
        //order_products
        $discount = 0;
        foreach ($this->cart->contents() as $items){
        $order_productsinput = array(
            'orderID' =>$orderID,
            'productID' =>$items['id'],
            'productName' =>$items['name'],
            'price'=>$items['price'],
            'quantity'=> $items['qty'],
            'discount' => $discount,
            'subtotal'=> $items['price']*$items['qty']-$discount,
        );
        $this->db->insert('order_products',$order_productsinput);
        }
    }


    

}