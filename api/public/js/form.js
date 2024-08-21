document.getElementById('product_type').addEventListener('change', function() {
    let selectedValue = this.value;
    let dynamicFields = document.getElementById('dynamicFields');
    dynamicFields.innerHTML = ''; 

    switch (selectedValue) {
        case 'DVD':
            dynamicFields.innerHTML = `
                <label for="size">Size:</label>
                <input type="text" id="size" name="size">
                <p>Please, provide the size of the DVD.</p>
            `;
            break;
        case 'Book':
            dynamicFields.innerHTML = `
                <label for="weight">Weight:</label>
                <input type="text" id="weight" name="weight">
                <p>Please, provide the weight of the book.</p>
            `;
            break;
        case 'Furniture':
            dynamicFields.innerHTML = `
                <div>
                    <label for="width">Width:</label>
                    <input type="number" id="width" name="width">
                </div>
                <div>
                    <label for="height">Height:</label>
                    <input type="number" id="height" name="height">
                </div>
                <div>
                    <label for="length">Length:</label>
                    <input type="number" id="length" name="length">
                </div>
                <p>Please, provide the dimensions of the furniture.</p>
            `;
            break;
        default:
            // Optionally handle cases where no valid type is selected
            dynamicFields.innerHTML = '<p>Please select a valid product type.</p>';
            break;
    }
});
