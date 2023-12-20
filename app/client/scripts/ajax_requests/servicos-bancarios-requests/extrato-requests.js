document.addEventListener('DOMContentLoaded', ()=>{
    ajaxRequest(
        '../../../server/models/historyRows.php',
        'POST',
        'JSON',
        "GET_ROWSHISTORY",
        "rowHistory"
    );
})