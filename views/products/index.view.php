
<?php
    if(!isset($_SESSION["id"])) {
        header("location: /");
        exit();
    }
?>

<!DOCTYPE html>
<html lang="en" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../assets/css/products.css">
</head>
<body>

  <?php view("partial/headerProductPage.php") ?>


    <div class="shoes">
        <?php foreach($productDatas as $product): ?>
        <div class="product">
            <img src="./assets/images/<?= htmlspecialchars($product["photo_path"]) ?>" alt="">
            <h2><?= htmlspecialchars($product["name"]) ?></h2>
            <p>Lorem ipsum dolor sit amet consectetur</p>

            <div class="btn-cart">
            <p class="price"><?= "$" . htmlspecialchars($product["price"]) ?></p>
            <button id="btn-buy">Buy</button>
            <div class="shopCart">
                <button class="remove">-</button>
                <p class="count">1</p>
                <button class="add">+</button>
            </div>
            </div>  
        </div>
        <?php endforeach ?>
    </div>
</body>

    <script src="../assets/js/index.js"></script>

</html>