$(document).ready(function() {
    $.ajax({
      type: 'GET',
      url: 'http://localhost/rppp/server/get_users.php',
      dataType: 'json',
      success: function(response) {
        if (response.status === "success") {
          // Clear existing table data
          $('#userTable tbody').empty();
          // Populate table with retrieved data
          response.users.forEach(function(user, index) {
            var row = '<tr>' +
              '<th scope="row">' + (index + 1) + '</th>' +
              '<td>' + user.username + '</td>' +
              '<td>' + user.email + '</td>' +
              '<td>' +
              '<button type="button" class="btn btn-warning btn-sm me-2 update-btn" ">Update</button>' +
              '<button type="button" class="btn btn-danger btn-sm" onclick="deleteUser(' + user.id + ')">Delete</button>' +
              '</td>' +
              '</tr>';
            $('#userTable tbody').append(row);
          });
        } else {
          console.error('Error: ' + response.message);
        }
      },
      error: function(xhr, status, error) {
        console.error('AJAX Error: ' + xhr.responseText);
      }
    });
  });
  