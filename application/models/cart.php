<?php

class Cart extends MY_Model {

    const DB_TABLE = 'cart';
    const DB_TABLE_PK = 'id';

    public $id;
    public $customer_id;
    public $stock_id;
    public $quantity;
    public $date;

    
    public function get_cart() {
        $this->db->select('cart.stock_id, cart.quantity, products.name, products.thumbnail, stock.product_id, stock.size, stock.price, cart.id');
        $this->db->from('cart');
        $this->db->join('stock', 'stock.id = cart.stock_id');
        $this->db->join('products', 'stock.product_id = products.id');
        
        $this->db->where('cart.customer_id', $this->session->userdata("id"));
        $query = $this->db->get();
        return $query->result();
    }
    
    
    
    
    public function flush() {
        $current_time = time();
        $that_time = $current_time - (60 * 60 * 24 * 30 * 6);

        $this->db->where("date < ", $that_time);
        $this->db->delete('cart');
    }

    public function add($prod, $number) {
        $cust = $this->session->userdata("id");
        $this->db->select('*');
        $this->db->where('customer_id', $cust);
        $this->db->where('stock_id', $prod);
        $query = $this->db->get('cart');
        $row = $query->row();
        
        if ($row != NULL) {
            $this->id = $row->id;
            $this->quantity = $number + $row->quantity;
            
        } else {
            
            $this->quantity = $number;
            
        }
        
        $this->customer_id = $cust;
            $this->stock_id = $prod;
            $this->date = time();
            if($this->quantity > 0){
                $this->save();
            }
            else{
                $this->delete();
            }
    }

    public function edit($id_, $stock_, $number) {
        $data = array(
            'stock_id' => $stock_,
            'quantity' => $number,
            'date' => time(),
        );
        $this->db->update('cart', $data, array('id' => $id_));
    }

    public function remove($param) {
        $this->db->delete('cart', array('id' => $param));
    }
     public function get_price($param) {
        $query = $this->db->get_where('stock', array('id' => $param));
        $row = $query->row();
        return $row->price;
    }

    public function sale() {
        $param = $this->session->userdata("id");
        $data = array(
            'customer_id' => $param,
            'amount' => 0,
            'date' => time(),
        );

        $this->db->insert('transactions', $data);
        $transaction_id = $this->db->insert_id();
        $amount = 0;

        $query = $this->db->get_where('cart', array('customer_id' => $param));

        foreach ($query->result() as $value) {
            $price = $this->get_price($value->stock_id);

            $data = array(
                'transaction_id' => $transaction_id,
                'stock_id' => $value->stock_id,
                'quantity' => $value->quantity,
                'price' => $price,
            );

            $this->db->insert('sales', $data);
            $amount += ($price * $value->quantity);
        }

        $this->db->where('id', $transaction_id);
        $this->db->update('transactions', array('amount' => $amount));
        $this->db->delete('cart', array('customer_id' => $param));
    }

   
    
    

}
