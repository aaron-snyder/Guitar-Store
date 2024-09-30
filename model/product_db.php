<?php

require_once './model/database.php';

function get_products_by_category($selectedCategory) {
    global $db;
    $query = 'SELECT * FROM products
              WHERE category_id = :category_id
              ORDER BY product_id';
    $statement = $db->prepare($query);
    $statement->bindValue(':category_id', $selectedCategory);
    $statement->execute();
    $products = $statement->fetchAll();
    $statement->closeCursor();
    return $products;
}

