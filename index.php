<?php

// Get the requested action from the URL parameter, default to 'home' if not provided
$action = isset($_GET['action']) ? $_GET['action'] : 'home';


// Determine action and perform corresponding procedures
if ($action == 'home') {
    
    include_once 'home.php';
    
} else if ($action == 'products'){
    
    // Include necessary model files
    require_once './model/category_db.php';
    require_once './model/product_db.php';
    
    // Get all categories
    $categories = get_categories();
        
    // Get the selected category
    $selectedCategory = isset($_GET['category']) ? $_GET['category'] : $categories[0]['category_id'];
        
    // Fetch products from selected category
    $products = get_products_by_category($selectedCategory);
                
    // Fetch the name of the selected category
    $categoryName = get_category_name($selectedCategory);
        
    include_once './products/product_list.php';
    
} else if ($action == 'support'){
    
    include_once './support.php';
    
} else if ($action == 'shipping'){
    
    include_once './shipping.php';
    
} else if ($action == 'guitars'){
    
    include_once './products/guitars.php';
    
} else if ($action == 'customer_login') {
    if (isset($_COOKIE['user_email'])) {
        // User cookie is set, redirect to the customer page
        header('Location: index.php?action=customer_page');
        exit();
    } else {
        // User cookie is not set, display customer login page
        include_once './view/customer/customer_login.php';
    }
}
 else if ($action == 'customer_page') {
    // Load customer database functions
    require_once './model/customer_db.php';
    
    // Check if user cookie exists
    if (isset($_COOKIE['user_email'])) {
        // Cookie exists, get email from cookie
        $email = $_COOKIE['user_email'];
        // Try to get customer info through email
        $customer_info = get_customer_info_by_email_address($email);
    } else {
        // Cookie does not exist, retrieve email and password from POST array
        $email = $_POST['email'] ?? '';
        $password = $_POST['password'] ?? '';
        $customer_info = get_customer_info_by_email_address($email);

        if ($customer_info && password_verify($password, $customer_info['password'])) {
            // Password verified, set the cookie
            setcookie('user_email', $email, time() + (86400 * 30), "/"); // 86400 = 1 day
        } else {
            // User cookie not set and password does not verify, include the customer_login page
            include_once './view/customer/customer_login.php';
            exit;
        }
    }

    // Load address database functions
    require_once './model/address_db.php';
    
    // Obtain billing and shipping address of user to be printed on customer page
    $customer_billing_address = get_address($customer_info['billing_address_id']);
    $customer_shipping_address = get_address($customer_info['shipping_address_id']);
    
    // Load customer page
    include_once './view/customer/customer.php';
    
} else if ($action == 'update_customer_info') {
    
    // Include customer and address database functions
    require_once './model/customer_db.php';
    require_once './model/address_db.php';
    
    // Obtain customer id passed in post
    $customer_id = $_POST['customer_id'];
    
    // Obtain information necessarry to update user, default to '' so as to not be changed
    $firstName = $_POST['first_name'] ?? '';
    $lastName = $_POST['last_name'] ?? '';
    $email = $_POST['email'] ?? '';
    $password = $_POST['password'] ?? '';
    
    // Check if first name was changed
    if ($firstName != '') {
        update_first_name($customer_id, $firstName);
    }
    
    // Check if last name was changed
    if ($lastName != '') {
        update_last_name($customer_id, $lastName);
    }
    
    // Check if email was changed
    if ($email != '') {
        update_email_address($customer_id, $email);
    }
    
    // Check if password was provided
    if ($password != '') {
        // Hash the new password before storing it in the database
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

        // Update the hashed password in the database
        update_password($customer_id, $hashedPassword);
    }
    
    // Reload necessary customer information to be printed on customer page
    $customer_info = get_customer_info($customer_id);
    $customer_billing_address = get_address($customer_info['billing_address_id']);
    $customer_shipping_address = get_address($customer_info['shipping_address_id']);
    
    // Set the update message
    $updateMessage = 'Customer info updated';
    
    // Load customer page
    include_once './view/customer/customer.php';
    
} else if ($action == 'update_billing_address') {
    
    // Include customer and address database functions
    require_once './model/customer_db.php';
    require_once './model/address_db.php';
    
    // Obtain customer id passed in post
    $customer_id = $_POST['customer_id'];
    
    // Find customer info to update proper address
    $customer_info = get_customer_info($customer_id);
    
    // Obtain ALL parameters necessary to update address
    $addressLine1 = $_POST['billing_address1'];
    $addressLine2 = $_POST['billing_address2'];
    $addressCity = $_POST['billing_city'];
    $addressState = $_POST['billing_state'];
    $addressZip = $_POST['billing_zip'];
    $addressPhone = $_POST['billing_phone'];
    update_address($customer_info['billing_address_id'], $addressLine1, $addressLine2, $addressCity, $addressState, $addressZip, $addressPhone);
    
    // Reload necessary customer information to be printed on customer page
    $customer_info = get_customer_info($customer_id);
    $customer_billing_address = get_address($customer_info['billing_address_id']);
    $customer_shipping_address = get_address($customer_info['shipping_address_id']);
    
    // Set the update message
    $updateMessage = 'Billing address updated';
    
    // Load customer page
    include_once './view/customer/customer.php';
    
} else if ($action == 'update_shipping_address') {
    
    // Include customer and address database functions
    require_once './model/customer_db.php';
    require_once './model/address_db.php';
    
    // Obtain customer id passed in post
    $customer_id = $_POST['customer_id'];
    
    // Find customer info to update proper address
    $customer_info = get_customer_info($customer_id);
    
    // Obtain ALL parematers necessary to update address
    $addressLine1 = $_POST['shipping_address1'];
    $addressLine2 = $_POST['shipping_address2'];
    $addressCity = $_POST['shipping_city'];
    $addressState = $_POST['shipping_state'];
    $addressZip = $_POST['shipping_zip'];
    $addressPhone = $_POST['shipping_phone'];
    update_address($customer_info['shipping_address_id'], $addressLine1, $addressLine2, $addressCity, $addressState, $addressZip, $addressPhone);
    
    // Reload necessary customer information to be printed on customer page
    $customer_info = get_customer_info($customer_id);
    $customer_billing_address = get_address($customer_info['billing_address_id']);
    $customer_shipping_address = get_address($customer_info['shipping_address_id']);
    
    // Set the update message
    $updateMessage = 'Shipping address updated';
    
    // Load customer page
    include_once './view/customer/customer.php';
    
} else if ($action == 'customer_logout') {
    // Expire the cookie
    setcookie('user_email', '', time() - 3600, "/");
    // Redirect to the home page or login page
    header('Location: index.php');
    exit();
} else {
    
    include_once 'home.php';
    
}
?>