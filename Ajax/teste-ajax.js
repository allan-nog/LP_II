var i = 0

function alterar() {
    i++;
    document.getElementById('content').innerHTML = 'Olá, Mundo! ' + i
    document.getElementById('nome').value = 'Valor ' + i
}

setInterval(alterar, 1000)