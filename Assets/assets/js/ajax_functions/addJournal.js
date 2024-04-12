function addJournal(formData,callback) {
  $.ajax({
    url: "http://localhost/ITSE412-fall23-r12/server/insert_journal.php", // path of php file
    type: "POST",
    data: formData,
    contentType: false,
    processData: false,
    success: function (response) {
      alert(response);
      if (typeof callback === 'function') {
        callback();   //The calback function is fetchJournals
      } 
      // To hide the modal after submitting
      $("#addJournalModal").removeClass("show");
      $("body").removeClass("modal-open");
      $(".modal-backdrop").remove();
      // to Reset the form
      $("#addJournalForm")[0].reset(); 
      
    },
    error: function (xhr, status, error) {
      console.error(xhr.responseText);
      alert("Error adding journal: " + error); // display error mesages
    },
  });
}/*
    reviewed by @alialghanay on 10/10/2022
    AJAX Request Configuration:

    The function makes an AJAX POST request to the URL 'http://localhost/ITSE412-fall23-r12/server/insert_journal.php', which is the path to the PHP file handling the insertion of journal data into the database.
    It sends the formData parameter, which contains the data of the new journal entry.
    contentType and processData are set to false to prevent jQuery from automatically processing the data or setting the content type.

    Success Callback Function:

    If the AJAX request is successful, the function displays the response using an alert.
    It then hides the add journal modal (#addJournalModal) using jQuery.
    It resets the form (#addJournalForm) to clear the input fields.

    Error Callback Function:

    If there's an error with the AJAX request, it logs the error message to the console.
    It displays an alert to inform the user about the error encountered while adding the journal.

*/
