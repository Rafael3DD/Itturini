function passaId(num, nome){
    var id = num;
    var nomeVaga = nome;
    console.log(nome);
    document.getElementById('deleteform').action = '/apagarVaga?codigo='+id;
    document.getElementById('mensagem').innerHTML = `Deseja realmente apagar a vaga: "${nome}"?`;
}


function idCurriculo(num, nome){
    var id = num;
    //var nomeVaga = nome;
    document.getElementById('deleteform').action = '/apagarCurriculo?codigo='+id;
    document.getElementById('mensagem').innerHTML = `Deseja realmente apagar o Currilo: "${nome}"?`;
}


function idUser(num, nome){
    var id = num;
    console.log(nome);
    document.getElementById('deleteform').action = '/apagarUsuario?codigo='+id;
    document.getElementById('mensagem').innerHTML = `Deseja realmente apagar o usuário: "${nome}"?`;

}