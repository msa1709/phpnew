<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <title>Edit Book</title>
</head>
<body>
<?php require 'index.php'; ?> <br>
<div class="container my-5">
    <header class="d-flex justify-content-between my-4"> <br>
            <h1>Edit product</h1>
            <div>
            <a href="index.php" class="btn btn-primary">Back</a>
            </div>
    </header>
    <form action="process.php" method="post">
            <?php 
            
            if (isset($_GET['id'])) {
                include("connect.php");
                $id = $_GET['id'];
                $sql = "SELECT * FROM products WHERE id=$id";
                $result = mysqli_query($conn,$sql);
                $row = mysqli_fetch_array($result);
            
            ?>
                
            <div class="d-flex justify-content-center  form-elemnt my-4">
                <div class ="col-sm-4">
                <input type="text" class="form-control" name="productname" placeholder="productname:" value="<?php echo $row["product_name"]; ?>"> <br><br>
          
        
                <select name="producttype" id="" class="form-control">
                    <option value="">Select Book Type:</option>
                    <option value="Departmental" <?php if($row["product_type"]=="Departmental"){echo "selected";} ?>>Departmental</option>
                    <option value="Homeappliances" <?php if($row["product_type"]=="Homeappliances"){echo "selected";} ?>>Homeappliances</option>
                    <option value="SportsAccessories" <?php if($row["product_type"]=="SportsAccessories"){echo "selected";} ?>>SportsAccessories</option>
                    <option value="MobileAccessories" <?php if($row["product_type"]=="MobileAccessories"){echo "selected";} ?>>MobileAccessories</option>
                </select> <br>
                <input type="submit" name="edit" value="submit" class="btn btn-primary">

            </div>
            </div> 

        
            <!-- <input type="hidden" value="<?php //echo $id; ?>" name="id">
            <div class="form-element my-4">
             
            </div> -->

            <?php
            }else{
                echo "<h3>Book Does Not Exist</h3>";
            }
            ?>
           
    </form>
        
        
    </div>
</body>
</html>