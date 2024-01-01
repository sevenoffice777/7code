var btn_transferencia = document.querySelector("#btn_transferencia")

btn_transferencia.onclick = (e) => {
    e.preventDefault()  //impede que o formulário seja enviado por um submit normal
    let res = inicializarOperacaoDeTransferencia();
    if(res) {
        let formTransferencias = document.querySelector('#dataForm_transferencias');
        let formData = new FormData(formTransferencias);
    
        ajaxRequest(
            "../../../server/models/transferenciasMenu.php",
            "POST",
            "JSON",
            formData,
            "transferenciasResponse"            
        ) // o primeiro parametro é a url para onde esta o php!
    } else {
        alert("Preencha todos os campos!");
        clearInputs();
    }
}