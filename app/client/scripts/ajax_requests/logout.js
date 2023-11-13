$('.logout-icon').each(()=>{
    $(this).click((event)=>{
        // Nessa inha eu vou executar a 
        // let cardConfirm = cardConfirm()
        // e verificar

            $.ajax({
                url: $(this).attr('logout'),
                method: "POST",
                success : function (response) {
                    window.location.href = '../../../../index.html';
                },
                error: function (xhr, statusServer, errorName) {
                    console.log(`${xhr} - ${statusServer}, ${errorName}`)
                }
    
            })
     

        
    })
})