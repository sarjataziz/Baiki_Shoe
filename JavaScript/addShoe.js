
    function validateForm() {
        var name = document.getElementById("name").value;
        var category = document.getElementById("category").value;
        var price = document.getElementById("price").value;
        var quantity = document.getElementById("quantity").value;
        var size = document.getElementById("size").value;
        var color = document.getElementById("color").value;
        var rating = document.getElementById("rating").value;
        var description = document.getElementById("text").value;
        var shoe_img = document.getElementById("shoe_img").value;
        var shoe_id = document.getElementById("shoe_id").value;

        // Check if name field is empty
        if (name == "") {
            alert("Please enter a shoe name");
            return false;
        }

        // Check if category field is empty
        if (category == "") {
            alert("Please enter a category");
            return false;
        }

        // Check if price field is empty and if it's a valid number
        if (price == "" || isNaN(price)) {
            alert("Please enter a valid price");
            return false;
        }

        // Check if quantity field is empty and if it's a valid number
        if (quantity == "" || isNaN(quantity)) {
            alert("Please enter a valid quantity");
            return false;
        }

        // Check if size field is empty and if it's a valid number
        if (size == "" || isNaN(size)) {
            alert("Please enter a valid size");
            return false;
        }

        // Check if color field is empty
        if (color == "") {
            alert("Please enter a color");
            return false;
        }

        // Check if rating field is empty and if it's a valid number
        if (rating == "" || isNaN(rating)) {
            alert("Please enter a valid rating");
            return false;
        }

        // Check if description field is empty
        if (description == "") {
            alert("Please enter a description");
            return false;
        }

        // Check if shoe image field is empty
        if (shoe_img == "") {
            alert("Please select a shoe image");
            return false;
        }

        // Check if shoe type is selected
        if (shoe_id == "") {
            alert("Please select a shoe type");
            return false;
        }

        return true;
    }

