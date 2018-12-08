<!-- HEADER -->
<header>
     <link rel="shortcut icon" href="img/title5.png" />
    <!-- top Header -->
    <div id="top-header">
        <div class="container">
            <div class="pull-left">
                <span>Welcome to PayStore!</span>
            </div>
            <div class="pull-right">
                <ul class="header-top-links">
                    <li><a href="#">Store</a></li>
                    <li><a href="#">FAQ</a></li>
                    <li class="dropdown default-dropdown">
                        <a class="dropdown-toggle" data-toggle="dropdown" aria-expanded="true">ENG <i class="fa fa-caret-down"></i></a>
                        <ul class="custom-menu">
                            <li><a href="#">English (ENG)</a></li>
                        </ul>
                    </li>
                    <li class="dropdown default-dropdown">
                        <a class="dropdown-toggle" data-toggle="dropdown" aria-expanded="true">USD <i class="fa fa-caret-down"></i></a>
                        <ul class="custom-menu">
                            <li><a href="#">USD ($)</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <!-- /top Header Done -->

    <!-- header -->
    <div id="header">
        <div class="container">
            <div class="pull-left">

                <!-- Logo -->
                <div class="header-logo">
                    <a class="logo" href="index.php">
                        <img src="./img/Logo_paystore.jpg" alt="">
                    </a>
                </div>
                <!-- /Logo -->
                
            </div>

            <div class="pull-right">
                <ul class="header-btns">

                    <!-- Account -->
                    <li class="header-account dropdown default-dropdown">
                        <div class="dropdown-toggle" role="button" data-toggle="dropdown" aria-expanded="true">
                            <div class="header-btns-icon">
                                <i class="fa fa-user-o"></i>
                            </div>
                            <strong class="text-uppercase">My Account <i class="fa fa-caret-down"></i></strong>
                        </div>

                        <?php if(isset($_SESSION['s_id'])) { ?>

                        <a href="" class="text-uppercase"><?php echo $_SESSION['s_name']; ?></a>

                        <?php } else if(isset($_SESSION['admin_id'])) { ?>

                        <a href="" class="text-uppercase">Admin</a>

                        <?php } else { ?>

                        <a href="login.php" class="text-uppercase">Login</a> / <a href="register.php" class="text-uppercase">Join</a>

                        <?php } ?>

                        <ul class="custom-menu">

                            <?php if(isset($_SESSION['s_id'])) { ?>

                            <li><a href="profile.php"><i class="fa fa-user-o"></i> My Account</a></li>
                            <li><a href="wishlist_page.php"><i class="fa fa-heart-o"></i> My Wishlist</a></li>
                            <li><a href="checkout.php"><i class="fa fa-check"></i> Checkout</a></li>
                            <li><a href="invoice_page.php"><i class="fa fa-paypal"></i> Invoices</a></li>
                            <li><a href="logout.php"><i class="fa fa-unlock-alt"></i> Logout</a></li>
                            <li><a href="register.php"><i class="fa fa-user-plus"></i> Create An Account</a></li>

                            <?php } if(!isset($_SESSION['s_id']) && !isset($_SESSION['admin_id'])) { ?>

                            <li><a href="login.php"><i class="fa fa-unlock-alt"></i> Login</a></li>
                            <li><a href="register.php"><i class="fa fa-sign-in"></i> Sign Up</a></li>

                            <?php } if(isset($_SESSION['admin_id'])) { ?>

                            <li><a href="profile.php"><i class="fa fa-user-o"></i> My Account</a></li>
                            <li><a href="logout.php"><i class="fa fa-unlock-alt"></i> Logout</a></li>
                            <li><a href="register.php"><i class="fa fa-user-plus"></i> Create An Account</a></li>
                            <li><a href="search_customers.php"><i class="fa fa-search"></i> Search Customer </a></li>
                            <li><a href="add_new_product.php"><i class="fa fa-cart-arrow-down"></i> Add New Product</a></li>

                            <?php } ?>

                        </ul>
                    </li>
                    <!-- /Account -->

                    <?php
                        if(isset($_SESSION['s_id'])) {
                            include_once '../Controllers/ShoppingCart.php';
                            $cart = new ShoppingCart();
                            $my_products = $cart->get_my_products($_SESSION['s_id']);
                            $total_price = $cart->get_total_price($_SESSION['s_id']);
                    ?>

                    <!-- Cart -->
                    <li class="header-cart dropdown default-dropdown">
                        <a class="dropdown-toggle" data-toggle="dropdown" aria-expanded="true">
                            <div class="header-btns-icon">
                                <i class="fa fa-shopping-cart"></i>
                                <span class="qty"><?php echo sizeof($my_products); ?></span>
                            </div>
                            <strong class="text-uppercase">My Cart:</strong>
                            <br>
                            <span><?php echo $total_price; ?>$</span>
                        </a>

                        <div class="custom-menu">
                            <div id="shopping-cart">

                                <div class="shopping-cart-list">

                                    <?php
                                        if (!is_null($my_products)){ 
                                        for($l=0; $l<sizeof($my_products); $l++) {
                                    ?>

                                    <div class="product product-widget">
                                        <div class="product-thumb">
                                            <img src="./img/<?php echo $my_products[$l]['image_name']; ?>" alt="image">
                                        </div>
                                        <div class="product-body">
                                            <h3 class="product-price"><?php echo $my_products[$l]['Price']; ?><span class="qty"> $</span></h3>
                                            <h2 class="product-name">Name: <?php echo $my_products[$l]['Name']; ?></h2>
                                        </div>
                                        <form action="../Controllers/action_remove_from_cart.php" method="post">
                                            <input type="hidden" name="id" value="<?php echo $my_products[$l]['Id'] ?>">
                                            <button type="submit" class="cancel-btn"><i class="fa fa-trash"></i></button>
                                        </form>
                                    </div>

                                    <?php } }?>

                                </div>

                                <div class="shopping-cart-btns">
                                    <a href="cart.php"><button class="main-btn">View Cart</button></a>
                                    <a href="checkout.php"><button class="primary-btn">Checkout <i class="fa fa-arrow-circle-right"></i></button></a>
                                </div>

                            </div>
                        </div>
                    </li>
                    <!-- /Cart -->

                    <?php } ?>

                    <!-- Mobile navigation toggle-->
                    <li class="nav-toggle">
                        <button class="nav-toggle-btn main-btn icon-btn"><i class="fa fa-bars"></i></button>
                    </li>
                    <!-- / Mobile navigation toggle -->
                </ul>
            </div>
        </div>
        <!-- header -->
    </div>
    <!-- container -->
</header>
<!-- /HEADER Done -->