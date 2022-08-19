<?php 
if (!isset($_SESSION)) {
    session_start();
}
// se não existir a sessão retorna para a página de login
include('../../rotas/verificaLogin.php');

require_once '../../rotas/config.php';



$emailBanco = $_GET['email'];

$userCodigo = intval($_GET['codigo']);
$sql = "SELECT *FROM usuario WHERE id=".$userCodigo;
$executa = $conexao -> query($sql) or die ($conexao -> error);
$usuario = $executa -> fetch_assoc();

if(isset($_POST['btn-registrar'])){
    

//nome
if(isset($_POST['nome'])){
    $nome = mysqli_real_escape_string($conexao, trim($_POST['nome']));
    //echo $nome;
}
//email
if(isset($_POST['email'])){

    $email =  mysqli_real_escape_string($conexao, trim($_POST['email']));
    if($emailBanco != $email){

        //verifica se existe o email no banco
        $sql = "select count(*) as total from usuario where email = '$email'";
        $result = mysqli_query($conexao,$sql);
        $row = mysqli_fetch_assoc($result);

        if($row['total'] == 1){ //Verifica se o usuario existe
            $_SESSION['email_existe'] = true; 
            header('Location: /listarUsuarios');
            exit;
        }

    }
}

//eAdmin
if(isset($_POST['eAdmin'])){
    $eAdmin = mysqli_real_escape_string($conexao, trim($_POST['eAdmin']));
}

//senha
$senha = '';
if(isset($_POST['senha'])){
    $senha =  mysqli_real_escape_string($conexao, trim($_POST['senha']));

}
//senha2
$senha2 = '';
if(isset($_POST['senha2'])){
    $senha2 =  mysqli_real_escape_string($conexao, trim($_POST['senha2']));
}



$sql = "UPDATE usuario set";
if(isset($_POST['nome'])){
    if($nome != ''){
        $sql .=" nome= '$nome'";
    }
}
if(isset($_POST['email'])){
    if($email != ''){
        $sql .=" , email='$email'";
    }
}

if(isset($_POST['eAdmin'])){
    if($eAdmin != ''){
        $sql .=" , eAdmin='$eAdmin'";
    }
}

if(isset($_POST['senha'])){
    if($senha == $senha2 && $senha != ''){
        //criptografar senhas
        $criptSenha = password_hash($senha, PASSWORD_DEFAULT);
        
        //passa a senha criptografada
        $senha = $criptSenha;
    
        $sql .=" , senha='$senha'";
    }
}

    $sql .= " WHERE id = ".$userCodigo;

    
    $confirma = $conexao->query($sql) or die ($conexao -> error);

    if($confirma){
        $_SESSION['vaga_editada'] = true; 
        $_SESSION['nome_edit'] = $nome;
    }
    $conexao->close();
    header('Location:/listarUsuarios');
    exit;
}
require __DIR__ . '../../../layouts/Header.php';
?>
<link rel="stylesheet" href="/assets/css/painel.css">
    <div class="container-fluid">
        <div class="row">

            <!--Painel Horizontal-->
            <?php require __DIR__ .'/../../layouts/headerPainel.php';?>
            

                <div class="col-md-10 mt-4">
               
                <a href="/listarUsuarios"><button class="btn" id="button-voltar"><i class="fa-solid fa-arrow-left"></i> voltar</button></a>

                <?php 
                    if(isset($_SESSION['senha_diferente'])):
                ?>
                    <div class="alert alert-danger w-50 mx-auto text-center" role="alert">
                        <p>Senhas diferentes!</p>
                    </div>
                <?php
                    endif;
                    unset($_SESSION['senha_diferente']);
                   
                ?>

                    <div class="card w-50" id="cadastro">
                        <h4>Editar Usuário</h4>
                        <div class="card-body" >
                            <form action="" method="POST">
                                <label class="" for="nome">Nome</label>
                                <input class="form-control" type="text" id="nome" name="nome" placeholder="Nome" value="<?php echo $usuario['nome']?>">

                                <label class="" for="email">E-mail</label>
                                <input class="form-control" type="email" id="email" name="email" placeholder="E-mail" value="<?php echo $usuario['email']?>">

                                
                                <label class="" for="eAdmin">Admin</label>
                                <select class="form-control" name="eAdmin" id="eAdmin">
                                    <option   <?= ($usuario['eAdmin'] == 0)?'selected':''?> value="0">Não</option>
                                    <option  <?= ($usuario['eAdmin'] == 1)?'selected':''?> value="1">sim</option>
                                </select>
                                
                                <div class="text-center">
                                    <button type="button" name="btn-novaSenha" onclick="mostraDivsenha()" id="btn-novaSenha">Alterar senha</button>
                                </div>

                                <!--esconder div nova senha-->
                                <div id="novaSenha">
                                    <label class="" for="senha">Nova Senha</label>
                                    <input class="form-control" type="password" id="senha" name="senha" placeholder="senha">
                                    
                                    <label class="" for="senha2">Repita a nova senha</label>
                                    <input class="form-control" type="password" id="senha2" name="senha2" placeholder="Repita a senha">
                                </div>

                                <div class="text-center">
                                    <button type="submit" name="btn-registrar" id="btn-registrar">Editar</button>
                                </div>
                            </form>

                        </div>
                    </div>
                </div>
        </div>
    </div>
<?php
    require __DIR__ . '/../../layouts/Footer.php';
?>

<script>
    ativo = false;
    function mostraDivsenha(){
       ativo = !ativo;
       divSenha = document.getElementById('novaSenha');
       if(ativo){
           divSenha.style.display = "block"
           document.getElementById('senha').value = ''
           document.getElementById('senha2').value = ''
       }else{
           divSenha.style.display = "none"
       }
    }
</script>