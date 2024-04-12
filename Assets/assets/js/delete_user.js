function deleteUser(userId) {
    var confirmation = confirm("Are you sure you want to delete this user?");
    if (confirmation) {
        $.ajax({
            type: 'POST',
            url: 'http://localhost/ITSE412-fall23-r12/server/delete_user.php',
            data: {
                userId: userId
            },
            dataType: 'json',
            success: function(response) {
                alert(response.message); 
                $('#data-user-' + userId).remove();
            },
            error: function(xhr, status, error) {
                console.error('AJAX Error: ' + xhr.responseText);
            }
        });
    }
}