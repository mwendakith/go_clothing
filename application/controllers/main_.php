<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Main_ extends CI_Controller {

    public function index($param = 0) {
        $this->loader('homepage_');
    }
    
    public function access_control() {
        if($this->session->userdata("status") < 4){
            redirect('main_/index');
        }
    }
    
    public function admin() {
        $this->access_control();
        $this->db->select_sum('amount');
        $query = $this->db->get('transactions');
        $my_array = array(
            'trans_row' => $query->row(),
        );
        
        $this->loader('admin_home_', $my_array);
        
    }

    public function checkout() {
        $this->loader('checkout_');
    }
    
    public function edit_product($param) {
        $this->access_control();
        $this->load->model("Products");
        $prod = new Products();
        $prod->load($param);
        $query = $this->db->get("designers");
        $my_array = array(
            'designers' => $query->result(),
            'success' => FALSE,
            'product' => $prod,
        );
        $this->loader('reg_product_', $my_array);
        
    }
    
    public function my_likes() {
        $this->load->model("Products");
        $prod = new Products();
        $my_array = array(
            'table' => $prod->get_likes(),
        );
        $this->loader('my_likes_', $my_array);
    }
    
    public function my_purchases() {
        $this->load->model("Products");
        $prod = new Products();
        $my_array = array(
            'table' => $prod->get_purchases(),
        );
        $this->loader('my_purchases_', $my_array);
    }
    
    
    
    public function purchase() {
        $this->input->post("total");
        $this->load->model("Cart");
        $my_cart = new Cart();
        $my_cart->sale();
        $this->loader('successful_purchase_');
    }
    
    public function view_products() {
        $this->access_control();
        $result = $this->db->get('products');
        $my_array = array(
            'products' => $result->result(),
        );
        $this->loader('view_products_', $my_array);
    }
    
    public function view_categories() {
        $this->access_control();
        $this->loader('view_categories_');
    }
    
    public function view_users() {
        $this->access_control();
        $this->load->model("Users");
        $user = new Users();
        $my_array = array(
            'users' => $user->get_users(TRUE),
        );
        $this->loader('view_users_', $my_array);
    }
    
    public function view_stock() {
        $this->access_control();
        $this->load->model("Stock");
        $sto = new Stock();
        
        $my_array = array(
            'stock' => $sto->view_stock(),
        );
        $this->loader('view_stock_', $my_array);
    }

    public function locate() {
        $par = $this->input->post("sstring");
        $this->load->model("Search");
        $search = new Search();
        $result = $search->results($par);

        $my_array = array(
            'collection' => $result,
        );

        $this->loader('collections_', $my_array);
    }
    
    public function view_category($param) {
        $this->load->model("Product_categories");
        
        $pro = new Product_categories();
        $result  = $pro->category_name($param);
        $my_array = array(
            'collection' => $result,
        );

        $this->loader('collections_', $my_array);
    }

    public function view_product($param) {
        $this->load->model("Stock");
        $sizes = $this->Stock->get_sizes($param);
        $my_array = array('sizes' => $sizes);
        $this->loader('view_product_', $my_array);
    }

    public function category($param = FALSE) {
        $my_array = array('success' => $param);
        $this->loader('reg_category_', $my_array);
    }

    public function product($param = FALSE) {
        $query = $this->db->get("designers");
        $my_array = array(
            'designers' => $query->result(),
            'success' => $param,
        );
        $this->loader('reg_product_', $my_array);
    }
    
    public function product_category($param = FALSE) {
        $query = $this->db->get("products");
        $my_array = array(
            'products' => $query->result(),
            'success' => $param,
        );
        $this->loader('reg_product_category_', $my_array);
    }
    
    public function add_to_cart() {
        $prod = $this->input->post("product_id");
        $size = $this->input->post("size");
        $number = $this->input->post("quantity");
        
              
        $this->load->model("Stock");
        $item = new Stock();
        $item->set_stock($prod, $size);
        
        $this->load->model("Cart");
        $cart = new Cart();
        $cart->add($item->id, $number);
    }
    
    public function del_from_cart($param) {
        $this->load->model("Cart");
        $carts = new Cart();
        $carts->remove($param);
        $this->checkout();
    }

    public function stock($param = FALSE) {
        $this->access_control();
        $query = $this->db->get("products");
        $my_array = array(
            'prod' => $query->result(),
            'success' => $param,
        );
        $this->loader('reg_stock_', $my_array);
    }

    public function designer($param = FALSE) {
        $this->access_control();
        $my_array = array('success' => $param);
        $this->loader('reg_designer_', $my_array);
    }

    public function collection() {
        $query = $this->db->get("products");
        $my_array = array(
            'collection' => $query->result(),
        );
        $this->loader('collections_', $my_array);
    }
    
    public function category_results() {
        $cats = $this->input->post("categories");
        $this->load->model("Search");
        $look = new Search();
        $collection = $look->search_categories($cats);
        $my_array = array(
            'collection' => $collection,
        );
        $this->loader('collections_', $my_array);
        
        
    }

    public function account() {
        $query = $this->db->get("titles");
        $my_array = array(
            'titles' => $query->result(),
        );
        $this->loader('create_account_', $my_array);
    }

    public function product_view($param) {
        $this->load->model("Products");
        $prod = new Products();
        $prod->load($param);

        $this->load->model("Stock");
        $stock = new Stock();
        $mine = $stock->get_sizes($param);

        $my_array = array(
            'product' => $prod,
            'sizes' => $mine,
        );
        $this->loader('product_', $my_array);
    }

    public function category_search() {
        $this->loader('categories_');
    }

    public function loader($param, &$data_array = []) {
        $this->load->model("Categories");
        $cats = $this->Categories->get();
        
        $this->load->model("Search");
        $minicart = $this->Search->get_cart();
        
        // $this->db->last_query();
        $count = $this->Search->count_cart_rows();
        
        if($param == 'checkout_'){
            $data_array['carts'] = $minicart;
        }
        else if($param == 'categories_' || $param == 'reg_product_category_'|| $param == 'view_categories_'){
            $data_array['cats'] = $cats;
        }
        

        $this->load->view("header_", array('category' => $cats,
            'minicart' => $minicart,
            'count' => $count,));
        $this->load->view("scripts_");
        $this->load->view($param, $data_array);
        $this->load->view("footer_");
        
        if ($this->session->userdata("id") == NULL) {
            $this->load->view("login_modal_");
        }
        $this->load->view("message_modal_");
        $this->load->view("end_");
    }

    public function logger() {
        $this->load->model("Users");
        $this->Users->login($this->input->post("email"), $this->input->post("password"));
    }

    public function logout() {
        $this->session->sess_destroy();
        //$this->index();
        redirect('main_/index');
    }

}
