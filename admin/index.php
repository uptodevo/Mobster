<?php
session_start();
// Include necessary files

// connect to the database
$con = mysqli_connect('localhost', 'HNCWEBMR2', 'BSoEExqxv5', 'HNCWEBMR2')
or die ("could not connect network");

error_reporting(E_ALL);
ini_set('display_errors', 1);

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Catalog list</title>
    <!-- Include Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.1.3/css/bootstrap.min.css">
</head>

<body>


    <?php
$totalQuantity = 0;
if(isset($_SESSION['cart'])) {
    foreach($_SESSION['cart'] as $item) {
        $totalQuantity += $item['quantity'];
    }
}
?>

    <div class="position-fixed top-0 end-0 m-3">
        <a href="cart.php" class="btn btn-primary">
            <i class="fas fa-shopping-basket"></i> Basket
            <?php if(isset($_SESSION['cart'])) { ?>
            <span class="badge bg-secondary"><?php echo $totalQuantity; ?></span>
            <?php } ?>
        </a>
    </div>



    <div class="container mt-5">
        <h1>Product Catalog list</h1>
        <a class="btn btn-danger" href="admin.php">Go to Admin</a>
        <br><br>
        <div class="row">
            <?php
     $con = mysqli_connect('localhost', 'HNCWEBMR2', 'BSoEExqxv5', 'HNCWEBMR2')
     or die ("could not connect network");


      $query = "SELECT * FROM items";
        $result = mysqli_query($con, $query);

    

      while ($row = mysqli_fetch_assoc($result)) {
        $id = $row['id'];
        $category = $row['category'];
        $title = $row['title'];
        $description = $row['description'];
        $price = $row['price'];
        $image = $row['image'];
    ?>

            <div class="col-12 col-md-6 col-lg-3 mb-4">
                <div class="card h-100">
                    <img class="card-img-top img-fluid" src='images/<?php echo $row['image']; ?>'
                        alt='<?php echo $row['image']; ?>'>
                    <div class="card-body">
                        <h5 class="card-title"><?php echo $row['title']; ?></h5>
                        <p class="card-text"><?php echo $row['description']; ?></p>
                        <p class="card-text"><?php echo $row['price']; ?></p>
                        <a href="#" class="btn btn-primary" data-bs-toggle="modal"
                            data-bs-target="#productModal-<?php echo $id; ?>">View Product</a>
                    </div>
                </div>
            </div>

            <!-- Product Modal -->
            <div class="modal fade" id="productModal-<?php echo $id; ?>" tabindex="-1"
                aria-labelledby="productModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="productModalLabel"><?php echo $row['title']; ?></h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <img src="images/<?php echo $row['image']; ?>" alt="<?php echo $row['image']; ?>"
                                class="img-fluid">
                            <p><?php echo $row['description']; ?></p>
                            <h6><?php echo $row['price']; ?></h6>

                            <!-- For action redirecting page -->
                            <form action="./shopping-cart/add-to-basket.php" method="post">
                                <input type="hidden" name="product_id" value="<?php echo $id; ?>">
                                <label for="quantity">Quantity:</label>
                                <input type="number" id="quantity" name="quantity" value="1" min="1" max="10"
                                    class="form-control mb-3">
                                <button type="submit" class="btn btn-primary">Add to Basket</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <?php } ?>
        </div>
    </div>


    <!-- Include Bootstrap JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.1.3/js/bootstrap.min.js"></script>
</body>

</html>