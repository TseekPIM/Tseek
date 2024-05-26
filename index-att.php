<?php
include('protect.php');
include('class/Classes.php');
// Helper::logado();
$objCandidato = new Candidato();
$objVaga = new Vaga();
//  echo $_SESSION['id_candidato'];
$candidato = $_SESSION['id_candidato'];
?>

<!doctype html>
<html class="no-js" lang="pt-br">

<head>
    <title>TSeeK - E-Sports</title>
    <meta name="author" content="TSeeK">
    <meta name="description" content="TSeeK - eSports">
    <meta name="keywords" content="TSeeK - eSports " />

    <!-- Mobile Specific Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!--==============================
	   Google Web Fonts
	============================== -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link
        href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500;700&family=Montserrat:wght@700&family=Roboto:wght@400;700&display=swap"
        rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900" rel="stylesheet">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="sidebar/css/style.css">

    <!-- logo aba  -->
    <link rel="apple-touch-icon" sizes="57x57" href="assets/img/logo1.png">
    <link rel="apple-touch-icon" sizes="60x60" href="assets/img/logo1.png">
    <link rel="apple-touch-icon" sizes="72x72" href="assets/img/logo1.png">
    <link rel="apple-touch-icon" sizes="76x76" href="assets/img/logo1.png">
    <link rel="apple-touch-icon" sizes="114x114" href="assets/img/logo1.png">
    <link rel="apple-touch-icon" sizes="120x120" href="assets/img/logo1.png">
    <link rel="apple-touch-icon" sizes="144x144" href="assets/img/logo1.png">
    <link rel="apple-touch-icon" sizes="152x152" href="assets/img/logo1.png">
    <link rel="apple-touch-icon" sizes="180x180" href="assets/img/logo1.png">
    <link rel="icon" type="image/png" sizes="192x192" href="assets/img/logo1.png">
    <link rel="icon" type="image/png" sizes="32x32" href="assets/img/logo1.png">
    <link rel="icon" type="image/png" sizes="96x96" href="assets/img/logo1.png">
    <link rel="icon" type="image/png" sizes="16x16" href="assets/img/logo1.png">
    <link rel="manifest" href="assets/img/favicons/manifest.json">




    <!--==============================
	    All CSS File
	============================== -->
    <!-- Bootstrap -->
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <!-- Fontawesome Icon -->
    <link rel="stylesheet" href="assets/css/fontawesome.min.css">
    <!-- Layer Slider -->
    <link rel="stylesheet" href="assets/css/layerslider.min.css">
    <!-- Magnific Popup -->
    <link rel="stylesheet" href="assets/css/magnific-popup.min.css">
    <!-- Slick Slider -->
    <link rel="stylesheet" href="assets/css/slick.min.css">
    <!-- Theme Custom CSS -->
    <link rel="stylesheet" href="assets/css/style.css">
    <!-- Theme Color CSS -->
    <link rel="stylesheet" href="assets/css/theme-color1.css">

    <link href="assets/css/styles.css" rel="stylesheet" />


</head>

<body>

    <!--********************************
   		Código começa aqui!
	******************************** -->


    <!--==============================
     Pre-carregamento
  ==============================-->
    <div class="preloader ">
        <!-- <button class="vs-btn preloaderCls">Cancel Preloader </button> -->
        <div class="preloader-inner">
            <div class="loader-logo">
                <!-- <img src="assets/img/logoo.png" alt="Loader Image"> -->
            </div>
            <div class="loader-wrap pt-4">
                <span class="loader"></span>
            </div>
        </div>
    </div>
    <!--========================
    Icons ao lado superior direito
========================-->
    <div class="sticky-header-wrap sticky-header bg-light-dark py-1 py-sm-2 py-lg-1">
        <div class="container position-relative">
            <div class="row align-items-center">
                <div class="col-5 col-md-3">
                    <div class="logo">
                        <a href="index.php"><img src="assets/img/logo-2.png" alt="TSeeK"></a>
                    </div>
                </div>
                <div class="col-7 col-md-9 text-end position-static">
                    <nav class="main-menu menu-sticky1 d-none d-lg-block link-inherit">
                        <ul>
                            <li class="menu-item-has-children">
                                <a href="vagas.php">Vagas</a>
                                <ul class="sub-menu">
                                    <li><a href="#">Ação</a></li>
                                    <li><a href="#">Aventura</a></li>
                                    <li><a href="#">Battle Royale</a></li>
                                    <li><a href="#">Esportes</a></li>
                                    <li><a href="#">Estratégias</a></li>
                                    <li><a href="#">FPS</a></li>
                                    <li><a href="#">Luta</a></li>
                                    <li><a href="#">MOBA</a></li>
                                    <li><a href="#">RPG</a></li>
                                    <li><a href="#">Tiro</a></li>
                                </ul>
                            </li>
                            <li class="mega-menu-wrap menu-item-has-children">
                                <a href="player.php">Jogadores</a>
                                <!-- <ul class="mega-menu">
                                    <li><a href="#">RANK</a>
                                        <ul>
                                            <li><a href="#"></a>
                                            <li><a href="#"></a>
                                            <li><a href="#"></a>
                                            <li><a href="#"></a>
                                            <li><a href="#"></a>
                                            <li><a href="#"></a>
                                            <li><a href="#"></a>
                                            <li><a href="#"></a>
                                        </ul>
                                    </li>
                                    <li><a href="#">Modalidade</a>
                                        <ul>
                                            <li><a href="#"></a>
                                            <li><a href="#"></a>
                                            <li><a href="#"></a>
                                            <li><a href="#"></a>
                                        </ul>
                                    </li>
                                    <li><a href="#">..</a>
                                        <ul>
                                            <li><a href="#"></a>
                                            <li><a href="#"></a>
                                            <li><a href="#"></a>
                                            <li><a href="#"></a>
                                        </ul>
                                    </li>
                                    <li><a href="#">..</a>
                                        <ul>
                                            <li><a href="#"></a>
                                            <li><a href="#"></a>
                                            <li><a href="#"></a>
                                            <li><a href="#"></a>
                                        </ul>
                                    </li>
                                </ul> -->
                            </li>
                            <li class="mega-menu-wrap menu-item-has-children">
                                <a href="team.php">Times</a>
                                <!-- <ul class="mega-menu">
                                    <li><a href="#">RANK</a>
                                        <ul>
                                            <li><a href="#"></a>
                                            <li><a href="#"></a>
                                            <li><a href="#"></a>
                                            <li><a href="#"></a>
                                            <li><a href="#"></a>
                                            <li><a href="#"></a>
                                            <li><a href="#"></a>
                                            <li><a href="#"></a>
                                        </ul>
                                    </li>
                                    <li><a href="#">Modalidade</a>
                                        <ul>
                                            <li><a href="#"></a>
                                            <li><a href="#"></a>
                                            <li><a href="#"></a>
                                            <li><a href="#"></a>
                                        </ul>
                                    </li>
                                    <li><a href="#">..</a>
                                        <ul>
                                            <li><a href="#"></a>
                                            <li><a href="#"></a>
                                            <li><a href="#"></a>
                                            <li><a href="#"></a>
                                        </ul>
                                    </li>
                                    <li><a href="#">Pagelist 4</a>
                                        <ul>
                                            <li><a href="#"></a>
                                            <li><a href="#"></a>
                                            <li><a href="#"></a>
                                            <li><a href="#"></a>
                                        </ul>
                                    </li>
                                </ul> -->
                            </li>
                            <li class="menu-item-has-children">
                                <a href="#">Planos</a>
                            </li>
                        </ul>
                        <button class="vs-menu-toggle text-theme border-theme d-inline-block d-lg-none"><i
                                class="far fa-bars"></i></button>
                </div>
            </div>
        </div>
    </div>
    <!--==============================
    Sidemenu
============================== -->
    <div class="sidemenu-wrapper d-none d-lg-block  ">
        <div class="sidemenu-content bg-light-dark">
            <button class="closeButton border-theme text-theme bg-theme-hover sideMenuCls"><i
                    class="far fa-times"></i></button>

            <nav id="sidebar">
                <div class="img bg-wrap text-center py-4" style="background-color: transparent;">
                <div class="user-logo">
                        <div class="img"><?php echo Helper::fotoDoCandidato($candidato);?></div><br><br>
                        <h3><?php echo Helper::nomeDoCandidato($candidato); ?></h3>
                    </div> 
                    </div>                  
                <ul class="list-unstyled components mb-5">
                    <li class="active">
                        <a href="#"><span class="fa fa-home mr-3"></span> Inicio</a>
                    </li>
                    <li class="active">
                        <a href="player-details1.php?id=<?php echo $_SESSION['id']; ?>"><span class="fa fa-user mr-3"></span> Perfil</a>
                    </li>
                    <li>
                        <a href="#"><span class="fa fa-trophy mr-3"></span> Melhores Jogadas</a>
                    </li>
                    <li>
                        <a href="#"><span class="fa fa-cog mr-3"></span> Configurações</a>
                    </li>
                    <li>
                        <a href="logout.php"><span class="fa fa-sign-out mr-3"></span> Desconectar</a>
                    </li>
                </ul>
<!-- <?php //} ?> -->
            </nav>
        </div>
    </div>
    </div>
    <!--==============================
    Busca
    ============================== -->
    <div class="popup-search-box d-none d-lg-block  ">
        <button class="searchClose border-theme text-theme"><i class="fal fa-times"></i></button>
        <form action="#">
            <input type="text" class="border-theme" placeholder="O que vocÊ procura?">
            <button type="submit"><i class="fal fa-search"></i></button>
        </form>
    </div>
    <!--==============================
    Mobile Menu
  ============================== -->
    <div class="vs-menu-wrapper">
        <div class="vs-menu-area bg-dark">
            <button class="vs-menu-toggle"><i class="fal fa-times"></i></button>
            <div class="mobile-logo">
                <a href="index.html"><img src="assets/img/logo1.png" alt="TSeeK"></a>
            </div>
            <div class="vs-mobile-menu link-inherit"></div><!-- Menu Will Append With Javascript -->
        </div>
    </div>
    <!--==============================
      (menu principal)
    ==============================-->
    <header class="header-wrapper header-layout1 position-absolute top-0 start-0 w-100 z-index-step1">
        <div class="header-top">
            <div class="container">
                <div class="row py-md-2">
                    <div class="col-sm-6 d-none d-md-block">
                    </div>
                    <div class="col-sm-6 text-end d-none d-md-block">
                        <ul class="social-links fs-xs text-white">
                            <li><a href="https://web.facebook.com/?locale=pt_BR&_rdc=1&_rdr"><i class="fab fa-facebook-f"></i></a></li>
                            <li><a href="https://twitter.com/i/flow/login?input_flow_data=%7B%22requested_variant%22%3A%22eyJsYW5nIjoicHQifQ%3D%3D%22%7D"><i class="fab fa-twitter"></i></a></li>
                            <li><a href="https://www.twitch.tv/directory"><i class="fab fa-twitch"></i></a></li>
                            <li><a href="https://br.linkedin.com/"><i class="fab fa-linkedin-in"></i></a></li>
                            <li><a href="https://www.youtube.com/"><i class="fab fa-youtube"></i></a></li>
                        </ul>
                        </ul>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="header-main">
            <div class="container position-relative">
                <div class="bg-dark px-50">
                    <div class="row align-items-center">
                        <div class="col-6 col-lg-4 d-block d-xl-none py-3 py-xl-0">
                            <div class="header-logo">
                                <a href="index-att.php"><img src="assets/img/logo1.png" alt="TSeeK"></a>
                            </div>
                        </div>
                        <div class="col-6 col-lg-8 col-xl-5 text-end text-xl-start">
                            <nav class="main-menu menu-style1 mobile-menu-active" data-expand="992">
                                <ul>
                                    <li class="">
                                        <a href="vagas.php">Vagas</a>
                                        <!-- <ul class="sub-menu">
                                            <li><a href="#">Ação</a></li>
                                            <li><a href="#">Aventura</a></li>
                                            <li><a href="#">Battle Royale</a></li>
                                            <li><a href="#">Esportes</a></li>
                                            <li><a href="#">Estratégias</a></li>
                                            <li><a href="#">FPS</a></li>
                                            <li><a href="#">Luta</a></li>
                                            <li><a href="#">MOBA</a></li>
                                            <li><a href="#">RPG</a></li>
                                            <li><a href="#">Tiro</a></li>
                                        </ul> -->
                                    </li>
                                    <li class="">
                                        <a href="player.php">Jogadores</a>
                                        <!-- <ul class="mega-menu">
                                            <li><a href="player.html">RANK</a>
                                                <ul>
                                                    <li><a href="#"></a>
                                                    <li><a href="#"></a>
                                                    <li><a href="#"></a>
                                                    <li><a href="#"></a>
                                                    <li><a href="#"></a>
                                                    <li><a href="#"></a>
                                                    <li><a href="#"></a>
                                                    <li><a href="#"></a>
                                                </ul>
                                            </li>
                                            <li><a href="#">Modalidade</a>
                                                <ul>
                                                    <li><a href="#"></a>
                                                    <li><a href="#"></a>
                                                    <li><a href="#"></a>
                                                    <li><a href="#"></a>
                                                </ul>
                                            </li>
                                            <li><a href="#">..</a>
                                                <ul>
                                                    <li><a href="#"></a>
                                                    <li><a href="#"></a>
                                                    <li><a href="#"></a>
                                                    <li><a href="#"></a>
                                                </ul>
                                            </li>
                                            <li><a href="#">..</a>
                                                <ul>
                                                    <li><a href="#"></a>
                                                    <li><a href="#"></a>
                                                    <li><a href="#"></a>
                                                    <li><a href="#"></a>
                                                </ul>
                                            </li>
                                        </ul> -->
                                    </li>
                                    <li class="">
                                        <a href="team.php">Times</a>
                                        <!-- <ul class="mega-menu">
                                            <li><a href="player.html">RANK</a>
                                                <ul>
                                                    <li><a href="#"></a>
                                                    <li><a href="#"></a>
                                                    <li><a href="#"></a>
                                                    <li><a href="#"></a>
                                                    <li><a href="#"></a>
                                                    <li><a href="#"></a>
                                                    <li><a href="#"></a>
                                                    <li><a href="#"></a>
                                                </ul>
                                            </li>
                                            <li><a href="#">Modalidade</a>
                                                <ul>
                                                    <li><a href="#"></a>
                                                    <li><a href="#"></a>
                                                    <li><a href="#"></a>
                                                    <li><a href="#"></a>
                                                </ul>
                                            </li>
                                            <li><a href="#">..</a>
                                                <ul>
                                                    <li><a href="#"></a>
                                                    <li><a href="#"></a>
                                                    <li><a href="#"></a>
                                                    <li><a href="#"></a>
                                                </ul>
                                            </li>
                                            <li><a href="#">..</a>
                                                <ul>
                                                    <li><a href="#"></a>
                                                    <li><a href="#"></a>
                                                    <li><a href="#"></a>
                                                    <li><a href="#"></a>
                                                </ul>
                                            </li>
                                        </ul> -->
                                    </li>
                                    <li class="">
                                        <a href="planos.php">Planos</a>
                                    </li>
                                </ul>
                        </div>
                        <div class="col-md-4 col-lg-2 text-center d-none d-xl-block">
                            <div class="header-logo1">
                                <a href="index-att.php"><img src="assets/img/logo1.png" alt="TSeeK"></a>
                            </div>
                        </div>
                        <div class="col-md-4 col-lg-5 d-none d-xl-block">
                            <div class="header-right d-flex align-items-center justify-content-end">
                                <a href="https://www.twitch.tv/directory" class="vs-btn outline1 d-none d-xl-inline-block"><i
                                        class="fab fa-twitch"></i><strong>Live Streaming</strong></a>
                                <ul class="header-list1 list-style-none ml-30">
                                    <li>
                                        <button class="dropdown-toggle" type="button" title="Login">
                                            <!-- <a href="login2.html"><img src="assets/img/flag/flag-1.png"
                                                    alt="Country Flag" class="flag radius-circle"> </a> -->
                                                    
                                        </button>
                                    </li>
                                    <li>
                                        <button class="searchBoxTggler"><i class="far fa-search"></i></button>
                                    </li>
                                    <li>
                                        <button class="sideMenuToggler"><i
                                                class="fal fa-grip-horizontal fs-2"></i></button>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <!--==============================
    Hero Area
    ==============================-->
    <section class="vs-hero-wrapper  ">
        <div class="vs-hero-carousel" data-height="900" data-container="1170" data-slidertype="fullwidth">
            <a href="#" class="ls-arrow text-white d-none d-xl-inline-block" data-ls-go="next">Próx<i
                    class="fal fa-arrow-right"></i></a>
            <a href="#" class="ls-arrow text-white d-none d-xl-inline-block" data-ls-go="prev"><i
                    class="fal fa-arrow-left"></i>Ant</a>
            <div class="ls-slide" data-ls="duration: 8000; transition2d: 5;">
                <img src="assets/img/hero/mobile.jpg" alt="Hero Bg Image" class="ls-bg">
                <p class="ls-l mb-2 mb-md-0 ls-hide-phone"
                    style="left: 0; top: 350px; width: 318px; min-width: 200px; min-height: 20px; height: 30px; line-height: 1; padding: 5px 40px; background-image: -webkit-linear-gradient(0deg, #0047ab 0%, #409de9 100%); "
                    data-ls="offsetxin: -100; durationin: 1000; delayin: 0; easingin:easeOutQuint;  transitionout: true; offsetxout: 600; durationout: 3000; fadeout: true; skewxout: 10;">
                </p>
                <p class="ls-l ls-hide-phone"
                    style="left: 40px; top: 363px; text-transform: uppercase; color: #ffffff; font-weight: 700; font-size: 16px; line-height: 1; letter-spacing: 0.2em;"
                    data-ls="minfontsize: 10px; offsetxin: -100; durationin: 1000; delayin: 0; easingin:easeOutQuint;  texttransitionin: true; texttypein: chars_asc; textstartatin: transitioninstart; textdurationin: 100; textfadein: true; textoffsetxin: -20; textshiftin: 20;  transitionout: true; offsetxout: 600; durationout: 3000; fadeout: true; skewxout: 10;">
                    Encontre seu time!</p>
                <h2 class="ls-l ls-responsive"
                    data-ls-mobile="left: 50%; top: 300px; text-align: center; font-size: 110px;"
                    style="left: -2px; top: 400px; text-transform: uppercase; color: #ffffff; font-weight: 700; font-size: 72px; letter-spacing: -0.03em;"
                    data-ls="durationin: 1000; delayin: 0; easingin:easeOutQuint; texttransitionin: true; textfadein: true; texttypein: words_asc; textstartatin: transitioninstart; textshiftin: 300; textoffsetyin: 50; transitionout: true; offsetxout: 500; durationout: 3000; fadeout: true; skewxout: 10;">
                    Mobile</h2>
                <h2 class="ls-l ls-responsive"
                    data-ls-mobile="left: 50%; top: 450px; text-align: center; font-size: 110px;"
                    style="left: -2px; top: 480px; text-transform: uppercase; color: #ffffff; font-weight: 700; font-size: 72px; letter-spacing: -0.03em;"
                    data-ls="durationin: 1000; delayin: 0; easingin:easeOutQuint; texttransitionin: true; textfadein: true; texttypein: words_asc; textstartatin: transitioninstart; textshiftin: 300; textoffsetyin: 50; transitionout: true; offsetxout: 400; durationout: 3000; fadeout: true; skewxout: 10;">
                    Legends</h2>
                <p class="ls-l ls-hide-phone"
                    style="left: 0; top: 575px; color: #fff; font-size: 18px; width: 335px; min-width: 90px; white-space: normal; line-height: 1; padding: 5px 30px; background-image: -webkit-linear-gradient(0deg, #0047ab 0%, #409de9 100%);"
                    data-ls="minfontsize: 16px; durationin: 1000; delayin: 0; easingin:easeOutQuint; offsetyin: 50; transitionout: true; offsetxout: 300; durationout: 3000; fadeout: true; skewxout: 10;">
                    As melhores equipes esperam por você!</p>
                <div class="ls-l ls-center-xs ls-responsive"
                    data-ls-mobile="left: 50%; top: 660px; width: 100px; height: 100px;" style="left: 0; top: 635px;"
                    data-ls="durationin: 1000; delayin: 0; easingin:easeOutQuint; offsetyin: 50; transitionout: true; offsetxout: 300; durationout: 3000; fadeout: true; skewxout: 10;">
                    <div class="ls-btn-group">
                        <a href="team.php" class="vs-btn gradient-btn">Equipes</a>
                        <!-- <a href="shop.html" class="vs-btn black-skew"><i class="fal fa-shopping-cart"></i>Merch shop</a> -->
                    </div>
                </div>
            </div>
            <div class="ls-slide" data-ls="duration: 8000; transition2d: 5;">
                <img src="assets/img/hero/hero-img-2.jpg" alt="Hero Bg Image" class="ls-bg">
                <p class="ls-l mb-2 mb-md-0 ls-hide-phone"
                    style="left: 0; top: 350px; width: 318px; min-width: 200px; min-height: 20px; height: 30px; line-height: 1; padding: 5px 40px; background-image: -webkit-linear-gradient(0deg, #0047ab 0%, #409de9 100%); "
                    data-ls="offsetxin: -100; durationin: 1000; delayin: 0; easingin:easeOutQuint;  transitionout: true; offsetxout: 600; durationout: 3000; fadeout: true; skewxout: 10;">
                </p>
                <p class="ls-l ls-hide-phone"
                    style="left: 40px; top: 363px; text-transform: uppercase; color: #ffffff; font-weight: 700; font-size: 16px; line-height: 1; letter-spacing: 0.2em;"
                    data-ls="minfontsize: 10px; offsetxin: -100; durationin: 1000; delayin: 0; easingin:easeOutQuint; texttransitionin: true; texttypein: chars_asc; textstartatin: transitioninstart; textdurationin: 100; textfadein: true; textoffsetxin: -20; textshiftin: 20;  transitionout: true; offsetxout: 600; durationout: 3000; fadeout: true; skewxout: 10;">
                    Encontre seu Jogador!</p>
                <h2 class="ls-l ls-responsive"
                    data-ls-mobile="left: 50%; top: 300px; text-align: center; font-size: 110px;"
                    style="left: -2px; top: 400px; text-transform: uppercase; color: #ffffff; font-weight: 700; font-size: 72px; letter-spacing: -0.03em;"
                    data-ls="durationin: 1000; delayin: 0; easingin:easeOutQuint; texttransitionin: true; textfadein: true; texttypein: words_asc; textstartatin: transitioninstart; textshiftin: 300; textoffsetyin: 50; transitionout: true; offsetxout: 500; durationout: 3000; fadeout: true; skewxout: 10;">
                    Rocket</h2>
                <h2 class="ls-l ls-responsive"
                    data-ls-mobile="left: 50%; top: 450px; text-align: center; font-size: 110px;"
                    style="left: -2px; top: 480px; text-transform: uppercase; color: #ffffff; font-weight: 700; font-size: 72px; letter-spacing: -0.03em;"
                    data-ls="durationin: 1000; delayin: 0; easingin:easeOutQuint; texttransitionin: true; textfadein: true; texttypein: words_asc; textstartatin: transitioninstart; textshiftin: 300; textoffsetyin: 50; transitionout: true; offsetxout: 400; durationout: 3000; fadeout: true; skewxout: 10;">
                    League</h2>
                <p class="ls-l ls-hide-phone"
                    style="left: 0; top: 575px; color: #fff; font-size: 18px; width: 335px; min-width: 90px; white-space: normal; line-height: 1; padding: 5px 30px; background-image: -webkit-linear-gradient(0deg, #0047ab 0%, #409de9 100%);"
                    data-ls="minfontsize: 16px; durationin: 1000; delayin: 0; easingin:easeOutQuint; offsetyin: 50; transitionout: true; offsetxout: 300; durationout: 3000; fadeout: true; skewxout: 10;">
                    Grandes jogadores esperando para fazer parte de uma equipe!</p>
                <div class="ls-l ls-center-xs ls-responsive"
                    data-ls-mobile="left: 50%; top: 660px; width: 100px; height: 100px;" style="left: 0; top: 635px;"
                    data-ls="durationin: 1000; delayin: 0; easingin:easeOutQuint; offsetyin: 50; transitionout: true; offsetxout: 300; durationout: 3000; fadeout: true; skewxout: 10;">
                    <div class="ls-btn-group">
                        <a href="player.php" class="vs-btn gradient-btn">Jogadores</a>
                        <!-- <a href="shop.html" class="vs-btn black-skew"><i class="fal fa-shopping-cart"></i>Merch shop</a> -->
                    </div>
                </div>
            </div>
            <div class="ls-slide" data-ls="duration: 8000; transition2d: 5;">
                <img src="assets/img/hero/hero-img-33.jpg" alt="Hero Bg Image" class="ls-bg">
                <p class="ls-l mb-2 mb-md-0 ls-hide-phone"
                    style="left: 0; top: 350px; width: 430px; min-width: 200px; min-height: 20px; height: 30px; line-height: 1; padding: 5px 40px; background-image: -webkit-linear-gradient(0deg, #0047ab 0%, #409de9 100%); "
                    data-ls="offsetxin: -100; durationin: 1000; delayin: 0; easingin:easeOutQuint;  transitionout: true; offsetxout: 600; durationout: 3000; fadeout: true; skewxout: 10;">
                </p>
                <p class="ls-l ls-hide-phone"
                    style="left: 40px; top: 363px; text-transform: uppercase; color: #ffffff; font-weight: 700; font-size: 16px; line-height: 1; letter-spacing: 0.2em;"
                    data-ls="minfontsize: 10px; offsetxin: -100; durationin: 1000; delayin: 0; easingin:easeOutQuint; texttransitionin: true; texttypein: chars_asc; textstartatin: transitioninstart; textdurationin: 100; textfadein: true; textoffsetxin: -20; textshiftin: 20;  transitionout: true; offsetxout: 600; durationout: 3000; fadeout: true; skewxout: 10;">
                    Candidata-se a grandes equipes!</p>
                <h2 class="ls-l ls-responsive"
                    data-ls-mobile="left: 50%; top: 300px; text-align: center; font-size: 110px;"
                    style="left: -2px; top: 400px; text-transform: uppercase; color: #ffffff; font-weight: 700; font-size: 72px; letter-spacing: -0.03em;"
                    data-ls="durationin: 1000; delayin: 0; easingin:easeOutQuint; texttransitionin: true; textfadein: true; texttypein: words_asc; textstartatin: transitioninstart; textshiftin: 300; textoffsetyin: 50; transitionout: true; offsetxout: 500; durationout: 3000; fadeout: true; skewxout: 10;">
                    Counter-Strike</h2>
                <h2 class="ls-l ls-responsive"
                    data-ls-mobile="left: 50%; top: 450px; text-align: center; font-size: 110px;"
                    style="left: -2px; top: 480px; text-transform: uppercase; color: #ffffff; font-weight: 700; font-size: 72px; letter-spacing: -0.03em;"
                    data-ls="durationin: 1000; delayin: 0; easingin:easeOutQuint; texttransitionin: true; textfadein: true; texttypein: words_asc; textstartatin: transitioninstart; textshiftin: 300; textoffsetyin: 50; transitionout: true; offsetxout: 400; durationout: 3000; fadeout: true; skewxout: 10;">
                    Global Offensive</h2>
                <p class="ls-l ls-hide-phone"
                    style="left: 0; top: 575px; color: #fff; font-size: 18px; width: 335px; min-width: 90px; white-space: normal; line-height: 1; padding: 5px 30px; background-image: -webkit-linear-gradient(0deg, #0047ab 0%, #409de9 100%);"
                    data-ls="minfontsize: 16px; durationin: 1000; delayin: 0; easingin:easeOutQuint; offsetyin: 50; transitionout: true; offsetxout: 300; durationout: 3000; fadeout: true; skewxout: 10;">
                    Venha ser parte de um deles!</p>
                <div class="ls-l ls-center-xs ls-responsive"
                    data-ls-mobile="left: 50%; top: 660px; width: 100px; height: 100px;" style="left: 0; top: 635px;"
                    data-ls="durationin: 1000; delayin: 0; easingin:easeOutQuint; offsetyin: 50; transitionout: true; offsetxout: 300; durationout: 3000; fadeout: true; skewxout: 10;">
                    <div class="ls-btn-group">
                        <a href="vagas.php" class="vs-btn gradient-btn">Vagas</a>
                        <!-- <a href="shop.html" class="vs-btn black-skew"><i class="fal fa-shopping-cart"></i>Merch shop</a> -->
                    </div>
                </div>
            </div>
        </div>
    </section>
    <div class="bg1 bg-light-dark bg-fixed" data-bg-src="assets/img/bg/bg-1.jpg">
        <!--==============================
  Video Area
  ============================== -->
        <div class="vs-video-area  space-top">
            <div class="container ">
                <div class="row align-items-center gx-xl-0 arrow-white vs-carousel" data-slide-show="3"
                    data-sm-slide-show="2" data-xs-slide-show="1" data-arrows="true" data-xl-arrows="true"
                    data-ml-arrows="true" data-center-mode="true" data-xl-center-mode="true" data-ml-center-mode="true"
                    data-lg-center-mode="true" data-md-center-mode="true">
                    <div class="col-lg-4">
                        <div class="video-box1">
                            <a href="https://www.youtube-nocookie.com/embed/uoonAnmKQhI" class="popup-video">
                                <img src="assets/img/video/video-img-1-1.jpg" alt="Video Image" class="w-100">
                            </a>
                            <a href="https://www.youtube-nocookie.com/embed/uoonAnmKQhI"
                                class="play-btn popup-video overlay-center"><i class="fas fa-play"></i></a>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="video-box1">
                            <a href="https://www.youtube-nocookie.com/embed/uoonAnmKQhI" class="popup-video">
                                <img src="assets/img/video/video-img-1-2.jpg" alt="Video Image" class="w-100">
                            </a>
                            <a href="https://www.youtube-nocookie.com/embed/uoonAnmKQhI"
                                class="play-btn popup-video overlay-center"><i class="fas fa-play"></i></a>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="video-box1">
                            <a href="https://www.youtube-nocookie.com/embed/uoonAnmKQhI" class="popup-video">
                                <img src="assets/img/video/video-img-1-3.jpg" alt="Video Image" class="w-100">
                            </a>
                            <a href="https://www.youtube-nocookie.com/embed/uoonAnmKQhI"
                                class="play-btn popup-video overlay-center"><i class="fas fa-play"></i></a>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="video-box1">
                            <a href="https://www.youtube-nocookie.com/embed/uoonAnmKQhI" class="popup-video">
                                <img src="assets/img/video/video-img-1-4.jpg" alt="Video Image" class="w-100">
                            </a>
                            <a href="https://www.youtube-nocookie.com/embed/uoonAnmKQhI"
                                class="play-btn popup-video overlay-center"><i class="fas fa-play"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--==============================
    vagas
    ==============================-->
    <section class="vs-match-wrapper vs-match-layout1 space-top space-bottom">
            <div class="container">
                <div class="row align-items-center ">
                    <div class="col-md-5 col-xl-6">
                        <!-- <div class="section-title">
                            <span class="sub-title1">Lista</span>
                            <h2 class="sec-title1 text-white">Vagas</h2>
                        </div> -->
                    </div>
                    <div class="col-lg-7 col-xl-6 text-center text-lg-end">
                        <div class="filter-menu-style1 filter-menu-active mb-70">
                            <button data-filter="*" class="active">Todos</button>
                            <button data-filter=".csgo"> csgo</button>
                            <button data-filter=".dota">dota 2</button>
                            <button data-filter=".fortnite">fortnite</button>
                            <button data-filter=".pubg">pubg</button>
                        </div>
                    </div>
                </div>
                <div class="mb-15 filter-active row">
                <?php
        $vagas = $objVaga->listar();
        foreach ($vagas as $vaga){
    ?>
                    <div class="col-md-6 col-lg-12 grid-item pubg fortnite csgo ">
                        <div class="vs-match">
                            <div class="row align-items-center justify-content-center justify-content-lg-start">
                                <div class="col-lg-3">
                                    <div class="match-logo">
                                        <a href="vaga-details.php?id=<?php echo $vaga->id_vaga; ?>"><img src="imagens/jogos/mlbb.png"
                                                alt="vaga Logo" style="width:80px;"></a>
                                        </div>
                                </div>
                                <div class="col-lg">
                                    <div class="match-about pl-35">
                                        <h3 class="team-name h5 text-white mb-1 mb-lg-2"><a
                                                href="vaga-details.php?id=<?php echo $vaga->id_vaga; ?>"><?php echo $vaga->jogo; ?></a>
                                        </h3>
                                        <p class="match-date mb-0">Cargo: <?php echo $vaga->titulo_vaga; ?></p>
                                        <p class="match-date mb-0">Salário: R$ <?php echo $vaga->salario; ?></p>
                                    </div>
                                </div>
                                <div class="col-auto col-xl-2">
                                    <div class="team-name h5 text-white mb-1 mb-lg-2">Nº de vagas: <?php echo $vaga->num_vagas; ?></div>
                                </div>
                                <div class="col-auto col-xl-2 text-end ">
                                    <a href="#"
                                        class="icon-btn3"><i class="fad fa-paper-plane"></i></a>
                                    <a href="#"
                                        class="icon-btn3"><i class="fab fa-linkedin"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php 
                        }
                    ?>
                </div>
            </div>
        </section>
    </div>
    <!--==============================
    jogadores Area
    ============================== -->
    <section class="vs-member-area vs-member-layout1 bg-light-dark space-top space-md-bottom">
        <div class="container">
            <div class="section-title">
                <span class="sub-title1">Jogadores</span>
                <h2 class="sec-title1 text-white">Gamers em Destaque</h2>
            </div>
            <div class="row vs-carousel arrow-white" data-arrows="true" data-xl-arrows="true" data-lg-slide-show="4"
                data-md-slide-show="3" data-sm-slide-show="2" data-xs-slide-show="1" data-slide-show="4">
                <?php
                    $candidatos = $objCandidato->listar();
                    foreach ($candidatos as $candidato){
                ?>
                <div class="col-lg-3">
                    <div class="vs-member">
                        <div class="member-img">
                            <a href="player-details.php?id=<?php echo $candidato->id_candidato; ?>"><img alt="Member Image" width="200" class="w-100" src="imagens/candidatos/<?php echo $candidato->foto;?>" 
                                    alt="Member Image"></a>
                        </div>
                        <div class="member-content" style="text-shadow: 5px;">
                            <span class="degi">Tom Clancy's Rainbow Six Siege</span>
                            <h3  class="member-name fs-20"><a href="player-details.php?id=<?php echo $candidato->id_candidato; ?>"><?php echo $candidato->nome; ?></a></h3>
                        </div>
                    </div>
                    
                </div>
                <?php
                    }
                ?>
            </div>
        </div>
    </section>
    <!--==============================
    times Area
    ==============================-->
    <div class="vs-brand-wrapper bg-dark space">
        <div class="container">
            <div class="section-title">
                <span class="sub-title1">Times</span>
                <h6 class="sec-title1 text-white">Times em Destaque</h6>
            </div>
            <div class="row vs-carousel arrow-white" data-slide-show="5" data-lg-slide-show="4" data-md-slide-show="4"
                data-sm-slide-show="3" data-xs-slide-show="2" data-arrows="true" data-xl-arrows="true"
                data-ml-arrows="true" data-lg-arrows="true">
                <div class="col-xl-2 text-center">
                    <img src="assets/img/brand/brand-1.png" alt="Brand Image">
                </div>
                <div class="col-xl-2 text-center">
                    <img src="assets/img/brand/brand-2.png" alt="Brand Image">
                </div>
                <div class="col-xl-2 text-center">
                    <img src="assets/img/brand/brand-3.png" alt="Brand Image">
                </div>
                <div class="col-xl-2 text-center">
                    <img src="assets/img/brand/brand-4.png" alt="Brand Image">
                </div>
                <div class="col-xl-2 text-center">
                    <img src="assets/img/brand/brand-5.png" alt="Brand Image">
                </div>
                <div class="col-xl-2 text-center">
                    <img src="assets/img/brand/brand-1.png" alt="Brand Image">
                </div>
                <div class="col-xl-2 text-center">
                    <img src="assets/img/brand/brand-2.png" alt="Brand Image">
                </div>
                <div class="col-xl-2 text-center">
                    <img src="assets/img/brand/brand-3.png" alt="Brand Image">
                </div>
                <div class="col-xl-2 text-center">
                    <img src="assets/img/brand/brand-4.png" alt="Brand Image">
                </div>
                <div class="col-xl-2 text-center">
                    <img src="assets/img/brand/brand-5.png" alt="Brand Image">
                </div>
            </div>
        </div>
    </div>
    <!--==============================
			Footer Area (rodapé)
	==============================-->
    <footer class="footer-wrapper footer-layout2 bg-dark bg-fluid" data-bg-src="assets/img/bg/footer-bg-2-1.jpg">
        <div class="footer-widget-wrapper  dark-style1 pb-30">
            <div class="container">
                <div class="row justify-content-between">
                    <div class="col-md-6 col-lg-3 col-xl-3">
                        <div class="widget footer-widget pt-0">
                            <h3 class="widget_title text-white">Sobre Nós</h3>
                            <div class="vs-widget-about">
                                <p class="pe-xl-3">Nosso compromisso é simplificar a conexão entre jogadores e equipes, 
                                facilitando a formação de times eficientes para desafios online. Junte-se a nós e eleve sua experiência de jogo!</p>
                                <div class="d-flex gap-2 text-white mt-25">
                                    <a class="icon-btn3 text-white" href="https://google.com"><i class="fab fa-facebook-f"></i></a>
                                    <a class="icon-btn3 text-white" href="https://google.com"><i class="fab fa-twitter"></i></a>
                                    <a class="icon-btn3 text-white" href="https://google.com"><i class="fab fa-instagram"></i></a>
                                    <a class="icon-btn3 text-white" href="https://google.com"><i class="fab fa-youtube"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-5 col-md-6 col-lg-2 col-xl-2">
                        <div class="widget footer-widget  ">
                            <h3 class="widget_title font-theme3">Precisa de Ajuda?</h3>
                            <ul class="custom-links">
                                    <li><a href="#">Companhia</a></li>
                                    <li><a href="#">Privacidade</a></li>
                                    <li><a href="#">Politica</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-sm-7 col-md-6 col-lg-4 col-xl-3">
                        <div class="widget footer-widget  ">
                            <h3 class="widget_title font-theme3">Plataformas</h3>
                            <div class="row no-gutters">
                                <div class="col-sm-5">
                                    <ul class="custom-links">
                                    <li><a href="#">Playstation 5</a></li>
                                <li><a href="#">XBOX One</a></li>
                                <li><a href="#">PC</a></li>
                                    </ul>
                                </div>
                                <div class="col-sm-7">
                                    <ul class="custom-links">
                                    <li><a href="#">Steam</a></li>
                                    <li><a href="#">Mobile</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-3 col-xl-4">
                        <div class="widget footer-widget  ">
                            <h3 class="widget_title">Contate-nos</h3>
                            <div class="vs-widget-about">
                                <p class="contact-info"><i class="fal fa-map-marker-alt text-white"></i>R. Conceição,
                                    321 - Santo Antônio, São Caetano do Sul - SP, 09530-060</p>
                                <p class="contact-info"><i class="fal fa-phone text-white"></i><a
                                        href="#">(11) 7070 - 7070</a></p>
                                <p class="contact-info"><i class="fal fa-fax text-white"></i><a
                                        href="#">(11) 1234 - 5678</a></p>
                                <p class="contact-info"><i class="fal fa-envelope text-white"></i><a
                                        href="#">Tseek@gmail.com</a></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="footer-copyright">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-7 text-center">
                        <div class="copyright-shape bg-light-dark">
                            <p class="text-light fw-bold text-bold mb-0">&copy; 2024 <a class="text-white" href="index.php">TSeeK</a></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>




    <!--********************************
			Codigo termina aqui!
	******************************** -->

    <!-- Scroll botão top (voltar pro início da  pág) -->
    <a href="#" class="scrollToTop icon-btn3"><i class="far fa-angle-up"></i></a>




    <!-- <div class="vs-cursor"></div>
    <div class="vs-cursor2"></div> -->




    <!--==============================
        JavaScript
    ============================== -->
    <!-- Jquery -->
    <script src="assets/js/vendor/jquery-1.12.4.min.js"></script>
    <!-- Slick Slider -->
    <script src="assets/js/slick.min.js"></script>
    <!-- Bootstrap -->
    <script src="assets/js/bootstrap.min.js"></script>
    <!-- Layer Slider including GSAP -->
    <script src="assets/js/layerslider.utils.js"></script>
    <script src="assets/js/layerslider.transitions.js"></script>
    <script src="assets/js/layerslider.kreaturamedia.jquery.js"></script>
    <!-- Magnific Popup -->
    <script src="assets/js/jquery.magnific-popup.min.js"></script>
    <!-- Isotop -->
    <script src="assets/js/imagesloaded.pkgd.min.js"></script>
    <script src="assets/js/isotope.pkgd.min.js"></script>
    <!-- jQuery UI -->
    <script src="assets/js/jquery-ui.min.js"></script>
    <!-- Custom Carousel -->
    <script src="assets/js/vscustom-carousel.min.js"></script>
    <!-- Mouse Cursor -->
    <script src="assets/js/vs-cursor.min.js"></script>
    <!-- Mobile Menu -->
    <script src="assets/js/vsmenu.min.js"></script>
    <!-- Map Js -->
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDC3Ip9iVC0nIxC6V14CKLQ1HZNF_65qEQ "></script>
    <script src="assets/js/map.js"></script>
    <!-- Form Js -->
    <script src="assets/js/ajax-mail.js"></script>
    <!-- Main Js File -->
    <script src="assets/js/main.js"></script>


    <!-- java da sidebar -->
    <script src="sidebar/js/jquery.min.js"></script>
    <script src="sidebar/js/popper.js"></script>
    <script src="sidebar/js/bootstrap.min.js"></script>
    <script src="sidebar/js/main.js"></script>
</body>

</html>