<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Main_ extends CI_Controller {

    public function index() {
        $this->loader('homepage_');
    }

    public function checkout() {
        $this->load->model("Cart");
        $shop = new Cart();
        $shopcart = $shop->get_cart();
        
        $my_array = array(
            'carts' => $shopcart,
        );
        
        $this->loader('checkout_', $my_array);
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
        $query = $this->db->get("products");
        $my_array = array(
            'prod' => $query->result(),
            'success' => $param,
        );
        $this->loader('reg_stock_', $my_array);
    }

    public function designer($param = FALSE) {
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

    public function reg_category() {
        $this->load->model("Categories");

        $this->Categories->name = $this->input->post("name");
        $this->Categories->description = $this->input->post("description");


        $this->Categories->save();
        $this->category(TRUE);
    }

    public function reg_stock() {
        $this->load->model("Stock");

        $this->Stock->product_id = $this->input->post("product_id");
        $this->Stock->size = $this->input->post("size");
        $this->Stock->price = $this->input->post("price");


        $this->Stock->save();
        $this->stock(TRUE);
    }

    public function create_account() {
        $this->load->model("Users");
        $user = new Users();
        $user->title_id = $this->input->post("title_id");
        $user->surname = $this->input->post("surname");
        $user->f_name = $this->input->post("f_name");
        $user->email = $this->input->post("email");
        $user->password = sha1($this->input->post("password"));
        $user->status = 2;
        $user->save();
        $this->index();
    }

    public function reg_designer() {
        $this->load->model("Designers");

        $this->Designers->name = $this->input->post("name");
        $this->Designers->save();
        //$bool = TRUE;
        //redirect('main_/designer/' . $bool);
        $this->designer(TRUE);
    }

    public function reg_product() {
        $this->load->model("Products");
        $product = new Products();
        $product->name = $this->input->post("name");
        $product->designer_id = $this->input->post("designer");
        $product->description = $this->input->post("description");
        $product->date_added = time();


        $config['upload_path'] = './images/products/';
        $config['allowed_types'] = 'gif|jpg|png|jpeg';
        $config['max_size'] = '10000';
        $config['max_width'] = '1024';
        $config['max_height'] = '768';
        $config['remove_spaces'] = TRUE;
        $this->load->library('upload', $config);

        $check_file_upload = FALSE;
        if (isset($FILES['image']['error']) && $FILES['image']['error'] != 4) {
            $check_file_upload = TRUE;
        }

        if ($this->upload->do_upload('image')) {
            $upload_data = $this->upload->data();
            if (isset($upload_data['file_name'])) {
                $product->image = $upload_data['file_name'];

                $config['image_library'] = 'gd2';
                $config['source_image'] = './images/products/' . $upload_data['file_name'];
                $config['create_thumb'] = TRUE;
                $config['maintain_ratio'] = FALSE;
                $config['width'] = 100;
                $config['height'] = 125;

                $this->load->library('image_lib', $config);

                $this->image_lib->resize();


                $thumb = $upload_data['raw_name'] . "_thumb" . $upload_data['file_ext'];
                $product->thumbnail = $thumb;
            }

            $product->save();
            $this->product(TRUE);
        }

        if ($check_file_upload && !$this->upload->do_upload('image')) {
            $this->upload->display_errors();
        }
        // $this->upload->display_errors();
        $this->product();
    }

    public function loader($param, &$data_array = []) {
        $this->load->model("Categories");
        $cats = $this->Categories->get();
        
        $this->load->model("Search");
        $minicart = $this->Search->get_cart();
        
        // $this->db->last_query();
        $count = $this->Search->count_cart_rows();
        

        $this->load->view("header_", array('category' => $cats,
            'minicart' => $minicart,
            'count' => $count,));
        $this->load->view($param, $data_array);
        $this->load->view("footer_");
        $this->load->view("scripts_");
        if ($this->session->userdata("id") == NULL) {
            $this->load->view("login_modal_");
        }
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
