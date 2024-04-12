$(document).ready(function () {
  // When the submit button is clicked
  $("#submitBtn").click(function (event) {
    // Prevent the default form submission behavior
    event.preventDefault();
    // Send an AJAX POST request
    $.ajax({
      type: "POST",
      url: "http://localhost/ITSE412-fall23-r12/server/insert_member.php", // URL to the server-side script
      data: $("form").serialize(), // Serialize the form data
      success: function (data) {
        // If data insertion is successful
        if ("Data inserted successfully!" == data) {
          // Redirect to the view members page
          window.location.href = "http://localhost/ITSE412-fall23-r12/client/veiw-members.html";
        } else {
          // Otherwise, alert the error message
          alert(data);
        }
      },
      error: function (xhr, status, error) {
        // If an error occurs during the AJAX request, log the error
        console.error("AJAX Error: " + status + " - " + error);
      },
    });
  });
});
