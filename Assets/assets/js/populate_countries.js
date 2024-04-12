// Array containing country names
const countries = [
  "libya",
  "palestine",
  "spain",
  "syria",
  "turkey",
  "united kingdom",
  "Italy",
];

// Function to populate the select element with countries
function populateCountries() {
  // Get the select element by its ID
  const countrySelect = document.getElementById("country");

  // Clear any existing options in the select element
  countrySelect.innerHTML = "";

  // Create a default option for the select element
  const defaultOption = document.createElement("option");
  defaultOption.text = "Choose..."; // Display text for the default option
  defaultOption.disabled = true; // Make the default option disabled
  defaultOption.selected = true; // Make the default option selected by default
  countrySelect.appendChild(defaultOption); // Add the default option to the select element

  // Loop through the countries array to create options for each country
  countries.forEach((country) => {
    // Create an option element for the current country
    const option = document.createElement("option");
    option.text = country; // Display text for the option
    option.value = country; // Value for the option
    countrySelect.appendChild(option); // Add the option to the select element
  });
}

// Execute the populateCountries function when the DOM content is loaded
document.addEventListener("DOMContentLoaded", populateCountries);
