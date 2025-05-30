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
    <title>Sona | Početna</title>
    <link rel="icon" type="image/png" href="img/favicon.png">
    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css?family=Lora:400,700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Cabin:400,500,600,700&display=swap" rel="stylesheet">

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
        <div class="search-icon  search-switch">
            <i class="icon_search"></i>
        </div>
        <div class="header-configure-area">
            <div class="language-option">
                <img src="img/flag.jpg" alt="">
                <span>EN <i class="fa fa-angle-down"></i></span>
                <div class="flag-dropdown">
                    <ul>
                        <li><a href="#">Zi</a></li>
                        <li><a href="#">Fr</a></li>
                    </ul>
                </div>
            </div>
            <a href="#" class="bk-btn">Rezerviši sada</a>
        </div>
        <nav class="mainmenu mobile-menu">
            <ul>
                <li class="active"><a href="./index.php">Početna</a></li>
                <li><a href="./rooms.php">Apartmani</a></li>
                <li><a href="./about-us.php">O nama</a></li>
                <li><a href="#">Detalji</a>
                    <ul class="dropdown">
                        <li><a href="./room-details.php">Mali apartman</a></li>
                        <li><a href="#">Veliki apartman</a></li>
                        <li><a href="#">Deluxe apartman</a></li>
                        <li><a href="#">Porodicni apartman</a></li>
                    </ul>
                </li>
                <li><a href="./blog.php">Novosti</a></li>
                <li><a href="./contact.php">Kontakt</a></li>
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
            <li><i class="fa fa-phone"></i> (+387) 62 595 914</li>
            <li><i class="fa fa-envelope"></i> info.etsbiapartman@gmail.com</li>
        </ul>
    </div>
    <!-- Offcanvas Menu Section End -->

    <!-- Header Section Begin -->
    <header class="header-section">
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
                                <a target="_blank" href="https://www.facebook.com/SvarogWinterHouse"><i class="fa fa-facebook"></i></a>
                                <a target="_blank" href="https://x.com/SamueILFC/status/1925572687742607424"><i class="fa fa-twitter"></i></a>
                                <a target="_blank" href="https://www.tripadvisor.com/Tourism-g295389-Bihac_Una_Sana_Canton_Federation_of_Bosnia_and_Herzegovina-Vacations.php"><i class="fa fa-tripadvisor"></i></a>
                                <a target="_blank" href="https://www.instagram.com/svarogwinterhouseclub/"><i class="fa fa-instagram"></i></a>
                            </div>
                            <a href="rooms.php" class="bk-btn">Rezerviši sada</a>

                            <div class="language-option">
                                <img src="img/flag.jpg" alt="">
                                <span>EN <i class="fa fa-angle-down"></i></span>
                                <div class="flag-dropdown">
                                    <ul>
                                        <li><a href="#">BOS</a></li>
                                        <li><a href="#">ENG</a></li>
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
                                    <li class="active"><a href="./index.php">Početna</a></li>
                                    <li><a href="./rooms.php">Apartmani</a></li>
                                    <li><a href="./about-us.php">O nama</a></li>
                                    <li><a href="#">Detalji</a>
                                    <ul class="dropdown">
                                    <li><a href="./room-details.php">Mali apartman</a></li>
                                    <li><a href="./veliki-apartman.php">Veliki apartman</a></li>
                                    <li><a href="./deluxe-apartman.php">Deluxe apartman</a></li>
                                    <li><a href="./porodicni-apartman.php">Porodicni apartman</a></li>
                                    <li><a href="./blog-details.php">Detalji Bloga</a></li>
                                    
                                </ul>
                             </li>
                                    <li><a href="./blog.php">Novosti</a></li>
                                    <li><a href="./contact.php">Kontakt</a></li>
                                </ul>
                            </nav>
                            <div class="nav-right search-switch">
                                <i class="icon_search"></i>
                            </div>
                            <div class="nav-right">
                                <button onclick="window.location.href='../includes/login.php';" class="login-button">Login</button>
                           
                                <button onclick="window.location.href='../includes/signup.php';" class="signup-btn">SignUp</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <!-- Header End -->

    <!-- Hero Section Begin -->
 <section class="hero-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <div class="hero-text">
                    <h1>Sona Luksuzni Apartmani</h1>
                    <p>Najbolji i najpovoljniji apartmani za najbolje kupce. Smjestite se kod nas i osjećajte se kao kod kuće!</p>
                    <a href="rooms.php" class="primary-btn">Otkrij sada</a>
                </div>
            </div>
            
        </div>
    </div>
    <div class="hero-slider owl-carousel">
        <div class="hs-item set-bg" data-setbg="img/hero/hero-1.jpg"></div>
        <div class="hs-item set-bg" data-setbg="img/hero/hero-2.jpg"></div>
        <div class="hs-item set-bg" data-setbg="img/hero/hero-3.jpg"></div>
    </div>
</section>
    <!-- Hero Section End -->

    <!-- About Us Section Begin -->
    <section class="aboutus-section spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <?php
        if(isset($_SESSION['add'])){
          echo $_SESSION['add'];
          unset($_SESSION['add']);
        }
        if(isset($_SESSION['db_error'])){
          echo $_SESSION['db_error'];
          unset($_SESSION['db_error']);
        }
      ?>
                    <div class="about-text">
                        <div class="section-title">
                            <span>O nama</span>
                            <h2>Interkontinentalni Moderni <br />Sona Apartmani</h2>
                        </div>
                        <p class="f-para">Sona.com je vaš pouzdan partner za rezervaciju apartmana širom svijeta. Pružamo inspiraciju i jednostavan pristup smještaju putem 90 lokalizovanih stranica na 41 jeziku – svaki dan, za hiljade korisnika.</p>
                        <p class="s-para">Bilo da tražite studio apartman, luksuzni apartman, apartman s pogledom na more ili porodični apartman – na Sona.com ste u sigurnim rukama.</p>
                        <a href="./about-us.php" class="primary-btn about-btn">Saznaj više</a>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="about-pic">
                        <div class="row">
                            <div class="col-sm-6">
                                <img src="img/about/about-1.jpg" alt="">
                            </div>
                            <div class="col-sm-6">
                                <img src="img/about/about-2.jpg" alt="">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- About Us Section End -->

    <!-- Services Section End -->
    <section class="services-section spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title">
                        <span>Čime se bavimo</span>
                        <h2>Otkrijte naše usluge</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-4 col-sm-6">
                    <div class="service-item">
                        <i class="flaticon-026-bed"></i>
                        <h4>Širok izbor apartmana</h4>
                        <p>Pronađite idealan apartman među stotinama opcija za svaki stil, lokaciju, budžet i dužinu boravka.</p>
                    </div>
                </div>
                <div class="col-lg-4 col-sm-6">
                    <div class="service-item">
                        <i class="flaticon-020-telephone"></i>
                        <h4>Brza i sigurna rezervacija</h4>
                        <p>Rezervacija vašeg apartmana traje svega nekoliko minuta – brzo, jednostavno, sigurno i uz trenutnu potvrdu putem sistema.</p>
                    </div>
                </div>
                <div class="col-lg-4 col-sm-6">
                    <div class="service-item">
                        <i class="flaticon-044-clock-1"></i>
                        <h4>Podrška 24/7</h4>
                        <p>Naša korisnička podrška dostupna je svakim danom, u svako doba, za sve vaše upite, probleme i potrebe.</p>
                    </div>
                </div>
                <div class="col-lg-4 col-sm-6">
                    <div class="service-item">
                        <i class="flaticon-038-five-stars"></i>
                        <h4>Detaljni opisi i realne fotografije</h4>
                        <p>Svi apartmani imaju jasne opise, stvarne fotografije i recenzije koje vam pomažu da rezervišete s povjerenjem.</p>
                    </div>
                </div>
                <div class="col-lg-4 col-sm-6">
                    <div class="service-item">
                        <i class="flaticon-043-room-service"></i>
                        <h4>Fleksibilne opcije otkazivanja</h4>
                        <p>Uživajte u bezbrižnom planiranju putovanja zahvaljujući fleksibilnim uslovima otkazivanja kod većine naših apartmana.</p>
                    </div>
                </div>
                <div class="col-lg-4 col-sm-6">
                    <div class="service-item">
                        <i class="flaticon-012-cocktail"></i>
                        <h4>Posebne ponude i popusti</h4>
                        <p>Uštedite uz sezonske popuste, last minute ponude i posebne cijene za duže ili rane rezervacije smještaja.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Services Section End -->

    <!-- Home Room Section Begin -->
    <section class="hp-room-section">
        <div class="container-fluid">
            <div class="hp-room-items">
                <div class="row">
                    <div class="col-lg-3 col-md-6">
                        <div class="hp-room-item set-bg" data-setbg="img/room/room-b1.jpg">
                            <div class="hr-text">
                                <h3>Mali Apartman</h3>
                                <h2>69KM<span>/Noć</span></h2>
                                <table>
                                    <tbody>
                                        <tr>
                                            <td class="r-o">Velicina:</td>
                                            <td>30 m²</td>
                                        </tr>
                                        <tr>
                                            <td class="r-o">Kapacitet:</td>
                                            <td>Max 2 osobe</td>
                                        </tr>
                                        <tr>
                                            <td class="r-o">Kreveti:</td>
                                            <td>2 Kreveta</td>
                                        </tr>
                                        <tr>
                                            <td class="r-o">Servisi:</td>
                                            <td>Wifi, Televizija, WC,...</td>
                                        </tr>
                                    </tbody>
                                </table>
                                <a href="room-details.php" class="primary-btn">Vise Detalja</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="hp-room-item set-bg" data-setbg="img/room/room-b2.jpg">
                            <div class="hr-text">
                                <h3>Veliki Apartman</h3>
                                <h2>99KM<span>/Noć</span></h2>
                                <table>
                                    <tbody>
                                        <tr>
                                            <td class="r-o">Velicina:</td>
                                            <td>75 m²</td>
                                        </tr>
                                        <tr>
                                            <td class="r-o">Kapacitet:</td>
                                            <td>Max 4 osobe</td>
                                        </tr>
                                        <tr>
                                            <td class="r-o">Kreveti:</td>
                                            <td>3 Kreveta</td>
                                        </tr>
                                        <tr>
                                            <td class="r-o">Servisi:</td>
                                            <td>Wifi, Mini Bar, Televizija, WC,...</td>
                                        </tr>
                                    </tbody>
                                </table>
                                <a href="veliki-apartman.php" class="primary-btn">Više detalja</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="hp-room-item set-bg" data-setbg="img/room/room-b3.jpg">
                            <div class="hr-text">
                                <h3>Deluxe Apartman</h3>
                                <h2>199KM<span>/Noć</span></h2>
                                <table>
                                    <tbody>
                                        <tr>
                                            <td class="r-o">Velicina:</td>
                                            <td>150 m²</td>
                                        </tr>
                                        <tr>
                                            <td class="r-o">Kapacitet:</td>
                                            <td>Max 8 osoba</td>
                                        </tr>
                                        <tr>
                                            <td class="r-o">Kreveti:</td>
                                            <td>6 Deluxe Kreveta</td>
                                        </tr>
                                        <tr>
                                            <td class="r-o">Services:</td>
                                            <td>Wifi, Bazen, Jakuzi, Sauna, Mini Bar, Televizija,2 WC-a,...</td>
                                        </tr>
                                    </tbody>
                                </table>
                                <a href="deluxe-apartman.php" class="primary-btn">Vise detalja</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="hp-room-item set-bg" data-setbg="img/room/room-b4.jpg">
                            <div class="hr-text">
                                <h3>Porodični Apartman</h3>
                                <h2>135KM<span>/Noć</span></h2>
                                <table>
                                    <tbody>
                                        <tr>
                                            <td class="r-o">Velicina:</td>
                                            <td>100 m²</td>
                                        </tr>
                                        <tr>
                                            <td class="r-o">Kapacitet:</td>
                                            <td>Max 6 osoba</td>
                                        </tr>
                                        <tr>
                                            <td class="r-o">Kreveti:</td>
                                            <td>King Kreveti</td>
                                        </tr>
                                        <tr>
                                            <td class="r-o">Servisi:</td>
                                            <td>Wifi, Bazen, Mini Bar, Televizija, 2 WC-a,...</td>
                                        </tr>
                                    </tbody>
                                </table>
                                <a href="porodicni-apartman.php" class="primary-btn">Vise detalja</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Home Room Section End -->

    <!-- Testimonial Section Begin -->
    <section class="testimonial-section spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title">
                        <span>Recenzije</span>
                        <h2>Šta gosti kažu?</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-8 offset-lg-2">
                    <div class="testimonial-slider owl-carousel">
                        <div class="ts-item">
                            <p>"Nakon što je građevinski projekt potrajao duže nego što smo očekivali, moj suprug, moja kćerka i ja trebali smo mjesto za boravak na nekoliko noći. Kao stanovnici Bosanske Krupe, dobro poznajemo naš grad, komšiluk i vrste smještaja koje su dostupne, i apsolutno smo uživali u odmoru u hotelu Sona."</p>
                            <div class="ti-author">
                                <div class="rating">
                                    <i class="icon_star"></i>
                                    <i class="icon_star"></i>
                                    <i class="icon_star"></i>
                                    <i class="icon_star"></i>
                                    <i class="icon_star-half_alt"></i>
                                </div>
                                <h5> - Rahime Toromanović</h5>
                            </div>
                            <img src="img/testimonial-logo.png" alt="">
                        </div>
                        <div class="ts-item">
                            <p>"Boravak u apartmanima je bio savršen!
Sve je bilo čisto, moderno uređeno i na odličnoj lokaciji. Posebno smo uživali u večernjem roštiljanju koje domaćini organizuju za goste – sjajna atmosfera i ukusna hrana. Osoblje je ljubazno i uvijek na raspolaganju za pomoć ili preporuke. Definitivno se vraćamo!"</p>
                            <div class="ti-author">
                                <div class="rating">
                                    <i class="icon_star"></i>
                                    <i class="icon_star"></i>
                                    <i class="icon_star"></i>
                                    <i class="icon_star"></i>
                                    <i class="icon_star_half"></i>
                                </div>
                                <h5> - Ivana Matić</h5>
                            </div>
                            <img src="img/testimonial-logo.png" alt="">
                        </div>
                        <div class="ts-item">
                            <p>"Predivno iskustvo!
Apartmani su udobni, klimatizirani i odlično opremljeni. Djeca su se oduševila igralištem u blizini, a mi smo uživali u miru i tišini. Vlasnici su jako gostoljubivi i učinili su sve da nam boravak bude ugodan. Čista petica!"</p>
                            <div class="ti-author">
                                <div class="rating">
                                    <i class="icon_star"></i>
                                    <i class="icon_star"></i>
                                    <i class="icon_star"></i>
                                    <i class="icon_star"></i>
                                    <i class="icon_star-half_alt"></i>
                                </div>
                                <h5> - Tarik Hašimbegović</h5>
                            </div>
                            <img src="img/testimonial-logo.png" alt="">
                        </div>
                        <div class="ts-item">
                            <p>"Vrlo lijepo uređeno, ali najviše me oduševila energija i ljubaznost domaćina.
Bilo je mnogo smijeha i dobrog raspoloženja. U apartmanu smo imali sve što nam je trebalo, a preporuke za lokalne aktivnosti i izlete su bile pun pogodak."</p>
                            <div class="ti-author">
                                <div class="rating">
                                    <i class="icon_star"></i>
                                    <i class="icon_star"></i>
                                    <i class="icon_star"></i>
                                    <i class="icon_star"></i>
                                    <i class="icon_star-half_alt"></i>
                                </div>
                                <h5> - Amra Selimagić</h5>
                            </div>
                            <img src="img/testimonial-logo.png" alt="">
                        </div>
                        <div class="ts-item">
                            <p>"Apartmani su vrhunski – udobni kreveti, sve novo i čisto.
Najviše smo uživali u zajedničkom druženju s drugim gostima – bilo je organizovano i veselo, kao porodična atmosfera. Idealno mjesto za odmor i zabavu!"</p>
                            <div class="ti-author">
                                <div class="rating">
                                    <i class="icon_star"></i>
                                    <i class="icon_star"></i>
                                    <i class="icon_star"></i>
                                    <i class="icon_star"></i>
                                    <i class="icon_star-half_alt"></i>
                                </div>
                                <h5> - Kenan Čavkić</h5>
                            </div>
                            <img src="img/testimonial-logo.png" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Testimonial Section End -->

    <!-- Blog Section Begin -->
    <section class="blog-section spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title">
                        <span>Apartman novosti</span>
                        <h2>Our Blog & Event</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-4">
                    <div class="blog-item set-bg" data-setbg="img/blog/blog-1.jpg">
                        <div class="bi-text">
                            <span class="b-tag">Nezaboravna avantura</span>
                            <h4><a href="#">Surfovanje u Bužimu</a></h4>
                            <div class="b-time"><i class="icon_clock_alt"></i> 22. April, 2025</div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="blog-item set-bg" data-setbg="img/blog/blog-2.jpg">
                        <div class="bi-text">
                            <span class="b-tag">Kampovanje</span>
                            <h4><a href="#">Izaberite pravu destinaciju</a></h4>
                            <div class="b-time"><i class="icon_clock_alt"></i> 1. Januar, 2022</div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="blog-item set-bg" data-setbg="img/blog/blog-3.jpg">
                        <div class="bi-text">
                            <span class="b-tag">Istraživanje</span>
                            <h4><a href="#">Kanjon Pazarića</a></h4>
                            <div class="b-time"><i class="icon_clock_alt"></i> 5. Novembar, 2025</div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-8">
                    <div class="blog-item small-size set-bg" data-setbg="img/blog/blog-wide.jpg">
                        <div class="bi-text">
                            <span class="b-tag">Event</span>
                            <h4><a href="#">Uplovite u san</a></h4>
                            <div class="b-time"><i class="icon_clock_alt"></i> 12. Maj, 2023</div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="blog-item small-size set-bg" data-setbg="img/blog/blog-10.jpg">
                        <div class="bi-text">
                            <span class="b-tag">Uživancija</span>
                            <h4><a href="#">Putovanje do Barselone</a></h4>
                            <div class="b-time"><i class="icon_clock_alt"></i> 7. Jun, 2024</div>
                        </div>
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
                            <h6>Najnovije od nas</h6>
                            <p>Budite obavješteni o najnovijim ponudama i obavještenjima</p>
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
                        <div class="co-text"><p><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
  Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="fa fa-heart" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
  <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></p></div>
                    </div>
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