const form = document.getElementById('form')
const campos = document.querySelectorAll('.required')
const spans = document.querySelectorAll('.span-required')
const emailRegex = /[a-z0-9!#$%&'*+/=?^_`{|}~-]+(?:\.[a-z0-9!#$%&'*+/=?^_`{|}~-]+)*@(?:[a-z0-9](?:[a-z0-9-]*[a-z0-9])?\.)+[a-z0-9](?:[a-z0-9-]*[a-z0-9])?/gi
const telRegex = /^(?:\+)[0-9]{2}\s?(?:\()[0-9]{2}(?:\))\s?[0-9]{4,5}(?:-)[0-9]{4}$/

function setError(index){
    campos[index].style.border = '2px solid #e63636'
    spans[index].style.display = 'block'
}

function removeErro(index){
    campos[index].style.border = ''
    spans[index].style.display = 'none'

}

function validacaoNome(){
    if (campos[0].value.length < 5) {
       setError(0)
    } 
    else {
        removeErro(0)
    }
}

function validacaoSobrenome(){
    if (campos[1].value.length < 5) {
        setError(1)
    } 
    else {
        removeErro(1)
    }
}

function validacaoEmail(){
    if (!emailRegex.test(campos[2].value)){
        setError(2)
    }
    else {
        removeErro(2)
    }
}

// Ainda não está fucionando
function validacaoTel(){
    if (!telRegex.test(campos[3].value)){
        console.log('ERRO')
    }
    else {
        console.log('validado')
    }
}

function validacaoSenha() {
    if (campos[4].value.length < 8) {
        setError(4)
    }
    else{
        removeErro(4)
    }
}

