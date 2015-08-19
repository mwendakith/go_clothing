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
    
    
}