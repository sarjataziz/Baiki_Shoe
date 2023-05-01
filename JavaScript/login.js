function get(id) {
    return document.getElementById(id);
}
function checkUsername(e) {

    var xhr = new XMLHttpRequest();
    xhr.open("GET", "checkUsername.php?username=" + e.value, true);
    xhr.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            if (this.responseText == "valid") {
                get("error_username").innerHTML = "Incorrect Username";
            } else {
                get("error_username").innerHTML = "";
            }
        }
    };
    xhr.send();
}