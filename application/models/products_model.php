<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Products_model extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    function get_antibody() {
        $results = $this->db->get('prodantibiotics')->result();
        foreach ($results as &$result) {
            $result->category = 'antibody';
        }
        return $results;
    }

    function get_product($grpId, $catId, $ssn, $sn = NULL) {

        $grpName = $this->get_grpName($grpId);
        $catName = $this->get_catName($grpName, $catId);
        $query_table = $grpName . "_" . $catId . "_" . "prod";
        if ($this->verify_table($query_table)) {
            
        } else {
            $query_table = $grpName . "_" . $catId . "_" . $ssn . "_prod";
        }
        if ($sn == NULL) {
            $query = $this->db->query("select * from $query_table where ssn = $ssn;");
            if ($query->num_rows() > 0) {
                $result = $query->result_array();
                return $result;
            }
        } else {
            $query = $this->db->query("select * from $query_table where sn = $sn;");
            if ($query->num_rows() > 0) {
                $row = $query->row_array();
                $row['catName'] = $catName;
                $row['grpName'] = $grpName;
                $row['subCatName'] = $this->get_subCatName($grpName . "_" . $catId, $ssn);
                $row['table'] = $query_table;
                return $row;
            }
        }
    }

    function get_listing($grpId, $catId, $ssn, $page, $perPage) {

        $grpName = $this->get_grpName($grpId);
        $catName = $this->get_catName($grpName, $catId);
        $query_table = $grpName . "_" . $catId . "_" . "prod";
        if ($this->verify_table($query_table)) {
            
        } else {
            $query_table = $grpName . "_" . $catId . "_" . $ssn . "_prod";
        }

        $offset = ($page - 1) * $perPage;
        $query = $this->db->query("select * from $query_table where ssn = $ssn  LIMIT $offset,$perPage");

        return $query->result_array();
    }

    function get_listing_rows($grpId, $catId, $ssn) {

        $grpName = $this->get_grpName($grpId);
        $catName = $this->get_catName($grpName, $catId);
        $query_table = $grpName . "_" . $catId . "_" . "prod";
        if ($this->verify_table($query_table)) {
            
        } else {
            $query_table = $grpName . "_" . $catId . "_" . $ssn . "_prod";
        }

        $query = $this->db->query("select * from $query_table where ssn = $ssn;");
        if ($query->num_rows() > 0) {

            return $query->num_rows();
        }
    }

    function verify_table($tblName) {
        $query = $this->db->query("SHOW TABLES FROM biocompdb");
        foreach ($query->result_array() as $row) {
            $result = $row['Tables_in_biocompdb'];
            if ($result == $tblName) {
                return TRUE;
            }
        }
        return FALSE;
    }

    function get_product_column($grpId, $catId, $ssn, $sn) {

        $grpName = $this->get_grpName($grpId);
        $catName = $this->get_catName($grpName, $catId);
        $query_table = $grpName . "_" . $catId . "_" . "prod";
        if ($this->verify_table($query_table)) {
            
        } else {
            $query_table = $grpName . "_" . $catId . "_" . $ssn . "_prod";
        }
        $query = $this->db->query("show columns from $query_table");
        $i = 0;
        foreach ($query->result_array() as $row) {
            if ($row['Field'] != 'sn' && $row['Field'] != 'csn' && $row['Field'] != 'ssn' && $row['Field'] != 'dsn' && $row['Field'] != 'operator' && $row['Field'] != 'addtime' && $row['Field'] != 'inventory' && $row['Field'] != 'position' && $row['Field'] != 'srcCatNo' && $row['Field'] != 'accNo' && $row['Field'] != 'srcPrice' && $row['Field'] != 'srcQuan' && $row['Field'] != 'MinQuan' && $row['Field'] != 'Notes' && $row['Field'] != 'supplier') {
                $result[$i] = $row['Field'];
                $i++;
            }
        }
        return $result;
    }

    function get_category_rows($grpId, $catId, $alpha = NULL) {
        $grpName = $this->get_grpName($grpId);
        $tblName = $grpName . '_' . $catId;
        if ($alpha == NULL) {
            $query = $this->db->query("select * from $tblName");
        } else {

            $query = $this->db->query("select * from $tblName where sname like '" . $alpha . "%';");
        }
        return $query->num_rows();
    }

    function get_category($grpId, $catId, $page, $perPage, $alpha = NULL) {
        $grpName = $this->get_grpName($grpId);
        $tblName = $grpName . '_' . $catId;
        $offset = ($page - 1) * $perPage;
        if ($alpha == NULL) {
            $query = $this->db->query("select * from $tblName order by sname LIMIT $offset,$perPage");
        } else {
            $query = $this->db->query("select * from $tblName where sname like '" . $alpha . "%' order by sname LIMIT $offset ,$perPage");
        }
        return $query->result_array();
    }

    function get_grpName($grpId) {
        $query = $this->db->query("select * from groups where `Group ID` like '$grpId'");

        if ($query->num_rows() > 0) {
            $row = $query->row_array();
            $grpName = $row['Table Name'];
            return $grpName;
        }
        return FALSE;
    }

    function get_catName($tblName, $catId) {
        $query = $this->db->query("select * from $tblName where `Category ID` like '$catId'");

        if ($query->num_rows() > 0) {
            $row = $query->row();
            $catName = $row->cname;
            return $catName;
        }
        return FALSE;
    }

    function get_subCatName($tblName, $ssn) {
        $query = $this->db->query("select * from $tblName where `sn` like '$ssn'");

        if ($query->num_rows() > 0) {
            $row = $query->row();
            $subCatName = $row->sname;
            return $subCatName;
        }
        return FALSE;
    }

    function get_grpNames() {
        $query = $this->db->query("select * from groups;");
        return $query->result_array();
    }

    function get_catNames($grpId) {
        $grpName = $this->get_grpName($grpId);
        $query = $this->db->query("SELECT * FROM $grpName;");
        return $query->result_array();
    }

    function get_pcr($catId, $ssn) {
        $db = mysql_connect('localhost', 'root', '') or die('Problem connecting to DataBase');
        mysql_query("SET NAMES 'UTF8'");
        mysql_select_db('biocompdb', $db);
        $csn = $catId;
        $DNaselProd = "select * from reagent_cate_22_prod  where `Cat.No.`='G028' or `Cat.No.`='G138'; ";
        $DNaselProd_res = mysql_query($DNaselProd, $db);
        $DNaselProd_rows = mysql_num_rows($DNaselProd_res);
        $DNasle = array();
        if ($DNaselProd_rows > 0) {

            while ($prod_r = mysql_fetch_array($DNaselProd_res)) {
                $prodname = $prod_r['Product Name'];
                $sn = $prod_r['sn'];

                $prod_r['anchor'] = "/product/detail/1/22/3919/$sn";
                $prod_r['title'] = "$prodname";
                $DNasle[$prod_r['Cat.No.']] = $prod_r;
            }
        }
        $qRTPcr = array();
        $qRTPcrProd = "select * from biocompdb.reagent_cate_12_prod where ssn='3461' and dsn='321746'; ";
        $qRTPcrProd_res = mysql_query($qRTPcrProd, $db);
        $qRTPcrProd_rows = mysql_num_rows($qRTPcrProd_res);
        if ($qRTPcrProd_rows > 0) {

            while ($prod_r = mysql_fetch_array($qRTPcrProd_res)) {
                $prodname = $prod_r['Product Name'];
                $sn = $prod_r['sn'];
                switch ($sn) {
                    case "78":
                        $machinea = '-ABI® 7000, 7300, 7700 and 7900, StepOnePlus™ StepOne™';

                        break;
                    case "79":
                        $machinea = '-ABI® 7500<br/>-Stratagene® Mx3000, Mx3005 and Mx4000';

                        break;
                    case "80":
                        $machinea = '-BioRad® iCycler®, iQ™5 and MyiQ™';

                        break;
                    case "81":
                        $machinea = '-BioRad® CFX96<br/>-Roche LightCycler® 480<br/>-MJ Research Opticon™ and Opticon™ 2<br/>-MJ Research Chromo® 4<br/>-Corbett Rotor-gene® 6000,3000<br/>-Eppendorf® Realplex';

                        break;
                }

                $prod_r['quantity'] = $machinea;
                $prod_r['anchor'] = "/product/detail/1/12/3461/$sn";
                $prod_r['title'] = "$prodname";
                $qRTPcr[$prod_r['Cat.No.']] = $prod_r;
            }
        }
        $qPcr = array();
        $rtPcr = array();
        $DnaPoly = array();
        $pcrOpti = array();
        $DnaStain = array();
        $dNTPs = array();
        $DnaMarker = array();
        $DNaslePage = array();

        switch ($ssn) {
            //qPCR
            case "3461":
                $qPcrProd = array();
                $chd = "select * from chdcat where csn = $csn and ssn = $ssn order by sn";
                $chd_res = mysql_query($chd, $db);
                $chd_rows = mysql_num_rows($chd_res);
                if ($chd_rows > 0) {
                    while ($chd_r = mysql_fetch_array($chd_res)) {
                        $dsn = $chd_r['sn'];
                        $chdname = $chd_r['dname'];
                        $prod = "select * from biocompdb.reagent_cate_12_prod where csn = $csn and ssn = $ssn and dsn=$dsn;";
                        $prod_res = mysql_query($prod, $db);
                        $prod_rows = mysql_num_rows($prod_res);
                        if ($prod_rows > 0) {
                            while ($prod_r = mysql_fetch_array($prod_res)) {
                                $prodname = $prod_r['Product Name'];
                                $sn = $prod_r['sn'];
                                $catno = $prod_r['Cat.No.'];

                                switch ($catno) {
                                    case "Mastermix-P":
                                        $machinea = '-ABI® 7000, 7300, 7700 and 7900, StepOnePlus™ StepOne™';
                                        $title = "Taqman Probe, Taqman Gene Analysis";
                                        break;
                                    case "Mastermix-R":
                                        $machinea = '-ABI® 7000, 7300, 7700 and 7900, StepOnePlus™ StepOne™';
                                        $title = "qPCR Protocol";
                                        break;
                                    case "Mastermix-KR":
                                        $machinea = '-ABI® 7000, 7300, 7700 and 7900, StepOnePlus™ StepOne™';
                                        $title = "qPCR Protocol";
                                        break;
                                    case "Mastermix-PL":
                                        $machinea = '-ABI® 7500<br/>-Stratagene® Mx3000, Mx3005 and Mx4000';
                                        $title = "Taqman Gene Expression Analysis, Taqman Genotyping";
                                        break;
                                    case "Mastermix-KL":
                                        $machinea = '-ABI® 7500<br/>-Stratagene® Mx3000, Mx3005 and Mx4000';
                                        $title = "qPCR Protocol";
                                        break;
                                    case "Mastermix-LR":
                                        $machinea = '-ABI® 7500<br/>-Stratagene® Mx3000, Mx3005 and Mx4000';
                                        $title = "qPCR Sybr Green Protocol, qPCR Sybr Green Primer Design";
                                        break;
                                    case "Mastermix-KC":
                                        $machinea = '-BioRad® iCycler®, iQ™5 and MyiQ™';
                                        $title = "qPCR Protocol";
                                        break;
                                    case "Mastermix-PC":
                                        $machinea = '-BioRad® iCycler®, iQ™5 and MyiQ™';
                                        $title = "Taqman qPCR, Taqman qPCR Quencher, Taqman qPCR Protocol";
                                        break;
                                    case "Mastermix-iC":
                                        $machinea = '-BioRad® iCycler®, iQ™5 and MyiQ™';
                                        $title = "iCycler Biorad, $prodname";
                                        break;
                                    case "Mastermix-KS":
                                        $machinea = '-BioRad® CFX96<br/>-Roche LightCycler® 480<br/>-MJ Research Opticon™ and Opticon™ 2<br/>-MJ Research Chromo® 4<br/>-Corbett Rotor-gene® 6000,3000<br/>-Eppendorf® Realplex';
                                        $title = "qPCR Protocol";
                                        break;
                                    case "Mastermix-S":
                                        $machinea = '-BioRad® CFX96<br/>-Roche LightCycler® 480<br/>-MJ Research Opticon™ and Opticon™ 2<br/>-MJ Research Chromo® 4<br/>-Corbett Rotor-gene® 6000,3000<br/>-Eppendorf® Realplex';
                                        $title = "RT-qPCR Protocol, RT-qPCR Anaylysis";
                                        break;
                                    case "Mastermix-PS":
                                        $machinea = '-BioRad® CFX96, Opticon™, Opticon™ 2, and Chromo® 4<br/>-Roche LightCycler® 480<br/>-Corbett Rotor-gene® 6000,3000<br/>-Eppendorf® Realplex';
                                        $title = "Taqman qPCR Trouble Shooting, Taqman qPCR Principles";
                                        break;
                                    case "Mastermix-PM":
                                        $machinea = 'Suited for Multiplex TaqMan assay in the following instrument.<br/>-ABI® 7000,7300,7500,7700,7900, StepOne™, StepOnePlus™<br/>-BioRad® iCycler®, iQ™5, CFX96, Opticon™2, Chromo® 4<br/>-Corbett Rotor-gene® 6000,3000<br/>-Stratagene® Mx3000, Mx4000<br/>-Roche LightCycler® 2.0, 480';

                                        $title = "$prodname";
                                        break;
                                    case "RT-PCR-Mastermix-P": $machinea = '-ABI® 7000,7300,7700 and 7900';
                                        break;
                                    case "G471-R":
                                        $machinea = '-ABI® 7000, 7300, 7700 and 7900, StepOnePlus™ StepOne™';
                                        $title = "$prodname";
                                        break;
                                    case "G471-LR":
                                        $machinea = '-ABI® 7500<br/>-Stratagene® Mx3000, Mx3005 and Mx4000';
                                        $title = "$prodname";
                                        break;
                                    case "G471-iC":
                                        $machinea = '-BioRad® iCycler®, iQ™5 and MyiQ™';
                                        $title = "$prodname";
                                        break;
                                    case "G471-S":
                                        $machinea = '-BioRad® CFX96<br/>-Roche LightCycler® 480<br/>-MJ Research Opticon™ and Opticon™ 2<br/>-MJ Research Chromo® 4<br/>-Corbett Rotor-gene® 6000,3000<br/>-Eppendorf® Realplex';
                                        $title = "$prodname";
                                        break;
                                }

                                $prod_r['quantity'] = $machinea;
                                $prod_r['anchor'] = "/product/detail/1/12/3461/$sn";
                                $prod_r['title'] = $title;
                                $qPcrProd[$chdname][$prod_r['Cat.No.']] = $prod_r;
                            }
                        }
                    }
                }

                foreach (array('EvaGreen qPCR Mastermix', 'One-Step EvaGreen qRT-PCR Kit', 'TaqProbe qPCR Mastermix', 'KiloGreen qPCR Mastermix') as $k) {
                    $qPcr[$k] = $qPcrProd[$k];
                }


                break;
            case"3462":
                $chd = "select * from chdcat where csn = $csn and ssn = $ssn order by sn";
                $chd_res = mysql_query($chd, $db);
                $chd_rows = mysql_num_rows($chd_res);
                if ($chd_rows > 0) {
                    while ($chd_r = mysql_fetch_array($chd_res)) {
                        $dsn = $chd_r['sn'];
                        $chdname = $chd_r['dname'];
                        if (stristr($chdname, "Reverse Transcriptase PCR")) {
                            $chdname = "Reverse Transcriptases";
                        }
                        if (stristr($chdname, "cDNA Synthesis Kit")) {
                            $chdname = "First-Stand cDNA Synthesis Kit";
                        }
                        if (stristr($chdname, "cDNA Synthesis Supermix")) {
                            $chdname = "First-Stand cDNA Synthesis Supermix ";
                        }
                        $prod = "select * from biocompdb.reagent_cate_12_prod where csn = $csn and ssn = $ssn and dsn=$dsn;";
                        $prod_res = mysql_query($prod, $db);
                        $prod_rows = mysql_num_rows($prod_res);
                        if ($prod_rows > 0) {
                            while ($prod_r = mysql_fetch_array($prod_res)) {
                                $prodname = $prod_r['Product Name'];
                                $sn = $prod_r['sn'];


                                $catno = $prod_r['Cat.No.'];
                                $price = $prod_r['Price'];
                                $quant = $prod_r['Quantity'];
                                $prod_r['anchor'] = "/product/detail/1/12/3461/$sn";
                                $prod_r['title'] = $prodname;
                                $rtPcr[$chdname][$prod_r['Cat.No.']] = $prod_r;
                            }
                        }
                    }
                }

                $res = array_splice($rtPcr, 2, 1);
                $rtPcr[key($res)] = $res[key($res)];
                $rtPcr['One-Step EvaGreen qRT-PCR Kit'] = $qRTPcr;
                $rtPcr["DNaseI/RNaseOFF "] = $DNasle;

                break;
            case"3463":
                $chd = "select * from chdcat where csn = $csn and ssn = $ssn order by sn";
                $chd_res = mysql_query($chd, $db);
                $chd_rows = mysql_num_rows($chd_res);
                if ($chd_rows > 0) {
                    while ($chd_r = mysql_fetch_array($chd_res)) {
                        $dsn = $chd_r['sn'];
                        $chdname = $chd_r['dname'];
                        if (stristr($chdname, "Polymerase")) {
                            $chdname = "DNA Polymerase";
                        }
                        if (stristr($chdname, "MasterMix")) {
                            $chdname = "PCR Taq Mastermix";
                        }

                        $prod = "select * from biocompdb.reagent_cate_12_prod where csn = $csn and ssn = $ssn and dsn=$dsn;";
                        $prod_res = mysql_query($prod, $db);
                        $prod_rows = mysql_num_rows($prod_res);
                        if ($prod_rows > 0) {
                            while ($prod_r = mysql_fetch_array($prod_res)) {
                                $prodname = $prod_r['Product Name'];
                                $catno = $prod_r['Cat.No.'];
                                $price = $prod_r['Price'];
                                $quant = $prod_r['Quantity'];
                                $sn = $prod_r['sn'];
                                $prod_r['anchor'] = "/product/detail/1/12/$ssn/$sn";
                                $prod_r['title'] = "$prodname";
                                $DnaPoly[$chdname][$prod_r['Cat.No.']] = $prod_r;
                            }
                        }
                    }
                }

                $DnaPoly["DNaseI/RNaseOFF "] = $DNasle;
//                                            echo "<pre>";
//                                            print_r($rtPcr);
//
//
//                                            die();
                break;
            case"3464":
                $chd = "select * from chdcat where csn = $csn and ssn = $ssn order by sn";
                $chd_res = mysql_query($chd, $db);
                $chd_rows = mysql_num_rows($chd_res);
                if ($chd_rows > 0) {
                    while ($chd_r = mysql_fetch_array($chd_res)) {
                        $dsn = $chd_r['sn'];
                        $chdname = $chd_r['dname'];


                        $prod = "select * from biocompdb.reagent_cate_12_prod where csn = $csn and ssn = $ssn and dsn=$dsn order by `Product Name` desc;";
                        $prod_res = mysql_query($prod, $db);
                        $prod_rows = mysql_num_rows($prod_res);
                        if ($prod_rows > 0) {
                            while ($prod_r = mysql_fetch_array($prod_res)) {
                                $prodname = $prod_r['Product Name'];
                                $catno = $prod_r['Cat.No.'];
                                $price = $prod_r['Price'];
                                $quant = $prod_r['Quantity'];
                                $sn = $prod_r['sn'];
                                $prod_r['anchor'] = "/product/detail/1/12/3463/$sn";
                                $prod_r['title'] = $prodname;
                                $pcrOpti[$chdname][$prod_r['Cat.No.']] = $prod_r;
                            }
                        }
                    }
                }
                break;
            case"3465":
                $chd = "select * from chdcat where csn = $csn and ssn = $ssn order by sn";
                $chd_res = mysql_query($chd, $db);
                $chd_rows = mysql_num_rows($chd_res);
                if ($chd_rows > 0) {
                    while ($chd_r = mysql_fetch_array($chd_res)) {
                        $dsn = $chd_r['sn'];
                        $chdname = $chd_r['dname'];


                        $prod = "select * from biocompdb.reagent_cate_12_prod where csn = $csn and ssn = $ssn and dsn=$dsn order by `Product Name` desc;";
                        $prod_res = mysql_query($prod, $db);
                        $prod_rows = mysql_num_rows($prod_res);
                        if ($prod_rows > 0) {
                            while ($prod_r = mysql_fetch_array($prod_res)) {
                                $prodname = $prod_r['Product Name'];

                                $catno = $prod_r['Cat.No.'];
                                $price = $prod_r['Price'];
                                $quant = $prod_r['Quantity'];
                                $sn = $prod_r['sn'];
                                $prod_r['anchor'] = "/product/detail/1/12/$ssn/$sn";
                                $prod_r['title'] = "$prodname";
                                $DnaStain[$chdname][$prod_r['Cat.No.']] = $prod_r;
                            }
                        }
                    }
                }
                break;
            case"3466":
                $chd = "select * from chdcat where csn = $csn and ssn = $ssn order by sn";
                $chd_res = mysql_query($chd, $db);
                $chd_rows = mysql_num_rows($chd_res);
                if ($chd_rows > 0) {
                    while ($chd_r = mysql_fetch_array($chd_res)) {
                        $dsn = $chd_r['sn'];
                        $chdname = $chd_r['dname'];


                        $prod = "select * from biocompdb.reagent_cate_12_prod where csn = $csn and ssn = $ssn and dsn=$dsn order by pname desc;";
                        $prod_res = mysql_query($prod, $db);
                        $prod_rows = mysql_num_rows($prod_res);
                        if ($prod_rows > 0) {
                            while ($prod_r = mysql_fetch_array($prod_res)) {
                                $prodname = $prod_r['Product Name'];
                                $catno = $prod_r['Cat.No.'];
                                $price = $prod_r['Price'];
                                $quant = $prod_r['Quantity'];
                                $sn = $prod_r['sn'];
                                $prod_r['anchor'] = "/product/detail/1/12/$ssn/$sn";
                                $prod_r['title'] = "$prodname";
                                $dNTPs[$chdname][$prod_r['Cat.No.']] = $prod_r;
                            }
                        }
                    }
                }
                break;
            case"3916":
                $chd = "select * from chdcat where  ssn = $ssn order by sn";
                $chd_res = mysql_query($chd, $db);
                $chd_rows = mysql_num_rows($chd_res);
                if ($chd_rows > 0) {
                    while ($chd_r = mysql_fetch_array($chd_res)) {
                        $dsn = $chd_r['sn'];
                        $chdname = $chd_r['dname'];


                        $prod = "select * from biocompdb.reagent_cate_22_prod where csn = 22 and ssn = 3916 and `Cat.No.` not like 'G470' order by `Cat.No.`;";
                        $prod_res = mysql_query($prod, $db);
                        $prod_rows = mysql_num_rows($prod_res);
                        if ($prod_rows > 0) {
                            while ($prod_r = mysql_fetch_array($prod_res)) {
                                $prodname = $prod_r['Product Name'];

                                $price = $prod_r['Price'];
                                $quant = $prod_r['Quantity'];
                                $sn = $prod_r['sn'];
                                $prod_r['anchor'] = "/product/detail/1/22/$ssn/$sn";
                                $prod_r['title'] = "$prodname";
                                $DnaMarker[$chdname][$prod_r['Cat.No.']] = $prod_r;
                            }
                        }
                    }
                }
                break;
            case"3919":
                $DNaslePage["DNaseI/RNaseOFF "] = $DNasle;
                break;

            default:
                break;
        }
        $pcrProduct = array(
            "3461" => $qPcr,
            "3462" => $rtPcr,
            "3463" => $DnaPoly,
            "3464" => $pcrOpti,
            "3465" => $DnaStain,
            "3466" => $dNTPs,
            "3916" => $DnaMarker,
            "3919" => $DNaslePage,
        );
        return $pcrProduct;
    }

}