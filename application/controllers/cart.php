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
        $quantity = $this->input->post('quantity',TRUE);
        $qty= $this->input->post('qty',TRUE);
        $id = $table."_".$id;
        $data = array(
               'id'      => $id,
               'qty'     => $qty,
               'price'   => $price,
               'name'    =>$name,
                'options' => array('规格' => $quantity)
            );
        $this->cart->product_name_rules ='[:print:]'; 
        $this->cart->product_id_rules = '[:print:]'; 
        $this->cart->insert($data);
//        echo '<pre>';
//        print_r($this->cart->contents());
//        die();
        redirect('/cart');
    }
    function show(){
        $cart = $this->cart->contents();
        echo '<pre>';
        print_r($cart);
        
    }
    function update(){
        $i = 1;
        do
        {
            $rowId = $this->input->post($i.'rowid',TRUE);
            $rowQty = $this->input->post($i.'qty',TRUE);
            $i++;
            $data = array(
            'rowid' => $rowId,
            'qty' => $rowQty
                );
        
        $this->cart->update($data);
        }
        while($rowId != '');
        redirect('/cart');
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