// $(document).ready(function() {
//     $('#updateForm').submit(function(e) {
//         e.preventDefault(); 

//         var formData = {
//             userId: $('#userId').val(),
//             newUsername: $('#newUsername').val(),
//             newEmail: $('#newEmail').val(),
//             newPassword: $('#newPassword').val()
//         };

//         $.ajax({
//             type: 'POST',
//             url: 'http://localhost/ITSE412-fall23-r12/server/update_user.php',
//             data: formData,
//             dataType: 'json',
//             success: function(response) {
//                 alert(response.message);
//                 window.location.href = 'http://localhost/ITSE412-fall23-r12/client/admin.html';
//             },
//             error: function(xhr, status, error) {
//                 console.error('AJAX Error: ' + xhr.responseText);
//             }
//         });
//     });
// });
