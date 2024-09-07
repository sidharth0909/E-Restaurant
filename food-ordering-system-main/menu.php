<?php
session_start();
if(isset($_SESSION["user_id"]))
{

}else{
    echo "<script> location.href='login.php'; </script>";
}
include("connection/connect.php");
include_once 'product-action.php';
?>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="potoffood.png">
    <title>Dishes</title>
    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/font-awesome.min.css" rel="stylesheet">
    <link href="css/animsition.min.css" rel="stylesheet">
    <link href="css/animate.css" rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href="css/style.css" rel="stylesheet"> </head>

<body>

<body class="home">

    <!--header starts-->
    <header id="header" class="header-scroll top-header headrom">
        <!-- .navbar -->
        <nav class="navbar navbar-dark">
            <div class="container">
                <button class="navbar-toggler hidden-lg-up" type="button" data-toggle="collapse"
                    data-target="#mainNavbarCollapse">&#9776;</button>
                <a class="navbar-brand" href="index.php"> <img class="img-rounded" src="images/food-logo-59E5A73AFD-seeklogo.com.png"
                        alt=""> </a>
                <div class="collapse navbar-toggleable-md  float-lg-right" id="mainNavbarCollapse">
                    <ul class="nav navbar-nav">
                        <li class="nav-item"> <a class="nav-link active" href="index.php">Home <span
                                    class="sr-only">(current)</span></a> </li>
                       


                        <?php
						if(empty($_SESSION["user_id"])) // if user is not login
							{
								echo '<li class="nav-item"><a href="login.php" class="nav-link active">Login</a> </li>
							  <li class="nav-item"><a href="registration.php" class="nav-link active">Sign Up</a> </li>';
							}
						else
							{
									//if user is login	
									//echo  '<li class="nav-item"><a href="menu.php" class="nav-link active">Menu</a> </li>';
                                    echo  '<li class="nav-item"><a href="myOrder.php" class="nav-link active">My Order</a> </li>';
									echo  '<li class="nav-item"><a href="logout.php" class="nav-link active">Logout</a> </li>';
							}

						?>

                    </ul>

                </div>
            </div>
        </nav>
        <!-- /.navbar -->
    </header>
    

    <div class="page-wrapper">
            <!-- top Links -->
            <div class="top-links">
                <div class="container">
                    <ul class="row links">
                       
                        <!-- <li class="col-xs-12 col-sm-4 link-item active"><span>1</span><a href="restaurants.php">Choose Restaurant</a></li>
                        <li class="col-xs-12 col-sm-4 link-item"><span>2</span><a href="#">Pick your favourite dishes</a></li>
                        <li class="col-xs-12 col-sm-4 link-item"><span>3</span><a href="#">Get delivered & Pay</a></li> -->
                    </ul>
                </div>
            </div>
            <!-- end:Top links -->
            <!-- start: Inner page hero -->
        
            <div class="result-show">
                <div class="container">
                    <div class="row">
                       
                       
                    </div>
                </div>
            </div>
              <!-- end:Inner page hero -->
              <div class="breadcrumb">
                <div class="container">
                   
                </div>
            </div>
            <div class="container m-t-30">
                <div class="row">
                    <div class="col-xs-12 col-sm-4 col-md-4 col-lg-3">
                        
                         <div class="widget widget-cart">
                                <div class="widget-heading">
                                    <h3 class="widget-title text-dark">
                                 Your Shopping Cart
                              </h3>
							  				  
							  
                                    <div class="clearfix"></div>
                                </div>
                                <div class="order-row bg-white">
                                    <div class="widget-body">
									
									
	<?php

$item_total = 0;
if(isset($_SESSION['cart_item']))
{
    foreach ($_SESSION["cart_item"] as $item)  // fetch items define current into session ID
    {
    ?>									
                                        
                                            <div class="title-row">
                                            <?php echo $item["title"]; ?><a href="menu.php?action=remove&id=<?php echo $item["id"]; ?>" >
                                            <i class="fa fa-trash pull-right"></i></a>
                                            </div>
                                            
                                            <div class="form-group row no-gutter">
                                                <div class="col-xs-8">
                                                     <input type="text" class="form-control b-r-0" value=<?php echo $item["price"]; ?> readonly id="exampleSelect1">
                                                       
                                                </div>
                                                <div class="col-xs-4">
                                                   <input class="form-control" type="text" readonly value='<?php echo $item["quantity"]; ?>' id="example-number-input"> </div>
                                            
                                          </div>
                                          
        <?php
    $item_total += ($item["price"]*$item["quantity"]); // calculating current price into cart
    }
}

?>								  
									  
									  
									  
                                    </div>
                                </div>
                               
                                <!-- end:Order row -->
                             
                                <div class="widget-body">
                                    <div class="price-wrap text-xs-center">
                                        <p>Total Amount</p>
                                        <h3 class="value"><strong>&#8377;<?php echo $item_total; ?></strong></h3>
                                        <p>Free Shipping</p>
                                        <a href="menu.php?&action=check"  class="btn theme-btn btn-lg">Place Order</a>
                                    </div>
                                </div>
								
						
								
								
                            </div>
                    </div>

                    <div class="col-xs-12 col-sm-8 col-md-8 col-lg-6">
                      
                        <!-- end:Widget menu -->
                        <div class="menu-widget" id="2">
                            <div class="widget-heading">
                                <h3 class="widget-title text-dark">
                              Your Menu <a class="btn btn-link pull-right" data-toggle="collapse" href="#popular2" aria-expanded="true">
                              <i class="fa fa-angle-right pull-right"></i>
                              <i class="fa fa-angle-down pull-right"></i>
                              </a>
                           </h3>
                                <div class="clearfix"></div>
                            </div>
                            <div class="collapse in" id="popular2">
						<?php  // display values and item of food/dishes
									$stmt = $db->prepare("select * from dishes");
									$stmt->execute();
									$products = $stmt->get_result();
									if (!empty($products)) 
									{
									foreach($products as $product)
										{
						
													
													 
													 ?>
                                <div class="food-item">
                                    <div class="row">
                                        <div class="col-xs-12 col-sm-12 col-lg-8">
										<form method="post" action='menu.php?action=add&id=<?php echo $product['id']; ?>'>
                                            <div class="rest-logo pull-left">
                                                <a class="restaurant-logo pull-left" href="#"><?php echo '<img src="uploadimages/'.$product['img'].'" alt="Food logo">'; ?></a>
                                            </div>
                                            <!-- end:Logo -->
                                            <div class="rest-descr">
                                                <h6><a href="#"><?php echo $product['title']; ?></a></h6>
                                                <p> <?php echo $product['slogan']; ?></p>
                                            </div>
                                            <!-- end:Description -->
                                        </div>
                                        <!-- end:col -->
                                        <div class="col-xs-12 col-sm-12 col-lg-4 pull-right item-cart-info"> 
										<span class="price pull-left" >&#8377;<?php echo $product['price']; ?></span>
										  <input class="b-r-0" type="text" name="quantity"  style="margin-left:30px;" value="1" size="2" />
										  <input type="submit" class="btn theme-btn" style="margin-left:40px;" value="Add to cart" />
										</div>
										</form>
                                    </div>
                                    <!-- end:row -->
                                </div>
                                <!-- end:Food item -->
								
								<?php
									  }
									}
									
								?>
								
								
                              
                            </div>
                            <!-- end:Collapse -->
                        </div>
                        <!-- end:Widget menu -->
                       
                    </div>
                    <!-- end:Bar -->
                    <div class="col-xs-12 col-md-12 col-lg-3">
                        <div class="sidebar-wrap">
                           <div class="widget clearfix">
                            <!-- /widget heading --> <h3 class="widget-title text-dark">
                                 Your Table
                              </h3>
                              <div class="clearfix"></div>
                                </div>
                                <div class="widget-body">
                                    <p>
                                        Table Number :<?php echo $_SESSION['tableNo']; ?>
                                </p>
                                </div>
            
                        </div>
                        </div>
                    </div>
                    <!-- end:Right Sidebar -->
                </div>
                <!-- end:row -->
            </div>
            <!-- end:Container -->



    <footer class="footer">
        <div class="container">
            <!-- top footer statrs -->
            <div class="row top-footer">
                <div class="col-xs-12 col-sm-3 footer-logo-block color-gray">
                    <a href="#"> <img src="images/food-logo-59E5A73AFD-seeklogo.com.png" alt="Footer logo"> </a> <span>Choose it &amp;
                        Enjoy your meals! </span>
                </div>
                <div class="col-xs-12 col-sm-2 about color-gray">
                    <h5>About Us</h5>
                    <ul>
                        <li><a href="#">Our Mission</a></li>
                        <li><a href="#">Social Media</a></li>
                        <li><a href="#">Testimonials</a></li>
                        <li><a href="#">We are hiring</a></li>
                        <li><a href="#">Join us Today</a></li>
                    </ul>
                </div>
                <div class="col-xs-12 col-sm-2 how-it-works-links color-gray">
                    <h5>How it Works?</h5>
                    <ul>
                        <li><a href="#">Enter your location</a></li>
                        <li><a href="#">Choose the restaurant</a></li>
                        <li><a href="#">Choose your dishes</a></li>
                        <li><a href="#">Get delivered</a></li>
                        <li><a href="#">Pay on delivery</a></li>
                        <li><a href="#">Enjoy your meals :)</a></li>
                    </ul>
                </div>
                <div class="col-xs-12 col-sm-2 pages color-gray">
                    <h5>Legal</h5>
                    <ul>
                        <li><a href="#">Terms & Conditions</a> </li>
                        <li><a href="#">Refund & Cancellation</a> </li>
                        <li><a href="#">Privacy Policy</a> </li>
                        <li><a href="#">Cookie Policy</a> </li>
                        <li><a href="#">Offer Terms</a> </li>
                    </ul>
                </div>
                <div class="col-xs-12 col-sm-3 popular-locations color-gray">
                    <h5>Locations We Deliver To</h5>
                    <ul>
                        <li><a href="#">Ahmedabad</a> </li>
                        <li><a href="#">Gandhinagar</a> </li>
                        <li><a href="#">Surat</a> </li>
                       
                    </ul>
                </div>
            </div>
            <!-- top footer ends -->
            <!-- bottom footer statrs -->
            <div class="bottom-footer">
                <div class="row">
                    <div class="col-xs-12 col-sm-3 payment-options color-gray">
                        <h5>All Major Credit Cards Accepted</h5>
                        <ul>
                            <li>
                                <a href="#"> <img src="images/paypal.png" alt="Paypal"> </a>
                            </li>
                            <li>
                                <a href="#"> <img src="images/mastercard.png" alt="Mastercard"> </a>
                            </li>
                            <li>
                                <a href="#"> <img src="images/maestro.png" alt="Maestro"> </a>
                            </li>
                            <li>
                                <a href="#"> <img src="images/stripe.png" alt="Stripe"> </a>
                            </li>
                            <li>
                                <a href="#"> <img src="images/bitcoin.png" alt="Bitcoin"> </a>
                            </li>
                        </ul>
                    </div>
                    <div class="col-xs-12 col-sm-4 address color-gray">
                        <h5>Address:</h5>
                        <p>Ahmedabad</p>
                        <h5>Call us at: <a href="">+91 11234234</a></h5>
                    </div>
                    <div class="col-xs-12 col-sm-5 additional-info color-gray">
                        <h5>Who are we?</h5>
                        <p>learn asdkf sdf asdf s sdf sdfLorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book..</p>
                    </div>
                </div>
            </div>
            <!-- bottom footer ends -->
        </div>
    </footer>
    <!-- end:Footer -->

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <script src="js/jquery.min.js"></script>
    <script src="js/tether.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/animsition.min.js"></script>
    <script src="js/bootstrap-slider.min.js"></script>
    <script src="js/jquery.isotope.min.js"></script>
    <script src="js/headroom.js"></script>
    <script src="js/foodpicky.min.js"></script>
</body>

</html>