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
        
        
  <script src="https://kit.fontawesome.com/f1adbfc707.js" crossorigin="anonymous"></script>
  
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

  <link rel="stylesheet" href="/public/css/painel.css">
  <link rel="stylesheet" href="/public/css/vagas.css">
</head>


  <div class="col-md-2 pl-0 pr-0 menu-lateral " id="add-acvive">
   
    
    <div class="d-flex flex-column flex-shrink-0 p-3 text-white">

      <ul class="nav nav-pills flex-column mb-auto">
        <div id="nomeusuario">
          <span>Bem vindo <strong><?php echo $_SESSION['nome']; ?></strong></span>
        </div>
        <li class="nav-item">
          <a href="/admin" class="nav-link text-white" aria-current="page">
            <i class="fa-solid fa-house"></i>
            <span>Home</span>
          </a>
        </li>

        <!--<li class="nav-item">
          <a href="/painelVaga" class="nav-link text-white" aria-current="page">
            <i class="fa-solid fa-address-book"></i>
            <span>Vagas</span>
          </a>
        </li>-->

        <li>
          <a href="/painelCurriculo" class="nav-link text-white">
            <i class="fa-solid fa-file-lines"></i>
            <span>Currículos</span>
          </a>
        </li>
        <!-- <li>
          <a href="/buscaAvancada" class="nav-link text-white">
            <i class="fa-solid fa-user-doctor"></i>
            <span>Profissionais</span>
          </a>
        </li>-->
       

        <li>
          <a href="/painelUsuarios" class="nav-link text-white">
            <i class="fa-solid fa-user"></i>
            <span>Usuários</span>
          </a>
        </li>

        <li>
          <a href="/nivelAcesso" class="nav-link text-white">
            <i class="fa-solid fa-user"></i>
            <span>Nível de Acesso</span>
          </a>
        </li>

        <li>
          <a href="/sair" class="nav-link text-white">
            <i class="fa-solid fa-arrow-right-from-bracket"></i>
            <span>Sair</span>
          </a>
        </li>

      </ul>
      <hr>
    </div>
  </div>


  <script>
      v = true;
      const btnSidebar = document.getElementById('sidebar-btn');
      const menulateral = document.getElementById('add-acvive');

      btnSidebar.addEventListener('click', ()=> 
      {
        if(v){
          menulateral.classList.add('active')
        }else{
          menulateral.classList.remove('active')

        }
        v = !v;
      }

      )
  </script>