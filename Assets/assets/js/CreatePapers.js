$(document).ready(function () {
  $("form").submit(function (event) {
    event.preventDefault();

    var formData = new FormData(this);

    $.ajax({
      type: "POST",
      url: "http://localhost/ITSE412-fall23-r12/server/CreatePapers.php",
      data: formData,
      contentType: false,
      processData: false,
      success: function (response) {
        alert(response);
        read();
      },

      error: function () {
        alert("An error occurred while processing your request.");
      },
    });
  });
});
