// $(document).ready(function() {
  
//     $('#userTable').on('click', '.update-btn', function() {

//       var userId = $(this).closest('tr').find('th').text();
//       var username = $(this).closest('tr').find('td:nth-child(2)').text();
//       var email = $(this).closest('tr').find('td:nth-child(3)').text();
  
//     });
//   });
  
 function UpdateUserCall(userId, username, email){
  window.location.href = 'http://localhost/ITSE412-fall23-r12/client/update_user.html?userId=' + userId + '&username=' + encodeURIComponent(username) + '&email=' + encodeURIComponent(email);
 }