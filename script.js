document.addEventListener('DOMContentLoaded', function() {
    var faculties = document.getElementsByClassName("faculty");
  
    for (var i = 0; i < faculties.length; i++) {
      faculties[i].addEventListener('mouseover', function() {
        var departmentList = this.getElementsByClassName("department-list")[0];
        if (departmentList) {
          departmentList.style.display = "block";
        }
      });
  
      faculties[i].addEventListener('mouseout', function() {
        var departmentList = this.getElementsByClassName("department-list")[0];
        if (departmentList) {
          departmentList.style.display = "none";
        }
      });
    }
  });




  
  
  const signupPasswordField = document.getElementById("password");
const signupPasswordToggle = document.getElementById("signupPasswordToggle");

signupPasswordToggle.addEventListener("click", function () {
  if (signupPasswordField.type === "password") {
    signupPasswordField.type = "text";
    signupPasswordToggle.style.backgroundImage = "url('eye/eye-icon-off.png')"; /* Replace with your eye icon image for password hidden state */
  } else {
    signupPasswordField.type = "password";
    signupPasswordToggle.style.backgroundImage = "url('eye/eye-icon.png')"; /* Replace with your eye icon image for password visible state */
  }
});
