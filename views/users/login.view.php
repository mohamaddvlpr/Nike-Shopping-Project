<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../assets/css/form.css">
</head>
<body>

    <div class="message-box">
        <?php foreach($errors as $error): ?>
        <p><?= htmlspecialchars($error) ?></p>
        <?php endforeach ?>
    </div>
    <div class="form-container">

        <div class="top">
            
        </div>

        <form action="/login" method="post">
        <div class="inputs">
                <h3>Get Started</h3>
                <input id="inputEmail" name="email" type="text" placeholder="Email...">
                <input id="inputPass" name="password" type="password" placeholder="Password...">

                <input class="input-btn" type="submit" value="Login">
        </div>
        </form>
        <!-- <div class="img-con">
            <img  src="./assets/images/icons8-nike-150.png" alt="">
        </div> -->
    </div>

    <script src="../assets/js/login.js"></script>
</body>
</html>