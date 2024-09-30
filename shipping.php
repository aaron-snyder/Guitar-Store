<!DOCTYPE html>

<html lang="en">
    
<head>
    <title>The Guitar Store</title>
    <link rel="stylesheet" href="./styles/main.css">
    <link rel="stylesheet" href="./styles/shipping.css">
</head>
    
<body>
    <?php require_once './view/header.php'; ?>
    <?php require_once './view/horizontal_nav_bar.php'; ?>
    <main>
        <?php require_once './view/aside.php'; ?>
        
        <section>
            <h2>Shipping Costs</h2>
            <p>
                Enter the cost of the product: 
                <input type="text" id="productCost"> 
                <button id="calculateButton">Calculate</button>
            </p>
            
            <p>
                Total cost, including shipping:
                <input type="text" id="result" disabled> 
            </p>
            
            <p id = "error"></p>
        </section>
    </main>
    <?php require_once './view/footer.php'; ?>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script src="./scripts/shipping.js"></script>
    <script src="./scripts/date.js"></script>
</body>
</html>
