<?php

use AndersonLucas\HomeStock\View\Components\Form;
use AndersonLucas\HomeStock\View\Components\Page;
use AndersonLucas\HomeStock\View\Components\Nav;

$page = new Page();
$nav_bar = new Nav();
$form = new Form();

$form->addInputText('name', 'Nome Produto', 'product', 'text', 'Papel Higieco');
$form->addInputText('description', 'Descrição', 'descript', 'text', 'Limpador de traseiro');

$form->grid("Cadastro de Itens", "Tela usada para cadastro de itens.");

$page->header("Adicionar Produto");
$page->body([$nav_bar->html, $form->grid_html]);
$page->footer();

$page->print();
