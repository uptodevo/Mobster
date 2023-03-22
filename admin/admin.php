<?php 
// Connect to the database
$con = mysqli_connect('localhost', 'HNCWEBMR2', 'BSoEExqxv5', 'HNCWEBMR2')
// Check connection
or die ("could not connect network");
    $query = " select * from items "; 
    $result = mysqli_query($con,$query);
    
    ?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/css/bootstrap.min.css">
    <link
        href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@400;700&amp;family=Montserrat:ital,wght@1,100;1,300&amp;display=swap"
        rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/e524ad7d5a.js" crossorigin="anonymous"></script>
</head>


<div class="col py-3">

    <div class="container my-4">
        <h1 class="text-center">Admin Panel</h1>
        <a class="btn btn-success" href="index.php">Products page live</a>
<br><br>
<hr>
        <a href="add.php" class="btn btn-primary my-3">Add Product</a>


        <table class="table table-striped">
            <tr>

                <th>ID</th>
                <th>Category</th>
                <th>Image</th>
                <th>Title</th>
                <th>Description</th>
                <th>Price</th>
                <th>Edit</th>
                <th>Delete</th>



            </tr>
            <tbody>
                <?php
            // Connect to the database
            $con = mysqli_connect('localhost', 'HNCWEBMR2', 'BSoEExqxv5', 'HNCWEBMR2')
            // Check connection
            or die ("could not connect network");

            // Select all products from the products table
            $sql = "SELECT * FROM items";
            $result = mysqli_query($con, $sql);
            // Loop through the result set and display the products
            while($product = mysqli_fetch_assoc($result)) {

                $id = $product['id'];
                $category = $product['category'];
                $image = $product['image'];
                $title = $product['title'];
                $description = $product['description'];
                $price = $product['price'];
            
                ?>


                <td><?php echo $id ?></td>
                <td><?php echo $category ?></td>
                <td> <img style='height:130px;  width:120px' src='images/<?php echo $product ['image']; ?>'
                        alt='<?php echo $product ['image']; ?>'></td>
                <td><?php echo $title ?></td>
                <td><?php echo $description?></td>
                <td><?php echo $price?></td>

                <td> <a class="btn btn-warning" href="edit.php?GetID=<?php echo $id?>">Edit</a></td>
                <td><a class="btn btn-danger" href="delete.php?Del=<?php echo $id?>">Delete</a> </td>


                <?php
              echo "</tr>";
            }
            // Close the database connection
            mysqli_close($con);
          ?>
            </tbody>
        </table>
    </div>


</div>
</div>
</div>



<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous">
</script>


</body>

</html>