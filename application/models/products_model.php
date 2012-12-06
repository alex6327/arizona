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
    function get_product($grpId,$catId,$ssn,$sn){
        
        $grpName =  $this->get_grpName($grpId);
        $catName = $this->get_catName($grpName, $catId);
        $query_table = $grpName."_".$catId."_"."prod";
        if($this->verify_table($query_table))
        {
            
        }else {
            $query_table = $grpName."_".$catId."_".$ssn."_prod";
        }
        $query =  $this->db->query("select * from $query_table where sn = $sn;");
        
        if ($query->num_rows() > 0){
                $row = $query->row_array();
                $row['catName'] = $catName;
                $row['grpName'] = $grpName;
                $row['subCatName'] = $this->get_subCatName($grpName."_".$catId, $ssn);
                $row['table'] = $query_table;
                return $row;
        }
    }
    function verify_table($tblName)
    {
        $query =  $this->db->query("SHOW TABLES FROM biocompdb");
        foreach ($query->result_array() as $row)
        {
            $result = $row['Tables_in_biocompdb'];
            if($result == $tblName)
            {
                return TRUE;
            }
        }
        return FALSE;
    }
    function get_product_column($grpId,$catId,$ssn,$sn){
        
        $grpName =  $this->get_grpName($grpId);
        $catName = $this->get_catName($grpName, $catId);
        $query_table = $grpName."_".$catId."_"."prod";
        if($this->verify_table($query_table))
        {
            
        }  else {
            $query_table = $grpName."_".$catId."_".$ssn."_prod";
        }
        $query =  $this->db->query("show columns from $query_table");
        $i=0;
        foreach ($query->result_array() as $row)
        {
            if($row['Field']!='sn' && $row['Field']!='csn' && $row['Field']!='ssn' && $row['Field']!='dsn' && $row['Field']!='operator' && $row['Field']!='addtime' && $row['Field']!='inventory' && $row['Field']!='position' && $row['Field']!='srcCatNo' && $row['Field']!='accNo' && $row['Field']!='srcPrice' && $row['Field']!='srcQuan' && $row['Field']!='MinQuan' && $row['Field']!='Notes'){
                $result[$i] = $row['Field'];
                $i++;
            }
           
        }
        return $result;
        
            
        
        
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
    function get_subCatName($tblName,$ssn)
    {
        $query =  $this->db->query("select * from $tblName where `sn` like '$ssn'");
        
        if ($query->num_rows() > 0){
                $row = $query->row();
                $subCatName = $row->sname;
                return $subCatName;
        }
        return FALSE;
    }
    
}