function addVerein()  {
    $('#liganame').removeAttr('required');
    if ($('#select').val() == 'neuerVerein') {
        $('#vereinErstellen').css('display', 'block');
    }
}

function closeVerein() {
    $('#liganame').attr('required', 'true');
    $('#vereinErstellen').css('display', 'none');
}