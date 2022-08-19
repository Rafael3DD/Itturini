<?php
if (!isset($_SESSION)) {
    session_start();
}

// se não existir a sessão retorna para a página de login
include('../../rotas/verificaLogin.php');

require_once '../../rotas/config.php';

$codusuario = intval($_GET['codigo']);

$sql = "SELECT * FROM usuario where id = ".$codusuario;
$buscar = $conexao->query($sql) or die($conexao->error);
$nome = $buscar->fetch_assoc();


try{
    $deletaUsuario = "DELETE FROM usuario WHERE id =".$codusuario;
    $confirma = $conexao -> query($deletaUsuario) or die ($conexao ->error);
    $_SESSION['usuario_deleta'] = true;
    $_SESSION['nome_user_deletado'] = $nome['nome'];
}catch(Exception $e){
    echo "erro ao deletar!";
}


header('Location:/listarUsuarios');
exit;

$conexao->close();
?>