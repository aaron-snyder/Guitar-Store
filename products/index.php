<?php
    // Include database.php which contains the code to connect to the database
    require_once '../model/database.php';
    
    // Get all categories from the my_guitar_shop database
    $query = 'SELECT * FROM categories
              ORDER BY category_id';
    $statement = $db->prepare($query);
    $statement->execute();
    $categories = $statement->fetchAll();
    $statement->closeCursor();
?>

<!DOCTYPE html>

<html lang="en">
    
<head>
    <title>The Guitar Store</title>
    <link rel="stylesheet" href="../styles/main.css">
    <link rel="stylesheet" href="../styles/products.css">
</head>
    
<body>
    <?php require_once 'view/header.php'; ?>
    <?php require_once 'view/horizontal_nav_bar.php'; ?>
    <main>
        <?php require_once 'view/aside.php'; ?>
        <section>
            
            <!-- Create drop down menu with all categories -->
            <h3>Product list</h3>
            <form method="GET" action="">
                <select name="category" id="category">
                    <?php foreach ($categories as $category) : ?>
                        <option value="<?php echo $category['category_id']; ?>"><?php echo $category['category_name']; ?></option>
                    <?php endforeach; ?>
                </select>
                <==
                <input type="submit" value="Choose">
            </form>

            <?php
                $selectedCategory = isset($_GET['category']) ? $_GET['category'] : $categories[0]['category_id'];

                // Fetch products based on the selected category
                $query = 'SELECT * FROM products
                          WHERE category_id = :category_id
                          ORDER BY product_id';
                $statement = $db->prepare($query);
                $statement->bindValue(':category_id', $selectedCategory);
                $statement->execute();
                $products = $statement->fetchAll();
                $statement->closeCursor();
                
                // Fetch the name of the selected category
                $query = 'SELECT category_name FROM categories
                          WHERE category_id = :category_id';
                $statement = $db->prepare($query);
                $statement->bindValue(':category_id', $selectedCategory);
                $statement->execute();
                $categoryName = $statement->fetchColumn();
                $statement->closeCursor();
            ?>
            
            <h3><?php echo $categoryName; ?></h3>
            <!-- display a list of categories in a table, Product ID, Name, Price-->
            <table>
                <tr>
                    <th>Product ID</th>
                    <th>Name</th>
                    <th class="price-column">Price</th>
                    <th></th>
                    <th></th>
                </tr>
                <?php foreach ($products as $product) : ?>
                    <tr>
                        <td><?php echo $product['product_id']; ?></td>
                        <td><?php echo $product['product_name']; ?></td>
                        <td class="price-column"><?php echo $product['list_price']; ?></td>
                        <td><a href="./edit_product.php"><button>Edit</button></a></td>
                        <td><a href="./delete_product.php"><button>Delete</button></a></td>
                    </tr>
                <?php endforeach; ?>
            </table>
            <!-- link to add a product to list -->
            <h3><a href="./add_product.php">Add Product</a></h3>
            
        </section
    </main>
    <?php require_once './view/footer.php'; ?>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script src="../scripts/shipping.js"></script>
    <script src="../scripts/date.js"></script>
</body>
</html>
