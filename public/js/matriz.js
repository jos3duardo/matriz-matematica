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
    //deixa o input selecionado na hora que o modal é aberto
    $('#numeroMatrizModal').on('shown.bs.modal', function () {
        $('#numero').focus();
    })


    var form = document.getElementById('matriz');
    var campo = document.getElementById('dado');

    form.addEventListener('submit', function(e) {
        // alerta o valor do campo
        console.log(campo.value);

        // impede o envio do form
        e.preventDefault();
    });

}

// function multiplicar(){
//     alert('Informe um valor para multiplicar a matriz')
//
// }
