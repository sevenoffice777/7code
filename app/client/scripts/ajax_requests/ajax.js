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
            successCallback(response, opt)

        },
        error: function (xhr, statusServer, errorName) {
            console.log(`${xhr.statusText} - ${statusServer}, ${errorName}`)
        }
    })
}


// Jquery
function successCallback(response, opt) {
    let log_error = $('.log_error');
    let btnSbmt = $('[btn-sbmt]');

    if (opt == 'signUserRequest') {
        console.log(response)
        if (response.url) {          // Verifica se a resposta possui uma propriedade 'url'
            window.location.href = response.url;  // Redireciona para a URL fornecida na resposta
        } else {
            log_error.html(response.msg_erro);    // Exibe a mensagem de erro no elemento com a classe 'log_error'
        }
        enableOrDisabledButton(false, btnSbmt, 'Cadastrar Novamente');
    }

    if (opt == 'logoutUserReturn') {
        window.location.href = '../../../../index.html';
    }

    if (opt == 'loadingUserData') {
        userDataShow(response)
    }

    if (opt == "uploadPhoto") {

        window.location.reload(true);

        toggleClass(document.querySelector('.card-default-centerscreen'), 'display_none')
        document.querySelector('#uploadPhoto').src = '../../assets/img/edit.png';
        document.querySelector('#uploadPhotoInput').value = null;
    }

    if (opt == "rowHistory") {
        let tbody = document.querySelector('#tbody_add_transactions');

        if(response.rows == "rowsNotFound") {
            alert("Nenhum Lançamento encontrado!");
            irPara_localWindow('../7tech-company/index.php');
        } else {
            response.rows.forEach(element => {
                let newRow = document.createElement('tr');
                let columnsHTML =
                    `<td>${element.data}</td>
                    <td>${element.nome_do_usuario_de_destino}</td>
                    <td>R$ ${element.value_transaction}</td>
                    <td>R$ ${element.saldo_atual}</td>
                    `;
                newRow.innerHTML = columnsHTML;
                tbody.appendChild(newRow);
            });

        }

    }

    if(opt == "transferenciasResponse") {
        if(response.resJSON == "undefinedValue") {
            document.querySelector("#load_h1").textContent = "Dados Incorretos";
            setTimeout(()=>{
                document.querySelector(".load_container").classList.add("display_none");
            }, 2000);

        } else if(response.resJSON == "successTransaction") {
            document.querySelector("#load_h1").textContent = "Sucesso :)";
            setTimeout(()=>{
                document.querySelector(".load_container").classList.add("display_none");
                location.reload(true);
            }, 2000);
        }
    }
}

