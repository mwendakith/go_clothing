<?php

class Wishlist extends MY_Model{
    const DB_TABLE = 'wishlist';
    
    const DB_TABLE_PK = 'id';
    
    public $id;
    
    public $product_id;
    
    public $customer_id;
    
    public $date;
    
    public function add($prod, $number) {
        $this->date = date();
        $this->customer_id = $this->session->userdata("id");
        $this->product_id = $prod;
        $this->quantity = $number;
        
        $this->save();
    }
    
    
}