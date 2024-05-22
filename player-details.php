<?php
include('protect.php');
 echo $_SESSION['nome'];
//  echo $_GET['id'];
print_r($_SESSION);
require_once('class/Classes.php');
//  $objHelper = new Helper();
//  $objHelper->logado();
 

 
 $objCandidato = new Candidato();
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
    <link href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500;700&family=Montserrat:wght@700&family=Roboto:wght@400;700&display=swap" rel="stylesheet">

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
    <!-- menu lateral -->
    <link rel="stylesheet" href="sidebar/css/style.css">
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
   

</head>

<body>

    <!--********************************
   		Codigo começa aqui
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
Icons ao lado superior direito (menu retrátil)
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
                            </ul> -->
                        </li>
                        <li class="menu-item-has-children">
                            <a href="planos.php">Planos</a>
                        </li>
                    </ul>
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
        <input type="text" class="border-theme" placeholder="Buscar">
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
            <a href="index.php"><img src="assets/img/logo1.png" alt="TSeeK"></a>
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
                    <!-- <p class="mb-0 fs-xs text-white">Bem vindo a sua <a class="text-inherit" href="team.html"><u class=" fw-bold">Esports team</u></a></p> -->
                </div>
                <div class="col-sm-6 text-end d-none d-md-block">
                    <ul class="social-links fs-xs text-white">
                        <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                        <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                        <li><a href="#"><i class="fab fa-twitch"></i></a></li>
                        <li><a href="#"><i class="fab fa-linkedin-in"></i></a></li>
                        <li><a href="#"><i class="fab fa-youtube"></i></a></li>
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
                                <li class="menu-item-has-children">
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
                                    </ul> -->
                                </li>
                                <li class="menu-item-has-children">
                                    <a href="planos.html">Planos</a>
                                </li>
                            </ul>
                    </div>
                    <div class="col-md-4 col-lg-2 text-center d-none d-xl-block">
                        <div class="header-logo1">
                            <a href="index.php"><img src="assets/img/logo1.png" alt="TSeeK"></a>
                        </div>
                    </div>
                    <div class="col-md-4 col-lg-5 d-none d-xl-block">
                        <div class="header-right d-flex align-items-center justify-content-end">
                            <a href="#" class="vs-btn outline1 d-none d-xl-inline-block"><i
                                    class="fab fa-twitch"></i><strong>Live Streaming</strong></a>
                            <ul class="header-list1 list-style-none ml-30">
                                <!-- <li>
                                    <button class="dropdown-toggle" type="button" title="Login">
                                        <a href="login2.php"><img src="assets/img/flag/flag-1.png"
                                                alt="Country Flag" class="flag radius-circle"> </a>
                                    </button>
                                </li> -->
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
<?php
    if(isset($_GET['id'])&& $_GET['id'] != ''){
        $candidato = $objCandidato->mostrar($_GET['id']);
    // $id_candidato = $_SESSION['id_candidato'];
?>
    <!--==============================
    Breadcumb
============================== -->
    <div class="breadcumb-wrapper breadcumb-layout1 pt-200 pb-50" data-bg-src="assets/img/breadcumb/breadcumb-1.jpg" data-overlay>
        <div class="container z-index-common">
            <div class="breadcumb-content text-center">
                <h1 class="breadcumb-title h1 text-white my-0"><?php echo $candidato->nome;?></h1>
                <h2 class="breadcumb-bg-title">Gamers</h2>
                <ul class="breadcumb-menu-style1 text-white mx-auto fs-xs">
                    <li><a href="index-att.php"><i class="fal fa-home"></i>Home</a></li>
                    <li class="active">Perfil Jogador</li>
                </ul>
            </div>
        </div>
    </div>
    <!--==============================
  Player Details
    ==============================-->
    <section class="vs-player-wrapper space-top newsletter-pb">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="vs-box1 d-md-flex mb-30 info-box4 align-items-center">
                        <!-- <div class="pro-tag position-absolute end-0 top-0 bg-gradient text-white">
                            <i class="fas fa-check-circle"></i>
                            pro
                        </div> -->
                        <div class="inner-img1">
                            <img src="imagens/candidatos/<?php echo $candidato->foto;?>" alt="Member Image" width="200px">
                        </div>
                        <div class="media-body ml-lg-30">
                            <h2 class="h4 mb-0"><?php echo $candidato->nome;?></h2>
                            <span class="text-theme2">Pro-Player</span>
                            <table class="info-table mt-2 mb-0">
                                <tr>
                                    <td>Entrou:</td>
                                    <td>2023</td>
                                </tr>
                                <tr>
                                    <td>Perfil:</td>
                                    <td>Público</td>
                                </tr>
                                <tr>
                                    <td>Cidade, País:</td>
                                    <td>Santo André, Brasil</td>
                                </tr>
                            </table>
                              
                        </div>
                    </div>
                    <?php
                     // }
                     }
                    ?>
                    <!-- Skill Area -->
                    <div class="vs-box1 p-0 mb-30">
                        <div class="nav  tab-menu1 tab-indicator justify-content-center justify-content-sm-start"
                            role="tablist">
                            <a class="nav-link active" id="skill1-tab" data-bs-toggle="tab" href="#skill1" role="tab"
                                aria-controls="skill1" aria-selected="true">Jogos Favoritos</a>
                            <a class="nav-link" id="skill3-tab" data-bs-toggle="tab" href="#skill3" role="tab"
                                aria-controls="skill3" aria-selected="false">Views de Partidas</a>
                        </div>
                        <div class="tab-content mt-30">
                            <div class="tab-pane show active" id="skill1" role="tabpanel" aria-labelledby="skill1-tab">
                                <div class="skill-box1 d-sm-flex px-30 pb-30 text-center text-sm-start">
                                    <div class="media-img position-relative">
                                        <img src="assets/img/team/team-d-2.jpg" alt="Team Image" width="150px">
                                    </div>
                                    <div class="media-body align-self-center ml-lg-30">
                                        <h5 class="fs-20 mb-0 font-theme">Mobile Legends</h5>
                                    </div>
                                </div>
                                <div class="skill-box1 d-sm-flex px-30 pb-30 text-center text-sm-start">
                                    <div class="media-img position-relative">
                                        <img src="assets/img/team/team-d-3-1.jpg" alt="Team Image" width="150px">
                                    </div>
                                    <div class="media-body align-self-center ml-lg-30">
                                        <h5 class="fs-20 mb-0 font-theme">Phasmophobia</h5>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane" id="skill3" role="tabpanel" aria-labelledby="skill3-tab">
                                <!-- Team Video Area -->
                                <div class="team-video-area px-30">
                                    <div class="row">
                                        <div class="col-sm-6 col-xl-4">
                                            <div class="team-video-thumb">
                                                <div class="thumb-img">
                                                    <img src="assets/img/team/team-d-video-1-1.jpg"
                                                        alt="Video Thumb Image">
                                                    <div class="tag">Mobile Legends</div>
                                                    <a href="#" class="play-btn popup-video"><i
                                                            class="fas fa-play"></i></a>
                                                </div>
                                                <div class="thumb-content">
                                                    <h5 class="thumb-title"><a href="#">Selena Gameplay</a></h5>
                                                    <span class="total-views">12.542 views</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-6 col-xl-4">
                                            <div class="team-video-thumb">
                                                <div class="thumb-img">
                                                    <img src="assets/img/team/team-d-video-2-1.jpg"
                                                        alt="Video Thumb Image">
                                                    <div class="tag">Mobile Legends</div>
                                                    <a href="#" class="play-btn popup-video"><i
                                                            class="fas fa-play"></i></a>
                                                </div>
                                                <div class="thumb-content">
                                                    <h5 class="thumb-title"><a href="#">Brody Gameplay</a></h5>
                                                    <span class="total-views">3.256 views</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-6 col-xl-4">
                                            <div class="team-video-thumb">
                                                <div class="thumb-img">
                                                    <img src="assets/img/team/team-d-video-3-1.jpg"
                                                        alt="Video Thumb Image">
                                                    <div class="tag">Mobile Legends</div>
                                                    <a href="#" class="play-btn popup-video"><i
                                                            class="fas fa-play"></i></a>
                                                </div>
                                                <div class="thumb-content">
                                                    <h5 class="thumb-title"><a href="#">Luo Yi Gameplay</a></h5>
                                                    <span class="total-views">23.529 views</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-6 col-xl-4">
                                            <div class="team-video-thumb">
                                                <div class="thumb-img">
                                                    <img src="assets/img/team/team-d-video-4-1.jpg"
                                                        alt="Video Thumb Image">
                                                    <div class="tag">Phasmophobia</div>
                                                    <a href="#" class="play-btn popup-video"><i
                                                            class="fas fa-play"></i></a>
                                                </div>
                                                <div class="thumb-content">
                                                    <h5 class="thumb-title"><a href="#">Esse jogo é só por Deus</a></h5>
                                                    <span class="total-views">15.200 views</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-6 col-xl-4">
                                            <div class="team-video-thumb">
                                                <div class="thumb-img">
                                                    <img src="assets/img/team/team-d-video-5-1.jpg"
                                                        alt="Video Thumb Image">
                                                    <div class="tag">Phasmophobia</div>
                                                    <a href="#" class="play-btn popup-video"><i
                                                            class="fas fa-play"></i></a>
                                                </div>
                                                <div class="thumb-content">
                                                    <h5 class="thumb-title"><a href="#">Fui o primeiro a morre kkk</a></h5>
                                                    <span class="total-views">5.235 views</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-6 col-xl-4">
                                            <div class="team-video-thumb">
                                                <div class="thumb-img">
                                                    <img src="assets/img/team/team-d-video-6-1.jpg"
                                                        alt="Video Thumb Image">
                                                    <div class="tag">Phasmophobia</div>
                                                    <a href="#" class="play-btn popup-video"><i
                                                            class="fas fa-play"></i></a>
                                                </div>
                                                <div class="thumb-content">
                                                    <h5 class="thumb-title"><a href="#">Vou ter que compra um cel novo</a></h5>
                                                    <span class="total-views">26.485 views</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div> 
                    <!-- Video Area -->
                    <div class="vs-box1 mb-30">
                        <h4 class="h5 mb-25 mt-n1">Live Stream</h4>
                        <div class="hover-shape position-relative">
                            <span class="bg-gradient  text-white post-time d-none d-sm-inline-block">12 Horas atras</span>
                            <img src="assets/img/video/video-img-3-2.jpg" alt="Video Image" class="w-100">
                            <a href="https://www.youtube-nocookie.com/embed/uoonAnmKQhI" class="play-btn overlay-center popup-video"><i class="fas fa-play"></i></a>
                        </div>
                        <div class="row mt-20 mt-lg-30 flex-row-reverse">
                            <div class="col-md-7 mb-15 mb-md-0 text-md-end">
                                <strong class="text-title fs-18 mb-2 mb-md-0 me-md-2 d-md-inline-block d-block">Outras Redes:</strong>
                                <div class="d-inline-flex gap-2">
                                    <a class="icon-btn3 size-40" href="#"><i class="fab fa-facebook-f"></i></a>
                                    <a class="icon-btn3 size-40" href="#"><i class="fab fa-twitter"></i></a>
                                    <a class="icon-btn3 size-40" href="#"><i class="fab fa-linkedin-in"></i></a>
                                    <a class="icon-btn3 size-40" href="#"><i class="fab fa-instagram"></i></a>
                                </div>
                            </div>
                            <div class="col-md-5">
                                <div class="author-box d-flex">
                                    <img src="imagens/candidatos/<?php echo $candidato->foto;?>" alt="Author Image">
                                    <div class="media-body align-self-center">
                                        <h6 class="name mb-0 text-normal lh-base"><a href="#"><?php echo $candidato->nome;?></a></h6>
                                        <span class="fs-xs">250k views</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <aside class="sidebar-area sticky-top overflow-hidden">
                        <div class="widget widget_search   ">
                            <form class="search-form">
                                <input type="text" placeholder="buscar">
                                <button type="submit"><i class="far fa-search"></i></button>
                            </form>
                        </div>
                        <h3 class="sidebox-title-v2 h5">Categorias</h3>
                        <div class="vs-sidebox-v2 ">
                            <ul class="vs-cat-list1">
                                <li><a href="#">Ação <span class="cat-number">10</span></a></li>
                                <li><a href="#">Aventura <span class="cat-number">07</span></a></li>
                                <li><a href="#">Battle - Royale <span class="cat-number">05</span></a></li>
                                <li><a href="#">E-sports <span class="cat-number">02</span></a></li>
                            </ul>
                        </div>
                        <h3 class="sidebox-title-v2 h5">Top Games</h3>
                        <div class="vs-sidebox bg-smoke">
                            <div class="row no-gutters g-2">
                                <div class="col-6">
                                    <div class="image-scale-hover"><a href="#"><img src="assets/img/widget/sidebbox-img-1.jpg" class="w-100" alt="Sidebox Image"></a></div>
                                </div>
                                <div class="col-6">
                                    <div class="image-scale-hover"><a href="#"><img src="assets/img/widget/sidebbox-img-2.jpg" class="w-100" alt="Sidebox Image"></a></div>
                                </div>
                                <div class="col-6">
                                    <div class="image-scale-hover"><a href="#"><img src="assets/img/widget/sidebbox-img-3.jpg" class="w-100" alt="Sidebox Image"></a></div>
                                </div>
                                <div class="col-6">
                                    <div class="image-scale-hover"><a href="#"><img src="assets/img/widget/sidebbox-img-4.jpg" class="w-100" alt="Sidebox Image"></a></div>
                                </div>
                            </div>
                        </div>
                    </aside>
                </div>
            </div>
        </div>
    </section>
    <!--==============================
			Footer Area
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
			Codigo termina aqui
	******************************** -->

    <!-- Scroll Top Top Button -->
    <a href="#" class="scrollToTop icon-btn3"><i class="far fa-angle-up"></i></a>




    <!-- <div class="vs-cursor"></div>
    <div class="vs-cursor2"></div> -->




    <!--==============================
        All Js File
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

</body>

</html>