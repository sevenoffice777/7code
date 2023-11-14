function enableOrDisabledButton(option, element, valueButton = null) {
    element.attr('disabled', option);
    !option ? element.html(valueButton) : element.html('<img style="width:20px; height:20px;" src="../assets/img/load.gif"></img>');
}

// Função ajax request

function ajaxRequest(urlRequest, methodRequest, dataTypeRequest, dataRequest, opt) {
    $.ajax({
        url: urlRequest,
        method: methodRequest,
        cache: false,
        dataType: dataTypeRequest,
        contentType: false,
        processData: false,
        data: dataRequest,
        success: function (response) {
            successCallback(response, opt);
        },
        error: function (xhr, statusServer, errorName) {
            console.log(`${xhr} - ${statusServer}, ${errorName}`)
        }
    })
}


$('.logout-icon').each((index, element) => {
    $(element).click(() => {
        if (confirm("Tem certeza que deseja fazer LOGOUT da sua conta?")) {
            ajaxRequest(
                $(element).attr('logout'),
                "POST",
                null,
                null,
                'prev'
            )
        }
    })
})

// Jquery

$('[btn-sbmt]').each(function () {
    $(this).click((event) => {
        event.preventDefault();
        let btnSbmt = $(this);
       enableOrDisabledButton(true, btnSbmt)
    
        let parent = $(this).closest('[dataForm]'); // elemento parent "form", apenas o endereço do elemento nao "manipulavel"
        let formData = new FormData(parent[0]); // Objeto que retorna os dados do formulario dataForm 

        // Ajax --> Request Sever-side and client-side
        //Ajax --> url, method, cache, dataType, contentType, processData, data, --> sucsses, error

       

        ajaxRequest(
            parent.attr('dataForm'),
            "POST",
            'json',
            formData,
            'next'
        )



    })
}) // --> e a mesma coisa que o document.querySelector........

function successCallback(response, opt) {
    let log_error = $('.log_error');
    let btnSbmt = $('[btn-sbmt]');

    if(opt == 'next') {
        if (response.url) {          // Verifica se a resposta possui uma propriedade 'url'
            window.location.href = response.url;  // Redireciona para a URL fornecida na resposta
        } else {
            log_error.html(response.msg_erro);    // Exibe a mensagem de erro no elemento com a classe 'log_error'
        }
        enableOrDisabledButton(false, btnSbmt, 'Entrar');
    }

    if(opt == 'prev') {
        window.location.href = '../../../../index.html';
    }
}

