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