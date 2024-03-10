$(document).ready(function () {
  $.ajax({
    type: "GET",
    url: "http://localhost/rppp/server/ReadPapers.php",
    dataType: "json",
    success: function (response) {
      if (response.status === "success") {
        // Clear existing table data
        $("#papers tbody").empty();
        // Populate table with retrieved data
        response.papers.forEach(function (paper, index) {
          var row =
            "<tr>" +
            "<td>" +
            paper.p_id +
            "</td>" +
            "<td>" +
            paper.title +
            "</td>" +
            "<td>" +
            paper.state +
            "</td>" +
            "<td>" +
            paper.mem_id +
            "</td>" +
            "<td>" +
            paper.year +
            "</td>" +
            "<td>" +
            paper.abstract +
            "</td>" +
            "<td>" +
            '<button type="button" class="btn btn-warning btn-sm me-2 update-btn" onClick="updateForm(' +
            paper.p_id +
            ')">Update</button>' +
            '<button type="button" class="btn btn-danger btn-sm" onclick="deletePapers(' +
            paper.p_id +
            ')">Delete</button>' +
            "</td>" +
            "</tr>";
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
});
