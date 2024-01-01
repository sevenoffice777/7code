

$('[btn-sbmt]').each(function () {
    $(this).click((event) => {
        event.preventDefault();
        let btnSbmt = $(this);
       enableOrDisabledButton(true, btnSbmt)
    
        let parent = $(this).closest('[dataForm]'); // elemento parent "form", apenas o endereço do elemento nao "manipulavel"
        let formData = new FormData(parent[0]); // Objeto que retorna os dados do formulario dataForm 

        ajaxRequest(parent.attr('dataForm'), "POST",'json',formData,'signUserRequest')
    })
}) // --> e a mesma coisa que o document.querySelector........
 