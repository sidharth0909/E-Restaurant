<!DOCTYPE html>
<html lang="en">
<?php
include("connection/connect.php");  //include connection file
error_reporting(0);  // using to hide undefine undex errors
session_start(); //start temp session until logout/browser closed

?>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="homepage.png">
    <title>Home</title>
    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/font-awesome.min.css" rel="stylesheet">
    <link href="css/animsition.min.css" rel="stylesheet">
    <link href="css/animate.css" rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href="css/style.css" rel="stylesheet">
</head>

<body class="home">

    <!--header starts-->
    <header id="header" class="header-scroll top-header headrom">
        <!-- .navbar -->
        <nav class="navbar navbar-dark">
            <div class="container">
                <button class="navbar-toggler hidden-lg-up" type="button" data-toggle="collapse"
                    data-target="#mainNavbarCollapse">&#9776;</button>
                <a class="navbar-brand" href="index.php"> <img class="img-rounded"
                        src="images/food-logo-59E5A73AFD-seeklogo.com.png" alt=""> </a>
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
									//if user is login	 myOrder.php
                                    echo  '<li class="nav-item"><a href="qrScan.php" class="nav-link active">Scan Qr</a> </li>';

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
        <div class="container m-t-30 mb-3 ">
            <div id="qr-reader" style="width:500px"></div>
            <div id="qr-reader-results"></div>
        </div>
    </div>






    <footer class="footer">
        <div class="container">
            <!-- top footer statrs -->
            <div class="row top-footer">
                <div class="col-xs-12 col-sm-3 footer-logo-block color-gray">
                    <a href="#"> <img src="images/food-logo-59E5A73AFD-seeklogo.com.png" alt="Footer logo"> </a>
                    <span>Choose it &amp;
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
                        <p>learn asdkf sdf asdf s sdf sdfLorem Ipsum is simply dummy text of the printing and
                            typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the
                            1500s, when an unknown printer took a galley of type and scrambled it to make a type
                            specimen book..</p>
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
    <script src="js/html5-qrcode.min.js"></script>
    <script src="js/tether.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/animsition.min.js"></script>
    <script src="js/bootstrap-slider.min.js"></script>
    <script src="js/jquery.isotope.min.js"></script>
    <script src="js/headroom.js"></script>
    <script src="js/foodpicky.min.js"></script>

    <script>
        function docReady(fn) {
            // see if DOM is already available
            if (document.readyState === "complete"
                || document.readyState === "interactive") {
                // call on next available tick
                setTimeout(fn, 1);
            } else {
                document.addEventListener("DOMContentLoaded", fn);
            }
        }

        docReady(function () {
            var resultContainer = document.getElementById('qr-reader-results');
            var lastResult, countResults = 0;
            function onScanSuccess(decodedText, decodedResult) {
                if (decodedText !== lastResult) {
                    ++countResults;
                    lastResult = decodedText;
                    // Handle on success condition with the decoded message.
                    // console.log(`Scan result ${decodedText}`);
                    // alert(decodedText);
                    // debugger;
                    let lst = decodedText.split("?");
                    // console.log(lst[0]);
                    // console.log(lst[1]);
                    let table = lst[1].split("=");
                    if (lst[0]==="ProcessQr.php" && table[0]==="table") {
                        location.href=decodedText;
                    }
                }
            }
            var html5QrcodeScanner = new Html5QrcodeScanner(
                "qr-reader", { fps: 10, qrbox: 250 });
            html5QrcodeScanner.render(onScanSuccess);
        });
    </script>
</body>

</html>