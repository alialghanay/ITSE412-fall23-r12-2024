function viewMember(user_id) {
  window.location.href =
    "http://localhost/rppp/client/veiw-member.html?user_id=" + user_id;
}

$(document).ready(function () {
  function getParameterByName(name, url) {
    if (!url) url = window.location.href;
    name = name.replace(/[\[\]]/g, "\\$&");
    var regex = new RegExp("[?&]" + name + "(=([^&#]*)|&|#|$)"),
      results = regex.exec(url);
    if (!results) return null;
    if (!results[2]) return "";
    return decodeURIComponent(results[2].replace(/\+/g, " "));
  }

  // Get user_id from URL
  var user_id = getParameterByName("user_id");

  // Use user_id in AJAX request
  if (user_id) {
    $.ajax({
      url: "http://localhost/rppp/server/get_member_details.php",
      type: "GET",
      dataType: "json",
      data: { user_id: user_id },
      success: function (data) {
        updateMemberDetails(data);
      },
      error: function (xhr, status, error) {
        console.error("Error fetching member details:", error);
      },
    });
  }

  // Function to update HTML with member details
  function updateMemberDetails(memberDetails) {
    $("#username").text(memberDetails.username.toUpperCase());
    $("#specializtion").text(memberDetails.specialization);
    $("#roles").text(getRolesString(memberDetails.roles));
    $("#paper").text(memberDetails.paper_title);
    $("#work").text(memberDetails.work);
    $("#phone").text(memberDetails.phone);
    $("#country").text(memberDetails.country);
    $("#biography").text(memberDetails.biography);
    $("#title").text(memberDetails.title);
    $("#paper").text(memberDetails.paper);
    $("#lan1").text(memberDetails.lan1);
    $("#lan2").text(memberDetails.lan2);
    $("#application").text(memberDetails.application_name);
  }

  // Function to convert roles to a string
  function getRolesString(roles) {
    if (roles == 1) {
      return "Admin";
    } else if (roles == 2) {
      return "Author";
    } else if (roles == 3) {
      return "User";
    }
    return "Unknown";
  }
});
