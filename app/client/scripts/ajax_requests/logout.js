$('.logout-icon').each(()=>{
    $(this).click((event)=>{
        // Nessa inha eu vou executar a 
        // let cardConfirm = cardConfirm()
        // e verificar

        if(cardConfirm) {
            $.ajax({
                url: $(this).attr('logout'),
                method: "POST",
                success : function (response) {
                    window.locaion.href = '../../../index.html';
                },
                error: function (xhr, statusServer, errorName) {
                    console.log(`${xhr} - ${statusServer}, ${errorName}`)
                }
    
            })
        }      

        
    })
})