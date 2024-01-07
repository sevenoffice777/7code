function inicializarOperacaoDeTransferencia() {
    let input_conta_destino = document.querySelector("[name=account_id_destiny]");
    let input_valor_transferencia = document.querySelector("[name=valor_transferencia]");
    let input_desc_transferencia = document.querySelector("[name=desc_transferencia]");
        // verificar se um dos inputs acima estao vazios
    if (
        input_conta_destino.value == ""
        || input_valor_transferencia.value == "" 
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
    document.querySelector("[thisValue=valor_transferencia]").textContent = `${e.target.value}`; 
}

let input = document.querySelector("[name=valor_transferencia]");

input.addEventListener("input", (e)=>{
    let valor = input.value.replace(/\D/g, '');
    valor = (Number(valor) /100).toLocaleString('pt-BR',
    {
        style : 'currency',
        currency : 'BRL'
    });
    input.value = valor;
})

