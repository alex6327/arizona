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
    function get_product($grpId,$catId,$ssn,$catalNum){
        $result = array();
        $grpName =  $this->get_grpName($grpId);
        $catName = $this->get_catName($grpName, $catId);
        $query_table = $grpName."_".$catId."_"."prod";
        $query =  $this->db->query("select * from $query_table where `Cat.No.` like '$catalNum'");
        
        if ($query->num_rows() > 0){
                $row = $query->row_array();
                return $row;
        }
            
                
            
    }
       
    
    function get_grpName($grpId)
    {
        $query =  $this->db->query("select * from groups where `Group ID` like '$grpId'");
        
        if ($query->num_rows() > 0){
                $row = $query->row_array();
                $grpName = $row['Table Name'];
                return $grpName;
        }
        return FALSE;
    }
    function get_catName($tblName,$catId)
    {
        $query =  $this->db->query("select * from $tblName where `Category ID` like '$catId'");
        
        if ($query->num_rows() > 0){
                $row = $query->row();
                $catName = $row->cname;
                return $catName;
        }
        return FALSE;
    }
    function get_geneName($tblName,$ssn)
    {
        $query =  $this->db->query("select * from $tblName where `sn` like '$ssn'");
        
        if ($query->num_rows() > 0){
                $row = $query->row();
                $geneName = $row->sname;
                return $geneName;
        }
        return FALSE;
    }
    
}