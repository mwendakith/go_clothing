<?php

class Likes extends MY_Model {

    const DB_TABLE = 'likes';
    const DB_TABLE_PK = 'id';

    public $id;
    public $customer_id;
    public $product_id;
    
    public function my_like($prod) {
        $this->customer_id = $this->session->userdata("id");
        $this->product_id = $prod;
        
        $this->save();
    }
    
    
    
}