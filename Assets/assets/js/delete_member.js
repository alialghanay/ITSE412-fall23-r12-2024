function deleteMember(userId) {
  // Ask for confirmation before deleting the member
  var confirmation = confirm("Are you sure you want to delete this member?");
  if (confirmation) {
    // If confirmed, send an AJAX POST request to delete_member.php
    $.ajax({
      type: "POST",
      url: "http://localhost/ITSE412-fall23-r12/server/delete_member.php",
      data: {
        userId: userId, // Pass the userId to the server
      },
      dataType: "json",
      success: function (response) {
        // If deletion is successful, alert the message returned from the server
        alert(response.message);
        // Remove the deleted member's row from the HTML table
        var str = "#data-user-" + userId;
        $("#member-table").find(str).remove();
      },
      error: function (xhr, status, error) {
        // If an error occurs during the AJAX request, log the error
        console.error("AJAX Error: " + xhr.responseText);
      },
    });
  }
}