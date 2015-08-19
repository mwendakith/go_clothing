<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Main extends CI_Controller {

    public function index() {
        $this->header();
        $this->load->view("home");
        $this->load->view("footer");
    }

    public function logout() {
        $this->session->sess_destroy();
	//$this->index();
        redirect('main/index');
    }

   
    public function cat() {
        $this->header();
        $this->load->view("reg_category");
        $this->load->view("footer");
    }

    public function reg_cat() {
        $this->load->model("Categories");

        $this->Categories->name = $this->input->post("name");
        $this->Categories->description = $this->input->post("description");


        $this->Categories->save();
        $this->cat();
    }

    public function admin() {
        $this->header();
        $query = $this->db->get("titles");
        $data = array('titles' => $query->result());
        $this->load->view("reg_admin", $data);
        $this->load->view("footer");
    }

    public function reg_admin() {
        $this->load->model("Users");
        $user = new Users();
        $user->email = $this->input->post("email");
        $user->surname = $this->input->post("surname");
        $user->f_name = $this->input->post("f_name");
        $user->title_id = $this->input->post("title");
        $user->password = sha1("12345678");
        $user->status = 4;
        $user->save();
        $this->admin();
    }
    
    public function designers() {
        $this->header();
        $this->load->view("reg_designer");
        $this->load->view("footer");
    }
    
    public function reg_designer() {
        $this->load->model("designers");
        $designer = new Designers();
        $designer->name = $this->input->post("name");
        $designer->save();
        $this->designers();
    }

    public function products() {
        $this->header();
        $query = $this->db->get("designers");
        $data = array('designers' => $query->result());
        $this->load->view("reg_products", $data);
        $this->load->view("footer");
    }

    public function reg_product() {
        $this->load->model("Products");
        $product = new Products();
        $product->name = $this->input->post("name");
        $product->designer_id = $this->input->post("designer");
        $product->description = $this->input->post("description");
        
        $config['upload_path'] = './images/';
	$config['allowed_types'] = 'gif|jpg|png|jpeg';
	$config['max_size']	= '10000';
	$config['max_width']  = '1024';
	$config['max_height']  = '768';
        $config['remove_spaces'] = TRUE;
	$this->load->library('upload', $config);

        $check_file_upload = FALSE;
        if (isset($FILES['image']['error']) && $FILES['image']['error'] != 4) {
            $check_file_upload = TRUE;
        }
        
        if($this->upload->do_upload('image')){
            $upload_data = $this->upload->data();
            if (isset($upload_data['file_name'])) {
                $product->image = $upload_data['file_name'];
                $config['image_library'] = 'gd2';
                $config['source_image'] = './images/' . $upload_data['file_name'];
                $config['create_thumb'] = TRUE;
                $config['maintain_ratio'] = FALSE;
                $config['width'] = 320;
                $config['height'] = 150;

                $this->load->library('image_lib', $config);

                $this->image_lib->resize();
                
                $thumb = $upload_data['raw_name'] . "_thumb" . $upload_data['file_ext'];
                $product->thumbnail = $thumb;
            }

            $product->save();
            $this->products();
            
        }

        if ($check_file_upload && !$this->upload->do_upload('img_file')) {
            $this->upload->display_errors();
        } 
        $this->products();
    }

    
    public function view_categories() {
        $this->load->model("categories");
        $category = new Categories();
        
        $cats = $category->get();
        $data = array('categories' => $cats);
        
        $this->header();
        $this->load->view("view_categories", $data);
        $this->load->view("footer");
    }
    
    public function view_products() {
        $this->load->model("products");
        $product = new Products();
        
        $prod = $product->get();
        $data = array('products' => $prod);
        
        $this->header();
        $this->load->view("view_products", $data);
        $this->load->view("footer");
    }
    
    public function del_category($param) {
        $this->db->delete('categories', array('id' => $param));
        $this->view_categories();
    }
    
    public function del_product($param) {
        $this->db->delete('products', array('id' => $param));
        $this->view_products();
    }
    
    
    public function logger() {
        $this->load->model("Users");
        $this->Users->login($this->input->post("username"), $this->input->post("password"));
    }

    public function sidebar() {
        $link_string = "<div class='container'>
                    <div class='col-md-3'>
                    <p class='lead'>Go Clothing</p>
                    <div class='list-group'>";

        if ($this->session->userdata("status") != 4) {
            $this->load->model("Categories");
            $cats = $this->Categories->get();

            foreach ($cats as $row) {
               $link_string .= anchor('main/category/' . $row->id, $row->name, array('class' => 'list-group-item')); 
            }
            /*$link_string .= "<a href='#' class='list-group-item'>Category 1</a>";
            $link_string .= "<a href='#' class='list-group-item'>Category 2</a>";
            $link_string .= "<a href='#' class='list-group-item'>Category 3</a>";*/
        } else if ($this->session->userdata("status") == 4) {
            $link_string .= "<a href='" . site_url('main/admin') . "' class='list-group-item'>Register Administrators</a>";
            $link_string .= "<a href='" . site_url('main/cat') . "' class='list-group-item'>Register Categories</a>";
            $link_string .= "<a href='" . site_url('main/designers') . "' class='list-group-item'>Register Designers</a>";
            $link_string .= "<a href='" . site_url('main/products') . "' class='list-group-item'>Register Products</a>";
            $link_string .= "<a href='" . site_url('main/cat') . "' class='list-group-item'>Register Product Categories</a>";
            $link_string .= "<a href='" . site_url('main/view_categories') . "' class='list-group-item'>View Categories</a>";
            $link_string .= "<a href='" . site_url('main/view_products') . "' class='list-group-item'>View Products</a>";
            $link_string .= "<a href='" . site_url('main/cat') . "' class='list-group-item'>View Product Categories</a>";
            $link_string .= "<a href='" . site_url('main/cat') . "' class='list-group-item'>Delete old records</a>";
        }

        $link_string .= "</div>  </div>";

        return $link_string;
    }
    
    public function header() {
        $data = array('sidebar' => $this->sidebar());
        $this->load->view("header", $data);
    }
    
    public function locate() {
        $par = $this->input->post("sstring");
        $this->load->model("Search");
        $search = new Search();
        $result = $search->results($par);
        
        if($result == NULL){
            echo "No results found " . parse_smileys(":down:", base_url('images/smileys'));
        }
        
        else{
            $this->load->view("view_results", array('results' => $result)); 
        }
        
    }
    
    public function search_results($param) {
        $this->header();
       
        $this->load->view("footer");
    }

}
