<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Cart extends CI_Controller{
    
    function index(){
            $data = array();
            $data['pagetitle']='购物车';
            $data['pagebody'] = 'cart/cart';
            $data['sitenavi']='cart/cart_sitenavi';
            $data['data']=&$data;
            $this->load->view('template',$data);
    }


    function add(){
        $id = $this->input->post('id',TRUE);
        $price = $this->input->post('price',TRUE);
        $name = $this->input->post('name',TRUE);
        $table = $this->input->post('table',TRUE);
        $id = $table."_".$id;
        $data = array(
               'id'      => $id,
               'qty'     => 1,
               'price'   => $price,
               'name'    =>$name,
                'options' => array('table' => $table)
            );
        $this->cart->product_name_rules ='[:print:]'; 
        $this->cart->product_id_rules = '[:print:]'; 
        $this->cart->insert($data);
        echo '<pre>';
        print_r($this->cart->contents());
        die();
        redirect('/cart');
    }
    function show(){
        $cart = $this->cart->contents();
        echo '<pre>';
        print_r($cart);
        
    }
    function update(){
        $data = array(
            'rowid' => 'a1d0c6e83f027327d8461063f4ac58a6',
            'qty' => 10
                );
        
        $this->cart->update($data);
        echo 'update called';
    }
    function  total(){
        echo $this->cart->total();
    }
    function remove(){
        $data = array(
            'rowid' => 'a1d0c6e83f027327d8461063f4ac58a6',
            'qty' => 0
                );
        
        $this->cart->update($data);
        echo 'remove called';
    }
    function destroy()
    {
        
        $this->cart->destroy();
        echo 'destory called';
    }
}