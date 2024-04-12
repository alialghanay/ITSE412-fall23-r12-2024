$(document).ready(function() {

    var urlParams = new URLSearchParams(window.location.search);
    var userId = urlParams.get('userId');
    var username = decodeURIComponent(urlParams.get('username'));
    var email = decodeURIComponent(urlParams.get('email'));

    $('#userId').val(userId);
    $('#newUsername').val(username);
    $('#newEmail').val(email);
});