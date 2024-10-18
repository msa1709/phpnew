<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
        <tbody>
        
        <?php
        include('connect.php');
        $sqlSelect = "SELECT * FROM products where Trash =0";
        $result = mysqli_query($conn,$sqlSelect);
        while($data = mysqli_fetch_array($result)){
            ?>
            <tr>
                <td><?php echo $data['id']; ?></td>
                <td><?php echo $data['product_name']; ?></td>
                <td><?php echo $data['product_type']; ?></td> 
                <td><?php echo $data['product_image']; ?></td>
           
                <td>
                 
                    <a href="edit.php?id=<?php echo $data['id']; ?>" class="btn btn-warning">Edit</a>
                    <a href="delete.php?id=<?php echo $data['id']; ?>" class="btn btn-danger">Delete</a>
                </td>
            </tr>
            <?php
        }
        ?>
        </tbody>
        </table>
    </div>
</body>
</html>