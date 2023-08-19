function createCardsFromJson(jsonData) {
    // Locate the container in which we want to add the cards
    var cardRow = document.getElementById('card-row');

    // Clear previous cards
    cardRow.innerHTML = '';

    // Loop through each item in the JSON data
    jsonData.forEach(item => {
        // Create new card elements
        var col = document.createElement('div');
        col.className = 'col-lg-3 col-sm-6';

        var card = document.createElement('div');
        card.className = 'card';

        var row = document.createElement('div');
        row.className = 'row';

        var imgCol = document.createElement('div');
        imgCol.className = 'col-12';

        var img = document.createElement('img');
        img.className = 'card-image';
        img.src = item.filePath;
        img.alt = item.title;

        var titleCol = document.createElement('div');
        titleCol.className = 'col-12';

        var title = document.createElement('h5');
        title.className = 'card-title';
        title.textContent = item.title;

        var descriptionCol = document.createElement('div');
        descriptionCol.className = 'col-12';

        var description = document.createElement('p');
        description.className = 'card-description';
        description.textContent = item.description;

        // Create download link
   // Create download link
var downloadLink = document.createElement('a');
downloadLink.href = item.actualFilePath; // Use actualFilePath for download link
downloadLink.download = ''; // File will be downloaded with its original name

// Create FontAwesome icon
var downloadIcon = document.createElement('i');
downloadIcon.className = 'fas fa-download'; // FontAwesome download icon class

// Append the icon to the download link
downloadLink.appendChild(downloadIcon);

// Add text after the icon
var downloadText = document.createTextNode(' Download File');
downloadLink.appendChild(downloadText);

// Append the download link to the description column or other desired location
descriptionCol.appendChild(downloadLink);

        
        // Append new elements to the card
        imgCol.appendChild(img);
        titleCol.appendChild(title);
        descriptionCol.appendChild(description);
        descriptionCol.appendChild(downloadLink); // Append the download link

        row.appendChild(imgCol);
        row.appendChild(titleCol);
        row.appendChild(descriptionCol);

        card.appendChild(row);
        col.appendChild(card);

        // Append the card to the container
        cardRow.appendChild(col);
    });
}
