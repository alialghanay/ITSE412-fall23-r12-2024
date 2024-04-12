// Function to open the update journal modal and returns the existing data of the form fields
function openUpdateJournalModal(journalId, journalName, journalDesc, daysAllowed, categoryName) {
  $("#updateJId").val(journalId);
  $("#updateJName").val(journalName);
  $("#updateJDesc").val(journalDesc);
  $("#updateDaysAllowed").val(daysAllowed);
  $("#updateCName").val(categoryName);
  $("#updateJournalModal").modal("show");
}

$(document).ready(function () {
  // To make the close button hide the modal when clicked
  $(".close").click(function () {
      $("#updateJournalModal").modal("hide");
  });

  // Reset error messages when modal is hidden
  $('#updateJournalModal').on('hidden.bs.modal', function () {
      $('.text-danger').remove();
  });

  // Form submission handling for updating journals
  $("#updateJournalForm").submit(function (event) {
      event.preventDefault();

      // Reset previous error messages
      $('.text-danger').remove();

      var jnameValue = $('#updateJName').val();
      var cNameValue = $('#updateCName').val();
      var jDescValue = $('#updateJDesc').val();

      var isValid = true;

      if (!isNaN(jnameValue) || /^\d+$/.test(jnameValue)) {
          $('#updateJName').after('<span id="jnameError" class="text-danger">Please enter a valid name for Journal Name.</span>');
          isValid = false;
      }

      if (!isNaN(cNameValue) || /^\d+$/.test(cNameValue)) {
          $('#updateCName').after('<span id="cNameError" class="text-danger">Please enter a valid name for Chapter Name.</span>');
          isValid = false;
      }

      if (!isNaN(jDescValue) || /^\d+$/.test(jDescValue)) {
          $('#updateJDesc').after('<span id="jDescError" class="text-danger">Please enter a valid description.</span>');
          isValid = false;
      }

      if (isValid) {
          var formData = new FormData($(this)[0]); // Create FormData object to handle form data including photo upload

          // AJAX request to update journal data
          $.ajax({
              url: "http://localhost/ITSE412-fall23-r12/server/update_journal.php", // URL for PHP file
              type: "POST",
              data: formData,
              contentType: false,
              processData: false,
              success: function (response) {
                  alert(response); // Display success message
                  $("#updateJournalModal").modal("hide"); // Hide the modal after successful update
                  fetchInterval = fetchJournals();
                  clearInterval(fetchInterval); //Fetch the journals one time only 
              },
              error: function (xhr, status, error) {
                  console.error(xhr.responseText);
                  alert("Error updating journal: " + error); // Display error message
              },
          });
      }
  });
});
/*
  reviewed by @alialghanay on 10/10/2022
  openUpdateJournalModal() Function:
  This function is called to open the update journal modal and pre-fill its fields with existing data.
  It takes parameters representing the journal ID, name, description, days allowed, and category name.
  It sets the values of corresponding input fields in the update journal modal using jQuery.
  Finally, it shows the update journal modal using modal("show").
  $(document).ready(function() {...}):
  This is a jQuery function that runs when the document is ready.
  It handles the functionality related to the update journal modal.
  It adds a click event handler to elements with the class .close to hide the update journal modal when clicked.
  It adds a submit event handler to the #updateJournalForm form to handle form submission for updating journals.
  Inside this event handler:
  It prevents the default form submission behavior using event.preventDefault().
  It creates a FormData object to handle the form data including photo upload.
  It makes an AJAX POST request to the URL 'http://localhost/ITSE412-fall23-r12/server/update_journal.php' to update the journal data.
  Upon success, it displays a success message using an alert and hides the update journal modal.
  Upon error, it logs the error message to the console, displays an error message using an alert, and keeps the update journal modal open for further action.
*/