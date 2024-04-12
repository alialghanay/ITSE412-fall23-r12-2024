function deleteJournal(journalId) {
  // Set the journal ID to a data attribute on the delete button
  $("#confirmDeleteButton").attr("data-journal-id", journalId);
  // Show the confirmation modal
  $("#deleteConfirmationModal").modal("show");
}

$(document).ready(function () {
  // To make the cancel and close button hide the modal when clicked
  $(".modal .close").click(function () {
    $(this).closest(".modal").modal("hide");
  });
  $(".modal .btn-secondary").click(function () {
    $(this).closest(".modal").modal("hide");
  });

  // This ia a function to handle the delete confirmation
  $("#confirmDeleteButton").click(function () {
    var journalId = $(this).attr("data-journal-id");
    // AJAX request to delete the journal
    $.ajax({
      url: "http://localhost/ITSE412-fall23-r12/server/delete_journal.php", // The path of php file
      type: "GET",
      data: { j_id: journalId },
      success: function (response) {
        alert(response);
        $("#deleteConfirmationModal").modal("hide"); // Hide the modal after deleting
        fetchJournals();
        
      },
      // Display error message
      error: function (xhr, status, error) {
        console.error(xhr.responseText);
        alert("Error deleting journal: " + error);
        // Hide the modal after deleting
        $("#deleteConfirmationModal").modal("hide");
      },
    });
  });
});

/*
  reviewed by @alialghanay on 10/10/2022
  deleteJournal(journalId):

  This function is responsible for initiating the deletion process of a journal entry.
  It takes the journalId parameter, which represents the ID of the journal to be deleted.
  It sets the data-journal-id attribute of the #confirmDeleteButton to the provided journalId.
  It then displays the delete confirmation modal (#deleteConfirmationModal).

  $(document).ready(function() {...}):

  This is a jQuery function that runs when the document is ready.
  It handles the functionality related to the delete confirmation modal.
  It adds click event handlers to elements with the class .modal .close and .modal .btn-secondary to hide the modal when clicked.
  It adds a click event handler to the #confirmDeleteButton to handle the deletion confirmation process.
  Inside this click event handler:
  It retrieves the journalId from the data-journal-id attribute of the #confirmDeleteButton.
  It makes an AJAX GET request to the URL 'http://localhost/ITSE412-fall23-r12/server/delete_journal.php' to delete the journal with the specified ID.
  Upon success, it displays a success message using an alert and hides the delete confirmation modal.
  Upon error, it logs the error message to the console, displays an error message using an alert, and hides the delete confirmation modal.
*/
