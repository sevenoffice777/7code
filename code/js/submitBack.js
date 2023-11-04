// Jquery

$('[btn-sbmt]').each(function () {
    $(this).click((event)=>{
        event.preventDefault()
        
        let parent = $(this).closest('[dataForm]');
        
         
        let formData = new FormData(parent[0]);

        // Ajax --> Request Sever-side and client-side

        $.ajax({
            url : parent.attr('dataForm'),
            method : 'post',
            cache : false,
            dataType : 'json',
            contentType : false,
            processData : false,
            data : formData,
            sucsses : function (response) {
                console.log(response);
            },
            error : function (xhr, statusServer, errorName ) {
                console.log(`${xhr} - ${statusServer}, ${errorName}`)
            }
        })
        
    })
}) // --> e a mesma coisa que o document.querySelector........