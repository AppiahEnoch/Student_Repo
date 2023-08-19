<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title></title>
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ"
      crossorigin="anonymous"
    />
    <link rel="stylesheet" href="./style.css?
    <?php echo filemtime("style.css"); ?>
    " /> <link rel="stylesheet" href="./card.css?
    <?php echo filemtime("card.css"); ?>
    " />
  </head>
  <body>
  <div id="wrapper2" class="container-fluid search-wrapper">
  <a id="exit" href="../index.html" class=""><i class="fa fa-sign-out" aria-hidden="true"></i>Click to Exit</a>
              <!-- ID -->
        
  <h5>Filter By</h5>
  <div class="container">
    <div class="row">
      <div class="col-lg col-md-6">
        <label for="index_number" class="d-none d-md-block">Index Number:</label>
        <input
          type="text"
          id="index_number"
          name="index_number"
          class="form-control d-none d-md-block"
          placeholder="Enter Index Number"
          onkeyup="searchRecords()"
        />
      </div>
      <div class="col-lg col-md-6 col-sm-12">
        <label for="programme">Department:</label>
        <select
          name="programme"
          id="programme"
          class="form-select"
          onchange="searchRecords()"
        >
          <option value="none">Select Programme</option>
          <option value="option1">Option 1</option>
          <option value="option2">Option 2</option>
          <option value="option3">Option 3</option>
        </select>
      </div>
      <div class="col-lg col-md-6 col-sm-12">
        <label for="title">Title:</label>
        <input
          type="text"
          id="title"
          name="title"
          class="form-control"
          placeholder="Enter Title"
          onkeyup="searchRecords()"
        />
      </div>
      <div class="col-lg col-md-6">
        <label for="year" class="d-none d-md-block">Year:</label>
        <select name="year" id="year" class="form-control d-none d-md-block" onchange="searchRecords()">
          <option value="none">Select Year</option>
          <option value="2023">2023</option>
          <option value="2022">2022</option>
          <option value="2021">2021</option>
        </select>
      </div>
      <div class="col-lg col-md-6">
        <label for="other_criteria" class="d-none d-md-block">Other Criteria:</label>
        <select
          name="other_criteria"
          id="other_criteria"
          class="form-select d-none d-md-block"
          onchange="searchRecords()"
        >
          <option value="none">none</option>
          <option value="e-book">E-Book</option>
          <option value="printed_book">Printed Book</option>
        </select>
      </div>
    </div>
  </div>
</div>



    <div class="container search-results">
      <div id="card-row" class="row center-elements">
        
        <div class="col-lg-3 col-sm-6 d-none">
          <div class="card">
            <div class="row">
              <div class="col-12">
                <img class="card-image" src="../images/pdf.png" alt="" />
              </div>
              <div class="col-12">
                <h5 class="card-title">Some Title</h5>
              </div>
              <div class="col-12">
                <p class="card-description">some description</p>
              </div>
            </div>
          </div>
        </div>
               
   

       
       
      </div>
    </div>

    <script
      src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.7/dist/umd/popper.min.js"
      integrity="sha384-zYPOMqeu1DAVkHiLqWBUTcbYfZ8osu1Nd6Z89ify25QV9guujx43ITvfi12/QExE"
      crossorigin="anonymous"
    ></script>
    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.min.js"
      integrity="sha384-Y4oOpwW3duJdCWv5ly8SCFYWqFDsfob/3GkgExXKV4idmbt98QcxXYs9UoXAB7BZ"
      crossorigin="anonymous"
    ></script>
    <script
      src="https://code.jquery.com/jquery-3.7.0.min.js"
      integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g="
      crossorigin="anonymous"
    ></script>
    <script
      src="https://kit.fontawesome.com/c1db89cf54.js"
      crossorigin="anonymous"
    ></script>


    <script src="load_card.js?version=<?php echo filemtime('load_card.js'); ?>"></script>
    <script src="filter.js?version=<?php echo filemtime('filter.js'); ?>"></script>
  </body>
</html>
