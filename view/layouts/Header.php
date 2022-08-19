<?php 
if (!isset($_SESSION)) {
    session_start();
}
?>
<!DOCTYPE html>
<html lang="pt-br">
    <head>
        
        <title>iTTurini - Desenvolvimento de soluções em Tecnologia e Marketing</title>
        
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="">
        <meta name="keywords" content="">
        <meta name="author" content="Rafael Cardoso De Jesus">
        
        <meta property="og:url"                content="https://itturini.com.br" />
        <meta property="og:type"               content="website" />
        <meta property="og:title"              content="iTTurini - Conexões que transformam" />
        <meta property="og:description"        content="" />
        <meta property="og:image"              content="https://itturini.com.br/assets/images/background.jpg" />
        
        
    <!--estilos da página-->
    <link rel="stylesheet" type="text/css" href="./public/css/navbar.css">
    <link rel="stylesheet" type="text/css" href="/public/css/footer.css">
    <link rel="stylesheet" href="/assets/css/formulario.css">

    <!--Bootstrap-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>

    <!--Jquery-->
    <script src="https://code.jquery.com/jquery-3.6.0.js" 
        integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous">
    </script>

    <!--Icones-->
    <script src="https://kit.fontawesome.com/f1adbfc707.js" crossorigin="anonymous"></script>


    <!--Font-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Raleway:ital,wght@0,400;0,500;0,600;0,700;1,700&display=swap" rel="stylesheet">

  
    <!-- Google Tag Manager -->
        <script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
        new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
        j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
        'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
        })(window,document,'script','dataLayer','GTM-544RQ33');</script>
    <!-- End Google Tag Manager -->

    <!-- Facebook Pixel Code -->
    <script>
    !function(f,b,e,v,n,t,s)
    {if(f.fbq)return;n=f.fbq=function(){n.callMethod?
    n.callMethod.apply(n,arguments):n.queue.push(arguments)};
    if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';
    n.queue=[];t=b.createElement(e);t.async=!0;
    t.src=v;s=b.getElementsByTagName(e)[0];
    s.parentNode.insertBefore(t,s)}(window,document,'script',
    'https://connect.facebook.net/en_US/fbevents.js');
    fbq('init', '1489193578187320'); 
    fbq('track', 'PageView');
    </script>
    <noscript>
    <img height="1" width="1" 
    src="https://www.facebook.com/tr?id=1489193578187320&ev=PageView
    &noscript=1"/>
    </noscript>
    <!-- End Facebook Pixel Code -->

    <script>
        fbq('trackCustom', 'Pixel Facebook', {
        dominio: 'itturini.com.br',
        pagina: 'home',
        fonte: 'facebook'});
    </script>
</head>


<link rel="stylesheet" type="text/css" href="./public/css/navbar.css">


<div class="row info-adicionais justify-content-center">
    <div class="col-3 pt-3 aumenta">
        <i class="fas fa-phone" aria-hidden="true"></i>
        <p class="titulo">Fale Conosco</p>
        <p class="conteudo"><span>+55(31) 2526-5464</span></p>
    </div>
    <div class="col-3 pt-3 aumenta" style="background: #A3A3A3;">
        <i class="fa-solid fa-calendar"></i>
        <p class="titulo">Atendimento</p>
        <p class="conteudo"><span>Seg a sex das 7h30 às 17h</span></p>
    </div>
    <div class="col-3 pt-3 aumenta">
        <div class="row mt-2">
           <span><p class="titulo">Redes Sociais</p></span>
            <div id="sociais-topo">      
                <a href="https://www.linkedin.com/company/itturini" target="_blank"><i class="fab fa-linkedin"></i></a>
                <a href="https://www.instagram.com/itturini" target="_blank"><i class="fab fa-instagram"></i></a>
                <a href="https://wa.me/5531983448181" target="_blank"><i class="fab fa-whatsapp"></i></a>
                <a href="https://www.facebook.com/itturini" target="_blank"><i class="fab fa-facebook"></i></a>
            </div>
        </div>
    </div>
</div>

<nav class="navbar navbar-expand-lg navbar-dark w-100">
    <div class="container-fluid" id="home">
        <a class="nav-brand"  href="/">
            <img id="logo" src="../../public/img/itturini_logo.png" alt="logo">
        </a>
        <button class="navbar-toggler float-xs-right" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <button class="text-center btn" id="sidebar-btn"> 
      <i class="fa-solid fa-bars"></i>
    </button>
        <div class="collapse navbar-collapse justify-content-end w-100" id="navbarNav">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" aria-current="page" href="/">Home</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" aria-current="page" href="/#about-area">Sobre</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/#services">Soluções e Serviços TI</a>
            </li>
            <!--
                <li class="nav-item">
                    <a class="nav-link" href="#clientes">Clientes</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#contato-email">Contatos</a>
                </li>
            -->
            <li class="nav-item">
                <a class="nav-link" href="/#mapa">Localização</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/#clientes">Clientes</a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="/temas">temas</a>
            </li>

            
            <li class="nav-item">
                <a class="nav-link" href="/curriculo">Envie seu currículo</a>
            </li>

            <?php
                  if(!isset($_SESSION['email'])):
                ?>
                  <li class="nav-item">
                    <a class="nav-link" href="/login">Login</a> <!--Caso não estiver logado mostra botão login-->
                  </li>
                <?php
                  else:
                ?>
                  <li class="nav-item">
                    <a class="nav-link" style="color: #068D7E; font-weight: 700;" href="/admin">Painel Admin</a> <!--Caso  estiver logado mostra botão Sair-->
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" style="color: red; font-weight: 700;" href="/sair">Sair</a> <!--Caso  estiver logado mostra botão Sair-->
                  </li>
                <?php
                endif;
                ?>
        </ul>
        </div>
    </div>
</nav>
</html>


