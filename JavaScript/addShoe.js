   console.log("addShoe.js");
   var hasError = false;

    function get(id) {
        return document.getElementById(id);
    }

    function addShoe() {
        console.log("addShoe()");
        refresh();
        if (get("name").value == "") {
            hasError = true;
            get("error_shoe_name").innerHTML = "*Shoe Name Required";
        }
        if (get("category").value == "") {
            hasError = true;
            get("error_category").innerHTML = "*Category Required";
        }
        if (get("price").value == "") {
            hasError = true;
            get("error_price").innerHTML = "*Price Required";
        }
        if (get("quantity").value == "") {
            hasError = true;
            get("error_quantity").innerHTML = "*Quantity Required";
        }
        if (get("size").value == "") {
            hasError = true;
            get("error_size").innerHTML = "*size Required";
        }
        if (get("color").value == "") {
            hasError = true;
            get("error_color").innerHTML = "*Confirm size Required";
        }
        if (get("text").value == "") {
            hasError = true;
            get("error_bio").innerHTML = "*Description Required";
        }

        return !hasError;
    }

    function refresh() {
        hasError = false;
        get("error_name").innerHTML = "";
        get("error_category").innerHTML = "";
        get("error_size").innerHTML = "";
        get("error_color").innerHTML = "";
        get("error_gender").innerHTML = "";
        get("error_price").innerHTML = "";
        get("error_quantity").innerHTML = "";
        get("error_text").innerHTML = "";
    }