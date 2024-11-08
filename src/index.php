<?php

use AndersonLucas\HomeStock\Controller\ProductController;

require __DIR__ . '/vendor/autoload.php';

$controller = new ProductController();

$request = $_SERVER['REQUEST_URI'];

$request = preg_replace('/^\/home-stock/', '', $request);

switch ($request) {
    case '/':
    case '':
        echo "Bem-vindo à página inicial de home-stock";
        break;

    case '/products':
        require_once "./app/View/view.products.php";
        break;

    case '/categoria-y':
        echo "Página da Categoria Y";
        break;

    default:        // Caso não haja uma rota definida
        echo "Página não encontrada. Erro 404.";
        break;
}
