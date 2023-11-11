// Jquery

$('[btn-sbmt]').each(function () {
    $(this).click((event) => {
        event.preventDefault()

        var btnSbmt = $(this)

        enableOrDisabledButton(true, btnSbmt)

        let log_error = $(this).next('.log_error');//  elemento que apresenta mensagens de erro no form

        let parent = $(this).closest('[dataForm]'); // elemento parent "form", apenas o endereço do elemento nao "manipulavel"


        let formData = new FormData(parent[0]); // Objeto que retorna os dados do formulario dataForm 

        // Ajax --> Request Sever-side and client-side
        //Ajax --> url, method, cache, dataType, contentType, processData, data, --> sucsses, error
        $.ajax({
            url: parent.attr('dataForm'),
            method: 'POST',
            cache: false,
            dataType: 'json',
            contentType: false,
            processData: false,
            data: formData,
            success: function (response) {
                console.log(response)
                if (response.url) {
                    window.location.href = response.url
                } else {
                    log_error.html(response.msg_erro);
                }
                enableOrDisabledButton(false, btnSbmt, 'Cadastrar');
            },
            error: function (xhr, statusServer, errorName) {
                console.log(`${xhr} - ${statusServer}, ${errorName}`)
            }
        })

    })
}) // --> e a mesma coisa que o document.querySelector........


function enableOrDisabledButton(option, element, valueButton = null) {
    element.attr('disabled', option);
    !option ? element.html(valueButton) : element.html('<img style="width:20px; height:20px;" src="../assets/img/load.gif"></img>');
}