$(document).ready(function () {
  $("form").submit(function (event) {
    event.preventDefault();
    var formData = $(this).serialize();
    $.ajax({
      type: "POST",
      url: "http://localhost/rppp/server/CreatePapers.php",
      data: formData,
      dataType: "json",
      success: function (response) {
        if (response.success) {
          alert("New record created successfully");
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
});
