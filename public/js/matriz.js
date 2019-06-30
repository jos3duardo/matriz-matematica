function Inversa(el) {
    var display = document.getElementById(el).style.display;
    if(display == "block")
        document.getElementById(el).style.display = 'none';
    else
        document.getElementById(el).style.display = 'block';
}
function Transposta(el) {
    var display = document.getElementById(el).style.display;
    if(display == "block")
        document.getElementById(el).style.display = 'none';
    else
        document.getElementById(el).style.display = 'block';
}



window.onload=function () {
    //deixa o input que insere um numeo para multiplicar a matriz selecionado na hora que o modal é aberto
    $('#numeroMatrizModal').on('shown.bs.modal', function () {
        $('#numero').focus();
    })

    //validando campo da linha e da coluna na hora de criar uma matriz
    //para não deixar criar uma matriz nula
    var formGeraMatriz = document.getElementById('formGeraMatriz')
    var coluna = document.getElementById('matriz');
    var linha = document.getElementById('dado');

    formGeraMatriz.addEventListener('submit', function(e) {
        // alerta o valor do campo
        if (coluna >= 0 || linha >= 0){
            alert('Os campos coluna e linha tem que ser maior 0')
        }
        // impede o envio do form
        e.preventDefault();
    });
    //fim da validação do campo da linha e da coluna

}

// function multiplicar(){
//     alert('Informe um valor para multiplicar a matriz')
//
// }
