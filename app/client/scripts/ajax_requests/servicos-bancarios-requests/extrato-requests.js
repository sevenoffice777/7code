document.addEventListener('DOMContentLoaded', ()=>{
    ajaxRequest(
        '../../../server/models/historyRows.php',
        'POST',
        'JSON',
        null,
        "rowHistory"
    );
})