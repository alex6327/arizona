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
            echo "successful";
        }
        else {
            $this->checkout();
        }
    }

}