function ajaxRequest(urlRequest, methodRequest, dataTypeRequest = null) {
    $.ajax({
        url: urlRequest,
        method: methodRequest,
        cache: false,
        dataType: dataTypeRequest,
        contentType: false,
        processData: false,
        data: formData,
        success: function () {
            return true
        },
        error: function (xhr, statusServer, errorName) {
            console.log(`${xhr} - ${statusServer}, ${errorName}`)
            return false
        }
    })
}