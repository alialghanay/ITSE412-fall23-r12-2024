$(document).ready(function() {
  $('form').submit(function(e) {
      e.preventDefault(); // Prevent the form from submitting normally
      
      // Validate the form
      var form = $(this)[0];
      if (!form.checkValidity()) {
          // If the form is not valid, display validation messages
          $(form).addClass('was-validated');
          return;
      }
      
      // Form is valid, proceed with AJAX request
      var formData = {
          username: $('#yourUsername').val(),
          password: $('#yourPassword').val()
      };

      $.ajax({
          type: 'POST',
          url: 'http://localhost/ITSE412-fall23-r12/server/login.php',
          data: formData,
          dataType: 'json',
          success: function(response) {
             console.log(response)
              if (response.status == "success") {
                  window.location.href = 'http://localhost/ITSE412-fall23-r12/client/admin.html';
              } else {
                  // Display error message if login failed
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
