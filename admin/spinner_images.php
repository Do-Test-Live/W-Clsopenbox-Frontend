<?php
session_start();
require_once('../include/dbController.php');
$db_handle = new DBController();
date_default_timezone_set("Asia/Hong_Kong");

$edit = 0;
if(isset($_GET['id'])){
    $edit = $_GET['id'];
}

if(isset($_POST['edit_gift'])){
    $updated_at = date("Y-m-d H:i:s");
    $cupon = $db_handle->checkValue($_POST['coupon_code']);
    $discount_amount = $db_handle->checkValue($_POST['discount_amount']);
    $minimum_purchase = $db_handle->checkValue($_POST['minimum_purchase']);
    $image = '';
    $query = '';
    if (!empty($_FILES['gift_image']['name'])) {
        $RandomAccountNumber = mt_rand(1, 99999);
        $file_name = $RandomAccountNumber . "_" . $_FILES['gift_image']['name'];
        $file_size = $_FILES['gift_image']['size'];
        $file_tmp = $_FILES['gift_image']['tmp_name'];

        $file_type = strtolower(pathinfo($file_name, PATHINFO_EXTENSION));
        if ($file_type != "jpg" && $file_type != "png" && $file_type != "jpeg" && $file_type != "gif") {
            $image = '';
        } else {
            $data = $db_handle->runQuery("select * FROM `spinner_data` WHERE id='{$edit}'");
            unlink("../spinner/".$data[0]['image_source']);
            move_uploaded_file($file_tmp, "../spinner/" . $file_name);
            $image = $file_name;
            $query .= ",`image_source`='" . $image . "'";
        }
    }

    $data = $db_handle->insertQuery("UPDATE `spinner_data` SET `cupon_code`='$cupon',`discount_amount`='$discount_amount',`minimum_purchase`='$minimum_purchase'" . $query . " WHERE id='{$edit}'");
    if($data){
        echo "<script>
                alert('Updated Successfully!');
                window.location.href = 'spinner_images.php';
                </script>";
    }

}
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Gift</title>
    <?php require_once 'include/css.php'; ?>
</head>
<body id="page-top">

<!-- Page Wrapper -->
<div id="wrapper">

    <?php require_once 'include/sidebar.php'; ?>

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

        <!-- Main Content -->
        <div id="content">

            <?php require_once 'include/topbar.php'; ?>

            <!-- Begin Page Content -->
            <div class="container-fluid">
                <?php
                if($edit != 0) {
                    ?>
                    <h4>Edit Main Spinner Data</h4>
                    <form action="" method="post" enctype="multipart/form-data">
                        <?php
                        $gift_details = $db_handle->runQuery("select * from spinner_data where id = '$edit'");
                        ?>

                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Coupon Code</label>
                            <input type="input" class="form-control" id="" aria-describedby="emailHelp" value="<?php echo $gift_details[0]['cupon_code'];?>" name="coupon_code">
                        </div>

                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Discount Amount</label>
                            <input type="input" class="form-control" id="" aria-describedby="emailHelp" value="<?php echo $gift_details[0]['discount_amount'];?>" name="discount_amount">
                        </div>

                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Minimum Purchase</label>
                            <input type="input" class="form-control" id="" aria-describedby="emailHelp" value="<?php echo $gift_details[0]['minimum_purchase'];?>" name="minimum_purchase">
                        </div>

                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Gift Image</label>
                            <input type="file" class="form-control" id="" aria-describedby="emailHelp" name="gift_image">
                            <img src="../spinner/<?php echo $gift_details[0]['image_source'];?>" style="width: 250px;" class="mt-3">
                        </div>

                        <button type="submit" name="edit_gift" class="btn btn-primary">Submit</button>
                    </form>
                    <?php
                }
                ?>

                <h4 class="mt-5">Gift List</h4>
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Spin Angle</th>
                        <th scope="col">Coupon Code</th>
                        <th scope="col">Discount Amount</th>
                        <th scope="col">Minimum Purchase</th>
                        <th scope="col">Main Image</th>
                        <th scope="col">Edit</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    $fetch_gift = $db_handle->runQuery("SELECT * FROM `spinner_data` WHERE `spin_angle` != '0'");
                    $no_fetch_gift = $db_handle->numRows("SELECT * FROM `spinner_data` WHERE `spin_angle` != '0'");
                    for ($i=0; $i < $no_fetch_gift; $i++){
                        ?>
                        <tr>
                            <th><?php echo $i+1;?></th>
                            <td><?php echo $fetch_gift[$i]['spin_angle'];?></td>
                            <td><?php echo $fetch_gift[$i]['cupon_code'];?></td>
                            <td><?php echo $fetch_gift[$i]['discount_amount'];?></td>
                            <td><?php echo $fetch_gift[$i]['minimum_purchase'];?></td>
                            <td><a href="../spinner/<?php echo $fetch_gift[$i]['image_source'];?>" target="_blank">Image</a></td>
                            <td><a class="btn btn-primary" href="spinner_images.php?id=<?php echo $fetch_gift[$i]['id'];?>">Edit</a></td>
                        </tr>
                        <?php
                    }
                    ?>
                    </tbody>
                </table>
            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- End of Main Content -->

        <?php require_once 'include/footer.php'; ?>

    </div>
    <!-- End of Content Wrapper -->

</div>
<!-- End of Page Wrapper -->

<!-- Scroll to Top Button-->
<a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
</a>

<!-- Logout Modal-->
<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
     aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                <a class="btn btn-primary" href="logout.php">Logout</a>
            </div>
        </div>
    </div>
</div>

<?php require_once 'include/js.php'; ?>

</body>

</html>
