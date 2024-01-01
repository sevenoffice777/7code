function inicializarOperacaoDeTransferencia() {
    let input_conta_destino = document.querySelector("[name=account_id_destiny]");
    let input_valor_transferencia = document.querySelector("[name=valor_transferencia]");
    let input_desc_transferencia = document.querySelector("[name=desc_transferencia]");
        // verificar se um dos inputs acima estao vazios
    if (
        input_conta_destino.value == ""
        || input_valor_transferencia.value == "" 
        || /^\d+$/.test(input_valor_transferencia) === false 
        || /^\d{9}$/.test(input_conta_destino) === false
        || input_desc_transferencia == ""
     )
     {
        return false;       
     } // agora como condição contraria verificar se o valor que esta dentro de input_valor é sao apenas numeros
    

}

function clearInputs(){
    let input_conta_destino = document.querySelector("[name=account_id_destiny]");
    let input_valor_transferencia = document.querySelector("[name=valor_transferencia]");
    let input_desc_transferencia = document.querySelector("[name=desc_transferencia]");

    input_conta_destino.textContent = "";
    input_valor_transferencia.textContent = "";
    input_desc_transferencia.textContent = "";
}