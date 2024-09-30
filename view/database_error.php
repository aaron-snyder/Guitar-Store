<?php
header("Location: ../index.php");
exit(); // Ensure that no further code is executed after the redirection
?>

<!DOCTYPE html>

<html lang="en">
    
<head>
    <title>The Guitar Store</title>
    <link rel="stylesheet" href="./styles/main.css">
    
    <script src="./scripts/date.js"></script>
</head>
    
<body>
    
    <header>
        <img src="./images/FenderStratocaster.png" width="65" alt="Fender Stratocaster">
        <div>
            <h2>The Guitar Store</h2>
            <h3>For rock stars everywhere!</h3>
        </div>
    </header>
    
    <nav>
        <ul>
            <li><a href="index.php">Home</a></li>
            <li><a href="index.php">Lessons</a></li>
            <li><a href="./products/index.php">Products</a></li>
            <li><a href="./support/index.php">Support</a></li>
            <li><a href="./shipping/index.php">Shipping</a></li>
            <li><a href="index.php">Contact Us</a></li>
        </ul>
    </nav>
    
    <main>
        <aside>
            <ul>
                <li><a href="./products/guitars/index.php">Guitars</a></li>
                <li><a href="index.php">Basses</a></li>
                <li><a href="index.php">Drums</a></li>
                <li><a href="index.php">Keyboards</a></li>

            </ul>
        </aside>
        
        <section>
            <h1>There was an error connecting to the database.</h1>

            <p>
                We're sorry, we are currently having issues with our database. Please try again later.
            </p>

        </section>
        
        
    </main>
    
    <footer id="footer">
        <p>&copy;2024 The Guitar Store <span id="formattedDate"></span></p>
    </footer>
</body>
</html>
