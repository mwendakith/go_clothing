<?php

class Transactions extends MY_Model{
    const DB_TABLE = 'transactions';
    
    const DB_TABLE_PK = 'id';
    
    public $id;
    
    
    public $customer_id;
    
    public $date;
    
    public $amount;
    
    
}