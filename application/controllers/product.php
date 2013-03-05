<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Product extends CI_Controller {

    function __construct() {
        parent::__construct();
    }

    public function index() {

        $this->load->model('products_model');
        echo '<pre>';
        print_r($this->products_model->get_product('1', '8', '42', '24'));
    }

    function detail($grpId, $catId, $ssn, $sn) {
        $data = array();
        $this->load->model('products_model');
        $grpName = $this->products_model->get_grpName($grpId);
        $data['product'] = $this->products_model->get_product($grpId, $catId, $ssn, $sn);
        $data['product_column'] = $this->products_model->get_product_column($grpId, $catId, $ssn, $sn);
        $data['catName'] = $this->products_model->get_catName($grpName, $catId);
        $data['grpId'] = $grpId;
        $data['catId'] = $catId;
        $data['ssn'] = $ssn;
        $data['subCatName'] = $this->products_model->get_subCatName($grpName."_".$catId,$ssn);
//            echo '<pre>';
//            print_r($data['product']);
//            die();
        $data['pagetitle'] = '产品';
        $data['pagebody'] = 'product/detail';
        $data['sitenavi'] = 'product/detail_sitenavi';
        $data['data'] = &$data;
        $this->load->view('template', $data);
    }

    function listing($grpId, $catId, $ssn) {
        $data = array();
        $this->load->model('products_model');
        $this->load->library('pagination');
        $page = $this->uri->segment(6, 1);
        $config['base_url'] = "http://localhost:8080/product/listing/$grpId/$catId/$ssn";
        $config['total_rows'] = $this->products_model->get_listing_rows($grpId, $catId, $ssn);
        $config['per_page'] = 10;
        $config['use_page_numbers'] = TRUE;
        $config['uri_segment'] = 6;
        $config['num_links'] = 7;
        $grpName = $this->products_model->get_grpName($grpId);
        $data['products'] = $this->products_model->get_listing($grpId, $catId, $ssn,$page,$config['per_page']);
        $data['catName'] = $this->products_model->get_catName($grpName, $catId);
        $data['subCatName'] = $this->products_model->get_subCatName($grpName."_".$catId,$ssn);
        $data['pagetitle'] = '产品列表';
        $data['pagebody'] = '/product/list';
        $data['sitenavi'] = '/product/list_sitenavi';
        $data['grpId'] = $grpId;
        $data['catId'] = $catId;
        $data['ssn'] = $ssn;
        $data['data'] = &$data;
        $this->pagination->initialize($config);
        $data['pagination'] = $this->pagination->create_links();
        $this->load->view('template', $data);
    }

    function category($grpId, $catId) {
        $this->load->model('products_model');
        $this->load->library('pagination');
        $alphabeta = array(1 => 'α', 2 => 'β', 3 => 'γ', 4 => 'δ', 5 => 'ε', 6 => 'ζ', 7 => 'η', 8 => 'θ', 9 => 'ι', 10 => 'κ', 11 => 'λ',
            12 => 'μ', 13 => 'ν', 14 => 'ξ', 15 => 'ο', 16 => 'π', 17 => 'ρ', 18 => 'ς', 19 => 'σ', 20 => 'τ', 21 => 'υ',
            22 => 'φ', 23 => 'χ', 24 => 'ψ',
            25 => '0', 26 => '1', 27 => '2', 28 => '3', 29 => '4', 30 => '5', 31 => '6', 32 => '7', 33 => '8', 34 => '9',
            35 => 'A', 36 => 'B', 37 => 'C', 38 => 'D', 39 => 'E', 40 => 'F', 41 => 'G', 42 => 'H', 43 => 'I', 44 => 'J',
            45 => 'K', 46 => 'L', 47 => 'M', 48 => 'N', 49 => 'O', 50 => 'P', 51 => 'Q', 52 => 'R', 53 => 'S', 54 => 'T',
            55 => 'U', 56 => 'V', 57 => 'W', 58 => 'X', 59 => 'Y', 60 => 'Z');
        $i = 0;
        foreach ($alphabeta as $letter) {
            $num_rows = $this->products_model->get_category_rows($grpId, $catId, $letter);
            if ($num_rows > 0) {
                $data['alphabeta'][$i++] = $letter;
            }
        }
        if (count($data['alphabeta']) > 26) {
            $data['alphaList'] = TRUE;
            $alpha = urldecode($this->uri->segment(5, 'A'));
            $page = $this->uri->segment(6, 1);
            $config['base_url'] = "http://localhost:8080/product/category/$grpId/$catId/$alpha";
            $config['total_rows'] = $this->products_model->get_category_rows($grpId, $catId, $alpha);
            $config['per_page'] = 60;
            $data['per_page'] = $config['per_page'];
            $config['use_page_numbers'] = TRUE;
            $config['uri_segment'] = 6;
            $config['num_links'] = 7;
            $grpName = $this->products_model->get_grpName($grpId);
            $catName = $this->products_model->get_catName($grpName, $catId);
            $data['records'] = $this->products_model->get_category($grpId, $catId, $page, $config['per_page'], $alpha);
            $data['catName'] = $catName;
            $data['pagetitle'] = $catName;
            $data['pagebody'] = '/product/category';
            $data['sitenavi'] = '/product/category_sitenavi';
            $data['alpha'] = $alpha;
            $this->pagination->initialize($config);
            $data['pagination'] = $this->pagination->create_links();
            $data['grpId'] = $grpId;
            $data['catId'] = $catId;
            $data['data'] = &$data;

            $this->load->view('template', $data);
        } else {
            $data['alphaList'] = FALSE;
            $page = $this->uri->segment(6, 1);
            $config['base_url'] = "http://localhost:8080/product/category/$grpId/$catId/";
            $config['total_rows'] = $this->products_model->get_category_rows($grpId, $catId);
            $config['per_page'] = 60;
            $data['per_page'] = $config['per_page'];
            $config['use_page_numbers'] = TRUE;
            $config['uri_segment'] = 5;
            $config['num_links'] = $this->products_model->get_category_rows($grpId, $catId) / $config['per_page'];
            $grpName = $this->products_model->get_grpName($grpId);
            $catName = $this->products_model->get_catName($grpName, $catId);
            $data['records'] = $this->products_model->get_category($grpId, $catId, $page, $config['per_page']);
            $data['catName'] = $catName;
            $data['pagetitle'] = $catName;
            $data['pagebody'] = '/product/category';
            $data['sitenavi'] = '/product/category_sitenavi';
            $this->pagination->initialize($config);
            $data['pagination'] = $this->pagination->create_links();
            $data['grpId'] = $grpId;
            $data['catId'] = $catId;
            $data['data'] = &$data;
            $this->load->view('template', $data);
        }
    }

    function test() {
        $this->load->library('pagination');

        $config['base_url'] = 'http://localhost:8080/product/test/';
        $config['total_rows'] = 200;
        $config['per_page'] = 20;

        $this->pagination->initialize($config);
    }

}
