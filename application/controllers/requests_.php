<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Requests_ extends CI_Controller {
    
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
        //$this->index();
        redirect('main_/index/1');
    }
    
    public function block_user($param) {
        $this->load->model("Users");
        $user = new Users();
        $user->block($param);
        redirect('main_/view_users');
    }
    
    public function set_admin($param) {
        $this->load->model("Users");
        $user = new Users();
        $user->set_admin($param);
        redirect('main_/view_users');
    }
    
    
    public function like_product() {
        $this->load->model("Products");
        $item = new Products();
        $item->my_like($this->input->post("product_id"));
    }
    
       
    public function reg_category() {
        $this->load->model("Categories");

        $this->Categories->name = $this->input->post("name");
        $this->Categories->description = $this->input->post("description");


        $this->Categories->save();
        //$this->category(TRUE);
        redirect('main_/category/1');
    }
    
    public function reg_product_category() {
        $this->load->model("Product_categories");
        
        $pro = new Product_categories();
        $pro->category_id = $this->input->post("category");
        $pro->product_id = $this->input->post("product");
        $pro->save();
        
        redirect('main_/product_category/1');
    }

    public function reg_stock() {
        $this->load->model("Stock");

        $this->Stock->product_id = $this->input->post("product_id");
        $this->Stock->size = $this->input->post("size");
        $this->Stock->price = $this->input->post("price");


        $this->Stock->save();
        //$this->stock(TRUE);
        redirect('main_/stock/1');
    }
    
    public function reg_designer() {
        $this->load->model("Designers");
        if($this->input->post("id") != NULL){
            $this->Designers->id = $this->input->post("id");
        }
        $this->Designers->name = $this->input->post("name");
        $this->Designers->save();
        
        if($this->input->post("id") != NULL){
            redirect('main_/view_designers');
        }
        redirect('main_/designer/1');
    }

    public function reg_product() {
        $this->load->model("Products");
        $product = new Products();
        if($this->input->post("id") != NULL){
            $product->load($this->input->post("id"));
        }
        $product->name = $this->input->post("name");
        $product->designer_id = $this->input->post("designer");
        $product->description = $this->input->post("description");
        
        
        if($this->input->post("id") == NULL){
            $product->date_added = time();
        }


        $config['upload_path'] = './images/products/';
        $config['allowed_types'] = 'gif|jpg|png|jpeg';
        $config['max_size'] = '10000';
        $config['max_width'] = '1024';
        $config['max_height'] = '768';
        $config['remove_spaces'] = TRUE;
        $this->load->library('upload', $config);

        $check_file_upload = FALSE;
        if (isset($_FILES['image']['error']) && $_FILES['image']['error'] != 4) {
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

            
            // $this->product(TRUE);
        }

        if ($check_file_upload && !$this->upload->do_upload('image')) {
            $this->upload->display_errors();
        }
        // $this->upload->display_errors();
        //$this->product();
        $product->save();
        
        if($this->input->post("id") != NULL){
            redirect('main_/view_products');
        }
        
        redirect('main_/product/1');
    }
    
    public function truncate($param) {
        if(strlen($param) > 25){
            
        }
    }
    
   
    
}