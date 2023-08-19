$(document).ready(function(){
    $('#index_number').on('blur', function() {
        var indexNumber = $(this).val();
      
        if (!/^\d{10}$/.test(indexNumber)) {
          // Not a 10-digit number
          showToast("aeToastE", "INVALID INDEX NUMBER", "Index number must be a 10-digit number.", 20);
        
          $(this).val(''); // Clear the invalid input
          $(this).focus(); // Put focus back on the input for correction
        }
      });
      

    $('#file').on('change', function() {
        var file = $(this)[0].files[0];
        
        if (file) {
            if(isFilePDF2("file")){

            }
 
          console.log("Selected file:", file.name);
        } else {
   
        }
      });
      






    $('#form1').on('submit', function (e) {
        e.preventDefault(); // Prevent the default form submission
        collectFormInputs()


    })      
})






function collectFormInputs() {

    var index_number = $('#index_number').val();
    var stu_name = $('#stu_name').val();
    var title = $('#title').val();
    var faculty = $('select[name="faculty"]').val();
    var study_program = $('select[name="study_program"]').val();
    var file = $('#file')[0].files[0]; // Assuming the file input has 'type="file"'
    var defence_date = $('#defence_date').val();






  
    var formData = new FormData();
    formData.append('index_number', index_number);
    formData.append('stu_name', stu_name);
    formData.append('title', title);
    formData.append('faculty', faculty);
    formData.append('study_program', study_program);
    formData.append('file', file); // Appending the file to the form data
    formData.append('defence_date', defence_date);
  
    $.ajax({
      type: "post",
      cache: false,
      url: "load.php",
      dataType: "text",
      processData: false, // Important when sending FormData
      contentType: false, // Important when sending FormData
      data: formData,
      success: function (data, status) {

        if(data==1){
            showToast("aeToastS", "Project Saved Successfully", "Project has been saved successfully.", 20);
        }  

        $("#form1").trigger("reset");

        fillTable();

      },
      error: function (xhr, status, error) {
        alert(error);
      },
    });
  }
  