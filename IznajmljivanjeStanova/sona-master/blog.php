<?php
session_start();
include '../includes/dbh.inc.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require 'phpmailer/src/Exception.php';
require 'phpmailer/src/PHPMailer.php';
require 'phpmailer/src/SMTP.php';

$mail = new PHPMailer(true);
if ($_SERVER["REQUEST_METHOD"] == "POST" && !empty($_POST['poruka'])) {
  $mail = new PHPMailer(true);
try {

    $mail->isSMTP();
    $mail->Host       = 'smtp.gmail.com';
    $mail->SMTPAuth   = true;
    $mail->Username   = 'ajdin.kozlica@gmail.com';
    $mail->Password   = 'pclbbuqjenqgvrri'; // Koristi App Password ako koristiš 2FA
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
    $mail->Port       = 465;

    $mail->setFrom('ajdin.kozlica@gmail.com', 'Mailer');
    $mail->addAddress('ajdin.kozlica@gmail.com', 'Receiver Name');


    $mail->isHTML(true);
    $mail->Subject="Ovo je mail za projektni zadatak";
    $mail->Body=$_POST['poruka'];


    $mail->send();
    echo 'Poruka uspješno poslana';
} catch (Exception $e) {
    echo "Poruka nije uspješno poslana pokušajte ponovo {$mail->ErrorInfo}";
}}




?>
<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="Sona Template">
    <meta name="keywords" content="Sona, unica, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Sona | O Nama</title>

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css?family=Lora:400,700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Cabin:400,500,600,700&display=swap" rel="stylesheet">
    <link rel="icon" type="image/png" href="img/favicon.png">

    <!-- Css Styles -->
    <link rel="stylesheet" href="css/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="css/font-awesome.min.css" type="text/css">
    <link rel="stylesheet" href="css/elegant-icons.css" type="text/css">
    <link rel="stylesheet" href="css/flaticon.css" type="text/css">
    <link rel="stylesheet" href="css/owl.carousel.min.css" type="text/css">
    <link rel="stylesheet" href="css/nice-select.css" type="text/css">
    <link rel="stylesheet" href="css/jquery-ui.min.css" type="text/css">
    <link rel="stylesheet" href="css/magnific-popup.css" type="text/css">
    <link rel="stylesheet" href="css/slicknav.min.css" type="text/css">
    <link rel="stylesheet" href="css/style.css" type="text/css">
</head>

<body>
    <!-- Page Preloder -->
    <div id="preloder">
        <div class="loader"></div>
    </div>

    <!-- Offcanvas Menu Section Begin -->
    <div class="offcanvas-menu-overlay"></div>
    <div class="canvas-open">
        <i class="icon_menu"></i>
    </div>
    <div class="offcanvas-menu-wrapper">
        <div class="canvas-close">
            <i class="icon_close"></i>
        </div>
        <div class="search-icon search-switch">
            <i class="icon_search"></i>
        </div>
        <div class="header-configure-area">
            <div class="language-option">
                <img src="img/flag.jpg" alt="">
                <span>EN <i class="fa fa-angle-down"></i></span>
                <div class="flag-dropdown">
                    <ul>
                        <li><a href="#">BOS</a></li>
                        <li><a href="#">GER</a></li>
                    </ul>
                </div>
            </div>
            <a href="#" class="bk-btn">Rezerviši sada</a>
        </div>
        <nav class="mainmenu mobile-menu">
            <ul>
                <li ><a href="./index.php">Početna</a></li>
                <li><a href="./rooms.php">Apartmani</a></li>
                <li><a href="./about-us.php">O nama</a></li>
                <li><a href="./pages.php">Detalji</a>
                    <ul class="dropdown">
                        <li><a href="./room-details.php">Detalji apartmana</a></li>
                        <li><a href="./deluxe-apartman.php">Deluxe apartmani</a></li>
                        <li><a href="./porodicni-apartman.php">Obiteljski apartmani</a></li>
                      
                    </ul>
                </li>
                <li class="active"><a href="./blog.php">Novosti</a></li>
                <li><a href="./contact.php">Kontakt</a></li>
            </ul>
                </li>
            
            </ul>
        </nav>
        <div id="mobile-menu-wrap"></div>
        <div class="top-social">
            <a href="#"><i class="fa fa-facebook"></i></a>
            <a href="#"><i class="fa fa-twitter"></i></a>
            <a href="#"><i class="fa fa-tripadvisor"></i></a>
            <a href="#"><i class="fa fa-instagram"></i></a>
        </div>
        <ul class="top-widget">
            <li><i class="fa fa-phone"></i>  (+387) 62 595 914</li>
            <li><i class="fa fa-envelope"></i> info.etsbiapartman@gmail.com</li>
        </ul>
    </div>
    <!-- Offcanvas Menu Section End -->

    <!-- Header Section Begin -->
    <header class="header-section header-normal">
        <div class="top-nav">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6">
                        <ul class="tn-left">
                            <li><i class="fa fa-phone"></i> (+387) 62 595 914</li>
                            <li><i class="fa fa-envelope"></i> info.etsbiapartman@gmail.com</li>
                        </ul>
                    </div>
                    <div class="col-lg-6">
                        <div class="tn-right">
                            <div class="top-social">
                                <a href="#"><i class="fa fa-facebook"></i></a>
                                <a href="#"><i class="fa fa-twitter"></i></a>
                                <a href="#"><i class="fa fa-tripadvisor"></i></a>
                                <a href="#"><i class="fa fa-instagram"></i></a>
                            </div>
                            <a href="#" class="bk-btn">Rezerviši sada</a>
                            <div class="language-option">
                                <img src="img/flag.jpg" alt="">
                                <span>EN <i class="fa fa-angle-down"></i></span>
                                <div class="flag-dropdown">
                                    <ul>
                                        <li><a href="#">BOS</a></li>
                                        <li><a href="#">GER</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="menu-item">
            <div class="container">
                <div class="row">
                    <div class="col-lg-2">
                        <div class="logo">
                            <a href="./index.php">
                                <img src="img/logo.png" alt="">
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-10">
                        <div class="nav-menu">
                            <nav class="mainmenu">
                                <ul>
                                    <li><a href="./index.php">Početna</a></li>
                                    <li><a href="./rooms.php">Apartmani</a></li>
                                    <li><a href="./about-us.php">O nama</a></li>
                                    <li><a href="#">Detalji</a>
                                    <ul class="dropdown">
                                    <li><a href="./room-details.php">Mali apartman</a></li>
                                    <li><a href="./veliki-apartman.php">Veliki apartman</a></li>
                                    <li><a href="./deluxe-apartman.php">Deluxe apartman</a></li>
                                    <li><a href="./porodicni-apartman.php">Porodični apartman</a></li>
                                    <li><a href="./blog-details.php">Detalji Bloga</a></li>
                                    
                                </ul>
                             </li>
                                    <li class="active"><a href="./blog.php">Novosti</a></li>
                                    <li><a href="./contact.php">Kontakt</a></li>
                                </ul>
                            </nav>
                            <div class="nav-right search-switch">
                                <i class="icon_search"></i>
                            </div>
                            <div class="nav-right">
                                <button onclick="window.location.href='login.html';" class="login-button">Login</button>
                           
                                <button onclick="window.location.href='singup.html';" class="signup-btn">SignUp</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <!-- Header End -->

    <!-- Breadcrumb Section Begin -->
    <div class="breadcrumb-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb-text">
                        <h2>Blog</h2>
                        <div class="bt-option">
                            <a href="./home.html">Home</a>
                            <span>Blog Grid</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcrumb Section End -->

    <!-- Blog Section Begin -->
    <section class="blog-section blog-page spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-6">
                    <div class="blog-item set-bg" data-setbg="img/blog/blog-1.jpg">
                        <div class="bi-text">
                            <span class="b-tag">Nezaboravna Avanturu</span>
                            <h4><a href="./blog-details.html">Surfovanje u Bužimu</a></h4>
                            <div class="b-time"><i class="icon_clock_alt"></i> 22. April, 2025</div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="blog-item set-bg" data-setbg="img/blog/blog-2.jpg">
                        <div class="bi-text">
                            <span class="b-tag">Kampovanje</span>
                            <h4><a href="./blog-details.html">Izaberite pravu destinaciju</a></h4>
                            <div class="b-time"><i class="icon_clock_alt"></i> 1. Januar, 2024</div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="blog-item set-bg" data-setbg="img/blog/blog-3.jpg">
                        <div class="bi-text">
                            <span class="b-tag">Istraživanje</span>
                            <h4><a href="./blog-details.html">Kanjon Pazarića</a></h4>
                            <div class="b-time"><i class="icon_clock_alt"></i> 5. Novembar, 2025</div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="blog-item set-bg" data-setbg="img/blog/blog-4.jpg">
                        <div class="bi-text">
                            <span class="b-tag">Srbljani</span>
                            <h4><a href="./blog-details.html">Putujte kroz vrijeme</a></h4>
                            <div class="b-time"><i class="icon_clock_alt"></i> 14. Maj, 2024</div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="blog-item set-bg" data-setbg="img/blog/blog-5.jpg">
                        <div class="bi-text">
                            <span class="b-tag">Let</span>
                            <h4><a href="./blog-details.html">Pogled na život</a></h4>
                            <div class="b-time"><i class="icon_clock_alt"></i> 21. Februar, 2023</div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="blog-item set-bg" data-setbg="img/blog/blog-6.jpg">
                        <div class="bi-text">
                            <span class="b-tag">Odmor</span>
                            <h4><a href="./blog-details.html">Odmor za dušu</a></h4>
                            <div class="b-time"><i class="icon_clock_alt"></i> 28. April, 2023</div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="blog-item set-bg" data-setbg="img/blog/blog-7.jpg">
                        <div class="bi-text">
                            <span class="b-tag">Pogled</span>
                            <h4><a href="./blog-details.html">Kanjon Todorova</a></h4>
                            <div class="b-time"><i class="icon_clock_alt"></i> 31. Mart, 2022</div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="blog-item set-bg" data-setbg="img/blog/blog-8.jpg">
                        <div class="bi-text">
                            <span class="b-tag">Duša</span>
                            <h4><a href="./blog-details.html">Java ili san</a></h4>
                            <div class="b-time"><i class="icon_clock_alt"></i> 30. April, 2020</div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="blog-item set-bg" data-setbg="img/blog/blog-9.jpg">
                        <div class="bi-text">
                            <span class="b-tag">Civilizacija</span>
                            <h4><a href="./blog-details.html">Izgubljeni u miru</a></h4>
                            <div class="b-time"><i class="icon_clock_alt"></i> 30. August, 2021</div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="load-more">
                        <a href="#" class="primary-btn">Load More</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Blog Section End -->

    
     <!-- Footer Section Begin -->
    <footer class="footer-section">
        <div class="container">
            <div class="footer-text">
                <div class="row">
                    <div class="col-lg-4">
                        <div class="ft-about">
                            <div class="logo">
                                <a href="#">
                                    <img src="img/footer-logo.png" alt="">
                                </a>
                            </div>
                            <p>Mi inspirišemo i ugošćavamo milione turista<br /> preko 100 lokalnih web stranica</p>
                            <div class="fa-social">
                                <a href="#"><i class="fa fa-facebook"></i></a>
                                <a href="#"><i class="fa fa-twitter"></i></a>
                                <a href="#"><i class="fa fa-tripadvisor"></i></a>
                                <a href="#"><i class="fa fa-instagram"></i></a>
                                <a href="#"><i class="fa fa-youtube-play"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 offset-lg-1">
                        <div class="ft-contact">
                            <h6>Kontaktirajte nas</h6>
                            <ul>
                                <li>(+387) 62 123 321</li>
                                <li>boskrupa.apartmani@gmail.com</li>
                                <li>Ulica Samela Bešića bb, Zrće, Bosna i Hercegovina</li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-3 offset-lg-1">
                        <div class="ft-newslatter">
                            <h6>Imate pitanje? </h6>
                            <p>Kontaktirajte nas preko maila tu smo da pomognemo!</p>
                            <form action="#" method="POST" class="fn-form">
                                <input type="text" id="subject" name="poruka" class="form-control" placeholder="Email" required>
                                <button type="submit"><i class="fa fa-send"></i></button>
                            </form>
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="copyright-option">
            <div class="container">
                <div class="row">
                    <div class="col-lg-7">
                        <ul>
                            <li><a href="#">Kontakt</a></li>
                            <li><a href="#">Pravila</a></li>
                            <li><a href="#">Privatnost</a></li>
                            <li><a href="#">Zakoni okoliša</a></li>
                        </ul>
                    </div>
                    <div class="col-lg-5">
                      
                </div>
            </div>
        </div>
    </footer>
    <!-- Footer Section End -->

    <!-- Search model Begin -->
    <div class="search-model">
        <div class="h-100 d-flex align-items-center justify-content-center">
            <div class="search-close-switch"><i class="icon_close"></i></div>
            <form class="search-model-form">
                <input type="text" id="search-input" placeholder="Search here.....">
            </form>
        </div>
    </div>
    <!-- Search model end -->

    <!-- Js Plugins -->
    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.magnific-popup.min.js"></script>
    <script src="js/jquery.nice-select.min.js"></script>
    <script src="js/jquery-ui.min.js"></script>
    <script src="js/jquery.slicknav.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/main.js"></script>
</body>

</html>