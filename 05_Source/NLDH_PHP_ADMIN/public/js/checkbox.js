document.getElementById('checked').addEventListener('change', function() {
    var checkboxes = document.querySelectorAll('.option_checkbox');
    checkboxes.forEach(function(checkbox) {
        checkbox.checked = document.getElementById('checked').checked;
    });
});
