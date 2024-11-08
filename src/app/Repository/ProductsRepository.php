<?php

namespace AndersonLucas\HomeStock\Repository;

use AndersonLucas\HomeStock\Config\Database;

class ProductsRepository extends Repository
{
    
    public function __construct()
    {
        parent::__construct('products');
    }

}