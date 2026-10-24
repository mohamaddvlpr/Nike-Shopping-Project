<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nike Shoes</title>
    <link rel="stylesheet" href="./assets/css/style.css">
</head>

<body>
    <!--PreLoader-->
    <?php view("partial/header.php") ?>

    <section class="hero">
        <div class="text-hero">
            <h1 style="text-transform: capitalize;"><span>Welcome</span> <?= htmlspecialchars($_SESSION["username"] ?? "GUEST") ?></h1>
            <h1>Find Your <br><span> Dream Snekers</span></h1>
            <p>Find Your Shoe's From Our Various Collections. Here Shoes Are Endless And</p>
            <a href="/product/create">EXPLORE MORE</a>
        </div>

        <div class="image-hero">
            <img src="./assets/images/nikehero.png" alt="">
        </div>
    </section>

    <section class="pro-card">
        <h2>Nike Shirt</h2>
        <div class="products">
        <?php if(isset($_SESSION["username"])): ?>    
            <?php if (!empty($productDatas)): ?>
                <?php foreach ($productDatas as $productData): ?>
                    <a href="/product?id=<?= (int) $productData["id"] ?>" style="text-decoration: none; color: black">
                        <div class="product">
                            <img src="./assets/images/<?= htmlspecialchars($productData["photo_path"]) ?>" alt="">
                            <h2><?= htmlspecialchars($productData["name"]) ?></h2>
                            <p>Lorem ipsum dolor sit amet consectetur</p>

                            <div class="btn-cart">
                                <p class="price"><?= "$" . htmlspecialchars($productData["price"]) ?></p>
                                <button id="btn-buy">Buy</button>
                                <div class="shopCart">
                                    <button class="remove">-</button>
                                    <p class="count">1</p>
                                    <button class="add">+</button>
                                </div>
                            </div>
                            <p class="delpri">$300.00</p>
                            <span>-10%</span>
                        </div>
                    </a>
                <?php endforeach ?>
            <?php else: ?>
                <p style="color: black; font-weight: bold;">There Is No Pruduct Yet</p>
            <?php endif; ?>
            <?php endif; ?>
        </div>
    </section>

    <section class="pro-list">
        <div>
            <h3>Shoes</h3>

            <ul>
                <li>Black Running Shoes</li>
                <li>Black Running Shoes</li>
                <li>Black Running Shoes</li>
                <li>Black Running Shoes</li>
            </ul>
        </div>

        <div>
            <h3>Clothing</h3>

            <ul>
                <li>Yoga Trousers</li>
                <li>Yoga Trousers</li>
                <li>Yoga Trousers</li>
                <li>Yoga Trousers</li>
            </ul>
        </div>


        <div>

            <h3>Kids</h3>

            <ul>
                <li>Girls' Black Shoes</li>
                <li>Girls' Black Shoes</li>
                <li>Football Club Teams</li>
                <li>Football Club Teams</li>
            </ul>
        </div>
        <div>
            <h3>Featured</h3>

            <ul>
                <li>Football Club Teams</li>
                <li>Football Club Teams</li>
                <li>Football Club Teams</li>
                <li>Football Club Teams</li>
            </ul>
        </div>
    </section>

    <hr>

    <footer class="nike-foot">
        <div class="footer-top">
            <div class="cols">
                <h3>Resources</h3>

                <ul>
                    <li>Gift Card</li>
                    <li>Gift Card</li>
                    <li>Gift Card</li>
                    <li>Gift Card</li>
                    <li>Gift Card</li>
                    <li>Gift Card</li>
                    <li>Gift Card</li>
                </ul>
            </div>

            <div class="cols">
                <h3>Help</h3>

                <ul>
                    <li>Get Help</li>
                    <li>Get Help</li>
                    <li>Get Help</li>
                    <li>Get Help</li>
                    <li>Get Help</li>
                    <li>Get Help</li>
                    <li>Get Help</li>
                </ul>
            </div>

            <div class="cols">
                <h3>Company</h3>

                <ul>
                    <li>About Nike</li>
                    <li>About Nike</li>
                    <li>About Nike</li>
                    <li>About Nike</li>
                    <li>About Nike</li>
                    <li>About Nike</li>
                    <li>About Nike</li>
                </ul>
            </div>


            <div class="cols">
                <h3>Community Discounts</h3>

                <ul>
                    <li>Student</li>
                    <li>Student</li>
                </ul>
            </div>

            <div class="country">
                <i class="fa-solid fa-earth-americas"></i> Czech Republic
            </div>

        </div>

        <div class="footer-bottom">
            <span>© 2025 Nike, Inc. All rights reserved</span>

            <ul>
                <li><a href="">Guides</a></li>
                <li><a href="">Term Of Use</a></li>
                <li><a href="">Term Of Sale</a></li>
                <li><a href="">Company Details</a></li>
                <li><a href="">Privacy & Cookie Policy</a></li>
                <li><a href="">Privacy & Cookie Setting</a></li>
            </ul>
        </div>
    </footer>


    <script src="../assets/js/index.js"></script>
</body>

</html>