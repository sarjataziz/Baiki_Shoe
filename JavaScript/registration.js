
function validate() {
  var name = document.getElementById("name").value;
  var email = document.getElementById("email").value;
  var mobile = document.getElementById("mobile").value;
  var username = document.getElementById("username").value;
  var password = document.getElementById("password").value;
  var confirm_password = document.getElementById("confirm_password").value;
  var gender = document.getElementsByName("gender");
  var address = document.getElementById("address").value;
  var profile_picture = document.getElementById("profile_picture").value;

  // Name validation
  if (name == "") {
    alert("Please enter your name.");
    return false;
  }

  // Email validation
  if (email == "") {
    alert("Please enter your email.");
    return false;
  }

  // Mobile validation
  if (mobile == "") {
    alert("Please enter your mobile number.");
    return false;
  }

  // Username validation
  if (username == "") {
    alert("Please enter a username.");
    return false;
  }

  // Password validation
  if (password == "") {
    alert("Please enter a password.");
    return false;
  }

  // Confirm password validation
  if (confirm_password == "") {
    alert("Please confirm your password.");
    return false;
  }
  if (password != confirm_password) {
    alert("Password and confirm password do not match.");
    return false;
  }

  // Gender validation
  var gender_selected = false;
  for (var i = 0; i < gender.length; i++) {
    if (gender[i].checked) {
      gender_selected = true;
      break;
    }
  }
  if (!gender_selected) {
    alert("Please select your gender.");
    return false;
  }

  // Address validation
  if (address == "") {
    alert("Please enter your address.");
    return false;
  }

  // Profile picture validation
  if (profile_picture == "") {
    alert("Please upload your profile picture.");
    return false;
  }

  return true;
}

// Email validation using regular expression
function checkEmail(input) {
  var email = input.value;
  var regex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
  if (regex.test(email)) {
    document.getElementById("error_email").innerHTML = "";
  } else {
    document.getElementById("error_email").innerHTML = "Please enter a valid email address.";
  }
}

// Username validation using regular expression
function checkUsername(input) {
  var username = input.value;
  var regex = /^[a-zA-Z0-9_]{4,20}$/;
  if (regex.test(username)) {
    document.getElementById("error_username").innerHTML = "";
  } else {
    document.getElementById("error_username").innerHTML = "Username must be 4-20 characters long and can only contain letters, numbers, and underscores.";
  }
}

