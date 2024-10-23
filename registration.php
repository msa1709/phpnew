




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

    

    <title>Registration Form</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link rel="stylesheet" href="style_2.css">
</head>
<body>
<div class="container"> 
    <?php
    session_start();
      if (isset($_POST["submit"])) {
        $fullName = $_POST["fullname"];
        $email = $_POST["email"];
        $password = $_POST["password"];
        $passwordRepeat = $_POST["repeat_password"];
        $userType = $_POST["user_type"];  
        
       
     
        
        $passwordHash = password_hash($password, PASSWORD_DEFAULT);

        $errors = array();
        
        if (empty($fullName) OR empty($email) OR empty($password) OR empty($passwordRepeat)OR empty($userType)) {
         array_push($errors,"All fields are required");
        }
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
         array_push($errors, "Email is not valid");
        }
        if (strlen($password)<8) {
         array_push($errors,"Password must be at least 8 charactes long");
        }
        if ($password!==$passwordRepeat) {
         array_push($errors,"Password does not match");
        }   
        // Validate user type
        if ($userType !== "admin" && $userType !== "user") {
            array_push($errors, "Invalid user type selected");
         }

        // Check for image upload
        if ($_FILES['profile_image']['error'] == 0) {
            $image = $_FILES['profile_image']['name'];
            $imageTmpName = $_FILES['profile_image']['tmp_name'];
            $imageSize = $_FILES['profile_image']['size'];
            $imageError = $_FILES['profile_image']['error'];
            $imageType = $_FILES['profile_image']['type'];

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


        require_once "database.php";
        $sql = "SELECT * FROM users WHERE email = '$email'";
        $result = mysqli_query($conn, $sql);
        $rowCount = mysqli_num_rows($result);
        if ($rowCount>0) {
         array_push($errors,"Email already exists!");
        }
        if (count($errors)>0) {
         foreach ($errors as  $error) {
             echo "<div class='alert alert-danger'>$error</div>";
         }
        }else{
         
         $sql = "INSERT INTO users (full_name, email, password, user_type,profile_image) VALUES ( ?, ?, ? ,?,?)";
         $stmt = mysqli_stmt_init($conn);
         $prepareStmt = mysqli_stmt_prepare($stmt,$sql);
         if ($prepareStmt) {
             mysqli_stmt_bind_param($stmt,"sssss",$fullName, $email, $passwordHash, $userType, $imagepath);
             mysqli_stmt_execute($stmt);
             //echo "<div class='alert alert-success'>You are registered successfully.</div>";
             echo "<script>
                        swal({
                            title: 'Registered Successfully!',
                            text: 'You have successfully registered.',
                            icon: 'success',
                            button: 'OK'
                        }).then(function() {
                            window.location.href = 'login.php';
                        });
                    </script>";


             //header("Location: login.php");
             exit();
         }else{
             die("Something went wrong");
         }
        }
       

     }  


    ?>
    

    <form action="registration.php" method="post" enctype="multipart/form-data">
            <div class="form-group">
                <input type="text" class="form-control" name="fullname" placeholder="Full Name:">
            </div>
            <div class="form-group">
                <input type="emamil" class="form-control" name="email" placeholder="Email:">
            </div>
            <div class="form-group">
                <input type="password" class="form-control" name="password" placeholder="Password:">
            </div>
            <div class="form-group">
                <input type="password" class="form-control" name="repeat_password" placeholder="Repeat Password:">
            </div>   
            <div class="form-group">
                <label for="user_type">User Type:</label><br><br>
                <select class="form-control" id="user_type" name="user_type">
                    <option value="user">User</option>
                    <option value="admin">Admin</option>
                </select>
            </div> 
            <div class="form-group">
                <label for="profile_image">Upload Profile Image:</label>
                <input type="file" class="form-control" name="profile_image" id="profile_image" accept="image/*">
            </div>

          
          <!-- <input type='submit' name='submit' value='Submit' class='btn btn-primary'>  -->
         
           
    
            
            
       

            <div class="form-btn">
                <input type="submit" class="btn btn-primary"  value="Register" name="submit">
            </div> <br> 


           
            
          
    </form> <br>  

    

     <div>
        <div><p>Already Registered <a href="login.php">Login Here</a></p></div>
      </div>


</div>



</body>

</html> 
