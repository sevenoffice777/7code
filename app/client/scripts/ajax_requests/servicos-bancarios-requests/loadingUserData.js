document.addEventListener('DOMContentLoaded', function () {
    ajaxRequest(
        '../../../server/models/datauser.php',
        "POST",
        'json',
        null,
        'loadingUserData'
    )
});

document.querySelectorAll('[btn-logout]').forEach((e) => {
    e.addEventListener('click', () => {
        if (confirm("Tem certeza que deseja fazer LOGOUT da sua conta?")) {
            ajaxRequest(
                e.getAttribute('logout'),
                "POST",
                null,
                null,
                'logoutUserReturn'
            );
        }
    })
})