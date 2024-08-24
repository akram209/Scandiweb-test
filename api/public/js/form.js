let select=document.getElementById('product_type');
select.value='';
select.addEventListener('change', function() {
    let selectedValue = this.value;
    let dynamicFields = document.getElementById('dynamicFields');
    dynamicFields.innerHTML = ''; 

    switch (selectedValue) {
        case 'DVD-disc':
            dynamicFields.innerHTML = `
                <label for="size">Size:</label>
                <input type="text" id="size" name="size_mb">
                <p id="size_mbError"></p>
            `;
            break;
        case 'Book':
            dynamicFields.innerHTML = `
                <label for="weight">Weight:</label>
                <input type="text" id="weight" name="weight">
                <p id="weightError"></p>
            `;
            break;
        case 'Furniture':
            dynamicFields.innerHTML = `
                <div>
                    <label for="width">Width:</label>
                    <input type="number" id="width" name="width">
                    
                    <p id="widthError"></p>
                </div>
                <div>
                    <label for="height">Height:</label>
                    <input type="number" id="height" name="height">
                    <p id="heightError"></p>
                </div>
                <div>
                    <label for="length">Length:</label>
                    <input type="number" id="length" name="length">
                    <p id="lengthError"></p>
                </div>
            `;
            break;
        default:
            // Optionally handle cases where no valid type is selected
            dynamicFields.innerHTML = '<p id="product_typeError">Please select a valid product type.</p>';
            break;
    }
});
// Handling the 'cancel' button
cancel.addEventListener('click', function() {
    window.location.href = 'ProductList.php';
});

// Handling the 'save' button
save.addEventListener('click', function(event) {
    validateForm(event);
});

// Validation function
function validateForm(event) {
    event.preventDefault(); // Prevent form submission

    var errors = false;

    // Inputs values
    var name = document.forms['product_form']['name'].value;
    var sku = document.forms['product_form']['sku'].value;
    var price = document.forms['product_form']['price'].value;
    var product_type = document.forms['product_form']['product_type'].value;

    // Reset the error messages
    document.getElementById('nameError').innerHTML = "";
    document.getElementById('skuError').innerHTML = "";
    document.getElementById('priceError').innerHTML = "";
    document.getElementById('product_typeError').innerHTML = "";

    // Validation for existing products (stored in localStorage)
    let products = localStorage.getItem('products');
    if (products != null) {
        products = JSON.parse(products);
        products.forEach(product => {
            if (sku == product.sku) {
                document.getElementById('skuError').innerHTML = "SKU already exists";
                errors = true;
                return false;
            }
        });
    }

    // Field-specific validation
    if (sku === "") {
        document.getElementById('skuError').innerHTML = "SKU must be filled out";
        errors = true;
    }
    if (name === "") {
        document.getElementById('nameError').innerHTML = "Name must be filled out";
        errors = true;
    } else if (name.length < 3) {
        document.getElementById('nameError').innerHTML = "Name must be at least 3 characters";
        errors = true;
    } else if (name.length > 30) {
        document.getElementById('nameError').innerHTML = "Name must be less than 30 characters";
        errors = true;
    }
    if (price === "") {
        document.getElementById('priceError').innerHTML = "Price must be filled out";
        errors = true;
    }
    if (product_type === "") {
        document.getElementById('product_typeError').innerHTML = "Product type must be selected";
        errors = true;
    }

    // Validate dynamic fields based on product type
    if (product_type === "DVD-disc") {
        var size_mb = document.forms['product_form']['size_mb'].value;
        if (size_mb === "") {
            document.getElementById('size_mbError').innerHTML = "Size must be filled out";
            errors = true;
        }
    } else if (product_type === "Book") {
        var weight = document.forms['product_form']['weight'].value;
        if (weight === "") {
            document.getElementById('weightError').innerHTML = "Weight must be filled out";
            errors = true;
        }
    } else if (product_type === "Furniture") {
        var width = document.forms['product_form']['width'].value;
        var height = document.forms['product_form']['height'].value;
        var length = document.forms['product_form']['length'].value;
        if (width === "" ) {
            document.getElementById('widthError').innerHTML = "Width must be filled out";
            errors = true;
        }
        if (height === "") {
            document.getElementById('heightError').innerHTML = "Height must be filled out";
            errors = true;
        }
        if (length === "") {
            document.getElementById('lengthError').innerHTML = "Length must be filled out";
            errors = true;
        }
    }

    // Submit the form if no errors
    if (!errors) {
        document.getElementById('product_form').submit();
    }
}


