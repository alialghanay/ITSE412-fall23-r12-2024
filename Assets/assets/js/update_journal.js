$(document).ready(function() {
    // Set interval for 1 second
    setInterval(function() {
        // Call the function to open the update journal modal with some sample data
        openUpdateJournalModal('sampleId', 'Sample Journal', 'Sample Description', 10, 'Sample Category');
    }, 1000);
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
        var formData = new FormData($(this)[0]); // Create FormData object to handle file upload
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
    });
});
