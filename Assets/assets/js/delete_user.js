function deleteUser(userId) {
    var confirmation = confirm("Are you sure you want to delete this user?");
    if (confirmation) {
        $.ajax({
            type: 'POST',
            url: 'http://localhost/rppp/server/delete_users.php',
            data: {
                userId: userId
            },
            dataType: 'json',
            success: function(response) {
                console.log('Delete response:', response);
                if (response.success) {
                    alert(response.message);
                    location.reload();
                } else {
                    alert(response.message);
                }
            },
            error: function(xhr, status, error) {
                console.error('AJAX Error: ' + xhr.responseText);
            }
        });
    }
}
