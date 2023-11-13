function enableOrDisabledButton(option, element, valueButton = null) {
    element.attr('disabled', option);
    !option ? element.html(valueButton) : element.html('<img style="width:20px; height:20px;" src="../assets/img/load.gif"></img>');
}

// Função ajax request

function ajaxRequest(urlRequest, methodRequest, dataTypeRequest = null, dataRequest = null, successCallback, errorCallBack) {
    $.ajax({
        url: urlRequest,
        method: methodRequest,
        cache: false,
        dataType: dataTypeRequest,
        contentType: false,
        processData: false,
        data: dataRequest,
        success: function (response) {
            successCallback(response);
        },
        error: function (xhr, statusServer, errorName) {
            console.log(`${xhr} - ${statusServer}, ${errorName}`)
            errorCallBack();
        }
    })
}


$('.logout-icon').each((index, element) => {
    $(element).click(() => {
        ajaxRequest(
            $(element).attr('logout'),
            "POST",
            null,
            null,
            function () {
                window.location.href = '../../../../index.html';
            },
            function () {
                console.log("ERRO")
            }
        );
    })
})

// Jquery

$('[btn-sbmt]').each(function () {
    $(this).click((event) => {
        let btnSbmt = $(this);
        event.preventDefault();

        enableOrDisabledButton(true, btnSbmt)
        let log_error = $(this).next('.log_error');//  elemento que apresenta mensagens de erro no form
        let parent = $(this).closest('[dataForm]'); // elemento parent "form", apenas o endereço do elemento nao "manipulavel"
        let formData = new FormData(parent[0]); // Objeto que retorna os dados do formulario dataForm 

        // Ajax --> Request Sever-side and client-side
        //Ajax --> url, method, cache, dataType, contentType, processData, data, --> sucsses, error
        $.ajax({
            url: parent.attr('dataForm'),   // URL para onde a requisição será enviada, obtida do atributo 'dataForm' do elemento 'parent'
            method: 'POST',                  // Método HTTP a ser usado (neste caso, POST)
            cache: false,                    // Define se o resultado da requisição deve ser armazenado em cache pelo navegador (não cacheado neste caso)
            dataType: 'json',                // Tipo de dados esperado na resposta (JSON neste caso)
            contentType: false,              // Tipo de conteúdo da requisição (definido como falso para permitir que o navegador defina automaticamente com base nos dados)
            processData: false,               // Define se os dados fornecidos na propriedade 'data' devem ser processados automaticamente (definido como falso para enviar FormData)
            data: formData,                  // Dados a serem enviados com a requisição (FormData neste caso, que contém os dados do formulário)
            success: function (response) {   // Função a ser chamada quando a requisição é bem-sucedida
                console.log(response);       // Exibe a resposta no console
                if (response.url) {          // Verifica se a resposta possui uma propriedade 'url'
                    window.location.href = response.url;  // Redireciona para a URL fornecida na resposta
                } else {
                    log_error.html(response.msg_erro);    // Exibe a mensagem de erro no elemento com a classe 'log_error'
                }
                enableOrDisabledButton(false, btnSbmt, 'Cadastrar');  // Desabilita o botão de envio
            },
            error: function (xhr, statusServer, errorName) {   // Função a ser chamada em caso de erro na requisição
                console.log(`${xhr} - ${statusServer}, ${errorName}`);  // Exibe informações do erro no console
            }
        });
        
      

    })
}) // --> e a mesma coisa que o document.querySelector........


