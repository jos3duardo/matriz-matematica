function Inversa(el) {
    var display = document.getElementById(el).style.display;
    if(display == "block")
        document.getElementById(el).style.display = 'none';
    else
        document.getElementById(el).style.display = 'block';
}
function transposta(el) {
    var display = document.getElementById(el).style.display;
    if(display == "block")
        document.getElementById(el).style.display = 'none';
    else
        document.getElementById(el).style.display = 'block';
}
function addMatriz('#divPrincipal') {
    alert('divi')
    var display = document.getElementById(el).style.display;
    if(display == "block")
        document.getElementById(el).style.display = 'none';
    else
        document.getElementById(el).style.display = 'block';
}


window.onload=function () {
    //deixa o input selecionado na hora que o modal é aberto
    $('#numeroMatrizModal').on('shown.bs.modal', function () {
        $('#numero').focus();
    })




}

// function multiplicar(){
//     alert('Informe um valor para multiplicar a matriz')
//
// }
