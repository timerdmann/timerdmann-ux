function validateForm() {
    var x = document.forms["contactForm"]["cf_email"].value;
    if (x == "") {
        alert("Name must be filled out");
        return false;
    }
}