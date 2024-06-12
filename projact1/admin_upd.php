<?php session_start();?>
<?php 
include 'db.php';


if(isset($_SESSION['email']) && !empty($_SESSION['email'])) {
    // User is logged in
    $email = $_SESSION['email'];
    // Proceed with whatever actions you need for a logged-in user
} else {
    // User is not logged in, redirect to login page
    header("Location: login.php");
    exit;
}
?>


<?php
include 'db.php';

if(isset($_SESSION['email']) && !empty($_SESSION['email'])) {
    // User is logged in
    $email = $_SESSION['email'];

    // Fetch user details based on the logged-in user's email
    $select = "SELECT * FROM `admin` WHERE email=?";
    $stmt = mysqli_prepare($con, $select);
    mysqli_stmt_bind_param($stmt, "s", $email);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    $row = mysqli_fetch_array($result);

    // Check if the user exists
    if ($row) {
      
        $name = $row["name"];
        $email = $row["email"];
        $password = $row["password"];

        if (isset($_POST['ad_update_btn'])) {
            // Update user details
            $name = $_POST['name'];
            $email = $_POST['email'];
            $password = $_POST['password'];

            // Handle image upload
            if(isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
                $fileName = $_FILES['image']['name'];
                $fileTmpName  = $_FILES['image']['tmp_name'];
                $fileType = $_FILES['image']['type'];
                $fileSize = $_FILES['image']['size'];
                
                // Move uploaded file to a directory (ensure directory exists and has appropriate permissions)
                move_uploaded_file($fileTmpName, "upload/" . $fileName);
            }

            // Update user details including the image
            $update = "UPDATE admin SET name=?, email=?, password=?, image=? WHERE email=?";
            $stmt = mysqli_prepare($con, $update);
            mysqli_stmt_bind_param($stmt, "sssss", $name, $email, $password, $fileName, $email);
            mysqli_stmt_execute($stmt);
            mysqli_stmt_close($stmt);

            // Redirect after update
            header("Location: admin.php");
            exit;
        }
    } else {
        // User not found, handle accordingly (redirect or show an error)
    }
} else {
    // User is not logged in, redirect to login page
    header("Location: login.php");
    exit;
}
?>






<!DOCTYPE html>
<html lang="en">
<head>
    <title>UPDATE ADMIN</title>
</head>
<body>
<div class="section" style=" width: 20%; float: left;">
            <div 
            <?php include 'sidebar.php'; ?>></div>
    </div>
    <form method="post" action="" enctype="multipart/form-data">
            <!-- <link rel="stylesheet" type="text/css" href="style.css"> -->
            <h1>UPDATE ADMIN</h1>
            <?php if(isset($row['image'])): ?>
        <img src="upload/<?php echo $row['image']; ?>" style="width: 100px;height: 100px;margin-left: 120px;
" alt="Image" style="">
    <?php endif; ?>

            
            <div class="input-group1">
  	        <!-- <label>Email</label> -->
  	        <input value="<?php echo $row['email'] ?>" type="email" name="email" readonly>
  	        </div>


            <div class="input-group">
            <label>Name</label>
  	         <input value="<?php echo $row['name'] ?>" type="text" name="name"  required >
  	        </div>
            
  	        <div class="input-group">
  	        <label>Password</label>
  	        <input value="<?php echo $row['password'] ?>" type="password" name="password" required >
  	        </div>
            
            <div class="input-group">
    <label>Profile Pic.</label>
    <input type="file" name="image" id="image" style="border:none" />
    
</div>

  	        <div class="input-group">
  	        <button type="submit" class="bbtn" name="ad_update_btn" style="background-color: #04AA6D" >Update</button>
            <button type="submit" class="bbtn" name="back" style="background-color: #6B6B6B "><a href="admin.php"style="color:white; text-decoration: none; margin:2px; ">Cancal</a></button>
            </div>
      
              

            </form>

<style>  form, .content {
    width: 30%;
    margin: 0px auto;
    padding-top: 5pxs;
    padding: 20px;
    border: 1px solid #B0C4DE;
    background: white;
    border-radius: 0px 0px 10px 10px;
  }
  .input-group {
    margin: 10px 0px 10px 0px;
    bo
  }
  .input-group label {
    display: block;
    text-align: left;
    margin: 3px;
  }
  .input-group input {
    height: 30px;
    width: 93%;
    padding: 5px 10px;
    font-size: 16px;
    border-radius: 5px;
    border: 1px solid gray;
  }
  .input-group1 input {
    text-align: center;
    margin-left: 45px;
    border:none;
    font-weight:bold;
    font-size: 20px;
    padding: 10px;
   border-radius: 200px;
    background-color: #EEEEEE    ;
  }
  .bbtn {
  background-color:  #4D58DE;
  border: none;
  color: white; 
  font-weight: bold;
  padding: 8px 25px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
  margin: 3px;
  margin-left: 0;
  cursor: pointer;
  border-radius: 100px;
  text-decoration:none;
  }
  h1{
    /* width: 30%; */
    margin: px auto 0px;
    color: white;
    background: #2a2185;
    text-align: center;
    border: 1px solid #B0C4DE;
    border-bottom: none;
    border-radius: 10px 10px 0px 0px;
    padding: 20px;
  }
  </style>

</body>
</html>