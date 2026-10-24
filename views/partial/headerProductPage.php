    <div class="preloader" id="preloader">
        <img class="logo" src="./assets/images/icons8-nike-150.png" alt="">
    </div>

    <div id="asideMobile" class="aside-mobile">

        <img src="./assets/images/icons8-nike-150.png" alt="">

        <nav>
            <ul>
                <li><a href="/">Home</a></li>            
                <li><a href="/products">Your Product</a></li>
                <li><a href="/contact">Contact</a></li>
                <li><a href="/about">About</a></li>
            </ul>
        </nav>
    </div>

    <header class="header-mobile">
        <img src="./assets/images/icons8-nike-150.png" alt="">

        <div id="menu-icon">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
            <line x1="3" y1="6" x2="21" y2="6"/>
            <line x1="3" y1="12" x2="21" y2="12"/>
            <line x1="3" y1="18" x2="21" y2="18"/>
            </svg>
        </div>
    </header>


    <header class="headerDesktop">
        <input type="text" placeholder="Search..." name="search" class="searchInput">

        <nav>
            <ul>
                <li><a class="<?= isUrl("/") ? "current-page" :  "list-product"?>" href="/" style="cursor: pointer;">Home</a>
                 <div class="productListBox">
                    <div>
                    <h3>T-Shirt</h3>
                    <ul>
                        <li><a href="">Sport</a></li>
                        <li><a href="">Special</a></li>
                        <li><a href="">Men</a></li>
                        <li><a href="">Women</a></li>
                    </ul>
                </div>
                <div>
                    <h3>Shoes</h3>
                    <ul>
                        <li><a href="./product.html">A-Force</a></li>
                        <li><a href="./product.html">Jordan</a></li>
                        <li><a href="./product.html">Traviss</a></li>
                        <li><a href="./product.html">Air Jordan</a></li>
                    </ul>
                </div>
                </div>
                </li>
                <li><a class="<?= isUrl("/products") ? "current-page" :  "list-product"?>" href="/products">Your Product</a></li>
                <li><a class="<?= isUrl("/about") ? "current-page" :  "list-product"?>" href="/about">About</a></li>
                <li><a class="<?= isUrl("/contact") ? "current-page" :  "list-product"?>" href="/contact">Contact</a></li>
            </ul>
        </nav>

        <div style="display: flex; align-items: center; gap: 10px;">
            <?php if(!isset($_SESSION["username"])): ?>
            <a class="btn-link" href="/login">Login</a>
            <?php else: ?>
            <a class="btn-link" href="/product/create">Add Products</a>
            <form action="/logout" method="post">
                <button class="btn-logout" type="submit">Logout</button>
            </form>
            <?php endif ?>
            <svg 
            style="cursor: pointer;"
            id="night-mode"
            xmlns="http://www.w3.org/2000/svg" 
            width="25" 
            height="25" 
            viewBox="0 0 24 24" 
            fill="none" 
            stroke="currentColor" 
            stroke-width="2" 
            stroke-linecap="round" 
            stroke-linejoin="round"
            >
            <path d="M21 12.79A9 9 0 1 1 11.21 3 
             7 7 0 0 0 21 12.79z"/>
            </svg>
        </div>
    </header>