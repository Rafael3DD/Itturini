<?php
if (!isset($_SESSION)) {
    session_start();
}

// se não existir a sessão retorna para a página de login
include('../../rotas/verificaLogin.php');

require __DIR__ . '/../../layouts/Header.php';
?>
<!DOCTYPE html>

<head>
   
    <div class="container-fluid">
        <div class="row">

            <!--Painel Horizontal-->
            <?php require __DIR__ .'/../../layouts/headerPainel.php';?>

            <div class="col-md-10 mt-4 mx-auto">
                <div id="btnAcao">
                    <a href="/listarCurriculo"><button id="btnCadastrar">Listar Currículos</button></a> 
                </div>
            </div>

        </div>
    </div>

    <?php
    require __DIR__ . '/../../layouts/Footer.php';
    ?>