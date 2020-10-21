function setDatum() {
    var id = $('#spieltag').val();

    if (id != 'default') {
        var actualOption = $('#spieltag option[value="' + id + '"]')[0];
        var von = $(actualOption).data('von');
        var bis = $(actualOption).data('bis');
        var html = von.unserDatumsFormat() + ' - ' + bis.unserDatumsFormat();
        $('#selecedDatum').html(html);

        var einTag = 1000 * 60 * 60 * 24; // Ein Tag in Millisekunden
        var vonDate = von.match(/(\d{4})-(\d{2})-(\d{2})/);
        var vonTS = new Date(vonDate[1], (vonDate[2]-1), vonDate[3]).getTime();
        var bisDate = bis.match(/(\d{4})-(\d{2})-(\d{2})/);
        var bisTS = new Date(bisDate[1], (bisDate[2]-1), bisDate[3]).getTime();
        var tage = (bisTS - vonTS) / einTag + 1;
    
        html = '';
        for (let i=0; i<tage; i++) {
            let tagTS = vonTS + einTag*i;
            let tag = new Date(tagTS);
            let jahr = tag.getFullYear();
            let monat = (tag.getMonth()+1).toString().padStart(2, '0');
            tag = tag.getDate().toString().padStart(2, '0');
            let datum = jahr + '-' + monat + '-' + tag;
            html += '<option value="' + datum + '">' + datum.unserDatumsFormat() + '</option>';
        }
        $('#date').html(html);
        $('.datetime').css('display', 'unset');
    } else {
        $('.datetime').css('display', 'none');
        $('#selecedDatum').html('');
    }
}

String.prototype.unserDatumsFormat = function() {
    if (!this.match(/\d{4}-\d{2}-\d{2}/)) return;
    var datum = this.match(/(\d{4})-(\d{2})-(\d{2})/).slice(1);
    return datum.reverse().join('.');
}
