<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shoe Product</title>
    <link rel="stylesheet" href="../assets/css/product.css">
</head>
<body>

    <div class="container">

        <?php foreach($productDatas as $productData): ?>

        <div class="image-box">
            <img src="../assets/images/<?= htmlspecialchars($productData["photo_path"]) ?>" alt="">
        </div>

        <div class="info">

            <span class="badge">Nike Air Max</span>

            <h1><?= htmlspecialchars($productData["name"]) ?></h1>

            <div class="price"><?= "$" . htmlspecialchars($productData["price"]) ?></div>

            <p class="desc">
            High-performance running shoe designed for comfort, durability, and modern style. Built with lightweight materials and advanced cushioning for daily training and sport activities.
            </p>

            <div style="display: flex; gap: 10px;">
                <a href="#" class="btn">Buy Now</a>
            <form action="" method="post">
                <input type="hidden">
                <button class="delete-product">Delete</button>
            </form>
            </div>

            

        </div>
    <?php endforeach ?>
    </div>
</body>
</html>