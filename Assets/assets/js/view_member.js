// Function to redirect to the view-member page with user_id parameter
function viewMember(user_id) {
  window.location.href =
    "http://localhost/ITSE412-fall23-r12/client/veiw-member.html?user_id=" +
    user_id;
}

$(document).ready(function () {
  // Function to get the value of a query parameter from the URL
  function getParameterByName(name, url) {
    if (!url) url = window.location.href;
    name = name.replace(/[\[\]]/g, "\\$&");
    var regex = new RegExp("[?&]" + name + "(=([^&#]*)|&|#|$)"),
      results = regex.exec(url);
    if (!results) return null;
    if (!results[2]) return "";
    return decodeURIComponent(results[2].replace(/\+/g, " "));
  }

  // Get the user_id from the URL
  var user_id = getParameterByName("user_id");

  // If user_id is present in the URL
  if (user_id) {
    // Send an AJAX GET request to fetch member details based on user_id
    $.ajax({
      url: "http://localhost/ITSE412-fall23-r12/server/get_member_details.php",
      type: "GET",
      dataType: "json",
      data: { user_id: user_id },
      success: function (data) {
        // Call updateMemberDetails function to update member details on the page
        updateMemberDetails(data);
      },
      error: function (xhr, status, error) {
        console.error("Error fetching member details:", error);
      },
    });
  }

  // Function to update member details on the page
  function updateMemberDetails(memberDetails) {
    $("#username").text(memberDetails.username.toUpperCase());
    $("#specializtion").text(memberDetails.specialization); // Typo: should be specialization
    $("#roles").text(getRolesString(memberDetails.roles));
    $("#paper").text(memberDetails.paper_title);
    $("#work").text(memberDetails.work);
    $("#phone").text(memberDetails.phone);
    $("#country").text(memberDetails.country);
    $("#biography").text(memberDetails.biography);
    $("#title").text(memberDetails.title);
    $("#paper").text(memberDetails.paper); // Typo: should be removed if not necessary
    $("#lan1").text(memberDetails.lan1);
    $("#lan2").text(memberDetails.lan2);
    $("#application").text(memberDetails.application_name);
  }

  // Function to convert role ID to role name
  function getRolesString(roles) {
    if (roles == 1) {
      return "Admin";
    } else if (roles == 2) {
      return "Author";
    } else if (roles == 3) {
      return "Reviewer";
    }
    return "Unknown";
  }
});
