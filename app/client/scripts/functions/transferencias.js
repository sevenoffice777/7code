function inicializarOperacaoDeTransferencia() {
    let input_conta_destino = document.querySelector("[name=account_id_destiny]");
    let input_valor_transferencia = document.querySelector("[name=valor_transferencia]");
    let input_desc_transferencia = document.querySelector("[name=desc_transferencia]");
        // verificar se um dos inputs acima estao vazios
    if (
        input_conta_destino.value == ""
        || input_valor_transferencia.value == "" 
        || /^\d+$/.test(input_valor_transferencia.value) === false 
        || /^\d{9}$/.test(input_conta_destino.value) === false
        || input_desc_transferencia.value == ""
     )
     {
        return false;       
     } // agora como condição contraria verificar se o valor que esta dentro de input_valor é sao apenas numeros
    else {
        return true;
        
    }

}

document.querySelector("[name=account_id_destiny]").onblur = (e) => {
    document.querySelector("[thisValue=accountDestiny]").textContent = e.target.value; 
}
document.querySelector("[name=valor_transferencia]").onblur = (e) => {
    document.querySelector("[thisValue=valor_transferencia]").textContent = `R$ ${e.target.value}`; 
}


