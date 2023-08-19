$(document).ready(function() {
    $('#index_number').on('keyup', function() {
      var indexNumber = $(this).val();

      $('#stu_name').val("");
      $('#title').val("");
      $('select[name="faculty"]').val("");
      $('select[name="study_program"]').val("");
      $('#defence_date').val("");
  
      if (indexNumber.length === 10 && $.isNumeric(indexNumber)) {
        fillForm(indexNumber);
      }

    });
  });
  
  function fillForm(indexNumber) {
    $.ajax({
      type: "post",
      cache: false,
      url: "search.php",
      data: { indexNumber: indexNumber },
      dataType: "json",
      success: function (data, status) {
   
        $('#stu_name').val(data.stu_name);
        $('#title').val(data.title);
        $('select[name="faculty"]').val(data.faculty);
        $('select[name="study_program"]').val(data.study_program);
        $('#defence_date').val(data.defence_date);
        // Handle other form fields as needed

        activateEdit() 
      },
      error: function (xhr, status, error) {
        alert(error);
      },
    });
  }
  


  function activateEdit() {
    $("#form1 input, #form1 select, #form1 file").on("keyup change", function () {
      $.ajax({
        type: "post",
        cache: false,
        url: "edit.php", // path to the PHP file that will handle the update
        dataType: "json",
        data: new FormData($("#form1")[0]), // serialize form data
        processData: false,
        contentType: false,
        success: function (data, status) {
         // alert(data)
          if (data.success) {
          // alert(data)
          } else {
            // handle error
           // alert(data.error);
          }
        },
        error: function (xhr, status, error) {
         // alert(error);
        },
      });

      
    });
  }
  



