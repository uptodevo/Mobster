<?php
require_once("server.php");

if (isset($_POST['update'])) {
    $id = $_GET['id'];
    $category = $_POST['category'];
    $title = $_POST['title'];
    $description = $_POST['description'];
    $price = $_POST['price'];
    $image = $_POST['image'];

    // Perform some basic validation
    if (empty($category) || empty($title) || empty($description) || empty($price) || empty($image)) {
        echo "Please fill in all fields";
    } elseif (!is_numeric($price)) {
        echo "Price must be a number";
   
    } else {
        // Update the product in the database

        $query = "update items set category = '".$category."', title='".$title."', description='".$description."',price='".$price."', image='".$image."' where id ='".$id."'";
        $stmt = mysqli_prepare($con, $query);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);

      // Redirect to the appropriate page based on the category
      $result = true;

  
      if($result)
      {
          header("location:admin.php");
      }
      else
      {
          echo 'Please Check Your Query insert';
      }
  }
}
// Retrieve the product from the database
$id = $_GET['id'];
$query = "SELECT * FROM items WHERE id = ?";
$stmt = mysqli_prepare($con, $query);
mysqli_stmt_bind_param($stmt, "i", $id);
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);
$product = mysqli_fetch_assoc($result);
mysqli_stmt_close($stmt);

mysqli_close($con);
?>