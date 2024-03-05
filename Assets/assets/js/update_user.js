$(document).ready(function() {
    $('#updateForm').submit(function(e) {
        e.preventDefault(); // Prevent the form from submitting normally

        // Retrieve form data
        var formData = {
            userId: $('#userId').val(),
            newUsername: $('#newUsername').val(),
            newEmail: $('#newEmail').val(),
            newPassword: $('#newPassword').val()
        };

        // Send AJAX request to update_user.php
        $.ajax({
            type: 'POST',
            url: 'http://localhost/rppp/server/update_user.php',
            data: formData,
            dataType: 'json',
            success: function(response) {
                if (response.success) {
                    // If the update is successful, display a success message
                    alert(response.message);
                    // Optionally, you can redirect the user to another page
                    // window.location.href = 'some_other_page.php';
                } else {
                    // If the update fails, display an error message
                    alert(response.message);
                }
            },
            error: function(xhr, status, error) {
                // If there is an AJAX error, display the error message
                console.error('AJAX Error: ' + xhr.responseText);
            }
        });
    });
});
