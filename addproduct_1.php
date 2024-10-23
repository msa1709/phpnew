<?php
include('connect.php'); // Make sure to include your DB connection

if (session_status() === PHP_SESSION_NONE) {
   session_start();
}

// Check if the user is logged in and is an admin
if (!isset($_SESSION['user_type']) || $_SESSION['user_type'] !== 'admin') {
    header("Location: login.php");
    exit();
 }

$id = '';
$product_name = '';
$product_type = '';
$product_image = '';

// Check if it's an edit operation
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $query = "SELECT * FROM products WHERE id = $id";
    $result = mysqli_query($conn, $query);
    $product = mysqli_fetch_assoc($result);

    $product_name = $product['product_name'];
    $product_type = $product['product_type'];
    $product_image = $product['product_image'];
}

// Insert or Update logic
if (isset($_POST['submit'])) {
    $productname = $_POST['product_name'];
    $producttype = $_POST['product_type'];
    $id = $_POST['id'];
    $errors = array(); 
     // Check for image upload
     if ($_FILES['product_image']['error'] == 0) {
        $image = $_FILES['product_image']['name'];
        $imageTmpName = $_FILES['product_image']['tmp_name'];
        $imageSize = $_FILES['product_image']['size'];
        $imageError = $_FILES['product_image']['error'];
        $imageType = $_FILES['product_image']['type'];

    // Allowed file extensions
    $imageExt = explode('.', $image);
    $imageActualExt = strtolower(end($imageExt));
    $allowed = array('jpg', 'jpeg', 'png');

    if (!in_array($imageActualExt, $allowed)) {
        array_push($errors, "Only JPG, JPEG, and PNG files are allowed for profile images");
    }

    if ($imageSize > 5000000) { // 5MB limit
        array_push($errors, "File size must be less than 5MB");
    }

    if (count($errors) === 0) {
        $imageNewName = uniqid('', true) . "." . $imageActualExt;
        $imageDestination = 'uploads/' . $imageNewName;
        move_uploaded_file($imageTmpName, $imageDestination);  

        $baseurls = "http://localhost:8080/login-registerau/"; 
        $imagepath = $baseurls . $imageDestination;

    }
} else {
    array_push($errors, "Please upload a profile image");
} 

    
    // If id exists, update; otherwise, insert
    if (!empty($id)) {
        $query = "UPDATE products SET product_name='$productname', product_type='$producttype', product_image='$product_image' WHERE id=$id";
    } else {
        $query = "INSERT INTO products (product_name, product_type, product_image) VALUES ('$productname', '$producttype', '$imagepath')";
    }

    if (mysqli_query($conn, $query)) {
        header("Location: showlist_1.php");
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css">
    <title>Add / Edit Product</title>
</head>
<body>
  <?php //require 'index.php'; ?>

  <div class="container my-5"> 
    <header class="d-flex justify-content-between my-8">
        <h1><?php echo empty($id) ? 'Add Product' : 'Edit Product'; ?></h1>  
        
        <div>
        <a href="showlist_1.php" class="btn btn-primary">Back</a>

         </div>
      
    </header>  
    

    <form action="addproduct_1.php" method="post" enctype="multipart/form-data">
        <div class="d-flex justify-content-center form-elemnt my-4">
            <div class="col-sm-4">
                <input type="text" class="form-control" name="product_name" value="<?php echo $product_name; ?>" placeholder="Product Name:" required>
                <input type="hidden" class="form-control" name="id" value="<?php echo $id; ?>"> <br>
                <select name="product_type" id="" class="form-control"> 
                    <option value="">Select Product Type:</option>
                    <option value="Departmental" <?php echo $product_type == 'Departmental' ? 'selected' : ''; ?>>Departmental</option>
                    <option value="Homeappliances" <?php echo $product_type == 'Homeappliances' ? 'selected' : ''; ?>>Homeappliances</option>
                    <option value="SportsAccessories" <?php echo $product_type == 'SportsAccessories' ? 'selected' : ''; ?>>Sports Accessories</option>
                    <option value="MobileAccessories" <?php echo $product_type == 'MobileAccessories' ? 'selected' : ''; ?>>Mobile Accessories</option>
                </select> <br>   

                <label for="product_image">Upload Image:</label>
                <input type="file" class="form-control" name="product_image" id="profile_image" accept="image/*"><br>
                <?php if ($product_image) { ?>
                    <img src="<?php echo $product_image; ?>" width="100">
                <?php } ?>

                <input type="submit" name="submit" value="Save Product" class="btn btn-primary" >
            </div>
        </div>
    </form>
  </div>
</body>
</html>
