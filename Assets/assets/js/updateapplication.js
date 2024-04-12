function updateForm(appid) {
    $.ajax({
      type: "POST",
      url: "http://localhost:8000/ITSE412-fall23-r12/server/viewapplicationbyid.php",
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
          
          var divArray = $("#but-array");
          divArray.empty();

          var updateButton = '<button type="button" class="btn btn-primary" name="update" onclick="updateApp('+appid+')">update</button>';
          divArray.append(updateButton);

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
    var app_id = id;
    var app_name =  $("#app_name").val();
    var publish_number = $("#publish_number").val();
    var publish_date = $("#publish_date").val();

    $.ajax({
      type: "POST",
      url: "http://localhost:8000/ITSE412-fall23-r12/server/updateApplication.php",
      data: {
        app_id,
        app_name,
        publish_number,
        publish_date
      },
      dataType: "json",
      success: function (response) {
        alert(response.message);
          
        $("form")[0].reset();
        var divArray = $("#but-array");
        divArray.empty();

        var submitButton = '<button type="submitButton" class="btn btn-primary" name="submit"id="submitButton">submit</button>';
        divArray.append(submitButton);
        veiw();
      },
      error: function (xhr, status, error) {
        console.error("AJAX Error: " + xhr.responseText);
      },
    });
  }
  