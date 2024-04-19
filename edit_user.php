<?php
require('connection.php');
require('function.php');
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
    <title>Store Product</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
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
    if (isset($_GET['id'])) {
        $get_id=$_GET['id'];
        //echo $get_id;
        $sql="SELECT * FROM users WHERE user_id=$get_id";
        $query=$conn->query($sql);
        $data=mysqli_fetch_assoc($query);
        $user_id=$data['user_id'];


        $user_first_name=$data['user_first_name'];
       // echo $user_id;

        $user_last_name = $data['user_last_name'];
        $user_email = $data['user_email'];
        $user_password = $data['user_password'];
    }

    if(isset($_GET['user_first_name'])){
        $new_user_id=$_GET['user_id'];
       // echo   $new_user_id;

        $new_user_first_name=$_GET['user_first_name'];
        $new_user_last_name=$_GET['user_last_name'];
        $new_user_email=$_GET['user_email'];
        $new_user_password=$_GET['user_password'];

        $sql1="UPDATE users SET user_first_name='$new_user_first_name',user_last_name='$new_user_last_name',
        user_email='$new_user_email', user_password='$new_user_password'
        WHERE user_id=$new_user_id";
       if($conn->query($sql1)){
       echo "Data Inserted Successfully";
      }
    }
?>
   
    <form action="<?php echo $_SERVER['PHP_SELF']  ?>" method="GET">
        <label for="user_first_name">User First Name</label><br>
        <input type="text" name="user_first_name" value="<?php echo $user_first_name ?>"><br><br>


        <label for="user_last_name">User Last Name</label><br>
        <input type="text" name="user_last_name" value="<?php echo $user_last_name ?>"><br><br>

        <label for="user_email">User Email</label><br>
        <input type="text" name="user_email" value="<?php echo $user_email ?>"><br><br>

        <label for="user_password">User Password</label><br>
        <input type="text" name="user_password" value="<?php echo $user_password ?>"><br><br>

        
        <input type="number" name="user_id" value="<?php echo $user_id  ?>" hidden>

        <input type="submit" name="btn" value="Update" class="btn btn-success">
    </form>
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