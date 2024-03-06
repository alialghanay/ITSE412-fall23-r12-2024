$(document).ready(function() {
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
                // Call update_journal.php after deleting
                updateJournal();
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
function updateJournal() {
    var formData = new FormData($('#updateJournalForm')[0]); // Create FormData object to handle file upload
    $.ajax({
        url: 'http://localhost:8000/rppp/server/update_journal.php', // Path to your PHP update script
        type: 'POST',
        data: formData,
        contentType: false, // Set contentType to false for FormData object
        processData: false, // Set processData to false for FormData object
        success: function(response) {
            alert(response); // Display success message
            $('#updateJournalModal').modal('hide'); // Hide the modal after successful update
            // Optionally, you can update the page content here to reflect the changes
        },
        error: function(xhr, status, error) {
            console.error(xhr.responseText); // Log any errors
            alert('Error updating journal: ' + error); // Display error message
        }
    });
}
    // Function to open the update journal modal and populate form fields with existing data
    function openUpdateJournalModal(journalId, journalName, journalDesc, daysAllowed, categoryName) {
        $('#updateJId').val(journalId);
        $('#updateJName').val(journalName);
        $('#updateJDesc').val(journalDesc);
        $('#updateDaysAllowed').val(daysAllowed);
        $('#updateCName').val(categoryName);
        $('#updateJournalModal').modal('show');
      }
  
      // Function to handle form submission for updating journal data
      $('#updateJournalForm').submit(function(event) {
        event.preventDefault(); // Prevent default form submission behavior
        var formData = $(this).serialize(); // Serialize form data
        $.ajax({
          url: 'http://localhost:8000/rppp/server/update_journal.php', // Path to your PHP update script
          type: 'POST',
          data: formData,
          success: function(response) {
            alert(response); // Display success message
            $('#updateJournalModal').modal('hide'); // Hide the modal after successful update
            // Optionally, you can update the page content here to reflect the changes
          },
          error: function(xhr, status, error) {
            console.error(xhr.responseText); // Log any errors
            alert('Error updating journal: ' + error); // Display error message
          }
        });
      });