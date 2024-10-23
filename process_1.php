<?php
include('connect.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_POST['id'];
    $productname = $_POST['productname'];
    $producttype = $_POST['producttype'];
    $image = $_FILES['profile_image']['name'];

    if ($image) {
        $imagePath = 'uploads/' . $image;
        move_uploaded_file($_FILES['profile_image']['tmp_name'], $imagePath);
    } else {
        $imagePath = null; // Or retain existing image if editing
    }

    if ($id) {
        // Edit product
        $query = "UPDATE products SET product_name='$productname', product_type='$producttype', product_image='$imagePath' WHERE id=$id";
    } else {
        // Add new product
        $query = "INSERT INTO products (product_name, product_type, product_image) VALUES ('$productname', '$producttype', '$imagePath')";
    }

    mysqli_query($conn, $query);
}

// Fetch updated product list
$sqlSelect = "SELECT * FROM products WHERE Trash = 0";
$result = mysqli_query($conn, $sqlSelect);
while ($data = mysqli_fetch_array($result)) {
    echo "<tr id='row-{$data['id']}'>
            <td>{$data['id']}</td>
            <td>{$data['product_name']}</td>
            <td>{$data['product_type']}</td>
            <td><img src='{$data['product_image']}' width='50' /></td>
            <td><a href='#' class='btn btn-warning edit' data-id='{$data['id']}'>Edit</a>
            <a href='#' class='btn btn-danger delete'>Delete</a></td>
          </tr>";
}
?>
