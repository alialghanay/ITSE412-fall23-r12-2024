$(document).ready(function() {
    // Intercept form submission
    $('form').submit(function(event) {
      // Prevent the default form submission
      event.preventDefault();

      // Serialize form data
      var formData = $(this).serialize();
      alert('test');
      // Send an AJAX request
      $.ajax({
        type: 'POST',
        url: 'http://localhost/rppp/server/register.php',
        data: formData,
        dataType: 'json',
        success: function(response) {
          // Handle the response from the server
          if (response.success) {
            // If registration successful, display a success message
            alert(response.message);
            // Redirect or do any other action as needed
          } else {
            // If registration failed, display an error message
            alert(response.message);
          }
        }
      });
    });
  });