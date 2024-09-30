<header>
    <img src="./images/misc/FenderStratocaster.png" width="65" alt="Fender Stratocaster">
    <div>
        <h2>The Guitar Store</h2>
        <h3>For rock stars everywhere!</h3>
    </div>
    <div class="dropdown">
        <a href="#"><img id="login" src="./images/misc/customers-1.ico" alt="Login Page"></a>
        <div class="dropdown-content">
            <?php if (isset($_COOKIE['user_email'])): ?>
                <a href="index.php?action=customer_page">Account</a>
                <a href="index.php?action=customer_logout">Logout</a>
            <?php else: ?>
                <a href="index.php?action=customer_login">Login</a>
            <?php endif; ?>
        </div>
    </div>
</header>
<style>
.dropdown {
    position: relative;
    display: inline-block;
}

.dropdown-content {
    display: none;
    position: absolute;
    right: 0;
    background-color: #f9f9f9;
    min-width: 160px;
    box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
    padding: 12px 16px;
    z-index: 1;
}

.dropdown:hover .dropdown-content {
    display: block;
}
</style>