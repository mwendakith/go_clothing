<?php

class Search extends CI_Model{
    
    public function results($param) {
        $products = $this->product_name($param);
        if($products == NULL){
            $products = $this->product_designer($param);
        }
        
        return $products;
       
    }
    
    public function product_name($param) {
        $this->db->select('*');
        $this->db->from('products');
        $this->db->like('name', $param);
        
        $query = $this->db->get();
        
        if($query->num_rows() == 0){
            return NULL;
        }
        
        else{
            return $query->result();
        }
        
    }
    
    
    
    public function product_designer($param) {
        $this->db->select('products.id, products.name, products.designer_id, products.thumbnail, products.image, products.description');
        //$this->db->select('*');
        $this->db->from('products');
        $this->db->join('designers', 'designers.id = products.designer_id');
        $this->db->like('designers.name', $param);
        
        $query = $this->db->get();
        
        if($query->num_rows() == 0){
            return NULL;
        }
        
        else{
            return $query->result();
        }
    }
    
    
    
    public function product_category($param) {
        $this->db->select('products.id, products.name, products.designer_id, products.thumbnail, products.image, products.description');
        $this->db->from('products');
        $this->db->join('product_categories', 'product_categories.product_id = products.id');
        $this->db->join('categories', 'categories.id = product_categories.category_id');
        $this->db->like('categories.name', $param);
        
        $query = $this->db->get();
        
        if($query->num_rows() == 0){
            return NULL;
        }
        
        else{
            return $query->result();
        }
    }
    
    public function prod_likes() {
        $this->db->select('*');
        $this->db->from('products');
        $this->db->order_by("likes", "desc");
        $this->db->limit(10);
        
        $query = $this->db->get();
        
        if($query->num_rows() == 0){
            return NULL;
        }
        
        else{
            return $query->result();
        }
    }
    
    public function search_by_price() {
        $sql = "SELECT AVG(price) AS avg_price, product_id, COUNT(product_id) AS size_number "
                . "FROM stock "
                . "GROUP BY product_id";
        return $sql;
    }
    
    public function search_categories($param) {
        //$sql = "SELECT DISTINCT p.id, p.name, p.image, p.thumbnail, p.description, p.likes FROM product_categories pc, products p WHERE p.id = pc.product_id AND p.id IN ";
        $sql = "SELECT * FROM `products` WHERE `id` IN ";
        
        foreach ($param as $value) {
            
            $sql .= "(SELECT `product_id` FROM `product_categories` WHERE `category_id` = ";
            $sql .= $value . ") AND `id` IN ";
        }
        
        $rest = substr($sql, 0, (strlen($sql) - 13));
        $rest .= ";";
        
        $query = $this->db->query($rest);
        
        if($query->num_rows() == 0){
            return NULL;
        }
        
        else{
            return $query->result();
        }
    }
    
    public function get_cart() {
        $this->db->select('cart.stock_id, cart.quantity, products.name, products.thumbnail, stock.product_id, stock.size, stock.price, cart.id');
        $this->db->from('cart');
        $this->db->join('stock', 'stock.id = cart.stock_id');
        $this->db->join('products', 'stock.product_id = products.id');
        
        $this->db->where('cart.customer_id', $this->session->userdata("id"));
        $query = $this->db->get();
        return $query->result();
    }
    
    public function count_cart_rows() {
         $this->db->select('cart.stock_id, cart.quantity, products.name, products.thumbnail, stock.product_id, stock.size, stock.price, cart.id');
        $this->db->from('cart');
        $this->db->join('stock', 'stock.id = cart.stock_id');
        $this->db->join('products', 'stock.product_id = products.id');
        
        $this->db->where('cart.customer_id', $this->session->userdata("id"));
        $count = $this->db->count_all_results();
        return $count;
    }
}