<?php

require_once './model/database.php';

function get_categories() {
    global $db;
    $query = 'SELECT * FROM categories
              ORDER BY category_id';
    $statement = $db->prepare($query);
    $statement->execute();
    $categories = $statement->fetchAll();
    $statement->closeCursor();
    return $categories;
}

function get_category_name($selectedCategory) {
    global $db;
    $query = 'SELECT category_name FROM categories
              WHERE category_id = :category_id';
    $statement = $db->prepare($query);
    $statement->bindValue(':category_id', $selectedCategory);
    $statement->execute();
    $categoryName = $statement->fetchColumn();
    $statement->closeCursor();
    return $categoryName;
}

