$(document).ready(function () {
  $.get(
    "http://localhost/ITSE412-fall23-r12/Assets/assets/components/header.html",
    function (data) {
      $("#header").append(data);
    }
  );
  $("#sidebar").load(
    "http://localhost/ITSE412-fall23-r12/Assets/assets/components/sidebar.html"
  );
  $("#footer").load(
    "http://localhost/ITSE412-fall23-r12/Assets/assets/components/footer.html"
  );
});
