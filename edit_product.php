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
    <title>Add Product</title>
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
        if(isset($_GET['id'])){
            $get_id=$_GET['id'];
            $sql="SELECT * FROM product WHERE product_id=$get_id";
            $query=$conn->query($sql);
            $data=mysqli_fetch_assoc($query);
            $product_id=$data['product_id'];
            $product_name=$data['product_name'];
            $product_category=$data['product_category'];
            $product_code=$data['product_code'];
            $product_entry_date=$data['product_entry_date'];
  
           // echo $product_entry_date;
          }
          if(isset($_GET['product_name'])){
           $new_product_name=$_GET['product_name'];
           $new_product_category=$_GET['product_category'];
           $new_product_code=$_GET['product_code'];
           $new_product_entry_date=$_GET['product_entry_date'];
           $new_product_id=$_GET['product_id'];
           $sql1="UPDATE product SET product_name='$new_product_name',product_category='$new_product_category',
           product_code='$new_product_code',product_entry_date='$new_product_entry_date'
           WHERE product_id=$new_product_id";
          if($conn->query($sql1)){
          echo "Data Inserted Successfully";
         }

  
          }
    ?>
    <?php $sql="SELECT * FROM catagory";
          $query=$conn->query($sql);
    ?>
    <form action="<?php echo $_SERVER['PHP_SELF']  ?>" method="GET">
        <label for="product">Product</label><br>
        <input type="text" name="product_name" value="<?php echo $product_name ?>"><br>

        <label for="product category">Product Category</label><br>
        <select name="product_category" id="">
        <?php
                while($data=mysqli_fetch_assoc($query)){
                $category_id=$data['catagory_id'];
                $category_name=$data['catagory_name'];
                ?>
                <option  value='<?php echo $category_id?>' <?php if ($category_id==$product_category) {echo "selected";}?>>
                    <?php echo  $category_name?>
                </option>";

                <?php }?>
             
        </select><br>

        <label for="productcode">Product Code</label><br>
        <input type="text" name="product_code" value="<?php echo $product_code ?>"><br><br>

        <label for="date">Product Entry Date</label><br>
        <input type="date" name="product_entry_date" value="<?php echo $product_entry_date ?>"><br><br>
        <input type="number" name="product_id" value="<?php echo $product_id  ?>" hidden>

        
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