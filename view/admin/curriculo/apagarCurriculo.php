<?php 
if (!isset($_SESSION)) {
    session_start();
}

// se não existir a sessão retorna para a página de login
include('../../rotas/verificaLogin.php');

require_once '../../rotas/config.php';

$codCurriculo = intval($_GET['codigo']);

$sql = "SELECT * FROM curriculo where codigo = ".$codCurriculo;
$buscar = $conexao->query($sql) or die($conexao->error);
$nome = $buscar->fetch_assoc();

//deleta os cursos
$curriculoCurso = "DELETE FROM curriculo_curso where cod_curriculo = '$codCurriculo'";
$confirma = $conexao -> query($curriculoCurso) or die($conexao->error);
    if($confirma == true){
        echo "apagado com sucesso";
    }else{
        echo "erro ao deletar!";
    }

//deleta experiencia
$curriculoExp = "DELETE FROM curriculo_experiencia where cod_curriculo = '$codCurriculo';";
$confirma1 = $conexao -> query($curriculoExp) or die($conexao->error);
if($confirma1 == true){
    echo "apagado com sucesso";
}else{
    echo "erro ao deletar!";
}

//deleta certificados 
$curriculoUp = "DELETE FROM curriculo_upcertificados where cod_curriculo = '$codCurriculo';";
$confirma2 = $conexao -> query($curriculoUp) or die($conexao->error);
if($confirma2 == true){
    echo "apagado com sucesso";
}else{
    echo "erro ao deletar!";
}


//deleta curriculo
$curriculo= "DELETE FROM curriculo where codigo = '$codCurriculo';";
$confirma3 = $conexao -> query($curriculo) or die($conexao->error);
if($confirma3 == true){
    echo "apagado com sucesso";
    $_SESSION['curriculo_deletado'] = true; 
    $_SESSION['nome'] = $nome['nome'];
}else{
    echo "erro ao deletar!";
}


header('Location:listarCurriculo');
exit;

$conexao->close();

?>