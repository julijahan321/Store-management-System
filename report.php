<?php
require('connection.php');
require('function.php');

session_start();
$user_first_name = $_SESSION['user_first_name'];
$user_last_name = $_SESSION['user_last_name'];

if (!empty($user_first_name) && !empty($user_last_name)) {
    $sql3="SELECT *FROM product";
    $query3=$conn->query( $sql3);
    $datalist=array();
    while($data3=mysqli_fetch_assoc($query3)){
        $product_id=$data3['product_id'];
       // echo $product_id;
        $product_name=$data3['product_name'];
        $datalist[$product_id]=$product_name;
        
    }


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
            <label for="product_name">Select Product Name</label><br>
            <select name="product_name" id="">

                <?php
                $sql = "select * from product";
                $query = $conn->query($sql);

                while ($data = mysqli_fetch_assoc($query)) {
                    $product_id = $data['product_id'];
                    $product_name = $data['product_name'];

                ?>

                    <option value="<?php echo $product_id ?>"><?php echo $product_name ?></option>
                <?php }?>
            </select>
           
            <input type="submit" value="Generate Report">
            </form>
            <h1>Store Product</h1>

            <?Php
            if (isset($_GET['product_name'])) {
                $product_name = $_GET['product_name'];
              //  echo  $product_name;
                //echo "vghjk";
                $sql1 = "SELECT * FROM store_product WHERE store_product_name=$product_name";
                $query1 = $conn->query($sql1);
                while ($data1 = mysqli_fetch_array($query1)) {
                    $store_product_quentity = $data1['store_product_quentity'];
                    $store_product_entry_date = $data1['store_product_entry_date'];
                    $store_product_name = $data1['store_product_name'];
                    echo "$datalist[$store_product_name]";
                    echo  "<table class='table table-success table-striped table-hover'><tr><td>store data</td> <td>amount</td></tr>";
                    echo  "<tr><td>$store_product_entry_date</td><td>$store_product_quentity</td></tr>";
                    echo "</table>";
                }
            }

            ?>

            <h1>Spend Product</h1>
            <?Php
            if (isset($_GET['product_name'])) {
                $product_name = $_GET['product_name'];
              //  echo  $product_name;
                //echo "vghjk";
                $sql4 = "SELECT * FROM spend_product WHERE spend_product_name=$product_name";
                $query4 = $conn->query($sql4);
                while ($data4 = mysqli_fetch_array($query4)) {
                    $spend_product_quentity = $data4['spend_product_quentity'];
                    $spend_product_entry_date = $data4['spend_product_entry_date'];
                    $spend_product_name = $data4['spend_product_name'];
                    echo "$datalist[$spend_product_name]";
                    echo  "<table class='table table-success table-striped table-hover'><tr><td>spend data</td> <td>amount</td></tr>";
                    echo  "<tr><td>$spend_product_entry_date</td><td>$spend_product_quentity</td></tr>";
                    echo "</table>";
                }
            }

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