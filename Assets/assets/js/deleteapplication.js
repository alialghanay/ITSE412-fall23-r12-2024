function deleteApps(appid) {
    var confirmation = confirm("Are you sure you want to delete this app?");
    if (confirmation) {
      $.ajax({
        type: "POST",
        url: "http://localhost/rppp/server/deleteApplication.php",
        data: {
          appid: appid,
        },
        dataType: "json",
        success: function (response) {
          console.log("Delete response:", response);
          if (response.success) {
            alert(response.message);
            location.reload();
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
  