<?php
    include("db.php");

    if(isset($_GET['id'])) {
        $id = $_GET['id'];
        
        // Check if the user confirmed the delete action
        if(isset($_GET['confirm']) && $_GET['confirm'] == 'yes') {
            $sql = "DELETE FROM `user` WHERE id=$id";
            $result = mysqli_query($con, $sql);

            if($result) {
                echo "Delete Successfully";
                header('location:list.php');
                exit; // Ensure no further execution of this script after redirect
            } else {
                die(mysqli_error($con));
            }
        } else {
            // If confirmation is not yet confirmed, prompt the user
            echo '<script>
                    if(confirm("Are you sure?")) {
                        window.location.href = "delete.php?id=' . $id . '&confirm=yes";
                    } else {
                        window.location.href = "list.php"; // Redirect back to list if cancelled
                    }
                 </script>';
            exit; // Ensure no further execution of this script after confirmation prompt
        }
    }

    
?>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js">
    
</script>

