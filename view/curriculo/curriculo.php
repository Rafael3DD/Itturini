<?php
require __DIR__ . '/../layouts/Header.php';
?>
<link rel="stylesheet" href="/public/css/formulario.css">

<div class="main-tit">
  <div class="container">
    <div class="row">
      <h1>Envie seu currículo</h1>
    </div>
  </div>
</div>

<div class="container" id="topo">
  
  <hr class="divider-separador"><br>
  <div class="col-12">

    <!--Barra de progresso do formulario-->
    <div class="progress mb-4 mt-4" style="height: 20px;">
      <div class="progress-bar progress-bar-striped progress-bar-animated"   role="progressbar" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
    </div>

    <h3>Passo <span id="passo"></span></h3>
    <form action="/curriculodb" method="POST" enctype="multipart/form-data" id="formVaga">
      <div id="step_1" class="step">
        <div class="row">
          <div class="form-group col-12 col-md-6">
            <label for="inputNome">Nome</label>
            <input type="text" onkeyup="mascara_nome()" class="form-control" id="inputNome" name="nome" placeholder="Nome">
          </div>
          <div class="form-group col-12 col-md-6">
            <label for="inputCpf">CPF* <b>Apenas número</b></label>
            <input type="text" onkeyup="mascara_CPF()" class="form-control" id="inputCpf" name="document_number" placeholder="999.999.999-99">
          </div>
          <div class="form-group col-12 col-md-4">
            <label for="inputEmail">E-mail</label>
            <input type="text" class="form-control" id="inputEmail" name="email" placeholder="E-mail">
          </div>
          <div class="form-group col-12 col-md-4">
            <label for="inputTelefone">Telefone</label>
            <input type="text" onkeyup="mascara_telefone()" maxlength="15" placeholder="99 99999-9999" class="form-control" id="inputTelefone" name="telefone" placeholder="Telefone">
          </div>
          <div class="form-group col-12 col-md-4">
            <label for="">Data Nascimento</label>
            <input type="date" class="form-control" onblur="mascara_data()" max="9999-12-31" id="dt_nascimento" name="dt_nascimento" placeholder="Data Nascimento">
          </div>
          <div class="form-group col-12 col-md-3">
            <label for="inputEmail">Sexo</label>
            <select class="form-control" name="genero" id="genero">
              <option value="">Selecione..</option>
              <option value="Feminino">Feminino</option>
              <option value="Masculino">Masculino</option>
              <option value="Não declarado">Não declarado</option>
            </select>
          </div>
          <div class="form-group col-12 col-md-4">
            <label for="inputEstadoCivil">Estado Civil</label>
            <select class="form-control" name="estadoCivil" id="estadoCivil">
              <option value="">Selecione..</option>
              <option value="Solteiro(a)">Solteiro(a)</option>
              <option value="Casado(a)">Casado(a)</option>
              <option value="Divorciado(a)">Divorciado(a)</option>
              <option value="Viúvo(a)">Viúvo(a)</option>
              <option value="Separado(a)">Separado(a)</option>
              <option value="União estável">União estável</option>
              <option value="Indiferente">Indiferente</option>
            </select>
          </div>
          <div class="form-group col-12 col-md-2">
            <label for="">Filhos</label>
            <input type="text" onkeyup="mascara_numero()" id="InputFilhos" name="filhos"class="form-control" placeholder="Quantidade">

          </div>
          <div class="form-group col-12 col-md-3">
            <label for="pcd">PCD</label>
            <input list="deficiencia" autocomplete="off" type="text" onkeyup="mascara_nome()" id="pcd"  name="pcd"class="form-control" placeholder="Nome da deficiência">
            <datalist id="deficiencia">
              <option value="Não tenho">
            </datalist>
          </div>
          <!-- Dados Pessoais -->
          <div class="col-12 col-md-6">
            <div class="form-group">
              <label for="cep">CEP</label>
              <input type="text" onkeyup="mascara_cep()" class="form-control input-cep" name="cep" id="cep" placeholder="CEP">
              <small id="emailHelp" class="form-text text-muted">Não sabe o CEP? Consulte <a href="http://www.buscacep.correios.com.br/">aqui</a>.</small>
            </div>
          </div>
          <div class="col-12 col-md-4">
            <div class="form-group">
              <label for="rua">Endereço</label>
              <input type="text" class="form-control" name="logradouro" id="logradouro" placeholder="Logradouro">
            </div>
          </div>
          <div class="col-12 col-md-2">
            <div class="form-group">
              <label for="">Número</label>
              <input type="number" onkeyup="mascara_numero()" class="form-control" id="numero" name="numero" placeholder="Número">
            </div>
          </div>
          <div class="col-12 col-md-2">
            <div class="form-group">
              <label for="">Complemento</label>
              <input type="text" class="form-control" id="complemento" name="complemento" placeholder="Complemento">

            </div>
          </div>
          <div class="col-12 col-md-4">
            <div class="form-group">
              <label for="">Bairro</label>
              <input type="text" class="form-control" name="bairro" id="bairro" placeholder="Bairro">
            </div>
          </div>
          <div class="col-12 col-md-4">
            <div class="form-group">
              <label for="">Cidade</label>
              <input type="text" class="form-control" name="cidade" id="cidade" placeholder="Cidade">
            </div>
          </div>
          <div class="col-12 col-md-2">
            <div class="form-group">
              <label for="">UF</label>
              <input type="text" onkeyup="mascara_nome()" maxlength="2" class="form-control" name="estado" id="uf" placeholder="Estado">
            </div>
          </div>


        </div>
      </div>


      <div id="step_2" class="step">
        <div class="row">
          <!--Cursos-->
        <div class="col-md-5 mt-4">
          <label for="">Cursos</label>
          <div class="input-group mb-3">
            <input type="text" class="form-control" placeholder="Nome do curso" aria-label="curso" name="curso" id="curso" aria-describedby="button-addon2">
            <div class="input-group-append">
              <button class="ms-3 btn btn-success btn-sm" type="button" id="adicionaCurso" onClick="preencheTabela()">Adicionar</button>
            </div>
          </div>

          <div>
            <span><strong>Início: </strong></span><input class="form-control w-50"  onblur="mascara_data()" max="9999-12-31" type="date" name="cursoInicio" id="cursoInicio">
            <span><strong>Conclusão: </strong></span><input class="form-control w-50"  onblur="mascara_data()" max="9999-12-31" type="date" name="cursoFim" id="cursoFim">
          </div>
        </div>

        <!--Tabela com cursos-->
        <div class="col-md-6 mt-5">
          <table class="table table-striped" name="TabCursos" id="TabCursos">
            <thead>
              <tr>
                <th scope="col"></th>
                <th scope="col">Curso</th>
                <th scope="col">Inicio</th>
                <th scope="col">Fim</th>
              </tr>
            </thead>
            <tbody>

            </tbody>
          </table>
          <!--Limpa tabela-->
          <button type="button" class="btn btn-sm btn-danger float-right">Cancelar</button>
        </div>

        </div>
      </div>

      <div id="step_3" class="step">
        <div class="col-12 mb-4">
          <br>
          <h5>Anexe seus certificados <span>(opcional)</span></h5>
          <div id="imgAdicionadas"></div>
          <div id="certificados">
            <input type="file" name="inputcertificados" id="inputcertificados">
            <button type="button" onclick="EnviarCertificados()" name="enviarFormulario" id="enviarFormulario" class="btn btn-sm btn-success ms-2">Enviar</button>
            <button type="button" onclick="CancelarCertificados()" class="btn btn-danger btn-sm ms-2" id="cancelar" name="cancelar">Cancelar</button>
          </div>
          <input type="hidden" name="CertificadoAdd" id="CertificadoAdd"> 
        </div>
      

      </div>

      <div id="step_4" class="step">
        <div class="row">
            <!--Curriculo-->
          <div class="col-12">
            <br>
            <h2>Curriculo</h2>
          </div>

          <div class="col-md-4">
            <h6>Apresentação</h6>
            <textarea class="form-control" maxlength="255"  name="apresentacao" id="apresentacao" rows="3" placeholder="Se apresente"></textarea>
              <p id="cont-apresentacao"></p>
          </div>

          <div class="col-md-4">
            <h6>Habilidades</h6>
            <textarea class="form-control" maxlength="255" name="habilidades" id="habilidades" rows="3" placeholder="Digite suas habilidades"></textarea>
            <p id="cont-habilidades"></p>
          </div>

          <div class="col-md-4">
            <h6>Experiências profissionais</h6>
            <textarea class="form-control" maxlength="255" name="experiencia" id="experiencia" rows="3" placeholder="Liste suas Experiencias"></textarea>
            <p id="cont-experiencia"></p>
          </div>

          <!--Formação Acadêmica-->
          <div class="col-12 mt-2 mb-4">
            <br>
            <h2>Formação Acadêmica</h2>
          </div>

          <div class="input-group mb-3">
            <div class="col-md-6">
              <h6>Formação Acadêmica*</h6>
              <input type="text" class="form-control" placeholder="formação Acadêmica" aria-label="formacao" name="formacaoAcademica" id="formacaoAcademica" aria-describedby="button-addon2">
              <div>
                <span><strong>Início: </strong></span><input class="form-control w-75" onblur="mascara_data()" max="9999-12-31" type="date" name="formacaoInicio" id="formacaoInicio">
                <span><strong>Conclusão: </strong></span><input class="form-control w-75" onblur="mascara_data()" max="9999-12-31" type="date" name="formacaoConclusao" id="formacaoConclusao">
              </div>
            </div>

            <div class="col-md-6">
              <h6>Complemento</h6>
              
              <textarea class="form-control" maxlength="255" name="formacaoComplemento" id="formacaoComplemento" rows="6"></textarea>
              <p id="cont-complemento"></p>
            </div>
            </div>
          </div>
          
        </div>
      

      <div id="step_5" class="step">
          
        
          <div class="row">

            <div class="col-12">
                <br>
                <h2>Profissão</h2>
                <input type="text" name="profissao" autocomplete="off" class="form-control" id="inputDatalist" list="profissao" />
                <datalist id="profissao">
          
                </datalist>
            </div>

            <div class="col-12">
              <br>
              <h2>Histórico Profissional</h2>
            </div>
            <div class="form-group col-12 col-md-6">
              <label for="inputNome">Empresa</label>
              <input type="text" class="form-control" id="empresa" name="empresa" placeholder="Empresa">
            </div>
            <div class="form-group col-12 col-md-6">
              <label for="inputCpf">Cargo</label>
              <input type="text" class="form-control" id="cargo" name="cargo" placeholder="Cargo">
            </div>
            <div class="form-group col-12">
              <label for="">Atribuições</label>
              <textarea name="atribuicoes" maxlength="255" id="atribuicoes" rows="5" class="form-control"></textarea>
              <p id="cont-atribuicoes"></p>
            </div>
            <div class="form-group col-12">
              <h2>Período</h2>
            </div>
            <div class="form-group col-12 col-md-6">
              <label for="inputNome">Entrada</label>
              <input type="date" class="form-control" onblur="mascara_data()" max="9999-12-31" id="entrada" name="entrada" placeholder="Entrada">
            </div>
            <div class="form-group col-12 col-md-6">
              <label for="inputCpf">Saída</label>
              <input type="date" class="form-control" onblur="mascara_data()" max="9999-12-31" id="saida" name="saida" placeholder="Saída">
            </div>
            <div class="form-group col-12 col-md-4">
              <label>Motivo da saída</label>
              <input class="form-control" type="text" id="motivosaida" name="motivosaida">
            </div>
            <div class="form-group col-12 col-md-4">
              <label>Salário</label>
              <input class="form-control" type="number" id="salario" name="salario" step="0.01">
            </div>
            <div class="form-group col-12 col-md-4">
              <label>Referência (contato)</label>
              <input class="form-control" type="text" onkeyup="mascara_telefone()" maxlength="15" placeholder="99 99999-9999" id="referencia" name="referencia">
            </div>

            
              <div class="col-12" >
                <button class="btn btn-success" id="enviarForm">Enviar<i class="pl-2 fas fa-check"></i></button>
              </div>
           
          </div>     
      </div>
        
    </form>
      <div class="row justify-content-center mb-4" id="btn-step">
        <div class="col-lg-2">
          <button class="btn btn-block " id="prev">Voltar</button>
        </div>
        <div class="col-lg-2">
          <button class="btn btn-block " id="next">Avançar</button>
        </div>
      </div>
  </div>
</div>


<!--Jquery passo a passo-->
<script>
  $(document).ready(function() {
    $('.step').hide();
    $('.step').first().show();
  });

  

  var passoexibido = function() {
    var index = parseInt($(".step:visible").index());
    if (index == 0) {
      //desabilita o botão voltar caso for o primeiro passo
      $("#prev").prop('disabled', true);
      $("#next").prop('disabled', false);
    } else if (index == (parseInt($(".step").length))-1) {
      $("#prev").prop('disabled', false);
      $("#next").prop('disabled', true);
      $('#next').hide(); //esconde botão
    } else {
      //habilita os passos
      $("#next").prop('disabled', false);
      $("#prev").prop('disabled', false);
      $('#next').show(); //mostra botão

      
    }
    $("#passo").html((index+1) +"/"+parseInt($(".step").length));
    val = (index+1) *20;
    $('.progress-bar').css('width', val+'%').attr('aria-valuenow', val);
    $(".progress-bar").html(val+"%");
    $('#topo')[0].scrollIntoView(true);//alinha a página com base ao IDtopo
    
  };
  //executa a função para exibir o passo
  passoexibido();

  
  //Avança para o próximo passo
  $("#next").click(function() {
    var n = 1;// pega o número do step
    n = (parseInt($(".step:visible").index())+2);
    console.log(n)
    var NomesInput, NomeSelect, NomesInput4, Nomestext4, NomesInput5, Nomestext5;
    
    //Form 1
    if(n==2){
      var Items = $("#step_1"); //pega inputs e selects
      inputs = Items.find("input");
      selects = Items.find("select")
      console.log("Inputs:"+inputs.length)
      console.log("Select:"+selects.length)

    //Verifica inputs
    for(i = 0; i<inputs.length;i++){
        //console.log(inputs[i].value);
        if(inputs[i].value == ""){
          NomesInput = inputs[i].id;
          $(`#${inputs[i].id}`).css("background", "#ffdddd");
        }else{
          $(`#${inputs[i].id}`).css("background-color", "#B3FFA6");   
        }
    }
    //verifica selects
    for(i = 0; i<selects.length; i++){     
      if(selects[i].value == ""){
        $(`#${selects[i].id}`).css("background", "#ffdddd");
        NomeSelect = selects[i].id;
      }else{
        $(`#${selects[i].id}`).css("background-color", "#B3FFA6");
      }
    }
    if (validaCpf()){
      $('#inputCpf').css("background-color", "#B3FFA6");
    }else{
      $('#inputCpf').css("backgroundColor", "#ffdddd");  
    }

    //Passa para o próximo passo
    if(NomesInput == undefined && NomeSelect == undefined && validaEmail() && validaCpf())

        {
          $("#step_1:visible").hide().next().show();
          passoexibido();
        }
    }

    //Form 2
    if(n == 3 ){
      $("#step_2:visible").hide().next().show();
      passoexibido();
    }

    //Form 3
    if(n == 4){
      $("#step_3:visible").hide().next().show();
      passoexibido();
    }

    //Form 4
    if(n == 5){
      var Items4 = $("#step_4");
      inputs4 = Items4.find("input");
      txtarea4 = Items4.find("textarea");
      console.log("Items4:"+inputs4.length);
      console.log("Items4:"+txtarea4.length);
      
      for(i = 0; i<inputs4.length;i++){
        //console.log(inputs[i].value);
        if(inputs4[i].value == ""){
          NomesInput4 = inputs4[i].id;
          $(`#${inputs4[i].id}`).css("background", "#ffdddd");
        }else{
          $(`#${inputs4[i].id}`).css("background-color", "#B3FFA6");   
        }
      }

      for(i = 0; i<txtarea4.length;i++){
        if(txtarea4[i].value == ""){
          Nomestext4 = txtarea4[i].id;
          $(`#${txtarea4[i].id}`).css("background", "#ffdddd");
        }else{
          $(`#${txtarea4[i].id}`).css("background-color", "#B3FFA6");   
        }

      }

    
      if(NomesInput4 == undefined && Nomestext4 == undefined){
        $("#step_4:visible").hide().next().show();
        passoexibido();
        
      }
  
    }

   
    });
  


  
  $("#prev").click(function() {
    $(".step:visible").hide().prev().show();
    passoexibido();
  });


  //Form 5 
  const inputDatalist = document.getElementById('inputDatalist');
  const empresa = document.getElementById('empresa')
  const cargo = document.getElementById('cargo')
  const enviarForm = document.getElementById('enviarForm');
  const atribuicoes = document.getElementById('atribuicoes')
  const entrada = document.getElementById('entrada')
  const saida = document.getElementById('saida')
  const motivosaida = document.getElementById('motivosaida')
  const salario = document.getElementById('salario')
  const referencia = document.getElementById('referencia')
  
  //Valida os campos da ultima página
  enviarForm.addEventListener('click', (e) => {
    e.preventDefault();

    const Datalistvalue = inputDatalist.value;
    const empresavalue = empresa.value;
    const cargovalue = cargo.value; 
   
    const atribuicoesvalue = atribuicoes.value;
    const entradavalue = entrada.value;
    const saidavalue = saida.value;
    const motivosaidavalue = motivosaida.value;
    const salariovalue = salario.value;
    const referenciavalue = referencia.value;


    if( Datalistvalue   == ''    || empresavalue == '' || cargovalue == '' ||
       atribuicoesvalue == ''    || entradavalue == '' || saidavalue == '' ||
       motivosaidavalue == ''    || salariovalue == '' || referenciavalue == ''
    ){
      $('#inputDatalist').css("backgroundColor", "#ffdddd");
      $('#empresa').css("backgroundColor", "#ffdddd");
      $('#cargo').css("backgroundColor", "#ffdddd");
      $('#atribuicoes').css("backgroundColor", "#ffdddd");
      $('#entrada').css("backgroundColor", "#ffdddd");
      $('#saida').css("backgroundColor", "#ffdddd");
      $('#motivosaida').css("backgroundColor", "#ffdddd");
      $('#salario').css("backgroundColor", "#ffdddd");
      $('#referencia').css("backgroundColor", "#ffdddd");
      return
    }else{
      $('#formVaga').submit();
    }
    
  })

  function validaEmail(){
    var email = document.getElementById('inputEmail');

    if(email.value.indexOf("@")== -1 || email.value.indexOf(".")== -1 || 
      email.value.indexOf(".") - email.value.indexOf("@") == 1){
      $('#inputEmail').css("backgroundColor", "#ffdddd");
      return false;
    }else{
      $('#inputEmail').css("backgroundColor", "#B3FFA6");
      return true;
    }
  }


  function validaCpf(){
    cpf = document.getElementById('inputCpf').value;
    cpf = cpf.replace(/\D/g, '');
    if(cpf.toString().length != 11 || /^(\d)\1{10}$/.test(cpf)) return false;
    var result = true;
    [9,10].forEach(function(j){
        var soma = 0, r;
        cpf.split(/(?=)/).splice(0,j).forEach(function(e, i){
            soma += parseInt(e) * ((j+2)-(i+1));
        });
        r = soma % 11;
        r = (r <2)?0:11-r;
        if(r != cpf.substring(j, j+1)) result = false;
    });
    return result;
}

 
  //Contador de caracteres textarea
  const apresent = document.getElementById('apresentacao');
  const habili = document.getElementById('habilidades');
  const exp = document.getElementById('experiencia');
  const comple = document.getElementById('formacaoComplemento');
  const atrib = document.getElementById('atribuicoes');

  
  contadoCaractere(apresent, 'cont-apresentacao', 255);
  contadoCaractere(habili, 'cont-habilidades', 255);
  contadoCaractere(exp, 'cont-experiencia', 255);
  contadoCaractere(comple, 'cont-complemento', 255);
  contadoCaractere(atrib, 'cont-atribuicoes', 255);
  function contadoCaractere(textarea, contDiv, TAMAX){
    textarea.addEventListener("keypress", function(e){
      
          var contador = document.getElementById(contDiv); //contador de caractere
          tamtxt = (textarea.value.length); //tamanho do texto
          contador.innerHTML = tamtxt+"/"+TAMAX;
          //contDiv
          if(tamtxt > (TAMAX-1)){
            e.preventDefault();  
            $(`#${contDiv}`).css("color", "red");
          }else{
            $(`#${contDiv}`).css("color", "black");
          }
      });
  }

</script>

<!--Scripts Formulario-->
<script src="/public/js/formulario.js" type="text/javascript"></script>
<?php
require __DIR__ . '/../layouts/Footer.php';
?>