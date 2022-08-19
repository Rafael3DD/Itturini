<?php
if (!isset($_SESSION)) {
    session_start();
}

// se não existir a sessão retorna para a página de login
include('../../rotas/verificaLogin.php');
include('../../rotas/Eadmin.php');

require __DIR__ . '/../../layouts/Header.php';

?>

    <div class="container-fluid">
        <div class="row">

            <!--Painel Horizontal-->
            <?php require __DIR__ .'/../../layouts/headerPainel.php';?>

            <div class="col-md-10 mt-4 mb-4 mx-auto">

                <div id="btnAcao" >
                    <a href="/cadastrarUsuario" class="col-3"><button id="btnCadastrar">Cadastrar Usuário</button></a>
                    <a href="/listarUsuarios"><button id="listarVaga">Listar Usuário</button></a>
                </div>
    
            </div>
        </div>
    </div>

 
<?php
    require __DIR__ . '/../../layouts/Footer.php';
?>