<?php
include('connect.php');

$id = $_POST['id'];
$query = "DELETE FROM products WHERE id = $id";
mysqli_query($conn, $query);

echo "Product deleted successfully";
?>
