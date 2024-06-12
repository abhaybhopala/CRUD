<?php 
include("db.php");
session_start();



if(isset($_POST["login_btn"])){
    $email = $_POST["email"];
    $password = $_POST["password"];
    $errors = array(); 

    $user = mysqli_real_escape_string($con, $email);
    $password = mysqli_real_escape_string($con, $password);

    $query = mysqli_query($con,"select * from admin where email='$email' and password='$password' ")or die(mysqli_error($con)) ;


    $eamil=$row['email'];
    $counter = mysqli_num_rows($query);
    $id=$row['id'];


    if(isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === true) {
        header("Location: index.php");
        exit;
    }

    if($counter == 0){
        echo" <script Type='text/javascript'>alert('Invalid Email/Password'); document.location='login.php' </script>";
    }else
    {
        $_SESSION["id"] = $id;
        $_SESSION["email"] = $email;

        echo "<script type='text/javascript'>document.location='index.php'</script>";

    }

}



    



?>