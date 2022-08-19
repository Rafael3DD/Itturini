<div class="container-fluid">

  <?php 
  session_start(); 
  require __DIR__ . '/view/layouts/Header.php';
  ?>

  <link rel="stylesheet" type="text/css" href="./public/css/index.css">
        <div class="col-12">
          <?php
            if (isset($_SESSION['curriculo_enviado'])) :
          ?>
              <div class="alert mt-1 mb-1 w-50 alert-success text-center justify-content-center mx-auto" role="alert">
                <p> Seu curriculo foi enviado com sucesso!</p>
              </div>
          <?php
            endif;
            unset($_SESSION['curriculo_enviado']);
          ?>
        </div>
  <body>

    <div id="iconeZap">
      <a href="https://wa.me/5531983448181" target="_blank" class="align-middle"><i class="fa-brands fa-square-whatsapp"></i></a>
    </div>

    <div id="mainSlider" class="carousel slide carousel-fade" data-bs-ride="carousel" data-interval="3000">

      <div class="carousel-inner">
        <div id="particles-js">

          <div class="carousel-item active" id="parte1">

          </div>

          <div class="carousel-item" id="parte2">

          </div>

          <div class="carousel-item" id="parte3">

          </div>

        </div>
      </div>
    </div>

</div>

<!--Serviços e soluções-->
<div class="container" data-anima="topDown" style="transition: 0.3s;">
  <div class="d-flex justify-content-around">
    <div class="col-4" id="box">
      <i class="fa-solid fa-server"></i>
      <p id="titulo">Infraestrutura</p>
      <p id="texto">Oferecemos soluções de help desk gerenciamento de incidentes,
        atendimento e suporte ao usuário, virtualização, banco de dados e aplicações.
      </p>
    </div>

    <div class="col-4 justify-content-center" id="box">
      <i class="fa-solid fa-bullhorn"></i>
      <p id="titulo">Marketing Digital</p>
      <p id="texto">Criamos estratégias personalizadas e eficientes que irão atrair
        o seu público-alvo e melhorar suas vendas.
      </p>
    </div>

    <div class="col-4" id="box">
      <i class="fa-solid fa-globe"></i>
      <p id="titulo">Soluções Web</p>
      <p id="texto">Sites feitos sob medida para a sua empresa, com tudo que ela precisa
        para sair na frente da concorrência com soluções práticas e criativas.
      </p>
    </div>
  </div>
</div>


     

<!--Sobre a empresa-->
<div id="about-area">
  <div class="container">
    <div class="row">
      <div class="col-12" data-anima="topDown">
        <h3>Para iTTurini só importa apenas um resultado: O SEU!</h3>
      </div>
      <div class="col-md-6" data-anima="topDown">
        <img class="img-fluid" src="./public/img/children-gd1a2fdf5a_1920.jpg" alt="itturini2018">
      </div>
      <div class="col-md-6" data-anima="topDown" id="text-about-area">
        <h2>Uma empresa que visa o futuro!</h2>
        <p>Somos uma empresa de Tecnologia e Marketing Digital, de Belo Horizonte. Nascemos da paixão pela tecnologia.
          Nosso objetivo é conectar pessoas, através de soluções criativas e inovadoras, que gerem resultados para você
          e para o seu negócio!</p>
        <font-awesome-icon icon="fa-solid fa-browsers" />
      </div>
    </div>
  </div>
</div>

<!--Serviços e soluções-->
<div id="services">
  <div class="container ">
    <div class="row justify-content-between " id="solucoes-icons">
      <div class="col-12" data-anima="topDown">
        <h3>Soluções e Serviços de TI</h3>
      </div>
      <div class="col-md-2 about-area-icons" data-anima="topDown">

        <div id="posi-esquerda"><i class="fa-solid fa-bullhorn"></i></div>

        <div id="posi-direita">
          <h5>Inbound Marketing</h5>
          <p>Marketing de Conteúdo</p>
          <p>Ebooks</p>
          <p>E-mail Marketing</p>
        </div>
      </div>

      <div class="col-md-2 about-area-icons" data-anima="topDown">

        <div id="posi-esquerda"><i class="fas fa-solid fa-code"></i></div>

        <div id="posi-direita">
          <h5>Desenvolvimento</h5>
          <p>Landing Pages de alta conversão</p>
          <p>Sistemas WEB Customizados</p>
          <p>Split de pagamentos</p>
          <p>Integração Via API</p>
          <p>Gateway de pagamentos</p>

        </div>
      </div>

      <div class="col-md-2 about-area-icons" data-anima="topDown">

        <div id="posi-esquerda"><i class="fas fa-shopping-cart" aria-hidden="true"></i></div>

        <div id="posi-direita">
          <h5>E-commerce</h5>
          <p>Integração com Pagamentos</p>
          <p>Integração com Correios</p>
          <p>Mercados Envios</p>
          <p>Criação de E-commerce</p>
          <p>Marketplace</p>
        </div>
      </div>

      <!--Parte 2-->
      <div class="col-md-2 about-area-icons" data-anima="topDown">
        <div id="posi-esquerda"><i class="fa-solid fa-server"></i></div>
        <div id="posi-direita">
          <h5>Hospedagem</h5>
          <p> E-mails</p>
          <p> Sites</p>
          <p> Cloud</p>
        </div>
      </div>

      <div class="col-md-2 about-area-icons" data-anima="topDown">

        <div id="posi-esquerda"><i class="fa-solid fa-face-grin-wide"></i></div>

        <div id="posi-direita">
          <h5>Identidade Visual</h5>
          <p>Programação Visual</p>
          <p>Folders</p>
          <p>Logo</p>
          <p>Papelaria em geral</p>
        </div>
      </div>
    </div>
  </div>
</div>


<!--Clientes-->
<div id="clientes">
  <div id="center">
    <div class="container">
      <div class="col-12">
        <h3 class="m-4">Clientes</h3>
      </div>

      <div id="carousel-column" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-indicators">
          <button type="button" data-bs-target="#carousel-column" data-bs-slide-to="0" class="indicadores active" aria-current="true" aria-label="Slide 1"></button>
          <button type="button" data-bs-target="#carousel-column" data-bs-slide-to="1" class="indicadores" aria-label="Slide 2"></button>
          <button type="button" data-bs-target="#carousel-column" data-bs-slide-to="2" class="indicadores" aria-label="Slide 3"></button>
        </div>
        <div class="carousel-inner">
          <div class="carousel-item active">
            <div class="row">
              <div class="col-3">
                <img src="/public/img/clientes/ceramica.jpg" class="d-block  img-fluid" alt="...">
              </div>
              <div class="col-3 ">
                <img src="/public/img/clientes/compararseguroviagem.png" class="d-block   img-fluid" alt="...">
              </div>
              <div class="col-3">
                <img src="/public/img/clientes/Dri_Rausch.jpg" class="d-block  img-fluid" alt="...">
              </div>
              <div class="col-3">
                <img src="/public/img/clientes/GrupPrestarh.jpg" class="d-block  img-fluid" alt="...">
              </div>
            </div>
          </div>
          <div class="carousel-item">
            <div class="row">
              <div class="col-3">
                <img src="/public/img/clientes/logo-audaliano-santos.jpg" class="d-block  img-fluid" alt="...">
              </div>
              <div class="col-3">
                <img src="/public/img/clientes/logo-rede-saude.jpg" class="d-block   img-fluid" alt="...">
              </div>
              <div class="col-3">
                <img src="/public/img/clientes/logobeltfit.png" class="d-block img-fluid" alt="...">
              </div>
              <div class="col-3">
                <img src="/public/img/clientes/pd_ardwood.png" class="d-block   img-fluid" alt="...">
              </div>
            </div>
          </div>
          <div class="carousel-item">
            <div class="row">
              <div class="col-3">
                <img src="/public/img/clientes/shitake.jpg" class="d-block  img-fluid" alt="...">
              </div>
              <div class="col-3">
                <img src="/public/img/clientes/spa_edy-mafra.png" class="d-block   img-fluid" alt="...">
              </div>
              <div class="col-3">
                <img src="/public/img/clientes/technicalmed-logo.png" class="d-block  img-fluid" alt="...">
              </div>
              <div class="col-3">
                <img src="/public/img/clientes/tudo no espeto.jpg" class="d-block  img-fluid" alt="...">
              </div>
            </div>
          </div>
        </div>

        <button class="carousel-control-prev" type="button" data-bs-target="#carousel-column" data-bs-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carousel-column" data-bs-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Next</span>
        </button>

      </div>
    </div>

    <div id="carousel-mobile" class="carousel slide " data-bs-ride="carousel">
      <div class="carousel-indicators">
        <button type="button" data-bs-target="#carousel-mobile" data-bs-slide-to="0" class="indicadores active" aria-current="true" aria-label="Slide 1"></button>
        <button type="button" data-bs-target="#carousel-mobile" data-bs-slide-to="1" class="indicadores" aria-label="Slide 2"></button>
        <button type="button" data-bs-target="#carousel-mobile" data-bs-slide-to="2" class="indicadores" aria-label="Slide 3"></button>
        <button type="button" data-bs-target="#carousel-mobile" data-bs-slide-to="3" class="indicadores" aria-label="Slide 3"></button>
        <button type="button" data-bs-target="#carousel-mobile" data-bs-slide-to="4" class="indicadores" aria-label="Slide 3"></button>
        <button type="button" data-bs-target="#carousel-mobile" data-bs-slide-to="5" class="indicadores" aria-label="Slide 3"></button>
        <button type="button" data-bs-target="#carousel-mobile" data-bs-slide-to="6" class="indicadores" aria-label="Slide 3"></button>
        <button type="button" data-bs-target="#carousel-mobile" data-bs-slide-to="7" class="indicadores" aria-label="Slide 3"></button>
        <button type="button" data-bs-target="#carousel-mobile" data-bs-slide-to="8" class="indicadores" aria-label="Slide 3"></button>
        <button type="button" data-bs-target="#carousel-mobile" data-bs-slide-to="9" class="indicadores" aria-label="Slide 3"></button>
        <button type="button" data-bs-target="#carousel-mobile" data-bs-slide-to="10" class="indicadores" aria-label="Slide 3"></button>
        <button type="button" data-bs-target="#carousel-mobile" data-bs-slide-to="11" class="indicadores" aria-label="Slide 3"></button>

      </div>
      <div class="carousel-inner">
        <div class="carousel-item active">
          <img src="/public/img/clientes/ceramica.jpg" class="d-block  img-fluid" alt="...">
        </div>

        <div class="carousel-item">
          <img src="/public/img/clientes/compararseguroviagem.png" class="d-block   img-fluid" alt="...">
        </div>
        <div class="carousel-item">
          <img src="/public/img/clientes/Dri_Rausch.jpg" class="d-block  img-fluid" alt="...">
        </div>
        <div class="carousel-item">
          <img src="/public/img/clientes/GrupPrestarh.jpg" class="d-block  img-fluid" alt="...">
        </div>
        <div class="carousel-item">
          <img src="/public/img/clientes/logo-audaliano-santos.jpg" class="d-block  img-fluid" alt="...">
        </div>
        <div class="carousel-item">
          <img src="/public/img/clientes/logo-rede-saude.jpg" class="d-block   img-fluid" alt="...">
        </div>
        <div class="carousel-item">
          <img src="/public/img/clientes/logobeltfit.png" class="d-block img-fluid" alt="...">
        </div>
        <div class="carousel-item">
          <img src="/public/img/clientes/pd_ardwood.png" class="d-block   img-fluid" alt="...">
        </div>
        <div class="carousel-item">
          <img src="/public/img/clientes/shitake.jpg" class="d-block  img-fluid" alt="...">
        </div>
        <div class="carousel-item">
          <img src="/public/img/clientes/spa_edy-mafra.png" class="d-block   img-fluid" alt="...">
        </div>
        <div class="carousel-item">
          <img src="/public/img/clientes/technicalmed-logo.png" class="d-block  img-fluid" alt="...">
        </div>
        <div class="carousel-item">
          <img src="/public/img/clientes/tudo no espeto.jpg" class="d-block  img-fluid" alt="...">
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carousel-mobile" data-bs-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carousel-mobile" data-bs-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Next</span>
        </button>
      </div>

    </div>
  </div>






  <!--Apresentação-->
  <div class="container">
    <div class="col-12">
      <div id="texto-apresentacao" data-anima="topDown">
        <div id="slide-apresentacao" class="carousel slide carousel-fade" data-bs-ride="carousel">
          <div class="carousel-inner">
            <div class="carousel-item active " data-bs-interval="3000">
              <p>
              <h3>Ajudamos empresas a transformar ideias </h3>
              <p class="dinamico">em Estratégia!</p>
              </p>
            </div>
            <div class="carousel-item" data-bs-interval="3000">
              <p>
              <h3>Ajudamos empresas a transformar ideias </h3>
              <p class="dinamico">em resultados!</p>
              </p>
            </div>
            <div class="carousel-item" data-bs-interval="3000">
              <p>
              <h3>Ajudamos empresas a transformar ideias </h3>
              <p class="dinamico">em soluções!</p>
              </p>
            </div>
          </div>

        </div>
      </div>
    </div>
  </div>




  <!--Mapa-->
  <div id="mapa">
    <div class="container">
      <div class="row">
        <div class="col-12" data-anima="topDown">
          <h3>Localização</h3>
        </div>
      </div>
    </div>
  </div>

  <iframe src="https://www.google.com/maps/embed?pb=!1m19!1m8!1m3!1d7501.965169433591!2d-43.9133631!3d-19.9251387!3m2!1i1024!2i768!4f13.1!4m8!3e6!4m0!4m5!1s0xa69985a67a513f%3A0xcc30c6d047cb86f8!2sRua%20Maestro%20Del%C3%AA%20Andrade%2C%20664%20-%20Santa%20Efig%C3%AAnia%20Belo%20Horizonte%20-%20MG%2030240-590!3m2!1d-19.925138699999998!2d-43.9133631!5e0!3m2!1spt-BR!2sbr!4v1652985206343!5m2!1spt-BR!2sbr" loading="lazy" referrerpolicy="no-referrer-when-downgrade">
  </iframe>

  <!-- Google Tag Manager (noscript) -->
  <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-544RQ33" height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
  <!-- End Google Tag Manager (noscript) -->
  </body>

  <?php require __DIR__ . '/view/layouts/Footer.php'; ?>

  <script src="./public/js/particles/particles.js"></script>
  <!--Primeiro-->
  <script src="./public/js/particles/app.js"></script>
  <!--Segundo-->
  <!-- Scripts-->
  <script type="text/javascript" src="public/js/script.js"></script>

  <script>
  $().ready(function() {
    setTimeout(function () {
      $('.alert').hide(); // "foo" é o id do elemento que seja manipular.
    }, 5000); // O valor é representado em milisegundos.
  });
</script>