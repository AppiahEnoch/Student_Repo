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
    " />
  </head>
  <body>
    <div
      class="container d-flex align-items-center justify-content-center vh-100"
    >
    <div id="wrapper1" class="row justify-content-center row-gap-4 m-auto mt-3">
      <div class="col-sm order-1 order-sm-2">

          <div
            id="wrapper2"
            class="col "
          >
   <div id="table-wrapper" class="col">
    <h3 class="text-center">PROJECT LIST</h3>
    <table id="editable-table" class="table">
        <thead>
            <tr>
                <th>Index Number</th>
                <th>File</th>
      
                <th>Delete</th>
            </tr>
        </thead>
        <tbody></tbody>
    </table>
</div>



          </div>

          
        </div>

        <div class="col-sm order-1 order-md-2">
          <div
            id="wrapper3"
            class="col d-flex justify-content-center align-items-center min-size order-1 order-md-2"
          >
            <form
              id="form1"
              class="row g-1 d-flex align-items-center justify-content-center me-2 ms-2 mt-1"
            >
            <a style="font-size:1em;color:blue;" href="../index.html" class=""><i class="fa fa-sign-out" aria-hidden="true"></i>Click to Exit</a>
              <!-- ID -->
        

              <!-- Index Number -->
              <div class="input-group mb-3">
                <span class="input-group-text">
                  <i class="fa fa-list-ol" aria-hidden="true"></i>
                </span>
                <input
                  type="text"
                  id="index_number"
                  name="index_number"
                  class="form-control"
                  required
                  placeholder="Index Number"
                />
              </div>

              <!-- Student Name -->
              <div class="input-group mb-3">
                <span class="input-group-text">
                  <i class="fa fa-user" aria-hidden="true"></i>
                </span>
                <input
                  type="text"
                  id="stu_name"
                  name="stu_name"
                  class="form-control"
                  required
                  placeholder="Student Name"
                />
              </div>

              <!-- Title -->
              <div class="input-group mb-3">
                <span class="input-group-text">
                  <i class="fa fa-bookmark" aria-hidden="true"></i>
                </span>
                <input
                  type="text"
                  id="title"
                  name="title"
                  class="form-control"
                  required
                  placeholder="Title"
                />
              </div>

              <!-- Faculty -->
              <!-- Faculty -->
              <div class="input-group mb-3">
                <span class="input-group-text">
                  <i class="fa fa-university" aria-hidden="true"></i>
                </span>
                <select name="faculty" class="form-control" required>
                  <option value="">Select Faculty</option>
                  <option value="Faculty of Technical Education">
                    Faculty of Technical Education
                  </option>
                  <option value="Faculty of Business Education">
                    Faculty of Business Education
                  </option>
                  <option
                    value="Faculty of Applied Science and Mathematics Education"
                  >
                    Faculty of Applied Science and Mathematics Education
                  </option>
                  <option value="Faculty of Vocational Education">
                    Faculty of Vocational Education
                  </option>
                  <option
                    value="Faculty of Education and Communication Sciences"
                  >
                    Faculty of Education and Communication Sciences
                  </option>
                </select>
              </div>

              <!-- Department -->
              <!-- Department -->
              <div class="input-group mb-3">
                <span class="input-group-text">
                  <i class="fa fa-building" aria-hidden="true"></i>
                </span>
                <select name="study_program" class="form-control" required>
                  <option value="">Select Department</option>
                  <option value="Department of InformationTechnology Education">
                    Department of InformationTechnology Education
                  </option>
                  <option value="Department of Mathematics Education">
                    Department of Mathematics Education
                  </option>
                  <option
                    value="Department of Construction & Wood Technology Education"
                  >
                    Department of Construction & Wood Technology Education
                  </option>
                  <option
                    value="Department of Mechanical & Automotive Technology Education"
                  >
                    Department of Mechanical & Automotive Technology Education
                  </option>
                  <option
                    value="Department of Electrical & Electronics Technology Education"
                  >
                    Department of Electrical & Electronics Technology Education
                  </option>
                  <option
                    value="Department of Hospitality and Tourism Education"
                  >
                    Department of Hospitality and Tourism Education
                  </option>
                  <option
                    value="Department of Fashion Design and Textiles Education"
                  >
                    Department of Fashion Design and Textiles Education
                  </option>
                </select>
              </div>

              <!-- File Upload -->
              <div class="input-group mb-3">
                <span class="input-group-text">
                  <i class="fa fa-file" aria-hidden="true"></i>
                </span>
                <input
                  type="file"
                  id="file"
                  name="file"
                  class="form-control"
                  required
                />
              </div>

              <!-- Year -->
              <div class="input-group mb-3">
                <span class="input-group-text">
                  <i class="fa fa-calendar" aria-hidden="true"></i>
                </span>
                <input
                  type="date"
                  id="defence_date"
                  name="defence_date"
                  class="form-control"
                  required
                />
              </div>

              <!-- Submit Button -->
              <div class="col-12">
                <button
                  id="btsubmit"
                  type="submit"
                  class="btn btn-primary w-100"
                >
                  Upload Project
                </button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>

    <?php
    include "../aeT.php";
    ?>

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

    <script src="../ae.js?version=<?php echo filemtime('../ae.js');?>"></script>
    <script src="load.js?version=<?php echo filemtime('load.js'); ?>"></script>
    <script src="fetch.js?version=<?php echo filemtime('fetch.js'); ?>"></script>
    <script src="search.js?version=<?php echo filemtime('search.js'); ?>"></script>
  </body>
</html>
