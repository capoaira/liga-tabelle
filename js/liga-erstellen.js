function addVerein()  {
    if ($('#select').val() == 'neuerVerein') {
        $('#liganame').removeAttr('required');
        $('#vereinsname').attr('required', 'true');
        $('#vereinErstellen').css('display', 'block');
    } else if ($('#select').val() != 'select') {
        let vereinsId = $('#select').val();
        let html = '<label>' + $('#select option[value="' + vereinsId + '"]').html();
           html += '    <input type="hidden" name="vereine[]" value="' + vereinsId + '">';
           html += '    <img src="../img/loeschen.png" class="img_btn" onclick="this.parentNode.remove();">';
           html += '</label>';
        $('#vereinsListe').append(html);
    }
}

function closeVerein() {
    $('#liganame').attr('required', 'true');
    $('#vereinsname').removeAttr('required');
    $('#vereinErstellen').css('display', 'none');
}

function changeBild(obj) {
    let name = obj.value;
    let pos = name.lastIndexOf('\\');
    name = name.substr(pos+1, name.lenght);
    $(obj).parent().find('span:nth-child(2)').html(name);
}
