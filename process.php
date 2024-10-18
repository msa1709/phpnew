<?php
include('connect.php');
if (isset($_POST["submit"])) {
    /*$title = mysqli_real_escape_string($conn, $_POST["title"]);
    $type = mysqli_real_escape_string($conn, $_POST["type"]);*/
    $productname = mysqli_real_escape_string($conn, $_POST["productname"]);
    $producttype = mysqli_real_escape_string($conn, $_POST["producttype"]);
    $profile_image = mysqli_real_escape_string($conn, $_POST["profile_image"]);
    $id = mysqli_real_escape_string($conn, $_POST["id"]);
    $sqlInsert = "INSERT INTO products(product_name,product_type,product_image) VALUES ('$productname','$producttype', '$profile_image')";
    $sqlUpdate = "UPDATE products SET product_name = '$productname', product_type= '$producttype' WHERE id='$id'";
    if(mysqli_query($conn,$sqlInsert)){
        session_start();
        $_SESSION["create"] = "Product Added Successfully!";
        header("Location:showlist.php");
    }

    elseif(mysqli_query($conn,$sqlUpdate)){
        session_start();
        $_SESSION["update"] = " Product Updated Successfully!";
         header("Location:showlist.php");
      } 
    
    else{
        die("Something went wrong");
    }
}


// if (isset($_POST["edit"])) {

//    $productname = mysqli_real_escape_string($conn, $_POST["product_name"]);
//    $producttype= mysqli_real_escape_string($conn, $_POST["product_type"]);
//    $id = mysqli_real_escape_string($conn, $_POST["id"]);
//    $sqlUpdate = "UPDATE products SET product_name = '$productname', product_type= '$producttype' WHERE id='$id'";
//    if(mysqli_query($conn,$sqlUpdate)){
//        session_start();
//        $_SESSION["update"] = "Book Updated Successfully!";
//         header("Location:showlist.php");
//      }else{
//         die("Something went wrong");
//     }
//  } 
 ?>