
var myrow=null;
var index_number;
$(document).ready(function () {
    fillTable()
})

function fillTable() {
    $.ajax({
        type: "post",
        cache: false,
        url: "fetch.php",
        dataType: "json",
        success: function (data, status) {
            var tbody = $("#editable-table tbody");
            tbody.empty();

            data.forEach(function (project) {
                var row = $("<tr>");
                row.append($("<td class='first-column'>").text(project.index_number)); // Added class
                // ... rest of the code
                row.append($("<td>").html('<img src="' + project.file_path + '" alt="' + project.file_type + '" />'));
                var deleteButton = $('<button class="btn btn-danger btn-sm delete-btn">Delete</button>');

                deleteButton.click(function () {
                    myrow=row;
                    index_number=project.index_number;
                    showToastYN("aeToastYN", "Confirm Delete Project", "Are you sure you want to delete this project?", "20", function () {
                   
                    });
                });

                row.append($("<td>").append(deleteButton));
                tbody.append(row);
            });
        },
        error: function (xhr, status, error) {
            console.error(error);
        },
    });
}

function deleteProject(index_number, row) { // Added parameter for row
    $.ajax({
        type: "post",
        url: "deleteProject.php",
        data: { index_number: index_number }, // Use the parameter
        success: function (response) {
            row.remove(); // Remove the corresponding row from the table
            // Show your custom toast alert for successful deletion
            showToast("aeToastS", "SUCCESS!.", "PROJECT Deleted Successfully", "20");
        },
        error: function (xhr, status, error) {
            console.error(error);
            // Show your custom toast alert for an error
            showToast("aeToastE", "DELETE ERROR", "Failed to delete record", "20");
        },
    });
}



//  showToastYN("aeToastYN", "Confirm Delete All.", "Are you sure you want to delete all registration codes?", "20");
 



function handleYesClick() {

    $('.toast').toast('hide');
    myrow.remove()

    deleteProject(index_number, myrow); // Pass the index_number and row
}

function handleNoClick() {
    $('.toast').toast('hide');
}