document.addEventListener("DOMContentLoaded", function() {
    var inputs = document.querySelectorAll('input');
    inputs.forEach(function(input) {
        input.addEventListener('focus', function() {
            this.setAttribute('data-placeholder', this.placeholder);
            this.placeholder = ''; // Kosongkan placeholder saat fokus
        });
        input.addEventListener('blur', function() {
            this.placeholder = this.getAttribute('data-placeholder'); // Kembalikan placeholder saat blur
        });
    });
});
document.addEventListener("DOMContentLoaded", function() {
    var inputFields = document.querySelectorAll('.field-container input');

    inputFields.forEach(function(input) {
        input.addEventListener('focus', function() {
            this.parentNode.classList.add('focused'); // Tambahkan class 'focused' ke parent
        });
        input.addEventListener('blur', function() {
            this.parentNode.classList.remove('focused'); // Hapus class 'focused'
        });
    });
});