$(document).ready(function () {
  $("#submitBtn").click(function (event) {
    event.preventDefault();
    $.ajax({
      type: "POST",
      url: "http://localhost/rppp/server/insert_member.php",
      data: $("form").serialize(),
      success: function (data) {
        console.log(data);
        alert(data);
        $("form").trigger("reset");
      },
      error: function (xhr, status, error) {
        console.error("AJAX Error: " + status + " - " + error);
      },
    });
  });
});
