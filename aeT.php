

<!-- BEGIN MY TOASTS -->


<div id="aeToastE" class="toast" role="alert" aria-live="assertive" aria-atomic="true">
   
    <div class="toast-header bg-danger text-white">
        <i style="color:white" class="fa fa-exclamation-triangle me-2" aria-hidden="true"></i>
      <strong class="me-auto">Error!</strong>
      <small>invalid</small>
      <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
    </div>
    <div class="toast-body">

    </div>
  </div>


  
<div id="aeToastS" class="toast" role="alert" aria-live="assertive" aria-atomic="true">
    <div class="toast-header bg-success text-white">
        <i style="color: white;" class="bi bi-check-circle-fill me-2"></i>
      <strong class="me-auto">Success!</strong>
      <small>Success!</small>
      <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
    </div>
    <div class="toast-body">

    </div>
  </div>

<!-- END MY TOASTS -->



<!-- BEGIN MY ALERTS -->
      <div id="alert1" class="alert alert-success  d-none alert-dismissible fade show" role="alert">
        <i class="bi bi-check-circle-fill"></i> Item Uploaded Successfully!
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
<!-- END MY ALERTS -->


<!-- BEGIN MY SPIN-->
 <i id="spin1" class="fas fa-spinner fa-spin d-none "></i>
<!-- END MY SPIN -->



    <div id="spinner-container" class="spinner-container text-center" style="display: none">
      <div class="spinner-border" role="status">
        <span class="visually-hidden">Loading...</span>
      </div>
      <p class="loading-text">Processing ...</p>
    </div>




    
<div id="aeToastYN" class="toast" role="alert" aria-live="assertive" aria-atomic="true">
  <div class="toast-header bg-danger text-white">

      <i style="color: white;" class="fa fa-question-circle m-1" aria-hidden="true"></i>
      <strong class="me-auto">Confirm Delete Action!</strong>
      <small>Confirm!</small>
      <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
  </div>
  <div class="toast-body">
      <p id="toastMessage"></p>
<div class="row row-cols-2 ">
  <div class="col text-end">
    <button type="button" class="btn btn-success btn-sm me-2" onclick="handleYesClick()">Yes   <i class="fa fa-thumbs-up" aria-hidden="true"></i></button>
  
  </div>
  <div class="col">
    <button type="button" class="btn btn-danger btn-sm" onclick="handleNoClick()">No <i class="fa fa-thumbs-down" aria-hidden="true"></i> </button>
  </div>
 
</div>
  </div>
</div>