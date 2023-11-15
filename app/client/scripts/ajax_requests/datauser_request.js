$('#login_btn').click(() => {
    
    let btnGoToDataUser = $('#login_btn');

    ajaxRequest(
        btnGoToDataUser.attr('dataUser'),
        "POST",
        'json',
        null,
        'loadingUserData'
    )
})