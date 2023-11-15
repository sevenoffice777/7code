document.addEventListener('DOMContentLoaded', function () {
    ajaxRequest(
        '../../../server/models/datauser.php',
        "POST",
        'json',
        null,
        'loadingUserData'
    )
});