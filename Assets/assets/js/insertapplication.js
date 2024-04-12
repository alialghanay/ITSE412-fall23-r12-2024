$(document).ready(function () {
  (function ($) {
    
      $("form").submit(function (event) {
          event.preventDefault();
          var formData = $(this).serialize();
          $.ajax({
              type: "POST",
              url: "http://localhost/ITSE412-fall23-r12/server/insertapplication.php",
              data: formData,
              dataType: "json",
              success: function (response) {
                  if (response.success) {
                      alert("New record created successfully");
                      veiw();
                      $("form")[0].reset();
                  } else {
                      alert("Error: " + response.message);
                  }
              },
              error: function () {
                  alert("An error occurred while processing your request.");
              },
          });
      });
  })(jQuery);
});
