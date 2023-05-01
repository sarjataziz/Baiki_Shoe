function get(id) {
    return document.getElementById(id);
}
function checkEmail(e) {

    var xhr = new XMLHttpRequest();
    xhr.open("GET", "validateEmail.php?email=" + e.value, true);
    xhr.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            if (this.responseText == "false") {
                get("error_email").innerHTML = "Invalid Email";
            } else {
                get("error_email").innerHTML = "";
            }
        }
    };
    xhr.send();
}