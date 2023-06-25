function search() {
    const searchInput = document.getElementById("searchInput").value;
    
    // Make an AJAX request to search.php
    const xhr = new XMLHttpRequest();
    xhr.onreadystatechange = function() {
      if (xhr.readyState === 4 && xhr.status === 200) {
        const results = JSON.parse(xhr.responseText);
        displayResults(results);
      }
    };
    xhr.open("GET", `search.php?query=${searchInput}`, true);
    xhr.send();
  }
  
  function displayResults(results) {
    const searchResults = document.getElementById("searchResults");
    searchResults.innerHTML = "";
  
    if (results.length === 0) {
      searchResults.innerHTML = "No results found.";
    } else {
      results.forEach(result => {
        const item = document.createElement("div");
        item.textContent = result.name; // Customize this based on your data structure
        searchResults.appendChild(item);
      });
    }
  }
  