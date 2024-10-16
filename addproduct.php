<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Check if the user is logged in and is an admin
if (!isset($_SESSION['user_type']) || $_SESSION['user_type'] !== 'admin') {
    // If the user is not an admin, redirect to another page or show an error
    header("Location: login.php"); // Redirect to login page or another appropriate page
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <title>Add New Book</title>
</head>
<body>


  <?php require 'index.php'; ?>

    <div class="container my-5"> 

    

    <header class="d-flex justify-content-between my-4"><br>
        <h1>Add Product</h1>
            <div>
            <a href="index.php" class="btn btn-primary">Back</a>
            </div>
    </header> 
    <form action="process.php" method="post">
            <!-- <div class="form-elemnt my-4">
                <input type="text" class="form-control" name="title" placeholder="ProductTitle:">
            </div> -->
            <div class="d-flex justify-content-center form-elemnt my-4">
                <div class="col-sm-4">
                    <input type="text" class="form-control" name="productname" placeholder="ProductName:">
                    <input type="hidden" class="form-control" name="id" placeholder="ProductName:" value="<?php echo $id;?> "> <br>
                    <select name="producttype" id="" class="form-control"> 
                    <option value="">Select Product Type:</option>
                    <option value="Departmental">Departmental</option>
                    <option value="Homeappliances">Homeappliances</option>
                    <option value="SportsAccessories">SportsAccessories</option>
                    <option value="MobileAccessories">MobileAccessories</option>
                </select> <br>   
                <label for="profile_image">Upload Image:</label>
                <input type="file" class="form-control" name="profile_image" id="profile_image" accept="image/*"><br>

                <input type="submit" name="submit" value="Add Products" class="btn btn-primary" style="justify-content-center" >
                </div>
            </div>
            <!-- <div class=" d-flex justify-content-center form-elemnt  my-4">
                <div class ="col-sm-4">
               
            </div> 
            <div> -->
            <!-- <div class="form-element my-4">
                <textarea name="description" id="" class="form-control" placeholder="Book Description:"></textarea>
            </div> -->
            <!-- <div class="form-element my-4">
                <input type="submit" name="create" value="Add Products" class="btn btn-primary">
            </div> -->
        </form>
        
        
    </div>
 
  
</body>
</html>