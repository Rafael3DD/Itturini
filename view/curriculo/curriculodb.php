<?php 
    require_once '../rotas/config.php';
    session_start();

$codigoVaga = empty($_POST['codigoVaga']) ? 'null' : (int) $_POST['codigoVaga'];

/*Dados pessoais*/
$nome = $_POST["nome"];

$cpf = apena_num($_POST["document_number"]);
$email = $_POST["email"];
$telefone = apena_num($_POST["telefone"]);
$dt_nascimento = $_POST["dt_nascimento"];
$sexo =  $_POST["genero"];
$estadocivil = $_POST['estadoCivil'];
$filhos = $_POST["filhos"];
$pcd = $_POST["pcd"];
$cep = apena_num($_POST["cep"]);
$endereco = $_POST["logradouro"];
$numcasa = $_POST["numero"];
$complemento = $_POST["complemento"];
$bairro = $_POST["bairro"];
$cidade = strtoupper($_POST["cidade"]);
$estado = strtoupper($_POST["estado"]);


//Pegando dados tabela curso
if(isset($_POST["nomeCurso"])){
    $nomeCurso  = $_POST["nomeCurso"];
}
$cursoInicio = $_POST["cursoInicio"];
$cursoFim = $_POST["cursoFim"];


//curriculo
$apresentacao  = $_POST["apresentacao"]; 
$habilidades = $_POST["habilidades"]; 
$experiencia = $_POST["experiencia"]; 
$formacaoAcademica = $_POST["formacaoAcademica"];
$formacaoInicio = $_POST["formacaoInicio"];
$formacaoConclusao = $_POST["formacaoConclusao"];
$formacaoComplemento = $_POST["formacaoComplemento"];

//Certificados
//$CertificadoAdd = $_POST["CertificadoAdd"];

/*Historico profissional*/
$empresa = $_POST["empresa"];
$cargo = $_POST["cargo"];
$atribuicoes = $_POST["atribuicoes"];
$entrada = $_POST["entrada"];
$saida = $_POST["saida"];
$motivoSaida = $_POST["motivosaida"];
$salario = $_POST["salario"];
$referencia = apena_num($_POST["referencia"]);

$profissao = $_POST["profissao"];

echo "Nome: ".$nome."<br>".
"cpf: ".$cpf ."<br>".
"email: ".$email."<br>".
"telefone: ".$telefone."<br>".
"dt_nascimento: ".$dt_nascimento."<br>".
"sexo: ".$sexo."<br>".
"estadocivil: ".$estadocivil."<br>".
"filhos: ".$filhos."<br>".
"pcd: ".$pcd ."<br>".
"cep: ".$cep."<br>".
"endereco: ".$endereco."<br>".
"numcasa: ".$numcasa."<br>".
"complemento: ".$complemento."<br>".
"bairro: ".$bairro."<br>".
"cidade: ".$cidade."<br>".
"estado: ".$estado."<br>".

//"Certificados: ".$CertificadoAdd."<br>".
//curriculo
"Apresentação: " .$apresentacao."<br>".
"habilidades: " .$habilidades."<br>".
"experiencia: " .$experiencia."<br>".
//formaçao Academica
"formaçao Academica: ".$formacaoAcademica."<br>".
"formacaoInicio: ".$formacaoInicio."<br>".
"formacaoConclusao: ".$formacaoConclusao."<br>".
"Formacao Complemento: ".$formacaoComplemento."<br>".
//Hitorico profissional
"empresa: ".$empresa."<br>".
"cargo: ".$cargo."<br>".
"atribuicoes: ".$atribuicoes."<br>".
"entrada: ".$entrada ."<br>".
"saida: ".$saida."<br>".
"motivoSaida: ".$motivoSaida ."<br>".
"salario: ".$salario."<br>".
"referencia: ".$referencia."<br>".
"codigoVaga: ".$codigoVaga."<br>".
"profissão: ".$profissao."<br>";


$sql_curriculo = "INSERT INTO curriculo(nome,cpf,email,contato,dt_nascimento,sexo,estadocivil,filhos,PCD,cep,
logradouro,numero_casa,complemento,bairro,cidade,UF_estado,apresentacao,habilidades,experiencia,formacao_academica,
formacao_inicio,formacao_conclusao,formacao_complemento,profissao)
values('$nome', '$cpf', '$email', '$telefone', '$dt_nascimento', '$sexo', '$estadocivil', '$filhos', '$pcd', 
$cep, '$endereco','$numcasa', '$complemento', '$bairro', '$cidade', '$estado', '$apresentacao', '$habilidades', '$experiencia', '$formacaoAcademica',
'$formacaoInicio', '$formacaoConclusao', '$formacaoComplemento','$profissao')";
if($conexao -> query($sql_curriculo)===true){
    $_SESSION['curriculo_enviado'] = true; //mensagem de sucesso
}else{
    echo "Error: " . $sql_curriculo . "<br>" . $conexao->error;
}


header('Location: /home');
exit();
$conexao->close();

function apena_num($num){
    $val = preg_replace('/[^0-9]/', '', $num);
    return $val;
}


?>