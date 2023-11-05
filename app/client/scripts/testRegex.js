
function validaDados(event) {
    event.preventDefault();

    const regexEmail = new RegExp('^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\\.[a-zA-Z]{2,}$');
    const regexPassword = new RegExp('^(?=.*[A-Z])(?=.*\\d)(?=.*[@$!%*.?&])[A-Za-z\\d@$!%*?&]{5,}$');

    const email = document.querySelector('#email_input').value
    const password = document.querySelector('#password_input').value
    const name = document.querySelector('#name_input').value

    if (!email || !password || !name) {
        alert('Por favor preencha os dados antes de fazer o envio para o banco de dados')
    } else if (!regexEmail.test(email) || !regexPassword.test(password)) {
        if (!regexEmail.test(email)) {
            alert('email invalido para cadastro');
        }

        if (!regexPassword.test(password)) {
            alert('SENHA MUITO FRACA, ADICIONE NO MINIMO 4 CARACTERES, 1 LETRA MAIUSCULA, I DIGITO E UM CARACTERE ESPECIAL');
        }
    } else {
        alert('Cadastrado com sucesso!')
        return true;   
    }

}; 