<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>product list</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="../public/css/list.css">
</head>

<body>
    <div id="product-head">
        <h2>Product List</h2>
        <a href="CreateProduct.php" type="button" class="btn btn-primary">Add</a>
        <button id="mass-delete" class="btn btn-danger">mass delete</button>
        <hr>


    </div>
    <form id="delete" action="/products-delete" method="POST">

        <div class="container text-center">
            <div class="row row-cols-4">


            </div>
        </div>
    </form>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="../public/js/app.js"> </script>
</body>

</html>