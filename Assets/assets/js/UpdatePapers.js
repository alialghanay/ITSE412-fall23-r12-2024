function updateForm(pid) {
  console.log(pid);
  $.ajax({
    type: "POST",
    url: "http://localhost/ITSE412-fall23-r12/server/ReadPapersById.php",
    dataType: "json",
    data: {
      pid: pid,
    },
    success: function (response) {
      if (response.status === "success") {
        var paper = response.papers[0];
        $("#title").val(paper.title);
        $("#abstract").val(paper.abstract);
        $("#year").val(paper.year);
        $("#app_id").val(paper.app_id);
        $("#state").val(paper.state);
        $("#mem_id").val(paper.mem_id);
        $("#lan").val(paper.lan);

        var divArray = $("#but-array");
        divArray.empty();

        var updateButton =
          '<button type="button" class="btn btn-primary" name="update" onclick="updatePaper(' +
          pid +
          ')">update</button>';
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

function updatePaper(id) {
  var formData = new FormData();
  var serializedData = $("#paperForm").serializeArray();
  $.each(serializedData, function (index, item) {
    formData.append(item.name, item.value);
  });
  var fileInput = $("#file")[0].files[0];
  if (fileInput) {
    formData.append("file", fileInput);
  }
  formData.append("p_id", id);
  $.ajax({
    type: "POST",
    url: "http://localhost/rppp/server/UpdatePapers.php",
    data: formData,
    contentType: false,
    processData: false,
    success: function (response) {
      alert(response.message);
      $("form")[0].reset();
      var divArray = $("#but-array");
      divArray.empty();

      var submitButton =
        '<button type="submitButton" class="btn btn-primary" name="submit"id="submitButton">submit</button>';
      divArray.append(submitButton);
      read();
    },
    error: function (xhr, status, error) {
      console.error("AJAX Error: " + xhr.responseText);
    },
  });
}
