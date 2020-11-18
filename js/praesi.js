$(document).ready(function() {
    $('#neueSpieltageUndSpiele .warnung')[0].addEventListener('click', fill)
});

function fill() {
    var dates = [
        "2020-04-01",
        "2020-04-04",

        "2020-04-10",
        "2020-04-14",

        "2020-04-20",
        "2020-04-24",

        "2020-04-30",
        "2020-05-01",

        "2020-05-10",
        "2020-05-14",

        "2020-05-20",
        "2020-05-24"
    ];

    $('#neueSpieltageUndSpiele input[type="date"]').each(function(i, val) {
        this.value = dates[i];
    });
}
