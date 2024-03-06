function deleteJournal(journalId) {
    // Set the journal ID to a data attribute on the delete button
    $('#confirmDeleteButton').attr('data-journal-id', journalId);
    // Show the confirmation modal
    $('#deleteConfirmationModal').modal('show');
  }

  $(document).ready(function() {
    // Initial fetch of journals data
    fetchJournals();

    // Periodically fetch journals data every 5 seconds
    setInterval(fetchJournals, 5000); // Adjust the interval as needed

    // Function to handle the delete confirmation
    $('#confirmDeleteButton').click(function() {
      var journalId = $(this).attr('data-journal-id');
      // Send AJAX request to delete the journal
      $.ajax({
        url: 'http://localhost:8000/rppp/server/delete_journal.php',
        type: 'GET',
        data: { j_id: journalId },
        success: function(response) {
          // Display success message
          alert(response);
          // Optionally, update the page content after successful deletion
          // For example, you can remove the deleted row from the table
          // $('#journalRow' + journalId).remove();
          // Hide the confirmation modal
          $('#deleteConfirmationModal').modal('hide');
        },
        error: function(xhr, status, error) {
          // Display error message
          console.error(xhr.responseText);
          alert('Error deleting journal: ' + error); // Display the specific error message
          // Hide the confirmation modal
          $('#deleteConfirmationModal').modal('hide');
        }
      });
    });
  });