// Jquery

$('[btn-sbmt]').each(function () {
    $(this).click((event)=>{
        event.preventDefault()

        let  log_error = $(this).nextAll('.log_error').first();
        console.log(log_error)
        
        let parent = $(this).closest('[dataForm]');
        
         
        let formData = new FormData(parent[0]);

        // Ajax --> Request Sever-side and client-side

        $.ajax({
            url : parent.attr('dataForm'),
            method : 'POST',
            cache : false,
            dataType : 'json',
            contentType : false,
            processData : false,
            data : formData,
            success : function (response) {
                console.log(response)
                if(response.url) {
                    window.location.href = response.url
                } else {
                    log_error.html(response.msg_erro);

                    // $('#log_error').html($('<h1>Ola mundo</h1>'))
                }
            },
            error : function (xhr, statusServer, errorName ) {
                console.log(`${xhr} - ${statusServer}, ${errorName}`)
            }
        })
        
    })
}) // --> e a mesma coisa que o document.querySelector........