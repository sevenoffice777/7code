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
    let nome = dataUser.userAccount.NOME.toUpperCase();
    
    document.title = `7Code Hub | ${nome}`
    setDataUser(dataUser, '[name=username]', 'userAccount', 'NOME','txt');
    setDataUser(dataUser, '[name=email]', 'userAccount', 'EMAIL','txt');
    setDataUser(dataUser, '[name=accountNumber]', 'bankAccount', 'ACCOUNT_ID','txt');
    setDataUser(dataUser, '[name=saldo]', 'bankAccount', 'SALDO','txt');
    setDataUser(dataUser, '.photo-user', 'caminhoPhoto', 'CAMINHO','img')
    
    
}

function setDataUser(dataUser, element, paramName, atrName = null, typeContent) {
    let userdataSpan = document.querySelectorAll(element);
    
    userdataSpan.forEach(element => {
        if(typeContent == 'txt') {
            if(atrName == 'NOME') {
                element.textContent += `${dataUser.userAccount.NOME.toUpperCase()}`
            } else {

                element.textContent += `${dataUser[paramName][atrName]}`
            }
        }
        if(typeContent == 'img') {
            element.src = `../../uploads/${dataUser[paramName]}`
        }
    });
}