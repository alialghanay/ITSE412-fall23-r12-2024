// Function to redirect to the update-member page with user_id parameter
function updateMember(user_id) {
  window.location.href =
    "http://localhost/ITSE412-fall23-r12/client/update-member.html?user_id=" +
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
        // Call updateCall function to handle form submission for updating member details
        updateCall(user_id);
      },
      error: function (xhr, status, error) {
        console.error("Error fetching member details:", error);
      },
    });
  }

  // Function to update member details on the page
  function updateMemberDetails(memberDetails) {
    $("#username").text(memberDetails.username.toUpperCase());
    $("#work").val(memberDetails.work);
    $("#specialization").val(memberDetails.specialization);
    $("#phone").val(memberDetails.phone);
    $("#country").val(memberDetails.country);
    $("#biography").text(memberDetails.biography);
    $("#title").val(memberDetails.title);
    $("#paper").val(memberDetails.p_id);
    $("#application").val(memberDetails.app_id);
    $("#lan1").val(memberDetails.lan1);
    $("#lan2").val(memberDetails.lan2);
    var memberRoles = memberDetails.roles;
    var memberRolesString = getRolesString(memberRoles);
    switch (memberRolesString.toLowerCase()) {
      case "admin":
        $("#gridRadios1").prop("checked", true);
        break;
      case "author":
        $("#gridRadios2").prop("checked", true);
        break;
      case "reviewer":
        $("#gridRadios3").prop("checked", true);
        break;
      default:
        break;
    }
  }

  // Function to convert role ID to role name
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

// Function to handle form submission for updating member details
function updateCall(id) {
  $("#submitBtn").click(function (event) {
    // If user_id is not provided, get it from the URL
    if (id == null) {
      function getParameterByName(name, url) {
        if (!url) url = window.location.href;
        name = name.replace(/[\[\]]/g, "\\$&");
        var regex = new RegExp("[?&]" + name + "(=([^&#]*)|&|#|$)"),
          results = regex.exec(url);
        if (!results) return null;
        if (!results[2]) return "";
        return decodeURIComponent(results[2].replace(/\+/g, " "));
      }

      id = getParameterByName("user_id");
    }
    // Prevent default form submission behavior
    event.preventDefault();
    // Serialize form data
    var formData = $("#update-member-form").serialize();
    // Append user_id to form data
    formData += "&user=" + id;
    // Send an AJAX POST request to update member details
    $.ajax({
      type: "POST",
      url: "http://localhost/ITSE412-fall23-r12/server/update_member.php",
      data: formData,
      success: function (data) {
        // If data is successfully updated, redirect to view-members page
        window.location.href =
          "http://localhost/ITSE412-fall23-r12/client/veiw-members.html";
        alert(data);
      },
      error: function (xhr, status, error) {
        console.error("AJAX Error: " + status + " - " + error);
      },
    });
  });
}
