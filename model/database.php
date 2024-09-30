<?php
    // connect to the my_guitar_shop database
    $dsn = 'mysql:host=localhost;dbname=my_guitar_shop';
    $username = 'CS351user';
    $password = '';
    
    // Attempt to establish the database connection
    try {
        $db = new PDO($dsn, $username, $password);
        // Set PDO to throw exceptions on error
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (PDOException $e) {
        // Redirect to database error page with error message
        header("Location: ../../view/database_error.php");
        exit; // Stop execution of the current script
    }
?>    
