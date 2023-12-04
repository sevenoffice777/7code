let iconSubmitMessage = document.querySelector('#send-icon');
let assuntoChatbot = '';
let responseUser = '';
let inputChatbot = document.querySelector('#input-chatbot');

iconSubmitMessage.addEventListener('click', () => {
    insertIntoChatbot();
})

inputChatbot.onkeydown = (e) => {
    if(e.code == 'Enter') {
        insertIntoChatbot();
    }
}

function insertIntoChatbot() {
    let container_content_chatbot = document.querySelector('.container-content-chatbot');

    if (!inputChatbot.value.trim() == '') {
        // trim() --> função que verifica se uma string esta vazia!
        let messageElementQuestion = document.createElement('div');
        let message = inputChatbot.value;
        messageElementQuestion.innerHTML = `<p class="message-question">${message}</p>`;
        container_content_chatbot.appendChild(messageElementQuestion);
        inputChatbot.value = "";
        setTimeout(() => {
            let messageElementResponse = document.createElement('div');
            messageElementResponse.innerHTML = `<p class="message-response">${IAresponse(message)}</p>`;
            container_content_chatbot.appendChild(messageElementResponse);
            container_content_chatbot.scrollTop = container_content_chatbot.scrollHeight;
        }, 500);


    }
}


function IAresponse(message) {
    let responseIA = '';
    // ||
    if ((/oi/i.test(message)) || /eai/i.test(message) || /ola/i.test(message) || /oie/i.test(message)) {
        responseIA = 'Olá! Tudo bem? Em que posso ser útil hoje?';
    }
    // Consulta de extrato
    else if (searchInMessage('extrato', message)) {
        responseIA = `Se quiser saber mais sobre extratos, clique na opção EXTRATO. Lá, você pode fazer consultas das suas últimas compras por data, valor, entre outros...`;
    }
    // Pergunta sobre pagamento de contas
    else if (searchInMessage('pagamento', message) || searchInMessage('conta', message)) {
        responseIA = 'Para efetuar o pagamento de contas, você pode usar o aplicativo móvel, internet banking ou um caixa eletrônico. Posso te ajudar com isso?';
    }
    // Pergunta sobre transferência
    else if (searchInMessage('transferência', message) || searchInMessage('transferir', message)) {
        responseIA = 'Para fazer uma transferência, você pode utilizar o aplicativo móvel, internet banking ou um caixa eletrônico. Precisa de ajuda com alguma dessas opções?';
    }
    // Pergunta sobre bloqueio de cartão
    else if (searchInMessage('bloquear cartão', message)) {
        responseIA = 'Se precisar bloquear seu cartão, entre em contato com nosso suporte ao cliente imediatamente. Eles poderão ajudá-lo a tomar as medidas necessárias.';
    }
    // Pergunta sobre agência bancária
    else if (searchInMessage('agência', message)) {
        responseIA = 'A agência bancária mais próxima de você pode ser encontrada no nosso site ou no aplicativo móvel. Posso fornecer mais informações ou ajudar com algo mais?';
    }
    // Pergunta sobre investimentos
    else if (searchInMessage('investimentos', message) || searchInMessage('como investir', message)) {
        responseIA = 'Para obter informações sobre investimentos e como começar, você pode agendar uma consulta com um de nossos consultores financeiros ou verificar as opções disponíveis no internet banking.';
    }
    // Pergunta sobre empréstimo
    else if (searchInMessage('empréstimo', message) || searchInMessage('como obter um empréstimo', message)) {
        responseIA = 'Se você estiver interessado em obter um empréstimo, recomendo entrar em contato com nossa equipe de empréstimos. Eles poderão orientá-lo sobre os requisitos e opções disponíveis.';
    }
    else if(searchInMessage('saldo', message)) {
        responseIA = 'Pra descobrir seu saldo clique na sua foto no canto SUPERIOR DIREITO DA TELA';
    }
    // Caso nenhuma correspondência seja encontrada
    else {
        responseIA = 'Desculpe, não entendi completamente. Pode repetir ou fornecer mais detalhes, por favor?';
    }
        
    
    return responseIA;
}

function searchInMessage(palavrachave, messageUser) {
    let regex = new RegExp("\\b" + palavrachave + "\\b", "i");

    const res = regex.test(messageUser);

    return res;
}