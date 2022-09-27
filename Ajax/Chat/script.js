//funcao para buscar dados de maneira assÃ­ncrona
function buscarViaAjax(){

    var ajax = new XMLHttpRequest();

    ajax.onreadystatechange = function(){

        if( ajax.readyState == 4 ){
            document.getElementById("content").innerHTML = ajax.responseText;
        }

    };

    ajax.open("GET", "lerArquivo.php");
    ajax.send();

}

setInterval( buscarViaAjax, 500);

//funcao para gravar dados de maneira assí­ncrona
function gravarViaAjax(){
    // Conteudo do campo de mensagem eh armazenado na variavel 'texto'
    texto = document.getElementById("mensage").value;
    nome = document.getElementById("name").value;
    
    // Limpa o campo da mensagem
    document.getElementById("mensage").value = "";
    document.getElementById("name").value = "";

    var ajax = new XMLHttpRequest();

    // Concatena o conteudo da variavel 'texto' na chamada GET
    ajax.open("GET", "gravarArquivo.php?msg=" + texto + "&name=" + nome);
    ajax.send();
}

var inputMensage = document.getElementById("mensage");

// Evento para verificar se o "ENTER" fora pressionado no elemento HTML
inputMensage.addEventListener("keyup", function(event) {
    if (event.key === "Enter") {
        event.preventDefault();
        if (inputMensage.value != "") {
            gravarViaAjax();
        } 
            
    }
});