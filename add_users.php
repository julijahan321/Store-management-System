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
    <title>Add User</title>
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
    if (isset($_GET['user_first_name'])) {
        $user_first_name = $_GET['user_first_name'];
        $user_last_name = $_GET['user_last_name'];
        $user_email = $_GET['user_email'];
        $user_password = $_GET['user_password'];

        $sql = "INSERT INTO users(user_first_name,user_last_name,user_email,user_password)
            VALUES('$user_first_name','$user_last_name','$user_email','$user_password')";
        if ($conn->query($sql)) {
            echo "Data Inserted Successfully";
        }
    }
    ?>
  
    <form action="<?php echo $_SERVER['PHP_SELF']  ?>" method="GET">
        <label for="user_first_name">User First Name</label><br>
        <input type="text" name="user_first_name" required><br> <br>
        <label for="user_last_name">User Last Name</label><br>
        <input type="text" name="user_last_name" required><br><br>

        <label for="email">User Email</label><br>
        <input type="email" name="user_email" required><br><br>
        <label for="password">User Password</label><br>
        <input type="password" name="user_password" required><br><br>

        <input type="submit" name="btn" value="Submit" class="btn btn-success">
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