//Cep
function limpaForm(){
    document.getElementById('cep').value = "";
    document.getElementById('logradouro').value = "";
    document.getElementById('complemento').value = "";
    document.getElementById('bairro').value = "";
    document.getElementById('cidade').value  = "";
    document.getElementById('uf').value  = "";
}
const preencherForm = (endereco)=>{
    

    document.getElementById('logradouro').value = endereco.logradouro;
    document.getElementById('complemento').value = endereco.complemento;
    document.getElementById('bairro').value = endereco.bairro;
    document.getElementById('cidade').value  = endereco.localidade;
    document.getElementById('uf').value  = endereco.uf;

}

const eNumero = (numero) => /^[0-9]+$/.test(numero);

const cepValido = (cep) => cep.length == 8 && eNumero(cep);{

}

const pesquisarCep = async()=>{

    document.getElementById('logradouro').value = "...";
    document.getElementById('complemento').value = "...";
    document.getElementById('bairro').value = "...";
    document.getElementById('cidade').value  = "...";
    document.getElementById('uf').value  = "...";
    

    const cep = document.getElementById('cep').value.replace(/\D/g, "");
    const url = `http://viacep.com.br/ws/${cep}/json/`;

    if(cepValido(cep)){
        const dados = await(fetch(url));
        const endereco = await dados.json();
        if(endereco.hasOwnProperty('erro')){
           alert("Cep não encontrado");
           await(limpaForm());
        }else{

            await(preencherForm(endereco));
        }
    }else{
        limpaForm();
        await(alert("Cep Incorreto!"));
        
    }
}
document.getElementById('cep').addEventListener('focusout', pesquisarCep);
