<!DOCTYPE html>

<html lang="en">
    
<head>
    <title>The Guitar Store</title>
    <link rel="stylesheet" href="./styles/main.css">
    <link rel="stylesheet" href="./styles/customer_login.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css">
    
</head>
    
<body>
    <?php require_once './view/header.php'; ?>
    <?php require_once './view/horizontal_nav_bar.php'; ?>
    <main>
        <?php require_once './view/aside.php'; ?>
        
        <section>
            <h2>Customer Login</h2>
            <form id="loginForm" action="index.php?action=customer_page" method="post">
                <p>
                    <span id="emailPasswordText">Email Address:</span>
                    <input type="text" id="emailInput" name="email" value="<?php echo isset($_GET['email']) ? htmlspecialchars($_GET['email']) : ''; ?>"> 
                </p>
                
                <p>
                    <span id="emailPasswordText">Password:</span>
                    <input type="password" id="passwordInput" name="password"> 
                    <i class="far fa-eye" id="togglePassword" style="margin-left: -30px; cursor: pointer;"></i>
                </p>
                <button type="submit" id="loginButton">Login</button>
                <a href="index.php?action=home"><button type="button" id="cancelButton">Cancel</button></a>
            </form>
            <p id = "error"></p>
        </section>
    </main>
    <?php require_once './view/footer.php'; ?>
    
    <script>
        window.onload = function() {
            var emailNotFound = "<?php echo isset($_GET['emailNotFound']) ? $_GET['emailNotFound'] : ''; ?>";
            var passwordIncorrect = "<?php echo isset($_GET['passwordIncorrect']) ? $_GET['passwordIncorrect'] : ''; ?>";

            // Alert for email not found
            if (emailNotFound) {
                alert('Customer not found under that email, please try again.');
            }

            // Alert for incorrect password
            if (passwordIncorrect) {
                alert('Incorrect password, please try again.');
            }
        }
        
    </script>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script src="./scripts/date.js"></script>
    <script src="./scripts/customer_login.js"></script>
</body>
</html>
