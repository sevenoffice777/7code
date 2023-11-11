// Variaveis - Constantes
const headerResponsive = document.querySelector('.header-responsive');
const btnHeaderResponsive = document.querySelector('.element-none');
btnHeaderResponsive.addEventListener('click', ()=> {
    toggleClass(headerResponsive, 'h-r-ngtv-pos','h-r-pstv-pos')
    setTimeout(()=>{
        toggleClass(headerResponsive, 'h-r-ngtv-pos','h-r-pstv-pos')
    }, 3000)
});


// Funções

// - Função para redirecionar a pagina
function irPara(endereco) {
    // window.location.href = endereco;
    window.open(endereco, '_blank');
}

// - Função para add/remove class de alguma tag ou elemento
function toggleClass(element, classVerify, classAddOrRemove) {
    if(element.classList.contains(classVerify)) {
        element.classList.remove(classVerify);
        element.classList.add(classAddOrRemove);
    } else {
        element.classList.add(classVerify);
        element.classList.remove(classAddOrRemove);
    }
}