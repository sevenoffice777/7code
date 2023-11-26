let iconSubmitMessage = document.querySelector('#send-icon');

iconSubmitMessage.addEventListener('click', () => {

    let container_content_chatbot = document.querySelector('.container-content-chatbot');
    let inputChatbot = document.querySelector('#input-chatbot');



    if (!inputChatbot.value.trim() == '') {
        // trim() --> função que verifica se uma string esta vazia!
        let messageElementQuestion = document.createElement('div');
        let message = inputChatbot.value;
        messageElementQuestion.innerHTML = `<p class="message-question">${message}</p>`;
        container_content_chatbot.appendChild(messageElementQuestion)
        inputChatbot.value = "";
        setTimeout(() => {
            let messageElementResponse = document.createElement('div');
            messageElementResponse.innerHTML = `<p class="message-response">${IAresponse(message)}</p>`;
            container_content_chatbot.appendChild(messageElementResponse);
        }, 500);


    }

})

function IAresponse(message) {
    let responseIA = '';

    // Verifica diferentes mensagens
    if (/oi/i.test(message)) {
        responseIA = 'Olá, como você está hoje?';
    } else if (/como vai/i.test(message)) {
        responseIA = 'Estou bem, obrigado por perguntar!';
    } else if (/idade/i.test(message)) {
        responseIA = 'Eu sou apenas um programa, não tenho idade.';
    } else {
        responseIA = 'Desculpe, eu não entendi. Pode repetir, por favor?';
    }

    return responseIA;
}

