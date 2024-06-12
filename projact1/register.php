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
include("db.php");

$msg = "";
$error_msg = ""; // Variable to hold error message for the form

if (isset($_POST['reg_btn'])) {
    if(isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
        $target = "upload/" . basename($_FILES['image']['name']);
        $name = $_POST["name"];
        $email = $_POST["email"];
        $number = $_POST["number"];
        $password = $_POST["password"];
        $image = $_FILES['image']['name'];

        $checkQuery = "SELECT * FROM `user` WHERE (`email`='$email' OR `number`='$number')";
        $checkResult = mysqli_query($con, $checkQuery);
        if (mysqli_num_rows($checkResult) > 0) {
            // Email or phone number already exists for another user
            $error_msg = "Email / phone number already exists for another user!";
        } else {
            $insert = "INSERT INTO `user`(`id`, `name`, `email`, `number`, `image`, `password`) VALUES ('', '$name', '$email', '$number', '$image', '$password')";
            $insert_query_run = mysqli_query($con, $insert);

            if ($insert_query_run && move_uploaded_file($_FILES['image']['tmp_name'], $target)) {
                $msg = "Image update Success";
                header('location:list.php');
            } else {
                $msg = "Error inserting record or moving file";
            }
        }
    }
}
?>








    <!DOCTYPE html>
    <html>
    <head>
      <title>Registration	</title>
      <link rel="stylesheet" type="text/css" href="style.css">
    </head>
    <body style='background-color: #e6f0ff'>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
      <div class="header">
        <h2>Register</h2>

      </div>
      

                      
      <!-- <form method="post" action="" enctype="multipart/from-data">
      -->
      <form method="post" action="" enctype="multipart/form-data">
      <?php if(!empty($error_msg)): ?>
            <div style="color: red;"><?php echo $error_msg; ?></div>
        <?php endif; ?>

        <div class="input-group">
          <label>Name</label>
          <input type="text" name="name" value="" oninput="this.value = this.value.toUpperCase();" required>
        </div>
        
          <div class="input-group">
          <label>Email</label>
          <input type="email" name="email" value="" required>
        </div>

          <div class="input-group">
    <label>Mo. Num.</label>
    <input type="text" name="number" id="phone" minlength="10" maxlength="10" required>
    <span class="help-block">Please enter a 10-digit phone number.</span>
</div>

<script>
    document.getElementById("phone").addEventListener("input", function() {
        const phoneInput = this.value.replace(/\D/g, ''); // Remove non-digit characters
        if (phoneInput.length !== 10) {
            this.setCustomValidity("Please enter a 10-digit phone number.");
        } else {
            this.setCustomValidity("");
        }
    });
</script>

      </div>

        <div class="input-group">
          <label>Password</label>
          <input type="password" name="password" required />
        </div>
        
          <label >Choose Image</label>
        <input type="file"  name="image" id="image" value="image"required />
      <span class="help-block">Allow only jpg, jpeg, png, gif</span>
        <div class="invalid-feedback"></div>
        
        <div class="input-group">
          <button type="submit" class="btn" name="reg_btn" value="submit"  style="background-color: #04AA6D">Register</button>
        </div>
        <div class="input-group">
          <a href="index.php"  style="background-color: #6B6B6B ">Cancal</a>
        </div>
        
        <div>

        <?php if(!empty($msg)): ?>
        <p><?php echo $msg; ?></p>
    <?php endif; ?>

    <style>a{
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
    
    }
    </style>
        
        
        
        <!-- <p>
          Already a member? <a href="login.php">Sign in</a>
        </p> -->
      </form>

    </body>
    </html>




