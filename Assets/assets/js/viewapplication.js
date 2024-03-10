$(document).ready(function () {
    $.ajax({
      type: "GET",
      url: "http://localhost/rppp/server/viewapplication.php",
      dataType: "json",
      success: function (response) {
        if (response.status === "success") {
          $("#apps tbody").empty();
          response.apps.forEach(function (app, index) {
            var row =
              "<tr>" +
              "<td>" +
              app.app_id +
              "</td>" +
              "<td>" +
              app.app_name +
              "</td>" +
              "<td>" +
              app.publish_number +
              "</td>" +
              "<td>" +
              app.publish_date +
              "</td>" +
              "<td>" +
              '<button type="button" class="btn btn-warning btn-sm me-2 update-btn" onClick="updateForm(' +
              app.app_id +
              ')">Update</button>' +
              '<button type="button" class="btn btn-danger btn-sm" onclick="deleteApps(' +
              app.app_id +
              ')">Delete</button>' +
              "</td>" +
              "</tr>";
            $("#apps tbody").append(row);
          });
        } else {
          console.error("Error: " + response.message);
        }
      },
      error: function (xhr, status, error) {
        console.error("AJAX Error: " + xhr.responseText);
      },
    });
  });
  