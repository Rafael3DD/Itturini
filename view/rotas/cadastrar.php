<?php
session_start();
require __DIR__ . '/../layouts/Header.php';
?>
<link rel="stylesheet" type="text/css" href="/public/css/login.css">
<!--Mensagem de erro email-->
<?php
if (isset($_SESSION['email_existe'])) :
?>
    <div class="alert alert-danger w-50 mx-auto" role="alert">
        <p>E-mail já cadastrado!</p>
    </div>
<?php
endif;
unset($_SESSION['email_existe']);
?>

<!--Senhas diferentes-->
<?php
if (isset($_SESSION['senha_diferente'])) :
?>
    <div class="alert alert-danger w-50 mx-auto" role="alert">
        <p>As senhas precisam ser iguais!</p>
    </div>
<?php
endif;
unset($_SESSION['senha_diferente']);
?>

<div class="card w-50" id="login">
    <h2>Registre-se</h2>

    <div class="card-body" id="cadastro">
        <form action="/cadastrar_db" method="POST" id="cadastrar">
            <label class="" for="nome">Nome</label>
            <input class="form-control" onkeyup="mascara_nome()" maxlength="30" type="text" id="nome" name="nome" placeholder="Nome">
            <div id="nomeErro"></div>

            <label class="" for="sobrenome">Sobrenome</label>
            <input class="form-control" maxlength="30" onkeyup="mascara_nome()" type="text" id="sobrenome" name="sobrenome" placeholder="sobrenome">
            <div id="sobrenomeErro"></div>

            <label class="" for="email">E-mail</label>
            <input class="form-control" type="email" maxlength="60" id="email" name="email" placeholder="E-mail">
            <div id="emailErro"></div>

            <label class="" for="senha">Senha</label>
            <input class="form-control" type="password" maxlength="255" id="senha" name="senha" placeholder="senha">

            <label class="" for="senha2">Repita a senha</label>
            <input class="form-control" type="password" maxlength="255" id="senha2" name="senha2" placeholder="Repita a senha">
            <div id="senhaErro"></div>

            <div class="text-center">
                <button type="submit" id="logar" name="cadastrar">Registrar-se</button>
            </div>
        </form>

        <div id="senhaReq" class="mt-3">
            A senha precisa conter :
            <ul>
                <li> ao menos 1 letra <strong>maiúscula</strong></li>
                <li> ao menos 1 caractere especial <strong>(! @ # $ % ^ & * () - _ )</strong></li>
                <li> ao menos 8 <strong>caracteres</strong></li>
                <li> Ex: <strong>Pablo#85</strong></li>
            </ul>
        </div>
    </div>

</div>

<?php
require __DIR__ . '/../layouts/Footer.php';
?>

<script>
    function mascaraNome(v) {
        v = v.replace(/[0-9!@#¨$%^&*)(+=._-]+/g, "");
        return v;
    }

    function mascara_nome() {
        var nome = document.getElementById('nome');
        var sobrenome = document.getElementById('sobrenome')
        nome.value = mascaraNome(nome.value);
        sobrenome.value = mascaraNome(sobrenome.value);
    }

    function validaEmail() {
        var email = document.getElementById('email');

        if (email.value == "") {
            email.classList.add("errorInput");
        } else {
            email.classList.remove("errorInput");
        }

        if (email.value.indexOf("@") == -1 || email.value.indexOf(".") == -1 ||
            email.value.indexOf(".") - email.value.indexOf("@") == 1) {
            email.classList.add("errorInput");
            return false;
        } else {
            email.classList.remove("errorInput");
            return true;
        }
    }

    function validaSenha() {
        var letrasMaiusculas = /[A-Z]/;
        var caracteresEspeciais = /[!|@|#|$|%|^|&|*|(|)|-|_]/;
        var senha = document.getElementById('senha');
        var senha2 = document.getElementById('senha2');
        conf = false;
        if (caracteresEspeciais.test(senha.value) && letrasMaiusculas.test(senha.value) && senha.value.length >= 8) {
            console.log("Pode avançar")
            senha.classList.remove("errorInput");
            conf = true
        } else {
            //console.log("Senha precisa conter 1 letra maiúscula, 1 caractere especial e pelo menos 8 caracteres");
            senha.classList.add("errorInput");
            conf = false;
        }

        if (senha2.value == senha.value && conf) {
            senha2.classList.remove("errorInput");
            return true;
        } else {
            senha2.classList.add("errorInput");
            return false;
        }

    }


    $("#logar").click((e) => {
        e.preventDefault();

        //Valida nome
        nomeok = false;
        sobrenomeok = false;
        if ($("#nome").val() == "") {
            $("#nomeErro").html('<p class="texto-erro">Campo vazio</p>');
            $("#nome").toggleClass('errorInput');
        } else {
            $("#nomeErro").html('<p class="texto-erro"></p>'); //Remove a mensagem de erro   
            $("#nome").removeClass('errorInput');
            nomeok = true;
        }

        //valida sobrenome
        if ($("#sobrenome").val() == "") {
            $("#sobrenomeErro").html('<p class="texto-erro">Campo vazio</p>');
            $("#sobrenome").toggleClass('errorInput');
        } else {
            $("#sobrenomeErro").html('<p class="texto-erro"></p>'); //Remove a mensagem de erro   
            $("#sobrenome").removeClass('errorInput');
            sobrenomeok = true;
        }

        if (validaEmail()) {
            console.log("avançar para senha");
            $("#emailErro").html('<p class="texto-erro"></p>'); //Remove a mensagem de erro   
        } else {
            $("#emailErro").html('<p class="texto-erro">Digite um e-mail válido!</p>');
            console.log("Erroaqui");
        }

        if (validaSenha()) {
            console.log("avançar")
            $("#senhaErro").html("<p class='texto-erro'></p>") //Remove a mensagem de erro

        } else {
            $("#senhaErro").html("<p class='texto-erro'> A senha precisa conter 1 letra maiúscula , 1 caractere especial e pelo menos 8 dígitos</p>")
        }
        if (validaEmail() && validaSenha()) {

            $("#cadastrar").submit();
        }
    })


    $().ready(function() {
        setTimeout(function() {
            $('.alert').hide(); // "foo" é o id do elemento que seja manipular.
        }, 3000); // O valor é representado em milisegundos.
    });
</script>