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
        <?php foreach ($errors as $error): ?>
            <p><?= htmlspecialchars($error) ?></p>
        <?php endforeach ?>
    </div>

    <div class="form-container">
        <div class="top">
        </div>
        <form action="/register/store" method="POST">
            <div class="inputs">
                <div>
                    <h3>Get Started</h3>
                </div>

                <input id="inputUsername" name="username" type="text" placeholder="Username...">
                <input id="inputEmail" name="email" type="text" placeholder="Email...">
                <input id="inputPhone" name="phone" type="text" placeholder="Phone Number...">
                <input id="inputPass" name="pass" type="password" placeholder="Password...">
                <input id="inputPassRp" name="passPr" type="password" placeholder="Repeat Password...">
                <select name="role" id="">
                    <option value="admin">Admin</option>
                    <option value="simple">Simple</option>
                </select>
                <input class="input-btn" type="submit" value="Register">


            </div>
        </form>
    </div>

    <!-- <script src="../assets/js/form.js"></script> -->
</body>

</html>