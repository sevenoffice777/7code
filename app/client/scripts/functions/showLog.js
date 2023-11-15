const container_full_black = document.querySelector('.full_black_container');
const load_msg = document.querySelector('.load_msg');
const sucsses_msg = document.querySelector('.success_msg');
const link = document.querySelector('#login_btn');


window.onload = function () {
    let urlParams = new URLSearchParams(window.location.search);
    
    if(urlParams.get('statusLogin') == 'sucesso') {
        processaLogin('./7tech-company/index.php');
        link.innerHTML = "Bem-Vindo(a)";
    } 

    if(urlParams.get('statusSignup') == 'sucesso') {
        setTimeout(()=>{
            window.location.href = './signin.php';
        }, 1500);
    }
   

}

function processaLogin(caminho = null) {
    setTimeout(() => {
        load_msg.classList.add('display_none');
        sucsses_msg.classList.remove('display_none');
        link.href = caminho;
    }, 1500);
}







