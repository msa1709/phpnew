<html>
  <head>
    <title>Image Upload in PHP With MySQL</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" >
  </head>
  <body>
  <div class='container mt-5'>
    <div class='row'>
      <div class='col-md-6 mx-auto'>
        <?php
          //Database Connection
          $con = mysqli_connect("localhost","root","","db_sample");
          $message = "";
          if(isset($_FILES["image"])){
            $allowedTypes = ["png","jpg","jpeg"];
            $fileType = strtolower(pathinfo($_FILES["image"]["name"],PATHINFO_EXTENSION));
             //Check Image Extension
            if(!in_array($fileType ,$allowedTypes)){
              $message = "<div class='alert alert-danger'>Image Upload Failed.Invalid Image Format.</div>";
            }
            //Check Image Size greater than 300KB
            elseif($_FILES["image"]["size"]>307200){
              $message = "<div class='alert alert-danger'>Image Upload Failed.Image Size greater than 300KB.</div>";
            }
            //Upload Image
            else{
              $fileName = time().".".$fileType;
              //Move image into 'uploads' Folder
              if(move_uploaded_file($_FILES["image"]["tmp_name"],"uploads/".$fileName)){
                //Save image name in database
                $sql ="insert into tbl_images(img) values ('{$fileName}')";
                if($con->query($sql)){
                  $message = "<div class='alert alert-success'>Image Upload Successfully.</div>";
                }else{
                  $message = "<div class='alert alert-danger'>Image Upload Failed.Try Again.</div>";
                }
              }else{
                $message = "<div class='alert alert-danger'>Image Upload Failed.Try Again.</div>";
              }
            }
          }
        ?>
        <form method='post' action='index.php' enctype='multipart/form-data' >
          <?php 
            //Message for - Status of deleted Image
            if(isset($_GET["status"])){
              if($_GET["status"]==1){
                $message = "<div class='alert alert-success'>Deleted Successfully</div>";
              }else{
                $message = "<div class='alert alert-danger'>Deleted Successfully</div>";
              }
            }
          ?>
          <?php echo $message; ?>
          <div class='form-group'>
            <label>Choose Image</label>
            <input type='file' name='image' required class='form-control'>
          </div>
          <input type='submit' name='submit' value='Submit' class='btn btn-primary'>
        </form>
      </div>
    </div>
    <div class='row'>
      <div class='col-md-12'>
        <table class='table'>
          <thead>
            <tr>  
              <th>SNo</th>
              <th>Image</th>
              <th>Delete</th>
            </tr>
          </thead>
          <tbody>
            <?php 
              $sql ="select * from tbl_images";
              $res = $con->query($sql);
              $i=0;
              while($row = $res->fetch_assoc()){
                $i++;
                echo "
                  <tr>
                    <td>{$i}</td>
                    <td><img src='uploads/{$row["img"]}' style='height:80px;' ></td>
                    <td><a href='delete.php?id={$row["id"]}&name={$row["img"]}' class='btn btn-danger'>Delete</a></td>
                  </tr>
                ";
              }
            ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
  </body>
</html>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <title>Book List</title>
    <style> 

       table {
        width:10%; 
        margin-left:20%;
       }

        table  td, table th{
        vertical-align:middle;
        text-align:start;
        padding:20px!important;
        } 
        @media (max-width: 500px) {
            table td, table th {
                padding: 10px !important;
                text-align: center;
            } 
            table {
                width: 50%; /* Ensure table takes full width on small screens */
                margin-left: 0;
            }
        }

    </style>
</head>
<body>
    <!-- Require the menu -->
<?php require 'index.php'; ?>
    <div class="container my-4">
        <header class="d-flex justify-content-center my-4"><br>
            <h1>Product List</h1>
             <div>
                <!-- <a href="addproduct.php" class="btn btn-primary">Add Products</a> -->
            </div>
            <!-- <div>
                <a href="index.php" class="btn btn-primary">back</a>
            </div>  -->
        </header>
     
        
        <table class="table table-bordered border-danger table-sm">
        <thead>
            <tr class="table-dark">
                <th style="width:10%">id</th>
                <th style="width:10%">Productname</th>
                <th style="width:10%">Producttype</th> 
                <th style="width:20%">Product_image</th>
                <th>Function</th>
                <!-- <th>Action</th>  -->
            </tr>
        </thead>
    <tbody id="productTableBody">
        
        <?php
        include('connect.php');
        $sqlSelect = "SELECT * FROM products where Trash =0";
        $result = mysqli_query($conn,$sqlSelect);
        while($data = mysqli_fetch_array($result)){
            ?>
            <tr id="row-<?php echo $data['id']; ?>">
                <td><?php echo $data['id']; ?></td>
                <td><?php echo $data['product_name']; ?></td>
                <td><?php echo $data['product_type']; ?></td> 
                <td><?php echo $data['product_image']; ?></td>
           
                <td>
                 
                    <a href="edit.php?id=<?php echo $data['id']; ?>" class="btn btn-warning">Edit</a>
                    <!-- <a href="delete.php?id=<?php// echo $data['id']; ?>" onclick='deleteRecord(this)' class="btn btn-danger">Delete</a> -->
                    <!-- <button class="btn btn-danger" onclick="deleteProduct(<?php// echo $data['id']; ?>)">Delete</button> -->
                    <a href="javascript:void(0);" onclick="deleteProduct(<?php echo $data['id']; ?>)" class="btn btn-danger">Delete</a>

                 
                </td>
            </tr>
            <?php
            }
            ?>
           
     </tbody>
        </table> 


    </div> 
    <script>
              function deleteProduct(productId) {
                console.log("Deleting product with ID:", productId);  // Log the product ID for debugging
                // Check if productId is valid
                if (!productId) {
                     console.log("Product ID is missing or invalid.");
                     return;  // Exit the function if no productId
                      }
                if (confirm("Are you sure you want to delete this product?")) {
                     $.ajax({
                        url: 'delete_product.php',
                        type: 'POST',
                         data: { id: productId },  // Ensure the data is sent properly
                          success: function(response) {
                            console.log("Server response:", response);  // Log the server response
                             if (response.trim() === 'success') {  // Ensure the response is 'success
                                 $('#row-' + productId).remove();  // Remove the product row from the table
                                  alert('Product deleted successfully!');
                                } else {
                                    alert('Error deleting product: ' + response);  // Display the server error
                                 },
                                error: function(jqXHR, textStatus, errorThrown) {
                                    console.log("AJAX error:", textStatus, errorThrown);  // Log AJAX errors
                                    alert('An error occurred. Please try again.');
                                 }
                            });
                        }
                 }







//         function deleteProduct(productId) {
//             console.log("Deleting product with ID:", productId);
//             if (confirm("Are you sure you want to delete this product?")) {
//                  $.ajax({
//                     url: 'delete.php',
//                     type: 'POST',
//                     data: { "id": productId },
//                     success: function(response) {
//                         console.log("Server response:", response);
//                          if (response === 'success') { 
//                             $('#row-' + productId).remove();
//                             alert('Product deleted successfully!');
//                         } else {
//                              alert('Error deleting product. Please try again.');
//                         }
//                 },
//                error: function() {
//                 alert('An error occurred. Please try again.');
//             }
//         });
//     }
// }

</script>
</body>
</html>