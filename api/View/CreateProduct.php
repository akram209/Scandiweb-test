<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Product</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="../public/css/form.css">
</head>

<body>

    <form action="/products" method="POST" id="product_form">
        <div>
            <label for="sku">SKU :</label>
            <input type="text" name="sku" id="sku">
            <p id="skuError"></p>
        </div>
        <div>
            <label for="name">Name :</label>
            <input type="text" name="name" id="name">
            <p id="nameError"></p>
        </div>


        <div>
            <label for="price">Price in dollars :</label>
            <input type="number" name="price" id="price">
            <p id="priceError"></p>
        </div>
        <div>
            <label for="product_type">Product type :</label>
            <select name="product_type" id="product_type">
                <option value="DVD-disc"> DVD</option>
                <option value="Book"> Book</option>
                <option value="Furniture">Furniture</option>

            </select>
            <p id="product_typeError"></p>
        </div>
        <div id="dynamicFields">

        </div>




    </form>
    <div id="btns">
        <button id="save" class="btn btn-primary">save</button>
        <button id="cancel" class="btn btn-danger">cancel</button>
    </div>


    <script src="../public/js/form.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

</body>

</html>