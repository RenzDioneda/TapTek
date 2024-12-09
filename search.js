document.addEventListener("DOMContentLoaded", function () {
    const searchButton = document.getElementById("searchButton");
    const searchInput = document.getElementById("searchInput");
    const filterSelect = document.getElementById("filterSelect");
  
    // Event listener for the Search button
    searchButton.addEventListener("click", function () {
      const searchQuery = searchInput.value.trim();
      const filterValue = filterSelect.value;
  
      if (searchQuery === "") {
        alert("Please enter a search query.");
        return;
      }
  
      // Log the search query and filter (You can replace this with your backend logic)
      console.log("Search Query:", searchQuery);
      console.log("Filter By:", filterValue);
  
      // Close the modal after search
      const searchModal = bootstrap.Modal.getInstance(document.getElementById("searchModal"));
      searchModal.hide();
  
      // Example: Redirect to a search results page (replace with your backend URL)
      window.location.href = `searchResults.php?query=${encodeURIComponent(searchQuery)}&filter=${filterValue}`;
    });
  });
  