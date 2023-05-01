 console.log("hello");
        var hasError = false;

        function get(id) {
            return document.getElementById(id);
        }

        function validateGender() {
            var gn = document.querySelector('input[name="gender"]:checked');
            if (gn == null) {
                return false;
            }
            return true;
        }

        function validate() {
            refresh();
            if (get("name").value == "") {
                hasError = true;
                get("error_name").innerHTML = "*Name Required";
            } else if (get("name").value.length <= 2) {
                hasError = true;
                get("error_name").innerHTML = "*Name Must be greater than 2";
            }
            if (get("username").value == "") {
                hasError = true;
                get("error_username").innerHTML = "*Username Required";
            } else if (get("username").value.length <= 1) {
                hasError = true;
                get("error_username").innerHTML = "*Username Must be greater than 1";
            }
            if (get("email").value == "") {
                hasError = true;
                get("error_email").innerHTML = "*Email Required";
            }
            if (get("mobile").value == "") {
                hasError = true;
                get("error_mobile").innerHTML = "*Mobile Required";
            }
            if (get("password").value == "") {
                hasError = true;
                get("error_password").innerHTML = "*Password Required";
            }
            if (get("confirm_password").value == "") {
                hasError = true;
                get("error_confirm_password").innerHTML = "*Confirm Password Required";
            }
            if (!validateGender()) {
                hasError = true;
                get("error_gender").innerHTML = "*Gender Required";
            }
            if (get("address").value == "") {
                hasError = true;
                get("error_bio").innerHTML = "*Address Required";
            }

            return !hasError;
        }

        function refresh() {
            hasError = false;
            get("error_name").innerHTML = "";
            get("error_username").innerHTML = "";
            get("error_password").innerHTML = "";
            get("error_confirm_password").innerHTML = "";
            get("error_gender").innerHTML = "";
            get("error_email").innerHTML = "";
            get("error_mobile").innerHTML = "";
            get("error_address").innerHTML = "";

        }