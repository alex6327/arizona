<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Cart extends CI_Controller{
    
    function add(){
        $data = array(
            'id' => $this->input,
            'name' => 'Pants',
            'qty' => 1,
            'price' => 19.99,
            'option' => array('Size' => 'medium')
            
        );
        $this->cart->insert($data);
        echo 'ok';
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