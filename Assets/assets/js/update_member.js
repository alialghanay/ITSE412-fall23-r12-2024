function updateMember(user_id) {
  window.location.href =
    "http://localhost/rppp/client/update-member.html?user_id=" + user_id;
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
        updateCall(user_id);
      },
      error: function (xhr, status, error) {
        console.error("Error fetching member details:", error);
      },
    });
  }

  // Function to update HTML with member details
  function updateMemberDetails(memberDetails) {
    $("#username").text(memberDetails.username.toUpperCase());
    $("#work").val(memberDetails.work);
    $("#specializtion").val(memberDetails.specialization);
    $("#phone").val(memberDetails.phone);
    $("#country").val(memberDetails.country);
    $("#biography").text(memberDetails.biography);
    $("#title").val(memberDetails.title);
    $("#paper").val(memberDetails.paper_title);
    $("#application").val(memberDetails.application_name);
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

function updateCall(id) {
  $("#submitBtn").click(function (event) {
    event.preventDefault();
    var formData = $("#paperForm").serialize();
    formData += "&user_id=" + id;
    $.ajax({
      type: "POST",
      url: "http://localhost/rppp/server/update_member.php",
      data: formData,
      success: function (data) {
        console.log(data);
        alert(data);
        $("form").trigger("reset");
      },
      error: function (xhr, status, error) {
        console.error("AJAX Error: " + status + " - " + error);
      },
    });
  });
}
