$(document).ready(function () {
  // Send an AJAX GET request to fetch member data from the server
  $.ajax({
    url: "http://localhost/ITSE412-fall23-r12/server/get_mamber_data.php", // URL of the php script
    type: "GET", // HTTP request type
    dataType: "json", // Expected data type of the response
    success: function (data) {
      // If the request is successful, populate dropdown menus with the retrieved data
      if (data.users.length > 0) {
        var userDropdown = $("#user");
        userDropdown.empty(); // Clear existing options
        userDropdown.append(
          $('<option selected="" disabled="">Choose...</option>')
        ); // Add a default disabled option
        // Loop through the users data and add each user as an option to the dropdown
        $.each(data.users, function (index, user) {
          userDropdown.append(
            $("<option></option>").attr("value", user.id).text(user.username)
          );
        });

        var paperDropdown = $("#paper");
        paperDropdown.empty(); // Clear existing options
        paperDropdown.append(
          $('<option selected="" disabled="">Choose...</option>')
        ); // Add a default disabled option
        // Loop through the papers data and add each paper as an option to the dropdown
        $.each(data.papers, function (index, paper) {
          paperDropdown.append(
            $("<option></option>").attr("value", paper.p_id).text(paper.title)
          );
        });

        var applicationDropdown = $("#application");
        applicationDropdown.empty(); // Clear existing options
        applicationDropdown.append(
          $('<option selected="" disabled="">Choose...</option>')
        ); // Add a default disabled option
        // Loop through the applications data and add each application as an option to the dropdown
        $.each(data.applications, function (index, application) {
          applicationDropdown.append(
            $("<option></option>")
              .attr("value", application.app_id)
              .text(application.app_name)
          );
        });
      } else {
        $("#main").empty();
        $("#main").append($("<h1>You have to add User First!</h1>"));
      }
    },
    error: function (xhr, status, error) {
      // If an error occurs during the AJAX request, log the error
      console.error("Error fetching data:", error);
    },
  });
});
