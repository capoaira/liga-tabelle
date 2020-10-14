function openSpiel(obj) {
    var spiel = $(obj).parent().parent();
    console.log(spiel);
    var spielId = $(spiel).data('id');
    var heimVerein = $(spiel).find('.spiel_info span span')[0].innerHTML;
    var heimVereinTore = $(spiel).find('.spiel_info > span')[1].innerHTML.match(/\d{1,2}/g)[0];
    var auswVerein = $(spiel).find('.spiel_info span span')[1].innerHTML;
    var auswVereinTore = $(spiel).find('.spiel_info > span')[1].innerHTML.match(/\d{1,2}/g)[1];

    var popup = $('#spielBearbeiten');
    $(popup).find('#spielId').val(spielId);
    $(popup).find('[for="heimverein"]').html(heimVerein);
    $(popup).find('#heimVereinTore').val(heimVereinTore);
    $(popup).find('[for="auswaertsverein"]').html(auswVerein);
    $(popup).find('#auswaertsVereinTore').val(auswVereinTore);

    $(popup).css('display', 'block');
}

function openSpieltag(obj) {
    var spieltag = $(obj).parent().parent();
    var spieltagId = spieltag.data('id');
    var von = spieltag.find('.spieltag_info span')[0].getAttribute('id');
    var bis = spieltag.find('.spieltag_info span')[1].getAttribute('id');

    var popup = $('#spieltagBearbeiten');
    $(popup).find('#spieltagId').val(spieltagId);
    $(popup).find('#von').val(von);
    $(popup).find('#bis').val(bis);

    $('#spieltagBearbeiten').css('display', 'block');
}