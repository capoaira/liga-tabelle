function openPopup() {
    var vereinsname = $('.h1').html();
    var vereinsbeschreibung = $('.beschreibung').html();

    $('#vereinsname').val(vereinsname);
    $('#vereinsbeschreibung').html(vereinsbeschreibung);

    $('#vereinBearbeiten').css('display', 'block');
}