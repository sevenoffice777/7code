$('.logout-icon').each(()=>{
    $(this).click((event)=>{
        $.ajax({
            url: $(this).attr('logout'),
            method: "POST",
            success : function (response) {
                window.locaion.href = '../views/index.php'
            }

        })

        
    })
})