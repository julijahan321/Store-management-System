<?php

require('connection.php');

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Log In</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

</head>

<body>
    <?php
        if (isset($_POST['user_email'])) {
          
            $user_email = $_POST['user_email'];
            $user_password = $_POST['user_password'];    
            $sql = "SELECT * FROM users WHERE user_email='$user_email' AND user_password='$user_password' ";
            $query=$conn->query($sql);

            if (mysqli_num_rows($query) > 0) {
                $data=mysqli_fetch_array($query);
                $user_first_name=$data['user_first_name'];
                $user_last_name=$data['user_last_name'];
               // echo $user_first_name.'sdfgh';
              session_start();

               $_SESSION['user_first_name']=$user_first_name;
                 $_SESSION['user_last_name']=$user_last_name;
                header('location:index.php');
            }else{
                //echo $user_password;

                $xx= "not ok";
            }
        }
    ?>
    <div style="background-color: tomato;">
    <div class="d-flex justify-content-center align-items-center" style="height: 100vh ";>
    <form  action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">

    <h1>Store Management System</h1>
    <h5><?php if(isset($xx)){echo "please Enter Absolute Account";} ?></h5>

        <label for="email">User Email</label><br>
        <input type="email" name="user_email" required><br><br>
        <label for="password">User Password</label><br>
        <input type="password" name="user_password" required><br><br>

        <input type="submit" name="btn" value="Submit" class="btn btn-success" >
    </form>
    </div>
    </div>

</body>

</html>