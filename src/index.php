<?php

use AndersonLucas\HomeStock\Controller\ProductController;

require __DIR__ . '/vendor/autoload.php';

$controller = new ProductController();

$request = $_SERVER['REQUEST_URI'];

$request = preg_replace('/^\/home-stock/', '', $request);

define("BASE_URL", "http://localhost:8080/");

$BASE_URL = "http://localhost:8080/";

switch ($request) {
    case '/':
    case '':
        require_once "./app/View/view.home.php";
        break;

    case '/products':
        require_once "./app/View/view.products.php";
        break;

    case '/categoria-y':
        echo "Página da Categoria Y";
        break;

    case '/add-product':
        require_once "./app/View/view.add-products.php";
        break;

    default:        // Caso não haja uma rota definida
        echo "Página não encontrada. Erro 404.";
        break;
}
