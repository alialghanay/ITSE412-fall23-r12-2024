function deletePapers(pid) {
  var confirmation = confirm("Are you sure you want to delete this papers?");
  if (confirmation) {
    $.ajax({
      type: "POST",
      url: "http://localhost/ITSE412-fall23-r12/server/DeletePapers.php",
      data: {
        pid: pid,
      },
      dataType: "json",
      success: function (response) {
        alert(response.message);
        read();
      },
      error: function (xhr, status, error) {
        console.error("AJAX Error: " + xhr.responseText);
      },
    });
  }
}
