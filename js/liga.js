function setDatum() {
    var id = $('#spieltag').val();
    var actualOption = $('#spieltag option[value="' + id + '"]')[0];
    var von = $(actualOption).data('von').unserDatumsFormat();
    var bis = $(actualOption).data('bis').unserDatumsFormat();
    var html = (von != undefined && bis != undefined
             ? von + ' - ' + bis
             : '')
    $('#selecedDatum').html(html);
}

String.prototype.unserDatumsFormat = function() {
    if (!this.match(/\d{4}-\d{2}-\d{2}/)) return;
    var datum = this.match(/(\d{4})-(\d{2})-(\d{2})/).slice(1);
    return datum.reverse().join('.');
}
