<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous">
    </script>
</head>

<body>
    <br>
    <div class="text-center">
        <h2 class="text-success">Add new product</h2>
    </div>

    <body class="bg-light">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 m-auto">
                    <div class="card mt-5">
                        <div class="card-title">
                            <h3 class="bg-primary text-white text-center py-3">Add new Product</h3>
                        </div>
                        <div class="card-body">
                            <form action="insert.php" method="post">
                                <label for="category">Category:</label>
                                <select class="form-control mb-2 form-select" name="category" required>
                                    <option value="" disabled selected>Select brand</option>
                                    <option value="Iphone">Iphone</option>
                                    <option value="Samsung">Samsung</option>
                                    <option value="Huawei">Huawei</option>
                                    <option value="sony">Sony</option>
                                </select>

                                <label for="title">Title:</label>
                                <input type="text" class="form-control mb-2" name="title" required>

                                <label for="description">Description:</label>
                                <textarea class="form-control mb-2" name="description" rows="5" required></textarea>

                                <label for="price">Price:</label>
                                <input type="number" class="form-control mb-2" name="price" step="0.01" required>

                                <label for="image">Image</label>
                                <input type="text" class="form-control mb-2" name="image" required>

                                <button type="submit" class="btn btn-primary" name="submit">Add Product</button>
                            </form>


                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>

</html>