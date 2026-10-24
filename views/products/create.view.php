<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Product</title>

    <link rel="stylesheet" href="../assets/css/product-form.css">
</head>
<body>
    
<?php if(!empty($errors)): ?>
    <div class="message-box">
      <?php foreach ($errors as $error): ?>
        <p><?= htmlspecialchars($error) ?></p>
      <?php endforeach ?>
    </div>
<?php endif ?>    

<div class="form-container">

    <div class="top">
        <h4>Add Product</h4>
    </div>

    <form action="/product/store" method="POST" enctype="multipart/form-data">

        <div class="inputs">

            <h3>Add New Product</h3>

            <input type="text" placeholder="Product Name" name="name" value="<?= htmlspecialchars($_POST["name"] ?? "") ?>">

            <input type="text" placeholder="Price" name="price">

            <textarea placeholder="Product Description" name="description"></textarea>

            <select name="category">
                <option selected disabled>Select Category</option>
                <option>Shoes</option>
                <option>T-Shirt</option>
                <option>Pants</option>
                <option>Hoodie</option>
                <option>Accessories</option>
            </select>

            <input name="photo_path" type="file" accept="image/*">

            <input class="input-btn" type="submit" value="Add Product">

        </div>

    </form>

</div>

</body>

<script>
    const messageBox = document.querySelector(".message-box")

    if (messageBox) {
        setTimeout(() => {
            messageBox.style.cssText = "display: none"
        }, 3000)
    }
</script>

</html>