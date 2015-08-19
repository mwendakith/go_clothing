<?php

class Comments extends MY_Model{
    const DB_TABLE = 'comments';
    
    const DB_TABLE_PK = 'id';
    
    public $id;
    
    public $product_id;
    
    public $user_id;
    
    public $time;
    
    public $comment;
    
    
}