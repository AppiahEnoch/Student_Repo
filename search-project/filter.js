$(document).ready(function () {
    sendData();
    fillYears();
    fillProgrammes();
  });
  
  const indexNumber = document.querySelector('#index_number');
  const programme = document.querySelector('#programme');
  const title = document.querySelector('#title');
  const year = document.querySelector('#year');
  const otherCriteria = document.querySelector('#other_criteria');
  
  function sendData() {
    // Create a data object to hold all filter values
    let dataObject = {
      index_number: indexNumber.value,
      programme: programme.value,
      title: title.value,
      year: year.value,
      // Other criteria is not used in the PHP script, so it's removed here
    };
  
    //alert(programme.value)
    $.ajax({
      type: "POST",
      data: dataObject,
      cache: false,
      url: "filter.php",
      dataType: "json",
      success: function (data, status) {
       // alert(data);
        // Handle success response here, for example:
         createCardsFromJson(data);
      },
      error: function (xhr, status, error) {
        console.error('Error:', error);
      },
    });
  }
  
  // Attach event listeners to all filters
  [indexNumber, programme, title, year, otherCriteria].forEach(filter => {
    if (filter.nodeName === 'SELECT') {
      filter.addEventListener('change', sendData);
    } else {
      filter.addEventListener('keyup', sendData);
    }
  });
  


  function fillYears() {
    var yearSelect = document.getElementById('year');
    var currentYear = new Date().getFullYear();
  
    // Clear previous options
    yearSelect.innerHTML = '';
  
    // Add the default option
    var defaultOption = document.createElement('option');
    defaultOption.value = 'none';
    defaultOption.textContent = 'Select Year';
    yearSelect.appendChild(defaultOption);
  
    // Loop through the last 20 years and add them as options
    for (var i = 0; i < 40; i++) {
      var yearOption = document.createElement('option');
      yearOption.value = currentYear - i;
      yearOption.textContent = currentYear - i;
      yearSelect.appendChild(yearOption);
    }
  }
  



  function fillProgrammes() {
    $.ajax({
      type: "GET",
      url: "program.php",
      dataType: "json",
      success: function(data) {
        var programmeSelect = document.getElementById('programme');
        
        // Clear previous options
        programmeSelect.innerHTML = '';
        
        // Add the default option
        var defaultOption = document.createElement('option');
        defaultOption.value = 'none';
        defaultOption.textContent = 'Select Programme';
        programmeSelect.appendChild(defaultOption);
        
        // Add the study programs as options
        data.forEach(programme => {
          var option = document.createElement('option');
          option.value = programme;
          option.textContent = programme;
          programmeSelect.appendChild(option);
        });
      },
      error: function(xhr, status, error) {
        console.error(error);
      },
    });
  }
  
  // Call the function to fill the programmes

  