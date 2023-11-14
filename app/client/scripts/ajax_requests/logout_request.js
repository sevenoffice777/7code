import { ajaxRequest } from './ajax';

$('.logout-icon').each(( element) => {
    $(element).click(() => {
        if (confirm("Tem certeza que deseja fazer LOGOUT da sua conta?")) {
            ajaxRequest(
                $(element).attr('logout'),
                "POST",
                null,
                null,
                'prev'
            )
        }
    })
})
