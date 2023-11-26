// - Função para redirecionar a pagina
function irPara(endereco) {
    // window.location.href = endereco;
    window.open(endereco, '_blank');
}

function irPara_localWindow(endereco) {
    window.location.href = endereco;
}

// - Função para add/remove class de alguma tag ou elemento
function toggleClass(element, classVerify, classAddOrRemove = null) {
    if (element.classList.contains(classVerify)) {
        element.classList.remove(classVerify);
        if (classAddOrRemove) {
            element.classList.add(classAddOrRemove);
        }
    } else {
        element.classList.add(classVerify);
        if (classAddOrRemove) {
            element.classList.remove(classAddOrRemove);
        }

    }
}

//  As funções userDataShow e setDataUser, servem para inserir os dados do cliente no FRONT END

function userDataShow(dataUser) {
    let nome = dataUser.userAccount.NOME.toUpperCase();

    document.title = `7Code Hub - ${nome}`
    setDataUser(dataUser, '[txtValue=username]', 'userAccount', 'NOME', 'txt');
    setDataUser(dataUser, '[txtValue=cardNumber]', 'bankAccount', 'NUM_CARD', 'txt');
    setDataUser(dataUser, '[txtValue=email]', 'userAccount', 'EMAIL', 'txt');
    setDataUser(dataUser, '[txtValue=accountNumber]', 'bankAccount', 'ACCOUNT_ID', 'txt');
    setDataUser(dataUser, '[txtValue=saldo]', 'bankAccount', 'SALDO', 'txt');
    setDataUser(dataUser, '.photo-user', 'caminhoPhoto', 'CAMINHO', 'img')


}

function setDataUser(dataUser, element, paramName, atrName = null, typeContent) {
    let userdataSpan = document.querySelectorAll(element);
    userdataSpan.forEach(element => {
        if (typeContent == 'txt') {
            if (atrName == 'NOME') {
                element.textContent += `${dataUser.userAccount.NOME.toUpperCase()}`;
            } else if (atrName == 'NUM_CARD') {
                let cardNumber = dataUser[paramName][atrName].toString();
               
                // Use a função match com uma expressão regular para obter os grupos de quatro dígitos
                let gruposDeQuatro = cardNumber.match(/.{1,4}/g);

                // Use a função join para unir os grupos com espaços
                let numeroFormatado = gruposDeQuatro.join(' ');

                element.textContent = numeroFormatado;
            } else {

                element.textContent += `${dataUser[paramName][atrName]}`
            }
        }
        if (typeContent == 'img') {
            element.src = `../../uploads/${dataUser[paramName]}`
        }
    });
}

document.querySelectorAll(".hover-password").forEach((element) => {
    element.addEventListener("click", () => {
        if (element.name == "eye-outline") {
            element.name = "eye-off-outline";
            document.querySelector(".password-input").type = "text"
        } else {
            element.name = "eye-outline";
            document.querySelector(".password-input").type = "password"
        }
    });
});
