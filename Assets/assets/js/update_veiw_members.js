$(document).ready(function () {
  $.ajax({
    url: "http://localhost/ITSE412-fall23-r12/server/get_members.php",
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
    var tableBody = $("#member-table tbody");
    tableBody.empty();
    if (members.length == 0) {
      tableBody.append("<tr><td colspan='5'>No members found.</td></tr>");
    } else {
      members.forEach(function (member, index) {
        let roles = () => {
          if (member.roles == 1) {
            return "Admin";
          } else if (member.roles == 2) {
            return "Author";
          } else if (member.roles == 3) {
            return "Reviewer";
          }
        };
        var row = $("<tr>");
        row.attr("id", "data-user-" + member.user_id);
        row.append('<th scope="row">' + (index + 1) + "</th>");
        row.append("<td>" + member.username + "</td>");
        row.append("<td>" + member.specialization + "</td>");
        row.append("<td>" + roles() + "</td>");
        row.append(
          "<td>" +
            '<button type="button" class="btn btn-primary btn-sm me-2" onclick="viewMember(' +
            member.user_id +
            ')">View</button>' +
            '<button type="button" class="btn btn-warning btn-sm me-2" onclick="updateMember(' +
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
  }
});
