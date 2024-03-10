function updateForm(pid) {
  $.ajax({
    type: "POST",
    url: "http://localhost/rppp/server/ReadPapersById.php",
    dataType: "json",
    data: {
      pid: pid,
    },
    success: function (response) {
      if (response.status === "success") {
        var paper = response.papers[0];
        alert(paper.title);
        $("#title").val(paper.title);
        $("#abstract").val(paper.abstract);
        $("#year").val(paper.year);
        $("#app_id").val(paper.app_id);
        $("#state").val(paper.state);
        $("#mem_id").val(paper.mem_id);
        $("#lan").val(paper.lan);

        var button = $("#submitButton");
        button.html("Update").attr("type", "button");

        button.off("click").on("click", function () {
          updatePaper(pid);
          $("#paperForm")[0].reset();
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

function updatePaper(id) {
  var formData = $("#paperForm").serialize(); // Assuming your form has id="paperForm"
  formData += "&p_id=" + id; // Include the paper ID in the form data

  $.ajax({
    type: "POST",
    url: "http://localhost/rppp/server/UpdatePapers.php",
    data: formData,
    dataType: "json",
    success: function (response) {
      if (response.success) {
        alert("Paper updated successfully");
        // Optionally, you can reset the form after successful update
        $("#paperForm")[0].reset();
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
