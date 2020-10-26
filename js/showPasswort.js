function showPasswort(obj) {
    if (obj.checked == true) {
        obj.parentNode.querySelector('input[type="password"]').type = 'text';
    } else {
        obj.parentNode.querySelector('input[type="text"]').type = 'password';
    }
}

$(document).ready(function() {
    $('input[type="password"]').each(function(i) {
        input = $('input[type="password"]')[i];
        $(input).on('focus', function() {
            this.parentNode.classList.add('focus');
        });
        $(input).on('focusout', function() {
            this.parentNode.classList.remove('focus');
        });
    });
});