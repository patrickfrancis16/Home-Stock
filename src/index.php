<?php
require_once 'Config/database.php';

require_once 'Controller/ProductController.php';

$controller = new ProductController();


var_dump($controller->index());
