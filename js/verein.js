document.addEventListener("DOMContentLoaded", function () {
	document.getElementById('select').addEventListener('change', function() {
        console.log('change')
        console.log(this.value)
        if (this.value == 'neuerVerein') {
            document.getElementById('vereinErstellen').style.display = 'block';
        }
    });
});