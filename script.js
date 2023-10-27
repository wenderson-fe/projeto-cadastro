const form = document.getElementById('form')
const campos = document.querySelectorAll('.required')
const spans = document.querySelectorAll('.span-required')
const emailRegex = /[a-z0-9!#$%&'*+/=?^_`{|}~-]+(?:\.[a-z0-9!#$%&'*+/=?^_`{|}~-]+)*@(?:[a-z0-9](?:[a-z0-9-]*[a-z0-9])?\.)+[a-z0-9](?:[a-z0-9-]*[a-z0-9])?/gi
const telRegex = /(\(?\d{2}\)?\s)?(\d{4,5}\-\d{4})/g


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

function validacaoTel(){
    $('.phone_with_ddd').mask('(00) 00000-0000')
    if (telRegex.test(campos[3].value)){
        removeErro(3)
    }
    else {
        setError(3)
        
    }
}

function validacaoSenha() {
    if (campos[4].value.length < 8) {
        setError(4)
    }
    else {
        removeErro(4)
    }
}
 

function compareSenha() {
    if (campos[4].value == campos[5].value && campos[5].value.length >= 8){
        removeErro(5)
    }
    else {
        setError(5)
        
    }
}

