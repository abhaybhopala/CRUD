<?php
include 'db.php';

$id = $_GET['id'];
$select = "SELECT * FROM `user` WHERE id=$id";
$data = mysqli_query($con, $select);
$row = mysqli_fetch_array($data);

$name = $row["name"];
$email = $row["email"];
$number = $row["number"];
$password = $row["password"];

$error_msg = ""; // Variable to hold error message for the form

if (isset($_POST['update_btn'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $number = $_POST['number'];
    $password = $_POST['password'];

    $checkQuery = "SELECT * FROM `user` WHERE (`email`='$email' OR `number`='$number') AND `id` != $id";
    $checkResult = mysqli_query($con, $checkQuery);
    if (mysqli_num_rows($checkResult) > 0) {
        // Email or phone number already exists for another user
        $error_msg = "Email/Phone number already exists for another user!";
    } else {
        if ($_FILES["image"]["name"]) {
            $targetDir = "upload/";
            $fileName = basename($_FILES["image"]["name"]);
            $targetFilePath = $targetDir . $fileName;
            move_uploaded_file($_FILES["image"]["tmp_name"], $targetFilePath);
            $sql = "UPDATE `user` SET `id`='$id',`name`='$name',`email`='$email',`number`='$number',`image`='$fileName',`password`='$password' WHERE id=$id";
        } else {
            $sql = "UPDATE `user` SET `id`='$id',`name`='$name',`email`='$email',`number`='$number',`password`='$password' WHERE id=$id";
        }
        $result = mysqli_query($con, $sql);
        if ($result) {
            $_SESSION['edit_success'] = "student updated successfully!";
            header("Location:list.php"); // Redirect back to product page
            exit();
        } else {
            die(mysqli_error($con));
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>EDIT USER</title>
</head>
<body style='background-color: #e6f0ff'>
  
<div class="section" style=" width: 20%; float: left;">
            <div 
            <?php include 'sidebar.php'; ?>></div>

  	</div>


    <form method="post" action="" enctype="multipart/form-data">

  

    <?php if(!empty($error_msg)): ?>
            <div style="color: red;"><?php echo $error_msg; ?></div>
        <?php endif; ?>
<link rel="stylesheet" type="text/css" href="style.css">
<?php if(isset($row['image'])): ?>
        <img src="upload/<?php echo $row['image']; ?>" style="width: 100px;height: 100px;margin-left: 120px;
" alt="Image" style="">
    <?php endif; ?>

  	<div class="input-group1">
  <!-- <label>Name</label> -->
  	  <input value="<?php echo $row['name'] ?>" type="text" name="name" readonly style=""  oninput="this.value = this.value.toUpperCase();" required>
  	</div>
  	<div class="input-group">
  	  <label>Email</label>
  	  <input value="<?php echo $row['email'] ?>" type="email" name="email"  required>
  	</div>
    <div class="input-group">
  	  <label>Number</label>
  	  <input value="<?php echo $row['number'] ?>" type="text" name="number" minlength="10" maxlength="10" idnumber="numberInput" pattern="[0-9]{10}" title="Number must be exactly 10 digits." oninput="validateNumberLength()" required>
      <span style="color:black;font-size:0.8rem">INPUT ONLY NUMBER</span>

    </div>
    <script>
      function validateNumberLength(){
        var input = document.getElementById('numberInput');
        var number = input.value.trim();
        var isValid = /^\d{10}$/.test(number);
        input.setCustomValidity(isValid ? "" : "Number must be exactly 10 digits.");
      }
    </script>

  	<div class="input-group">
  	  <label>Password</label>
  	  <input value="<?php echo $row['password'] ?>" type="password" name="password" required>
  	</div>


      

    <div class="input-group">
    <label>Profile Pic.</label>
    <input type="file" name="image" id="image" style="border: 10px;"/>
    
</div>

    <div class="invalid-feedback"></div>  
  	</div>
  	<div class="input-group">
  	  <button type="submit" class="bbtn" name="update_btn" style="background-color: #04AA6D" >Update</button>
      <button type="submit" class="bbtn" name="back" style="background-color: #6B6B6B "><a href="list.php"style="color:white; text-decoration: none; margin:2px; ">Cancal</a></button>
      <?php if(!empty($msg)): ?>
        <p><?php echo $msg; ?></p>
    <?php endif; ?>
      
</form>
<style>

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
  .input-group1 input {
    text-align: center;
    margin-left: 30px;
    border:none;
    font-weight:bold;
    font-size: 20px;
    padding: 10px;
   border-radius: 200px;
    background-color: #EEEEEE    ;
  }
  
</style>
  
</body>
</html>