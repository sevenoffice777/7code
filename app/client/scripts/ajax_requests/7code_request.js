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

// document.querySelector('#btn-upload').onclick = () => {
//     let formData = new FormData();
    
//     formData.append('file', document.querySelector('#uploadPhotoInput').files[0]);
    
//     // console.log(formData.get('file').name);

//     ajaxRequest(
//         document.querySelector('#btn-upload').getAttribute('upload-photo'),
//         "POST",
//         "JSON",
//         formData,
//         "uploadPhoto"
//     )
// }
