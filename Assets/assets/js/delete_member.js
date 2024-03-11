function deleteMember(userId) {
  var confirmation = confirm("Are you sure you want to delete this member?");
  if (confirmation) {
    $.ajax({
      type: "POST",
      url: "http://localhost/rppp/server/delete_member.php",
      data: {
        userId: userId,
      },
      dataType: "json",
      success: function (response) {
        console.log("Delete response:", response);
        if (response.success) {
          alert(response.message);
          $("#userTable")
            .find("button[data-user-id='" + userId + "']")
            .closest("tr")
            .remove();
        } else {
          alert(response.message);
        }
      },
      error: function (xhr, status, error) {
        console.error("AJAX Error: " + xhr.responseText);
      },
    });
  }
}
