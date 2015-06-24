// validation.js
// Vincent Nguyen

var firstName = document.getElementsByName('fName');
var lastName = document.getElementsByName('lName');
var password = document.getElementsByName('password');
var reenter = document.getElementsByName('reenter');
var email = document.getElementsByName('email');
var gender = document.getElementsByName('gender');
var comments = document.getElementsByName('comment');

var errorMessage = "Please fill in/fix/select: ";

email.addEmailListener("keyup", function(event){
    if (email.validity.valid){
        error.innerHTML = "";
    }
})
// bool value to check if form validates
var isBlank = false;

function registrationValidation(){
    if (firstName == "" || firstName == null) {
        isBlank = true;
        errorMessage = errorMessage + "\n   First Name.";
    }

    if (lastName == "" || lastName == null) {
        isBlank = true;
        errorMessage = errorMessage + "\n   Last Name.";
    }
    if (password == "" || password == null) {
        isBlank = true;
        errorMessage = errorMessage + "\n   Password.";
    }
    if (firstName == "" || firstName == null) {
        isBlank = true;
        errorMessage = errorMessage + "\n   First Name.";
    }
    if (email == "" || email == null) {
        isBlank = true;
        errorMessage = errorMessage + "\n   Email.";
    }
    if (gender == "" || gender == null) {
        isBlank = true;
        errorMessage = errorMessage + "\n   First Name.";
    }

    if (comments == "" || firstName == null) {
        isBlank = true;
        errorMessage = errorMessage + "\n   First Name.";
    }
}
