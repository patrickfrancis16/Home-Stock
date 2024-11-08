<?php

use AndersonLucas\HomeStock\Controller\ProductController;

require __DIR__ . '/vendor/autoload.php';

$controller = new ProductController();

var_dump($controller->index());
