
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

        function validateHobbies() {
            var checked = false;
            var hobbies = document.getElementsByName("hobbies[]");
            for (var i = 0; i < hobbies.length; i++) {
                if (hobbies[i].checked) {
                    checked = true;
                    break;
                }
            }
            return checked;
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
            if (get("password").value == "") {
                hasError = true;
                get("error_password").innerHTML = "*Password Required";
            } else if (get("password").value.length <= 5) {
                hasError = true;
                get("error_password").innerHTML = "*Password Must be greater than 5";
            }

            if (!validateGender()) {
                hasError = true;
                get("error_gender").innerHTML = "*Gender Required";
            }
            if (!validateHobbies()) {
                hasError = true;
                get("error_hobbies").innerHTML = "*Hobbies Required";
            }

            if (get("profession").selectedIndex == 0) {
                hasError = true;
                get("error_profession").innerHTML = "*Profession Required";
            }
            if (get("Bio").value == "") {
                hasError = true;
                get("error_bio").innerHTML = "*Bio Required";
            }

            return !hasError;
        }

        function refresh() {
            hasError = false;
            get("error_name").innerHTML = "";
            get("error_username").innerHTML = "";
            get("error_password").innerHTML = "";
            get("error_gender").innerHTML = "";
            get("error_hobbies").innerHTML = "";
            get("error_profession").innerHTML = "";
            get("error_bio").innerHTML = "";
        }