const container_full_black = document.querySelector('.full_black_container');
const load_msg = document.querySelector('.load_msg');
const sucsses_msg = document.querySelector('.sucsses_msg');
const link = document.querySelector('#btn_login');



window.onload = function () {
    processaLogin();
}

function processaLogin() {
    setTimeout(() => {
        load_msg.classList.add('display_none');
        sucsses_msg.classList.remove('display_none');
    }, 3000);
}








    // let urlParams = new URLSearchParams(window.location.search);

    // let origem = urlParams.get('origem');
    
    // if (origem === 'login') {
    //     link.href = '../7TECH_company/index.html'
    //     console.log('Logado com sucesso');
    // } else if (origem == 'signup') {
    //     document.querySelector('.log>h1').innerHTML = 'Cadastro realizado com Sucesso';
    //     link.href = './login_user.php';
    //     link.innerHTML = 'Fazer Login'

    // }