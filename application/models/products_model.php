<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Products_model extends CI_Model {
    
    function __construct()
    {
        parent::__construct();
    }
    function get_antibody(){
        $results = $this->db->get('prodantibiotics')->result();
        foreach($results as &$result){
            $result->category = 'antibody';
        }
        return $results;
    }
    function get_one(){
        $results = $this->db->where('catNo','G261')->get('prodantibiotics')->result();
        return $results[0];
    }
}