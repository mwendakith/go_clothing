<?php

class Stock extends MY_Model {

    const DB_TABLE = 'stock';
    const DB_TABLE_PK = 'id';

    public $id;
    public $product_id;
    public $size;
    public $price;

    public function set_stock($prod = 0, $siz = 0) {
        if ($prod != 0) {
            $this->db->select('*');
            $query = $this->db->get_where('stock', array(
                'product_id' => $prod,
                'size' => $siz));
            $row = $query->row();
            $this->id = $row->id;
            $this->product_id = $row->product_id;
            $this->size = $row->size;
            $this->price = $row->price;
        }
    }
    
    

    public function get_sizes($product) {
        $this->db->select('*');
        $query = $this->db->get_where('stock', array('product_id' => $product));

        return $query->result();
    }

}
