    <?php session_start(); ?>
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
    require_once 'db.php';

    function display_data(){
        global $con;
        $query = "SELECT * FROM user";
        $result = mysqli_query($con,$query);
        return $result;
    }
    $result = display_data();
    ?>   

    <!DOCTYPE html>
    <html lang="en">
    <head>
        <title>User List</title>
        <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.25/css/jquery.dataTables.css">
        <script type="text/javascript" charset="utf8" src="https://code.jquery.com/jquery-3.5.1.js"></script>
        <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.js"></script>
    </head>
    <body style='background-color: #e6f0ff'>

    <div class="section" style="width: 30%; float: left;">
        <div>
            <?php include 'sidebar.php'; ?>
        </div>
        <div class="form" style="margin-left: 400px;">
            <div class="container">
                <div class="row mt-5">
                    <div class="col">
                        <div class="card mt-5">
                            <div class="class-body">
                                <table id="myTable" class="display" style="width:100%">
                                    <thead>
                                        <tr style="#">
                                            <th>Serial Num.</th> 
                                            <th>NAME</th>
                                            <th>EMAIL</th>
                                            <th>Mo. Num.</th>
                                            <th>IMAGE</th>
                                            <th>ACTION</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php 
                                        $i=1; 
                                        while ($row = mysqli_fetch_assoc($result)) {
                                            echo "<tr>";
                                            echo "<td>".$i++."</td>";   
                                            echo "<td>{$row['name']}</td>";
                                            echo "<td>{$row['email']}</td>";
                                            echo "<td>{$row['number']}</td>";
                                            echo "<td><img src='upload/{$row['image']}' style='width: 60px;height: 60px;'></td>";
                                            echo "<td><a style=' font-size: 1.5rem;' href='edit_profile.php?id={$row['id']}' ><ion-icon name='create-outline'></ion-icon></a><a style=' color: #D42323; font-size: 1.5rem;' href='delete.php?id={$row['id']}' onclick='return checkdelete()'><ion-icon name='trash-outline'></ion-icon></a></td>";
                                            echo "</tr>";
                                        }
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        $(document).ready(function() {
            $('#myTable').DataTable();
        });
    </script>

    <!-- style -->
    <style>
        .form {
            width: 200%;
            margin-top: 50px;
            border-radius: 20px;
            padding: 20px;
            background-color: #fff;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        table {
            /* background-color: #fff; */
            border-collapse: collapse;
            width: 100%;
        }

        th, td {
            padding: 8px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        th {
            background-color: #f2f2f2;
        }

        a {
            text-decoration: none;
            color: #4d79ff;
            margin-right: 10px;
        
        
        }

        a:hover {

        }

        .heder {
            display: inline-block;
        }
    </style>

    </body>
    </html>
