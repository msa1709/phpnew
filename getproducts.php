<?php
include('connect.php');

$id = $_POST['id'];
$query = "SELECT * FROM products WHERE id = $id";
$result = mysqli_query($conn, $query);
$product = mysqli_fetch_assoc($result);

echo json_encode($product);
?>
