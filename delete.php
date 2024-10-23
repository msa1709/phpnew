<?php

include("connect.php");
if (isset($_POST['id'])) {
    $productId = $_POST['id'];

    // SQL query to delete the product
    $sqlDelete = "UPDATE products SET Trash = 1 WHERE id = ?";
    $stmt = $conn->prepare($sqlDelete);
    $stmt->bind_param("i", $productId);

    if ($stmt->execute()) {
        echo 'success'; // Respond back with success
    } else {
        echo 'error';
    }
}
// if (isset($_GET['id'])) {
// include("connect.php");
// $id = $_GET['id'];
// $sql = "UPDATE products SET Trash = 1 WHERE id = $id";
// if(mysqli_query($conn,$sql)){
//     session_start();
//     $_SESSION["delete"] = "Product Deleted Successfully!";
//     header("Location:showlist.php");
// }else{
//     die("Something went wrong");
// }
// }else{
//     echo "products does not exist";
// }
?>