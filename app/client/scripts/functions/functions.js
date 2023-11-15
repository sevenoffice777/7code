// - Função para redirecionar a pagina
function irPara(endereco) {
    // window.location.href = endereco;
    window.open(endereco, '_blank');
}

// - Função para add/remove class de alguma tag ou elemento
function toggleClass(element, classVerify, classAddOrRemove=null) {
    if (element.classList.contains(classVerify)) {
        element.classList.remove(classVerify);
        if(!classAddOrRemove) {
            element.classList.add(classAddOrRemove);
        }
    } else {
        element.classList.add(classVerify);
        if(!classAddOrRemove) {
            element.classList.remove(classAddOrRemove);
        }
        
    }
}

//  As funções userDataShow e setDataUser, servem para inserir os dados do cliente no FRONT END

function userDataShow(dataUser) {
    document.title = `7Code Hub | ${dataUser.userAccount.NOME}`
    setDataUser(dataUser, '[name=username]', 'userAccount', 'NOME');
    setDataUser(dataUser, '[name=email]', 'userAccount', 'EMAIL');
    setDataUser(dataUser, '[name=accountNumber]', 'bankAccount', 'ACCOUNT_ID');
    setDataUser(dataUser, '[name=saldo]', 'bankAccount', 'SALDO');
}

function setDataUser(dataUser, element, paramName, atrName) {
    let userdataSpan = document.querySelectorAll(element);

    userdataSpan.forEach(element => {
        element.textContent += `${dataUser[paramName][atrName]}`
    });
}