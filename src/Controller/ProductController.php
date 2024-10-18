<?php
namespace AndersonLucas\HomeStock\Controller;

require_once 'Config/database.php';

class ProductController
{
    public function index()
    {
        $db = new \Database();
        $db->query("SELECT * FROM products");
        $db->execute();
        $products = $db->getResults();

        return $products;
    }

    public function show($id)
    {
        $db = new \Database();
        $db->query("SELECT * FROM products WHERE id = :id");
        $db->bind(':id', $id);
        $db->execute();
        $product = $db->getOne();
        return $product;
    }

    public function store($data)
    {
        $db = new \Database();
        $db->query("INSERT INTO products (category_id, name, description, sku) VALUES (:category_id, :name, :description, :sku)");
        $db->bind(':category_id', $data['category_id']);
        $db->bind(':name', $data['name']);
        $db->bind(':description', $data['description']);
        $db->bind(':sku', $data['sku']);
        $db->execute();
        $product = $db->getOne();
        return $product;
    }

    public function update($id, $data)
    {
        $db = new \Database();
        $db->query("UPDATE products SET category_id = :category_id, name = :name, description = :description, sku = :sku WHERE id = :id");
        $db->bind(':id', $id);
        $db->bind(':category_id', $data['category_id']);
        $db->bind(':name', $data['name']);
        $db->bind(':description', $data['description']);
        $db->bind(':sku', $data['sku']);
        $db->execute();
        $product = $db->getOne();
        return $product;
    }

    public function destroy($id)
    {
        $db = new \Database();
        $db->query("DELETE FROM products WHERE id = :id");
        $db->bind(':id', $id);
        $db->execute();
        $product = $db->getOne();
        return $product;
    }

}
