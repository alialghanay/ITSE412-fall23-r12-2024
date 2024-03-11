$(document).ready(function () {
  $.ajax({
    url: "http://localhost/rppp/server/get_members.php",
    type: "GET",
    dataType: "json",
    success: function (data) {
      updateMembersTable(data);
    },
    error: function (xhr, status, error) {
      console.error("Error fetching members:", error);
    },
  });

  function updateMembersTable(members) {
    var tableBody = $("#userTable tbody");
    tableBody.empty();
    members.forEach(function (member, index) {
      console.log(member);
      let roles = () => {
        if (member.roles == 1) {
          return "Admin";
        } else if (member.roles == 2) {
          return "Author";
        } else if (member.roles == 3) {
          return "User";
        }
      };
      var row = $("<tr>");
      row.append('<th scope="row">' + (index + 1) + "</th>");
      row.append("<td>" + member.username + "</td>");
      row.append("<td>" + member.specialization + "</td>");
      row.append("<td>" + roles() + "</td>");
      row.append(
        "<td>" +
          '<button type="button" class="btn btn-primary btn-sm me-2" onclick="viewMember(' +
          member.user_id +
          ')">View</button>' +
          '<button type="button" class="btn btn-warning btn-sm me-2 onclick="updateCall(' +
          member.user_id +
          ')">Update</button>' +
          '<button type="button" class="btn btn-danger btn-sm" onclick="deleteMember(' +
          member.user_id +
          ')">Delete</button>' +
          "</td>"
      );
      tableBody.append(row);
    });
  }
});
