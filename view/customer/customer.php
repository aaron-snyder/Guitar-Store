<!DOCTYPE html>

<html lang="en">
    
<head>
    <title>The Guitar Store</title>
    <link rel="stylesheet" href="./styles/main.css">
    <link rel="stylesheet" href="./styles/customer.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css">
</head>
    
<body>
    <?php require_once './view/header.php'; ?>
    <?php require_once './view/horizontal_nav_bar.php'; ?>
    <main>
        <?php require_once './view/aside.php'; ?>
        <section>
            <div class="customer_info">
                <form id="customerInfoForm" action="index.php?action=update_customer_info" method="post">
                    
                    <input type="hidden" name="customer_id" value="<?php echo htmlspecialchars($customer_info['customer_id']); ?>">
                    
                    <h2>Customer Information</h2>
                    <label for="first_name">First name:</label>
                    <input type="text" id="first_name" name="first_name" value="<?php echo htmlspecialchars($customer_info['first_name']); ?>"> <br>
                    
                    <label for="last_name">Last name:</label>
                    <input type="text" id="last_name" name="last_name" value="<?php echo htmlspecialchars($customer_info['last_name']); ?>"> 
                    <span id="updateText"><?php echo $updateMessage ?? ''; ?></span><br>
                    
                    <label for="email">Email:</label>
                    <input type="text" id="email" name="email" value="<?php echo htmlspecialchars($customer_info['email_address']); ?>"> <br>
                    
                    <label for="password">Password:</label>
                    <input type="password" id="password" name="password">
                    <i class="far fa-eye" id="togglePassword" style="margin-left: -30px; cursor: pointer;"></i><br>
                    
                    <label for="confirm_password">Confirm Password:</label>
                    <input type="password" id="confirm_password" name="confirm_password">
                    <i class="far fa-eye" id="toggleConfirmPassword" style="margin-left: -30px; cursor: pointer;"></i><br>
                    
                    <input type="submit" id="updateCustomerInfo" value="Update Customer Information">
                    
                </form>
            </div>
            
            <div>
                <div class="billing_info">
                    <form id="billingInfoForm" action="index.php?action=update_billing_address" method="post">
                        
                        <input type="hidden" name="customer_id" value="<?php echo htmlspecialchars($customer_info['customer_id']); ?>">
                        
                        <h2>Billing Address</h2>

                        <label for="billing_address1">Address Line 1:</label>
                        <input type="text" id="billing_address1" name="billing_address1" value="<?php echo htmlspecialchars($customer_billing_address['line1']); ?>"> <br>

                        <label for="billing_address2">Address Line 2:</label>
                        <input type="text" id="billing_address2" name="billing_address2" value="<?php echo htmlspecialchars($customer_billing_address['line2']); ?>"> <br>

                        <label for="billing_city">City:</label>
                        <input type="text" id="billing_city" name="billing_city" value="<?php echo htmlspecialchars($customer_billing_address['city']); ?>"> <br>

                        <label for="billing_state">State:</label>
                        <select id="billing_state" name="billing_state">
                            <option value="">Please select a state</option>
                            <?php 
                            $states = get_states();
                            $current_state = htmlspecialchars($customer_billing_address['state']);
                            foreach ($states as $state): ?>
                                <option value="<?php echo htmlspecialchars($state['state']); ?>" <?php echo $current_state == $state['state'] ? 'selected' : ''; ?>>
                                    <?php echo htmlspecialchars($state['state']); ?>
                                </option>
                            <?php endforeach; ?>
                        </select><br>
                        <label for="billing_zip">Zip Code:</label>
                        <input type="text" id="billing_zip" name="billing_zip" value="<?php echo htmlspecialchars($customer_billing_address['zip_code']); ?>"><br>

                        <label for="billing_phone">Phone:</label>
                        <input type="text" id="billing_phone" name="billing_phone" value="<?php echo htmlspecialchars($customer_billing_address['phone']); ?>"><br>

                        <input type="submit" id="updateBillingInfo" value="Update Billing Address">
                        
                    </form>
                </div>

                <div class="shipping_info">
                    <form id="shippingInfoForm" action="index.php?action=update_shipping_address" method="post">
                        
                        <input type="hidden" name="customer_id" value="<?php echo htmlspecialchars($customer_info['customer_id']); ?>">
                        
                        <h2>Shipping Address</h2>

                        <label for="shipping_address1">Address Line 1::</label>
                        <input type="text" id="shipping_address1" name="shipping_address1" value="<?php echo htmlspecialchars($customer_shipping_address['line1']); ?>"> <br>

                        <label for="shipping_address2">Address Line 2:</label>
                        <input type="text" id="shipping_address2" name="shipping_address2" value="<?php echo htmlspecialchars($customer_shipping_address['line2']); ?>"> <br>

                        <label for="shipping_city">City:</label>
                        <input type="text" id="shipping_city" name="shipping_city" value="<?php echo htmlspecialchars($customer_shipping_address['city']); ?>"> <br>

                        <label for="shipping_state">State:</label>
                        <select id="shipping_state" name="shipping_state">
                            <option value="">Please select a state</option>
                            <?php 
                            $states = get_states();
                            $current_state = htmlspecialchars($customer_shipping_address['state']);
                            foreach ($states as $state): ?>
                                <option value="<?php echo htmlspecialchars($state['state']); ?>" <?php echo $current_state == $state['state'] ? 'selected' : ''; ?>>
                                    <?php echo htmlspecialchars($state['state']); ?>
                                </option>
                            <?php endforeach; ?>
                        </select><br>
                        <label for="shipping_zip">Zip Code:</label>
                        <input type="text" id="shipping_zip" name="shipping_zip" value="<?php echo htmlspecialchars($customer_shipping_address['zip_code']); ?>"><br>

                        <label for="shipping_phone">Phone:</label>
                        <input type="text" id="shipping_phone" name="shipping_phone" value="<?php echo htmlspecialchars($customer_shipping_address['phone']); ?>"><br>

                        <input type="submit" id="updateShippingInfo" value="Update Shipping Address">
                        
                    </form>
                </div>
            </div>
        </section>
    </main>
    <?php require_once './view/footer.php'; ?>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script src="./scripts/date.js"></script>
    <script src="./scripts/customers.js"></script>
</body>
</html>
