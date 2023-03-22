<?php
require_once("server.php");

if(isset($_POST['submit'])) {
    $category = $_POST['category'];
    $title = $_POST['title'];
    $description = $_POST['description'];
    $price = $_POST['price'];
    $image = $_POST['image'];

    $query = " insert into items (category, title, description, price, image) values('$category','$title','$description','$price','$image')";

    $stmt = mysqli_prepare($con, $query);
    $result = mysqli_stmt_execute($stmt);

    if($result)
    {
        header("location:index.php");
    }
    else
    {
        echo 'Please Check Your Query insert';
    }
}

?>