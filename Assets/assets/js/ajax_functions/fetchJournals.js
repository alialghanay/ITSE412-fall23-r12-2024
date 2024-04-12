function fetchJournals() {
  $.ajax({
    url: "http://localhost/ITSE412-fall23-r12/server/view_journals.php", // path of php file
    type: "GET",
    success: function (response) {
      // Display the fetched data in the 'journalsTable' div
      $("#journalsTable").html(response);
    },
    error: function (xhr, status, error) {
      //Handle errors
      console.error(xhr.responseText);
      $("#journalsTable").html("<p>Error retrieving journals data.</p>");
    },
  });
}

/*
  reviewed by @alialghanay on 10/10/2022
  AJAX Request Configuration:

  The function makes an AJAX GET request to the URL 'http://localhost/ITSE412-fall23-r12/server/view_journals.php',
  which is the path to the PHP file responsible for retrieving journal data.
  
  Success Callback Function:

  If the AJAX request is successful, the function receives the response data.
  It then injects the fetched data into the #journalsTable div using jQuery's html() function, effectively replacing any existing content with the new data.

  Error Callback Function:

  If there's an error with the AJAX request, it logs the error message to the console.
  It displays an error message within the #journalsTable div using jQuery's html() function, informing the user that there was an error retrieving the journals data.
*/
