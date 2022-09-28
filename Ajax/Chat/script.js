//funcao para buscar dados de maneira assí­ncrona
function buscarViaAjax(){

    var ajax = new XMLHttpRequest();

    ajax.onreadystatechange = function(){

        if (ajax.readyState == 4 ){
            document.getElementById("content").innerHTML = ajax.responseText;
        }

    };

    ajax.open("GET", "lerArquivo.php");
    ajax.send();
}

setInterval(buscarViaAjax, 100);

//funcao para gravar dados de maneira assí­ncrona
function gravarViaAjax(){

    var qtdMensagens = 0

    var inputMensage = document.getElementById("mensage");

    inputMensage.onclick = function() {
        qtdMensagens++
    }

    inputMensage.enterKeyHint = function() {
        qtdMensagens++
    }

    mensagem = document.getElementById("mensage").value;
    nome = document.getElementById("name").value; 
    

    if (mensagem == ""){
        document.getElementById("error").innerHTML = "Preencha a Mensagem";
    } else {

        // Limpa o campo da mensagem
        document.getElementById("mensage").value = "";
        document.getElementById("name").value = "";

        var ajax = new XMLHttpRequest();

        ajax.open("POST", "gravarArquivo.php");
        ajax.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        ajax.send("msg=" + mensagem + "&name=" + nome + "&qtdMensagens=" + qtdMensagens);
    }
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