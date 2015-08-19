<?php

class Categories extends MY_Model{
    const DB_TABLE = 'categories';
    
    const DB_TABLE_PK = 'id';
    
    public $id;
    
    public $name;
    
    public $description;
    
    
}