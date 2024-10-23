<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="initial-scale=1.0, maximum-scale=1.0, user-scalable=1">
<title>Home</title>
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.4/css/jquery.dataTables.min.css">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/2.2.2/css/buttons.dataTables.min.css">
<link rel="stylesheet" type="text/css" href="style.css">
	
<script src="sweetalert.min.js"></script>

</head>
<body>

<div class="container">
	<table id="example" class="display nowrap" style="width:50%">
        <thead>
            <tr>
                <th>Id</th>
                <th>Productname</th>
                <th>Producttype</th>
                <th style="width: 30%;">Productimage</th>
                <th>Function</th>
                <!-- <th>Salary</th> -->
            </tr>
        </thead>
        <tbody>
       
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
                <td> <img src="<?php echo $data['product_image']; ?>" width="100%" style="align-items:center"; alt=""></td> 
           
                <td>
                 <!-- <a href="addproducts_1.php?id=<?php //echo $data['id']; ?>" class="btn btn-warning">Edit</a> -->




                 
                    <!-- <a href="edit.php?id=<?php //echo $data['id']; ?>" class="btn btn-warning">Edit</a> -->
                    <!-- <a href="delete.php?id=<?php// echo $data['id']; ?>" onclick='deleteRecord(this)' class="btn btn-danger">Delete</a> -->
                    <!-- <button class="btn btn-danger" onclick="deleteProduct(<?php// echo $data['id']; ?>)">Delete</button> -->
                    <!-- <a href="javascript:void(0);" onclick="deleteProduct(<?php //echo $data['id']; ?>)" class="btn btn-danger">Delete</a> -->

                    <a href='#' class='btn btn-danger delete ' data-id="<?php echo $data['id']; ?>" style="color: red;" onsubmit="return submitForm(this);" >Delete</a>
                    <a href="addproduct_1.php?id=<?php echo $data['id']; ?>" class="btn btn-warning">Edit</a>
                </td>
            </tr>
            <?php
            }
            ?>
             
           
        </tbody>
   
    </table>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.11.4/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/2.2.2/js/dataTables.buttons.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/2.2.2/js/buttons.html5.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/2.2.2/js/buttons.print.min.js"></script>
<script type="text/javascript" src="script_1.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

</body>
</html>
