<!DOCTYPE html>

<html>
<head>
    <title>The Guitar Store</title>
    <link rel="stylesheet" href="styles/main.css">
    <link rel="stylesheet" href="styles/guitars.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/bxslider/4.2.12/jquery.bxslider.css">
</head>

<body>
    <?php require_once 'view/header.php'; ?>
    <?php require_once 'view/horizontal_nav_bar.php'; ?>
    <main>
        <?php require_once 'view/aside.php'; ?>
        
        <section>
            <h3>Our Guitars</h3>

            <p>Check out our fine selection of premium guitars!</p>
        
            <div class="slider-container">
                <ul class="bxslider">
                    <li><img src="images/guitars/Caballero11.png" title="Caballero 11"></li>
                    <li><img src="images/guitars/FenderStratocaster.png" title="Fender Stratocaster"></li>
                    <li><img src="images/guitars/GibsonLesPaul.png" title="Gibson LesPaul"></li>
                    <li><img src="images/guitars/GibsonSB.png" title="Gibson SB"></li>
                    <li><img src="images/guitars/WashburnD10S.png" title="Washburn D10S"></li>
                    <li><img src="images/guitars/YamahaFG700S.png" title="Yamaha FG700S"></li>
                </ul>
            </div>
        </section>
    </main>
    <?php require_once './view/footer.php'; ?>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/bxslider/4.2.12/jquery.bxslider.min.js"></script>
    <script src="scripts/date.js"></script>
    <script src="scripts/guitars.js"></script>
</body>
</html>
