$(document).ready(function() {
    // Handle click event for update button
    $('#userTable').on('click', '.update-btn', function() {
      // Get the user ID and other data from the row
      var userId = $(this).closest('tr').find('th').text();
      var username = $(this).closest('tr').find('td:nth-child(2)').text();
      var email = $(this).closest('tr').find('td:nth-child(3)').text();
  
      // Redirect to the update page with user ID and other data as URL parameters
      window.location.href = 'http://localhost/rppp/client/update_user.html?userId=' + userId + '&username=' + encodeURIComponent(username) + '&email=' + encodeURIComponent(email);
    });
  });
  