<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Cart extends CI_Controller {

    function index() {
        $data = array();
        $data['pagetitle'] = '购物车';
        $data['pagebody'] = 'cart/cart';
        $data['sitenavi'] = 'cart/cart_sitenavi';
        $data['data'] = &$data;
        $this->load->view('template', $data);
    }

    function add() {
        $id = $this->input->post('id', TRUE);
        $price = $this->input->post('price', TRUE);
        $name = $this->input->post('name', TRUE);
        $table = $this->input->post('table', TRUE);
        $quantity = $this->input->post('quantity', TRUE);
        $qty = $this->input->post('qty', TRUE);
        $id = $table . "_" . $id;
        $data = array(
            'id' => $id,
            'qty' => $qty,
            'price' => $price,
            'name' => $name,
            'options' => array('规格' => $quantity)
        );
        $this->cart->product_name_rules = '[:print:]';
        $this->cart->product_id_rules = '[:print:]';
        $this->cart->insert($data);
//        echo '<pre>';
//        print_r($this->cart->contents());
//        die();
        redirect('/cart');
    }

    function show() {
        $cart = $this->cart->contents();
        echo '<pre>';
        print_r($cart);
    }

    function update() {
        $i = 1;
        do {
            $rowId = $this->input->post($i . 'rowid', TRUE);
            $rowQty = $this->input->post($i . 'qty', TRUE);
            $i++;
            $data = array(
                'rowid' => $rowId,
                'qty' => $rowQty
            );

            $this->cart->update($data);
        } while ($rowId != '');
        redirect('/cart');
    }

    function total() {
        echo $this->cart->total();
    }

    function remove() {
        $data = array(
            'rowid' => 'a1d0c6e83f027327d8461063f4ac58a6',
            'qty' => 0
        );

        $this->cart->update($data);
        echo 'remove called';
    }

    function destroy() {

        $this->cart->destroy();
        echo 'destory called';
    }

    function checkout() {
        $useremail = $this->session->userdata('useremail');
        if ($useremail == '') {
            $data = array();
            $data['slideDown'] = 'TRUE';

            $data['pagetitle'] = '结算中心';
            $data['pagebody'] = 'cart/cart';
            $data['sitenavi'] = 'cart/cart_sitenavi';
            $data['data'] = &$data;
            $this->load->view('template', $data);
        } else {
            $data = array();
            $data['pagetitle'] = '结算中心';
            $data['pagebody'] = 'cart/checkout';
            $data['sitenavi'] = 'cart/cart_sitenavi';
            $data['data'] = &$data;
            $this->load->view('template', $data);
        }
    }

    function processing() {
        $this->load->library('form_validation');
        $this->form_validation->set_rules('fullName', '收货人姓名', 'trim|required');
        $this->form_validation->set_rules('province', '省', 'trim|required');
        $this->form_validation->set_rules('city', '市', 'trim|required');
        $this->form_validation->set_rules('district', '区/县', 'trim|required');
        $this->form_validation->set_rules('streetAddress', '街道地址', 'trim|required');
        $this->form_validation->set_rules('postCode', '邮政编码', 'trim|required');
//        $this->form_validation->set_rules('pwd', 'Password', 'trim|required|min_length[4]|matches[pwd_confir]');
//        $this->form_validation->set_rules('pwd_confir', 'Password Confirmation', 'trim|required|min_length[4]');
//        $this->form_validation->set_rules('uname', 'Username', 'trim|required|min_length[2]|max_length[12]');
        if ($this->form_validation->run() !== false) {
            $this->load->model('checkout_model');
            $this->checkout_model->insert_checkout_entry();
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
            $this->checkout();
        }
    }

}