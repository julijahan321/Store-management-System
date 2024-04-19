<?php
    require('connection.php');
    session_start();
$user_first_name = $_SESSION['user_first_name'];
$user_last_name = $_SESSION['user_last_name'];

if (!empty($user_first_name) && !empty($user_last_name)) {
    ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>List Of Users</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

</head> 
<body>
<div class="container bg-light">
            <div class="container_foulid border-bottom border-success"><!--top bar -->
                <?php include('topbar.php') ?>
            </div><!--end top bar-->


            <div class="container_foulid">
                <div class="row"><!--start row  -->
                    <div class="col-sm-3 bg-light p-0 m-0"><!--start left -->
                        <?php include('leftbar.php') ?>

                    </div><!--end of left -->
                    <div class="col-sm-9 border-start border-success"><!--start right -->
                    <div class="container p-4 m-4">

                    <?php
     $sql= "SELECT * FROM  users";
     $query=$conn->query($sql);
     echo "<table class='table table-success table-striped table-hover'><tr><th>user first name</th><th>user last name</th><th>user email</><th>Action</th></tr>";

     while($data=mysqli_fetch_assoc($query)){
        $user_id=$data['user_id'];

        $user_first_name=$data['user_first_name'];
        $user_last_name=$data['user_last_name'];
        $user_email=$data['user_email'];

        echo "<tr>
                <td>$user_first_name</td>
                <td>$user_last_name</td>
                <td>$user_email</td>
                <td><a href='edit_user.php?id=$user_id'>Edit</a></td>        
            </tr>";
     };
     echo "</table>";
    ?> 
   
                        </div><!-- end container-->
                    </div> <!-- end right-->
                </div><!--end row   -->
            </div>
            <div class="container_foulid border-top border-success"><!-- bottom bar -->
                <?php include('bottombar.php') ?>
            </div>

        </div><!-- end of container -->



    
</body>
</html>
<?php
} else {
    header('location:login.php');
}
?>