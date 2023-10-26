const form = document.getElementById('form')
const campos = document.querySelectorAll('.required')
const spans = document.querySelectorAll('.span-required')

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