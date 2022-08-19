<link rel="stylesheet" href="/public/css/temas.css">

<?php

include '../rotas/config.php';

if(isset($_GET['cod'])){
    $codigo = $_GET['cod'];
    $sql = "SELECT * FROM tema where codigo = $codigo";
    $buscar = $conexao->query($sql) or die($conexao->error);
    $dados = mysqli_fetch_assoc($buscar);
}else{
    header('Location:/temas');
}
session_start();
if($codigo != $dados['codigo'] || empty($_GET['cod'])){
    header('Location:/temas');
}

require __DIR__ . '/../layouts/Header.php';
?>

<div id="img-tema" class="text-center">
    <h1><?=$dados['titulo']?></h1>

    <div id="tema-escolhido">
        <img src="/public/img/screenshot.jpg" alt="">
        <a href="#" class="btn btn-success mb-2">Escolher</a>
    </div>
</div>

<?php
require __DIR__ . '/../layouts/Footer.php';
?>