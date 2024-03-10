function updateForm(appid) {
    $.ajax({
      type: "POST",
      url: "http://localhost/rppp/server/viewapplicationbyid.php",
      dataType: "json",
      data: {
        appid: appid,
      },
      success: function (response) {
        if (response.status === "success") {
          var app = response.apps[0];
          alert(app.app_name);
          $("#app_name").val(app.app_name);
          $("#publish_number").val(app.publish_number);
          $("#publish_date").val(app.publish_date);
  
          var button = $("#submitButton");
          button.html("Update").attr("type", "button");
  
          button.off("click").on("click", function () {
            updateApp(appid);
            $("#appForm")[0].reset();
            button.html("Submit Form").attr("type", "submit");
          });
        } else {
          console.error("Error: " + response.message);
        }
      },
      error: function (xhr, status, error) {
        console.error("AJAX Error: " + xhr.responseText);
      },
    });
  }
  
  function updateApp(id) {
    var formData = $("#appForm").serialize(); // Assuming your form has id="paperForm"
    formData += "&app_id=" + id; // Include the paper ID in the form data
  
    $.ajax({
      type: "POST",
      url: "http://localhost/rppp/server/UpdatePapers.php",
      data: formData,
      dataType: "json",
      success: function (response) {
        if (response.success) {
          alert("app updated successfully");
          // Optionally, you can reset the form after successful update
          $("#appForm")[0].reset();
          // Change button text back to "Submit Form"
          $("#submitButton").html("Submit Form").attr("type", "submit");
        } else {
          alert("Error: " + response.message);
        }
      },
      error: function (xhr, status, error) {
        console.error("AJAX Error: " + xhr.responseText);
      },
    });
  }
  