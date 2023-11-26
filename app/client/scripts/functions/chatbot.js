let iconSubmitMessage = document.querySelector('#send-icon');
let assuntoChatbot = '';
let responseUser = '';
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

    if (/oi/i.test(message)) {
        responseIA = 'Oii, como posso ajudar?';
    } else if (/qual seu nome/i.test(message) || /como você chama?/i.test(message)) {
        responseIA = 'Sou uma IA desenvolvida por &copy; Samuel Seven, estou aqui para te ajudar!';
    } else if (/ajuda/i.test(message) || /preciso de ajuda/i.test(message)) {
        responseIA = 'Pode me perguntar alguma coisa ou precisa de algo específico?';
    } else if (/extrato/i.test(message)) {
        responseIA = 'Para obter o extrato da sua conta, você pode acessar o internet banking ou usar um caixa eletrônico. Posso te ajudar a encontrar a opção certa?';
    } else if (/transferência/i.test(message) || /transferir/i.test(message)) {
        responseIA = 'Para fazer uma transferência, você pode usar o aplicativo móvel, o internet banking ou um caixa eletrônico. Se precisar de assistência, estou à disposição!';
    } else if (/cartão de crédito/i.test(message)) {
        responseIA = 'Para informações sobre seu cartão de crédito, como fatura e limite, recomendo verificar no internet banking ou entrar em contato com nosso suporte ao cliente.';
    } else if (/pagamento/i.test(message) || /conta/i.test(message)) {
        responseIA = 'Você pode pagar suas contas usando o aplicativo móvel, o internet banking ou um caixa eletrônico. Posso fornecer mais detalhes sobre como fazer isso?';
    } else if (/como alterar senha/i.test(message)) {
        responseIA = 'Para alterar sua senha, acesse o internet banking e procure a opção de configurações de segurança. Se precisar de assistência, estou aqui para ajudar!';
    } else if (/bloquear cartão/i.test(message)) {
        responseIA = 'Se precisar bloquear seu cartão, entre em contato com nosso suporte ao cliente imediatamente. Eles poderão ajudá-lo a tomar as medidas necessárias.';
    } else if (/agência/i.test(message)) {
        responseIA = 'A agência bancária mais próxima de você pode ser encontrada no nosso site ou no aplicativo móvel. Posso fornecer mais informações ou ajudar com algo mais?';
    } else if (/cheque/i.test(message)) {
        responseIA = 'Para informações sobre cheques, você pode entrar em contato com nossa agência ou verificar o internet banking. Posso te ajudar com mais alguma coisa?';
    } else if (/investimentos/i.test(message) || /como investir/i.test(message)) {
        responseIA = 'Para obter informações sobre investimentos e como começar, você pode agendar uma consulta com um de nossos consultores financeiros ou verificar as opções disponíveis no internet banking.';
    } else if (/empréstimo/i.test(message) || /como obter um empréstimo/i.test(message)) {
        responseIA = 'Se você estiver interessado em obter um empréstimo, recomendo entrar em contato com nossa equipe de empréstimos. Eles poderão orientá-lo sobre os requisitos e opções disponíveis.';
    } else {
        responseIA = 'Desculpe, não entendi completamente. Pode repetir ou fornecer mais detalhes, por favor?';
    }

    return responseIA;
}
