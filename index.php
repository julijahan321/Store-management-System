<?php
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
    <title>index</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  </head>

  <body>
    <div class="container bg-light">
      <div class="container_foulid border-bottom border-success"><!--top bar -->
        <?php include('topbar.php')?>
      </div><!--end top bar-->


      <div class="container_foulid">
        <div class="row"><!--start row  -->
          <div class="col-sm-3 bg-light p-0 m-0"><!--start left -->
          <?php include('leftbar.php')?>

          </div><!--end of left -->
          <div class="col-sm-9 border-start border-success"><!--start right -->
            <div class="row p-4">
              <div class="col-sm-3">
                <a href="add_category.php"><i class="fa-solid fa-folder-plus fa-5x text-success"></i></a>
                <p>Add Category</p>
              </div>
              <div class="col-sm-3">
                <a href="list_of_category.php"><i class="fa-solid fa-folder-open fa-5x text-success"></i></a>
                <p>Category List</p>
              </div>
              <div class="col-sm-3">
                <a href="add_product.php"><i class="fas fa-box-open fa-5x text-success"></i></a>
                <p>Add Product</p>
              </div>
              <div class="col-sm-3">
                <a href="list_of_product.php"><i class="fas fa-stream fa-5x text-success"></i></a>
                <p>Product List</p>
              </div>
            </div>
            <hr>


            <div class="row p-4">
              <div class="col-sm-3">
                <a href="add_store_product.php"><i class="fas fa-trash-restore fa-5x text-success"></i></a>
                <p>Store Product</p>
              </div>
              <div class="col-sm-3">
                <a href="list_of_store_product.php"><i class="fas fa-box fa-5x text-success"></i></a>
                <p>Store Product List</p>
              </div>
              <div class="col-sm-3">
                <a href="add_spend_product.php"><i class="fas fa-plus-circle fa-5x text-success"></i></a>
                <p>Spend Product</p>
              </div>
              <div class="col-sm-3">
                <a href="list_of_spend_product.php"><i class="fas fa-window-restore fa-5x text-success"></i></a>
                <p>Spend Product List</p>
              </div>
            </div>

            <hr>
            <div class="row p-4">
              <div class="col-sm-3">
                <a href="report.php"><i class="fas fa-chart-bar fa-5x text-success"></i></a>
                <p>Report Product</p>
              </div>
              <div class="col-sm-3">

              </div>
              <div class="col-sm-3">

              </div>
              <div class="col-sm-3">

              </div>
            </div>

            <hr>
            <div class="row p-4">
              <div class="col-sm-3">
                <a href="add_users.php"><i class="fas fa-user-plus fa-5x text-success"></i></a>
                <p>Add User</p>
              </div>
              <div class="col-sm-3">
                <a href="list_of_users.php"><i class="fas fa-users fa-5x text-success"></i></a>
                <p>User List</p>
              </div>
              <div class="col-sm-3">

              </div>
              <div class="col-sm-3">

              </div>
            </div>


          </div><!--end of right -->
        </div><!--end row   -->
      </div>
      <div class="container_foulid border-top border-success"><!-- bottom bar -->
      <?php include('bottombar.php')?>
      </div>

    </div><!-- end of container -->
  </body>

  </html>
<?php
} else {
  header('location:login.php'); 
}
?>