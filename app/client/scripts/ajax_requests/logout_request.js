
document.querySelectorAll('.logout-icon').forEach((e) => {
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
