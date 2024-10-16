<?php
if (isset($_GET['id'])) {
include("connect.php");
$id = $_GET['id'];
$sql = "UPDATE products SET Trash = 1 WHERE id = $id";
if(mysqli_query($conn,$sql)){
    session_start();
    $_SESSION["delete"] = "Product Deleted Successfully!";
    header("Location:showlist.php");
}else{
    die("Something went wrong");
}
}else{
    echo "products does not exist";
}
?>