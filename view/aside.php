<?php
require_once './model/database.php';
require_once './model/category_db.php';
$categories = get_categories();
?>
<aside>
    <ul>
        <?php foreach ($categories as $category) : ?>
            <li><a href="index.php?action=<?php echo strtolower($category['category_name']); ?>"><?php echo $category['category_name']; ?></a></li>
        <?php endforeach; ?>
    </ul>
</aside>