
// SEÇÃO DE UPLOAD DA FOTO DO USUARIO
{
    document.querySelector('#uploadPhoto').addEventListener('click', () => {
        // Aciona o clique no input de arquivo
        document.querySelector('#uploadPhotoInput').click();
    });

    document.querySelector('#uploadPhotoInput').addEventListener('change', () => {
        const previewImage = document.querySelector('#uploadPhoto');

        if (document.querySelector('#uploadPhotoInput').files[0]) {
            const reader = new FileReader();

            reader.onload = function (e) {
                previewImage.src = e.target.result;
            }


            reader.readAsDataURL(document.querySelector('#uploadPhotoInput').files[0]);
        }
    });
}


document.querySelectorAll('.user-data-container').forEach((element) => {
    element.addEventListener("click", () => {
        let header_responsive = document.querySelector('.header-responsive-7code');
        if (header_responsive.classList.contains('h-r-pstv-pos')) {
            toggleClass(document.querySelector('.header-responsive-7code'), 'h-r-pstv-pos', 'h-r-ngtv-pos');
            if (document.querySelector('.card-default-centerscreen').classList.contains('display_none')) {
                toggleClass(document.querySelector('.user-data-card'), 'display_none')
            }
        } else if (document.querySelector('.card-default-centerscreen').classList.contains('display_none')) {
            toggleClass(document.querySelector('.user-data-card'), 'display_none')
        }
    })
})




// CLICOU EM UM O OUTRO SOME, DADOS DO USUARIO, CARD DE ENVIAR A IMAGEM PRO BANCO DE DADOS
document.querySelector('#btn-photo-edit').addEventListener('click', () => {
    toggleClass(document.querySelector('.user-data-card'), 'display_none')
    toggleClass(document.querySelector('.card-default-centerscreen'), 'display_none')

})

//  O evento abaixo e focado pra clique fora de qualquer div, 
// por exemplo, clicando fora do card ele desaparece; divs "flutuantes"
document.querySelector('.container').addEventListener("click", () => {
    if (!document.querySelector('.user-data-card').classList.contains('display_none')) {
        toggleClass(document.querySelector('.user-data-card'), 'display_none')
    }
    if (!document.querySelector('.card-default-centerscreen').classList.contains('display_none')) {
        toggleClass(document.querySelector('.card-default-centerscreen'), 'display_none')
    }

})



