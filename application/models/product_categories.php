<?php

class Product_categories extends MY_Model{
    const DB_TABLE = 'product_categories';
    
    const DB_TABLE_PK = 'id';
    
    public $id;
    public $product_id;
    public $category_id;
    
    
    public function category_name($param) {
        $sql = 'SELECT * FROM `products` WHERE `id` IN '
                . '(SELECT `product_id` FROM `product_categories` WHERE `category_id` = ' . $param . ');' ;
        
         $query = $this->db->query($sql);
        
        if($query->num_rows() == 0){
            return NULL;
        }
        
        else{
            return $query->result();
        }
    }
    
    
}