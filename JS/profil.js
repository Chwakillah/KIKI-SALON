document.addEventListener("DOMContentLoaded", function() {
    const editButton = document.getElementById('edit-button');
    const cancelButton = document.getElementById('cancel-button');
    const saveButton = document.getElementById('save-button');

    editButton.onclick = function() {
        toggleFields(true);
    };

    cancelButton.onclick = function() {
        toggleFields(false);
        window.location.reload(); // Reload the page to restore data
    };

    saveButton.onclick = function() {
        document.forms[0].submit();
    };

    function toggleFields(editMode) {
        document.getElementById('name-input').style.display = editMode ? '' : 'none';
        document.getElementById('email-input').style.display = editMode ? '' : 'none';
        document.getElementById('address-input').style.display = editMode ? '' : 'none';
        document.getElementById('phone-input').style.display = editMode ? '' : 'none';
        document.getElementById('password-input').style.display = editMode ? '' : 'none';

        document.getElementById('name-field').style.display = !editMode ? '' : 'none';
        document.getElementById('email-field').style.display = !editMode ? '' : 'none';
        document.getElementById('address-field').style.display = !editMode ? '' : 'none';
        document.getElementById('phone-field').style.display = !editMode ? '' : 'none';
        document.getElementById('password-field').style.display = !editMode ? '' : 'none';

        editButton.style.display = !editMode ? '' : 'none';
        cancelButton.style.display = editMode ? '' : 'none';
        saveButton.style.display = editMode ? '' : 'none';
    }
});
