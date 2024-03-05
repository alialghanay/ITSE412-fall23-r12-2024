$(document).ready(function() {
    // Extract user data from URL parameters
    var urlParams = new URLSearchParams(window.location.search);
    var userId = urlParams.get('userId');
    var username = decodeURIComponent(urlParams.get('username'));
    var email = decodeURIComponent(urlParams.get('email'));

    // Populate form fields with user data
    $('#userId').val(userId);
    $('#newUsername').val(username);
    $('#newEmail').val(email);
});