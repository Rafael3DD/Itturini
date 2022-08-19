
<?php 
    session_start();
    require __DIR__ . '/../layouts/Header.php';
?>

<link rel="stylesheet" type="text/css" href="/public/css/login.css">

<!--Credenciais erradas-->
<?php 
    if(isset($_SESSION['error_user'])):
?>
    <div class="alert alert-danger text-center w-50 mx-auto" role="alert">
        <p>Email ou senha errada!</p>
    </div>
<?php
    endif;
    unset($_SESSION['error_user']);
?>


<!--User expirado-->
<?php 
    if(isset($_SESSION['expirou'])):
?>
    <div class="alert alert-danger text-center w-50 mx-auto" role="alert">
        <p>Usuário Expirado!</p>
    </div>
<?php
    endif;
    unset($_SESSION['expirou']);
?>


<!--Senha alterada-->
<?php
    if(isset($_SESSION['recuperacao'])):
?>
<div class="alert alert-success text-center w-50 mx-auto" role="alert">
    <p>Senha alterada com sucesso!</p>
</div>
<?php
    endif;
    unset($_SESSION['recuperacao']);
?>

<!--Erro ao alterar senha-->
<?php
    if(isset($_SESSION['falha'])):
?>
<div class="alert alert-danger text-center w-50 mx-auto" role="alert">
    <p>Alteração de senha expirada, tente novamente.</p>
</div>
<?php
    endif;
    unset($_SESSION['falha']);
?>

<!--Mensagem de sucesso do cadastro -->
<?php 
    if(isset($_SESSION['status_cadastro'])):
?>
    <div class="alert alert-success text-center w-50 mx-auto" role="alert">
        <p>Cadastrado com sucesso!</p>
    </div>
<?php
    endif;
    unset($_SESSION['status_cadastro']);
?>

<div class="card w-50" id="login">
    <h2>Login</h2>
    <div class="card-body">
        <form action="/view/rotas/login_db.php" method="POST">
        
            <label  for="email">email</label>
            <div class="inputIcon">
                <input class="form-control" type="email" id="email" name="email" placeholder="E-mail" required>
                <i class="fas fa-user-alt" aria-hidden="true"></i>
            </div>

            
            <label  for="senha">Senha</label>
            <div class="inputIcon">
                <input class="form-control" type="password"  id="senha" name="senha" placeholder="Senha" required>     
                <i class="fas fa-lock"></i>
            </div>

            <div class="text-center mt-3">
                <button type="submit" id="logar" name="logar">Logar</button>
            </div>

            <div id="recuperar-senha">
                <a href="/recuperarSenha/" class="btn" >Recuperar senha</a>     
                <a href="/cadastrar" class="btn" >cadastre-se</a>     
            </div>

        </form>

    </div>
</div>

<script>
    $().ready(function() {
	setTimeout(function () {
		$('.alert').hide(); // "foo" é o id do elemento que seja manipular.
	}, 5000); // O valor é representado em milisegundos.
    });
</script>


<?php 
   require __DIR__ . '/../layouts/Footer.php';
?>