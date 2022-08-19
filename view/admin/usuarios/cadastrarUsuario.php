<?php
if (!isset($_SESSION)) {
    session_start();
}

// se não existir a sessão retorna para a página de login
include('../../rotas/verificaLogin.php');


require_once '../../rotas/config.php';

require __DIR__ . '/../../layouts/Header.php';
?>
    <div class="container-fluid">
        <div class="row">

            <!--Painel Horizontal-->
            <?php require __DIR__ .'/../../layouts/headerPainel.php';?>

            <div class="col-md-10 mt-4">
          
            <a href="/painelUsuarios"><button class="btn" id="button-voltar"><i class="fa-solid fa-arrow-left"></i> voltar</button></a>

            <!--Mensagem de erro email-->
            <?php
                if(isset($_SESSION['email_existe'])):
            ?>
                <div class="alert alert-danger w-50 mx-auto text-center" role="alert">
                    <p>E-mail já cadastrado!</p>
                </div>
            <?php
            endif;
            unset($_SESSION['email_existe']);
            ?>

            <!--Senhas diferentes-->
            <?php
                if(isset($_SESSION['senha_diferente'])):
            ?>
                <div class="alert alert-danger w-50 mx-auto text-center" role="alert">
                    <p>As senhas precisam ser iguais!</p>
                </div>
            <?php
            endif;
            unset($_SESSION['senha_diferente']);
            ?>

            <div class="card w-50" id="cadastro">
                <h4>Novo Usuário</h4>
                <div class="card-body" >
                    <form action="/cadastrarUsuariodb" method="POST" id="cadastrar">
                        <label class="" for="nome">Nome</label>
                        <input class="form-control" onkeyup="mascara_nome()" maxlength="30" type="text" id="nome" name="nome" placeholder="Nome" required>
                        <div id="nomeErro"></div>

                        <label class="" for="sobrenome">Sobrenome</label>
                        <input class="form-control" onkeyup="mascara_nome()" maxlength="30" type="text" id="sobrenome" name="sobrenome" placeholder="sobrenome"required>
                        <div id="sobrenomeErro"></div>

                        <label class="" for="email">E-mail</label>
                        <input class="form-control" maxlength="60"  type="email" id="email" name="email" placeholder="E-mail"required>
                        <div id="emailErro"></div>

                        <label class="" for="senha">Senha</label>
                        <input class="form-control" maxlength="255" autocomplete="off" type="password" id="senha" name="senha" placeholder="senha"required>
                        
                        <label class="" for="senha2">Repita a senha</label>
                        <input class="form-control" maxlength="255"  autocomplete="off" type="password" id="senha2" name="senha2" placeholder="Repita a senha"required>
                        <div id="senhaErro"></div>

                        <label class="" for="eAdmin">Admin</label>
                        <select class="form-control" name="eAdmin" id="eAdmin">
                            <option selected value="0">Não</option>
                            <option value="1">sim</option>
                        </select>
                        <div class="text-center">
                            <button type="submit"  name="btn-registrar" id="btn-registrar">Registrar</button>
                        </div>
                    </form>
                </div>
                <div id="senhaReq" class="mt-3 pb-4">
                A senha precisa conter  :
                <ul>
                    <li> ao menos 1 letra <strong>maiúscula</strong></li>
                    <li> ao menos 1 caractere especial <strong>(! @ # $ % ^ & * () - _ )</strong></li>
                    <li> ao menos 8 <strong>caracteres</strong></li>
                    <li> Ex: <strong>Pablo#85</strong></li>
                </ul>
            </div>
            </div>
            
            
        </div>
    </div>
    </div>
 
<?php
    require __DIR__ . '/../../layouts/Footer.php';
?>



<script>
function mascaraNome(v){
    v = v.replace(/[0-9!@#¨$%^&*)(+=._-]+/g, "");
    return v; 
}
function mascara_nome(){
    var nome = document.getElementById('nome');
    var sobrenome = document.getElementById('sobrenome')
    nome.value = mascaraNome(nome.value);
    sobrenome.value = mascaraNome(sobrenome.value);
}



function validaEmail(){
    var email = document.getElementById('email');

    if(email.value == ""){
        email.classList.add("errorInput");
    }else{
        email.classList.remove("errorInput");
    }

    if(email.value.indexOf("@")== -1 || email.value.indexOf(".")== -1 || 
       email.value.indexOf(".") - email.value.indexOf("@") == 1){
       email.classList.add("errorInput");
       return false;
    }else{
        email.classList.remove("errorInput");
        return true;
    }

    
}

function validaSenha(){
    var letrasMaiusculas = /[A-Z]/;
    var caracteresEspeciais = /[!|@|#|$|%|^|&|*|(|)|-|_]/;
    var senha  = document.getElementById('senha');
    var senha2 = document.getElementById('senha2');
    conf = false;
    if(caracteresEspeciais.test(senha.value) && letrasMaiusculas.test(senha.value) && senha.value.length >=8){
        console.log("Pode avançar")
        senha.classList.remove("errorInput");  
        conf= true
    }else{
        //console.log("Senha precisa conter 1 letra maiúscula, 1 caractere especial e pelo menos 8 caracteres");
        senha.classList.add("errorInput");  
        conf= false;
    }
    
    if( senha2.value == senha.value && conf){
        senha2.classList.remove("errorInput");  
        return true;
    }else{
        senha2.classList.add("errorInput");  
        return false;
    }
    
}


$("#btn-registrar").click((e) => {
    e.preventDefault();
   
    //Valida nome
    nomeok =false; sobrenomeok =false;
    if($("#nome").val() == ""){
        $("#nomeErro").html('<p class="texto-erro">Campo vazio</p>');
        $("#nome").toggleClass('errorInput');
    }else{
        $("#nomeErro").html('<p class="texto-erro"></p>'); //Remove a mensagem de erro   
        $("#nome").removeClass('errorInput');
        nomeok = true;
    }

    //valida sobrenome
    if($("#sobrenome").val() == ""){
        $("#sobrenomeErro").html('<p class="texto-erro">Campo vazio</p>');
        $("#sobrenome").toggleClass('errorInput');
    }else{
        $("#sobrenomeErro").html('<p class="texto-erro"></p>'); //Remove a mensagem de erro   
        $("#sobrenome").removeClass('errorInput');
        sobrenomeok = true;
    }


    if(validaEmail()){
        console.log("avançar para senha");
        $("#emailErro").html('<p class="texto-erro"></p>');//Remove a mensagem de erro   
    }else{
       $("#emailErro").html('<p class="texto-erro">Digite um e-mail válido!</p>');   
       console.log("Erroaqui");
    }
    
    if(validaSenha()){
        console.log("avançar")
        $("#senhaErro").html("<p class='texto-erro'></p>")   //Remove a mensagem de erro
        
    }else{
        $("#senhaErro").html("<p class='texto-erro'> A senha precisa conter 1 letra maiúscula , 1 caractere especial e pelo menos 8 dígitos</p>")
    }
    if(validaEmail() && validaSenha() && nomeok && sobrenomeok){
       $("#cadastrar").submit();
    }
})

//esconde a mensagem
$().ready(function() {
	setTimeout(function () {
		$('.alert').hide(); // "foo" é o id do elemento que seja manipular.
	}, 3000); // O valor é representado em milisegundos.
    });
    
</script>

