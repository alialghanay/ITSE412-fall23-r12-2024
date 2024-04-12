$(document).ready(function() {
  // Intercept form submission
  $('form').submit(function(event) {
      // Prevent the default form submission
      event.preventDefault();

      // Validate the form
      if (!this.checkValidity()) {
          // If the form is not valid, display validation messages
          $(this).addClass('was-validated');
          return; // Exit the function if form is not valid
      }

      // Serialize form data
      var formData = $(this).serialize();
      // Send an AJAX request
      $.ajax({
          type: 'POST',
          url: 'http://localhost/ITSE412-fall23-r12/server/register.php',
          data: formData,
          dataType: 'json',
          success: function(response) {
              alert(response.message);
              window.location.href = 'http://localhost/ITSE412-fall23-r12/client/admin.html';
          }
      });
  });
});
