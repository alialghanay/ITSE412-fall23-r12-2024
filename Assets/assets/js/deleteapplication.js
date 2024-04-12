function deleteApps(appid) {
    var confirmation = confirm("Are you sure you want to delete this app?");
    if (confirmation) {
      $.ajax({
        type: "POST",
        url: "http://localhost/ITSE412-fall23-r12/server/deleteApplication.php",
        data: {
          appid: appid,
        },
        dataType: "json",
        success: function (response) {
          console.log(response);
          if (response.status === 'success') {
            alert(response.message);
            veiw();
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
  