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
      //  echo $get_id;
        $sql="SELECT * FROM store_product WHERE store_product_id=$get_id";
        $query=$conn->query($sql);
        $data=mysqli_fetch_assoc($query);
        $store_product_id=$data['store_product_id'];
        $store_product_name = $data['store_product_name'];
        $store_product_quentity = $data['store_product_quentity'];
        $store_product_entry_date = $data['store_product_entry_date'];
    }
    if(isset($_GET['store_product_name'])){
        $new_product_name=$_GET['store_product_name'];
        $new_store_product_quentity=$_GET['store_product_quentity'];
        $new_store_product_entry_date=$_GET['store_product_entry_date'];
        echo  $new_store_product_entry_date;
        $new_store_product_id=$_GET['store_product_id'];
        $sql1="UPDATE store_product SET store_product_name='$new_product_name',store_product_quentity='$new_store_product_quentity',
        store_product_entry_date='$new_store_product_entry_date'
        WHERE store_product_id=$new_store_product_id";
       if($conn->query($sql1)){
       echo "Data Inserted Successfully";
      }
    }

?>
   
    <form action="<?php echo $_SERVER['PHP_SELF']  ?>" method="GET">


        <label for="product">Product</label><br>
        <select name="store_product_name" id="">
            <?php
            $sql = "SELECT * FROM product";
            $query = $conn->query($sql);
        
            while ($data = mysqli_fetch_assoc($query)) {
                $data_id = $data['product_id'];
                $data_name = $data['product_name'];
                ?>
                echo "<option  value='<?php echo $data_id?>'<?php if($store_product_name==$data_id) {echo "selected";}?>>
                <?php echo $data_name ?>

                    </option>";
           
            <?php  } ?>
        </select><br><br>

        <label for="productcode">Product Quentity</label><br>
        <input type="text" name="store_product_quentity" value="<?php echo $store_product_quentity ?>"><br><br>

        <label for="date">Store Entry Date</label><br>
        <input type="date" name="store_product_entry_date" value="<?php echo $store_product_entry_date ?>"><br><br>
        <input type="number" name="store_product_id" value="<?php echo $store_product_id  ?>" hidden><br>

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