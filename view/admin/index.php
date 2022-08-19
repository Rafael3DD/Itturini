
<?php 
session_start();

    include('../rotas/verificaLogin.php');
    require __DIR__ .'../../layouts/Header.php';
    require_once '../rotas/config.php';
    date_default_timezone_set('america/sao_paulo'); //pega o horário do brasil
    //Usuarios
    $sql_usuarios = "SELECT  count(*) FROM usuario";
    $executa  = $conexao ->query($sql_usuarios) or die($conexao->error);
    $sql_usuarios = $executa->fetch_assoc();

    //$txtPesquisa = trim((isset($_POST['campoPesquisar'])) ? $_POST['campoPesquisar']: "");
    if($sql_usuarios["count(*)"]>1){
        $sql_usuarios = $sql_usuarios["count(*)"]." Usuários";
    }else{
        $sql_usuarios = $sql_usuarios["count(*)"]." Usuário";
    }
    
    //Curriculos
    $sql_curriculos = "SELECT  count(*) FROM curriculo";
    $executa2 = $conexao  -> query($sql_curriculos) or die ($conexao->error);
    $sql_curriculos = $executa2 -> fetch_assoc();

    if($sql_curriculos["count(*)"]> 1){
        $sql_curriculos = $sql_curriculos["count(*)"]." Currículos Cadastrados";
    }else{
        $sql_curriculos = $sql_curriculos["count(*)"]." Currículo Cadastrado";
    }


    /*Expiracao */
    $sql_user = "SELECT  * FROM usuario WHERE id =".$_SESSION['id'];
    $executa  = $conexao ->query($sql_user) or die($conexao->error);
    $sql_user = $executa->fetch_assoc();
    //echo $sql_user['data_cadastro'];

    $data_user = new DateTime($sql_user['data_cadastro']);
    $val = $data_user -> diff(new DateTime( date('Y-m-d') ) );
    $val = $val -> format( '%d');
?>


<div class="container-fluid">
    <div class="row">
           
            <!--Painel Horizontal-->
            <?php require __DIR__ .'/../layouts/headerPainel.php';?>

            <div class="col-md-10 mt-4 mx-auto"> 
                <div class="row justify-content-center mx-auto">
<!--Não é admin-->
<?php 
    if(isset($_SESSION['naoAdmin'])):
?>
    <div class="alert alert-danger text-center w-50 mx-auto" role="alert">
        <p>Você não possui acesso a essa seção!</p>
    </div>
<?php
    endif;
    unset($_SESSION['naoAdmin']);
?>

                <?php if((15-$val) > 0 ) {?>
                    <div class="msg-expiracao text-center mt-2 mb-2">
                        <h5>Versão teste, expira em <strong><?=(15-$val);
                        (15-$val)> 1? $d = ' dias!': $d = ' dia!';?></strong> <?=$d?> </h5>
                    </div>
                <?php }?>

                <div class="card col-3" id="cards-home">
                    
                    <div class="card-body">
                        <a href="/listarUsuarios">
                            <p><i class="fa-solid fa-user"></i><br>
                            <span><?php echo $sql_usuarios;?></span></p>
                        </a>
                    </div>
                </div>

                <div class="card col-3" id="cards-home">
                    <div class="card-body">
                        <a href="listarCurriculo">
                            <p><i class="fa-solid fa-file-lines"></i><br>
                            <span><?php echo $sql_curriculos;?></span></p>
                        </a>
                    </div>
                </div>

                </div>
            </div>      
        </div>
    </div>

<?php
require __DIR__ . '../../layouts/Footer.php';
?>
<script>
    $().ready(function() {
	setTimeout(function () {
		$('.alert').hide(); // "foo" é o id do elemento que seja manipular.
	}, 5000); // O valor é representado em milisegundos.
    });
</script>