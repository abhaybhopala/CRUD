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


<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>HOME PAGE</title>

    <style>
    
    .section{
        width: 20%;
        float: left;
    }

    .card {
        width: 20%;
        float:left;
        border: .8px solid ;
        border-radius: 18px;
        padding: 20px;
        box-shadow: 05 4px 8px rgba(0, 0, 0, 0.1);
        background-color: #fff;
        margin: 20px;
        margin-top: 50px;
    }
    .card h2 {
        font-size: 24px;
        margin-bottom: 10px;
        text-align: center;

    }
    .card p {
        font-size: 16px;
        line-height: 1.6;
    }
    .card .btn {
        background-color: #2a2185;
        color: #fff;
        padding: 10px 80px;
        border: none;
        border-radius: 5px;
        cursor: pointer;
        font-size: 16px;
        text-align: center;
        
        text-decoration: none;
        display: inline-block;
        margin-top: 10px;
    }
    .card .btn:hover {
        background-color: #0056b3;
    }

    </style>

</head>
<body style='background-color: #e6f0ff'>


   <div class="section">
        <div <?php include 'sidebar.php'; ?>>
            
        </div>
   </div>
   <div class="card" style="background-color:  #F2A100">
                <h2>Users List</h2>
                <!-- <p>If you Want to update your data Please</p> -->
                <a href="list.php" class="btn">Click here</a>
            </div>
            <div class="card" style="background-color:  #00cc66">
                <h2>Insert User</h2>
                <!-- <p>If you Want to Insert new user Please </p> -->
                <a href="register.php" class="btn">Click here</a>
            </div>

            <div class="card" style="background-color:  #dfff80">
                <h2>Edit Data</h2>
                <!-- <p>If you Want to update your data Please</p> -->
                <a href="list.php" class="btn">Click here</a>
            </div>
            
            

</body>
</html>
