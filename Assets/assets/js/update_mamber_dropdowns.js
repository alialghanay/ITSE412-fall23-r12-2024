$(document).ready(function () {
  // Fetch data from the PHP file
  $.ajax({
    url: "http://localhost/rppp/server/get_mamber_data.php",
    type: "GET",
    dataType: "json",
    success: function (data) {
      // Update User dropdown
      var userDropdown = $("#user");
      userDropdown.empty();
      userDropdown.append(
        $('<option selected="" disabled="">Choose...</option>')
      );
      $.each(data.users, function (index, user) {
        userDropdown.append(
          $("<option></option>").attr("value", user.id).text(user.username)
        );
      });

      // Update Paper dropdown
      var paperDropdown = $("#paper");
      paperDropdown.empty();
      paperDropdown.append(
        $('<option selected="" disabled="">Choose...</option>')
      );
      $.each(data.papers, function (index, paper) {
        paperDropdown.append(
          $("<option></option>").attr("value", paper.p_id).text(paper.title)
        );
      });

      // Update Application dropdown
      var applicationDropdown = $("#application");
      applicationDropdown.empty();
      applicationDropdown.append(
        $('<option selected="" disabled="">Choose...</option>')
      );
      $.each(data.applications, function (index, application) {
        applicationDropdown.append(
          $("<option></option>")
            .attr("value", application.app_id)
            .text(application.app_name)
        );
      });
    },
    error: function (xhr, status, error) {
      console.error("Error fetching data:", error);
      // Handle error appropriately, e.g., show an error message to the user
    },
  });
});
