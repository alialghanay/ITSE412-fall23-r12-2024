$(document).ready(function() {
    $('form').submit(function(e) {
      e.preventDefault(); // Prevent the form from submitting normally
      var formData = {
        username: $('#yourUsername').val(),
        password: $('#yourPassword').val()
      };

      $.ajax({
        type: 'POST',
        url: 'http://localhost/rppp/server/login.php',
        data: formData,
        dataType: 'json',
        success: function(response) {
          if (response.success) {
            // Login successful, display alert
            alert(response.message);
            // Redirect to another page or perform other actions as needed
          } else {
            // Login failed, display error message
            alert(response.message);
          }
        },
        error: function(xhr, status, error) {
          // Handle AJAX error
          console.error(xhr.responseText);
        }
      });
    });
});


