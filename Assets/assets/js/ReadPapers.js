$(document).ready(function () {
  read();

  $("#papers").on("click", ".file-cell", function () {
    var fileName = $(this).data("file");
    if (fileName) {
      window.location.href = "path_to_your_files/" + fileName;
    }
  });
});

function read() {
  $.ajax({
    type: "GET",
    url: "http://localhost/ITSE412-fall23-r12/server/ReadPapers.php",
    dataType: "json",
    success: function (response) {
      if (response.status === "success") {
        $("#papers tbody").empty();

        response.papers.forEach(function (paper, index) {
          var row = paper;
          $("#papers tbody").append(row);
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
