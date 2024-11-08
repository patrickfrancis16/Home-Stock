<?php
$products = $controller->index();
// var_dump($products);
foreach ($products[0] as $key => $value) {
    echo "key: $key | value: $value\n";
}
