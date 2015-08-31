<?php

class Products extends MY_Model{
    const DB_TABLE = 'products';
    
    const DB_TABLE_PK = 'id';
    
    public $id;
    
    public $name;
    
    public $designer_id;
    
    public $likes;
    
    public $date_added;
    
    public $image;
    
    public $thumbnail;
    
    public $description;
    
    public function my_like($prod) {
        $this->db->where('product_id', $prod);
        $this->db->where('customer_id', $this->session->userdata("id"));
        $query = $this->db->get('likes');
        
        if($query->num_rows() == 0){
            $this->load($prod);
            $this->likes++;
            $this->save();

            $this->db->insert('likes', array(
                'customer_id' => $this->session->userdata("id"),
                'product_id' => $prod,
            ));
            echo "You have liked this product.";
        }
        else{
            $this->unlike($prod);
        }
        
    }
    
    public function unlike($prod) {
        $this->load($prod);
        $this->likes--;
        $this->save();
        
        $sql = "DELETE FROM `likes` WHERE `customer_id`=" . $this->session->userdata("id") . " AND `product_id`= " . $prod . ";";
        $this->db->query($sql);
        echo "You have unliked this product.";
    }
    
    public function get_likes() {
        $this->db->select('products.name, products.thumbnail, likes.product_id, products.description');
        $this->db->from('likes');
        $this->db->join('products', 'products.id = likes.product_id');
        
        $this->db->where('likes.customer_id', $this->session->userdata("id"));
        $query = $this->db->get();
        return $query->result();
    }
    
    public function get_purchases() {
        $this->db->select('products.name, products.thumbnail, sales.stock_id, stock.product_id, sales.quantity, sales.price, stock.size');
        $this->db->from('sales');
        $this->db->join('stock', 'stock.id = sales.stock_id');
        $this->db->join('products', 'products.id = stock.product_id');
        $this->db->join('transactions', 'transactions.id = sales.transaction_id');
        
        $this->db->where('transactions.customer_id', $this->session->userdata("id"));
        $query = $this->db->get();
        return $query->result();
    }
    
}