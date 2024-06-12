
<?php 


?>
<!DOCTYPE html>
<html lang="en">
<head> 
    <title>HOME</title>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css">
    <link rel="stylesheet" href="home.css">
</head>
<style>
    img{
        border-radius: 50%;
        margin: 8px;
        height: 60px;
        width: 60px;
        margin-left: 70px;
        margin-top: 20px;
    }
</style>

<body>
    
    <div class="container">
        <div class="navigation">
            <ul>
                <li>
                    <a href="#">
                        <!-- <span class="icon"><ion-icon name="logo-amplify"></ion-icon></span> -->
                        <img class="rounded-circle" src="media/admin1.jpg" onclick="index.php" />



                        <span class="title"><b></b></span>  
</span>

                    </a>
                </li>

                <li>
                    <a href="index.php">
                        <span class="icon"><ion-icon name="home-outline"></ion-icon></span>
                        <span class="title">Home</span>
                    </a>
                 </li>
                 <li>
                    <a href="list.php">
                        <span class="icon"><ion-icon name="list-outline"></ion-icon></span>
                        <span class="title">List</span>
                    </a>
                </li>
                <li>
                    <a href="register.php">
                        <span class="icon"><ion-icon name="add-circle-outline"></ion-icon></span>
                        <span class="title">Add New</span>
                    </a>
                </li>
                
                <li>
                    <a href="admin.php">
                        <span class="icon"><ion-icon name="person-outline"></ion-icon></span>
                        <span class="title">My Profile</span>
                    </a>
                </li>
               
                <li>
                    <a href='#logout.php'>
                        <span class="icon"><ion-icon name="log-out-outline"></ion-icon></span>
                        <span class="title">Log out</span>
                    </a>
                </li>
    
            </ul>
        </div>
    </div>


    <!-- ======================================================main -->
<div style="margin-left: 250px;">


</div>

    
<!-- 
    <script src="JS/main.js"></script> -->
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>



</body>
</html>
