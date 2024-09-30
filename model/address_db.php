<?php

require_once './model/database.php'; // Ensure this file exists and contains a PDO connection to your database

function get_address($address_id) {
    global $db; // Assuming $db is your PDO connection variable in 'database.php'
    $query = 'SELECT * FROM addresses WHERE address_id = :address_id';
 
    $statement = $db->prepare($query);
    $statement->bindValue(':address_id', $address_id);
    $statement->execute();
    $address = $statement->fetch(PDO::FETCH_ASSOC);
    $statement->closeCursor();
    return $address;
}

function update_address($address_id, $line1, $line2, $city, $state, $zip_code, $phone) {
    global $db;
    $query = 'UPDATE addresses SET line1 = :line1, line2 = :line2, city = :city, state = :state, zip_code = :zip_code, phone = :phone WHERE address_id = :address_id';
    $statement = $db->prepare($query);
    $statement->bindValue(':address_id', $address_id);
    $statement->bindValue(':line1', $line1);
    $statement->bindValue(':line2', $line2);
    $statement->bindValue(':city', $city);
    $statement->bindValue(':state', $state);
    $statement->bindValue(':zip_code', $zip_code);
    $statement->bindValue(':phone', $phone);
    $result = $statement->execute();
    $statement->closeCursor();
    return $result;
}

function get_states() {
    global $db;
    $query = 'SELECT state FROM state_tax_rates ORDER BY state';
    $statement = $db->prepare($query);
    $statement->execute();
    $states = $statement->fetchAll(PDO::FETCH_ASSOC);
    $statement->closeCursor();
    return $states;
}
