+<!-- FOOTER -->

<footer id="footer" class="section section-grey">
     <link rel="shortcut icon" href="img/title5.png" />
<!-- container -->
    <div class="container">
        <!-- row -->
        <div class="row">
            
            <!-- footer widget -->
            <div class="col-md-3 col-sm-6 col-xs-6">
                <div class="footer">
                    <!-- footer logo -->
                    <div class="footer-logo">
                        <a class="logo" href="#">
                            <img src="" alt="">
                        </a>
                    </div>
                    <!-- /footer logo -->

                    <!-- footer social -->
                    <ul class="footer-social">
                        <li><a href="#"><i class="fa fa-facebook fa-2x"></i></a></li>
                        <li><a href="#"><i class="fa fa-twitter fa-2x"></i></a></li>
                        <li><a href="#"><i class="fa fa-instagram fa-2x"></i></a></li>
                        <li><a href="#"><i class="fa fa-google-plus fa-2x"></i></a></li>
                        <li><a href="#"><i class="fa fa-pinterest fa-2x"></i></a></li>
                    </ul>
                    <!-- /footer social -->
                </div>
            </div>
            <!-- /footer widget -->

            <!-- footer widget -->
            <div class="col-md-3 col-sm-6 col-xs-6">
                <div class="footer">
                    <h3 class="footer-header">My Account</h3>
                    <ul class="list-links">
                        
                        <?php if(isset($_SESSION['s_id'])) { ?>
                        
                        <li><a href="wishlist_page.php">Wishlist</a></li>
                        <li><a href="invoice_page.php">Invoices</a></li>
                        
                        <?php } else if(isset ($_SESSION['admin_id'])) { ?>
                        
                        <li><a href="add_new_product.php">Add New Product</a></li>
                        <li><a href="search_customers.php">Search Customers</a></li>
                        
                        <?php } else { ?>
                        
                        <li><a href="login.php">Login</a></li>
                        <li><a href="products.php">Products</a></li>
                        
                        <?php } ?>
                        
                        <li><a href="register.php">Create Account</a></li>
                        
                    </ul>
                </div>
            </div>
            <!-- /footer widget -->

            <div class="clearfix visible-sm visible-xs"></div>

            <!-- footer widget -->
            <div class="col-md-3 col-sm-6 col-xs-6">
                <div class="footer">
                    <h3 class="footer-header">Customer Service</h3>
                    <ul class="list-links">
                        <li><a href="index.php">About Us</a></li>
                        <li><a href="index.php">Shipping & Return</a></li>
                        <li><a href="index.php">Shipping Guide</a></li>
                    </ul>
                </div>
            </div>
            <!-- /footer widget -->

            <!-- footer subscribe -->
            <div class="col-md-3 col-sm-6 col-xs-6">
                <div class="footer">
                    
                    <?php if(isset($_SESSION['s_id'])) { ?>
                    
                    <h3 class="footer-header">Make Report</h3>
                    
                    <form action="../Controllers/action_add_report.php" method="post">
                        <div class="form-group">
                            <input type="text" name="data" class="input rep" placeholder="Write a report about the site" required>
                        </div>
                        <button type="submit" class="primary-btn">Send</button>
                    </form>
                    
                    <?php } else if (isset($_SESSION['admin_id'])) { ?>
                   
                   <form action="../Models/full_rep.php">
                        <button  type="submit" class="primary-btn"><a style="color: #fff;" href="report_page.php">Show Reports</a></button>
                    </form>
                    
                    <?php } else { ?>
                    
                    <img src="img/Logo_paystore2.jpg" class="img-responsive my_logo" alt="Logo">
                    
                    <?php } ?> 
                    
                </div>
            </div>
            <!-- /footer subscribe -->
        </div>
        <!-- /row -->
        <hr>
        <!-- row -->
        <div class="row">
            <div class="col-md-8 col-md-offset-2 text-center">
                <!-- footer copyright -->
                <div class="footer-copyright">
                    Copyright &copy;<script>document.write(new Date().getFullYear());</script> This Design is made <i class="fa fa-heart-o" aria-hidden="true"></i> by Our Team
                </div>
                <!-- /footer copyright -->
            </div>
        </div>
        <!-- /row -->
    </div>
    <!-- /container -->
</footer>
<!-- /FOOTER -->