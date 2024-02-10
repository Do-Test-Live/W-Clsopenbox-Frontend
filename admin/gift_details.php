<?php
session_start();
require_once('../include/dbController.php');
$db_handle = new DBController();
date_default_timezone_set("Asia/Hong_Kong");

$edit = 0;
if(isset($_GET['id'])){
    $edit = $_GET['id'];
}


if (isset($_POST['add_gift'])) {
    $gift_name = $db_handle->checkValue($_POST['gift_title']);
    $inserted_at = date("Y-m-d H:i:s");

    $image = '';
    if (!empty($_FILES['gift_image']['name'])) {
        $RandomAccountNumber = mt_rand(1, 99999);
        $file_name = $RandomAccountNumber . "_" . $_FILES['gift_image']['name'];
        $file_size = $_FILES['gift_image']['size'];
        $file_tmp = $_FILES['gift_image']['tmp_name'];

        $file_type = strtolower(pathinfo($file_name, PATHINFO_EXTENSION));
        if ($file_type != "jpg" && $file_type != "png" && $file_type != "jpeg") {
            echo "<script>
                alert('The file format is not supported!')
                window.location.href='gift_details.php';
                </script>";

        } else {
            move_uploaded_file($file_tmp, "assets/gift/" . $file_name);
            $image = "assets/gift/" . $file_name;
        }
    }

    $insert = $db_handle->insertQuery("INSERT INTO `gift_list`(`gift_title`, `gift_image`, `inserted_at`) VALUES ('$gift_name','$image','$inserted_at')");

    echo "<script>
                alert('Gift added successfully!');
                window.location.href='gift_details.php';
                </script>";
}

if(isset($_POST['edit_gift'])){
    $gift_name = $db_handle->checkValue($_POST['gift_title']);
    $updated_at = date("Y-m-d H:i:s");
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
            $data = $db_handle->runQuery("select * FROM `gift_list` WHERE id='{$edit}'");
            unlink($data[0]['gift_image']);
            move_uploaded_file($file_tmp, "assets/gift/" . $file_name);
            $image = "assets/gift/" . $file_name;
            $query .= ",`gift_image`='" . $image . "'";
        }
    }

    $data = $db_handle->insertQuery("UPDATE `gift_list` SET `gift_title`='$gift_name',`updated_at`='$updated_at'" . $query . " WHERE id='{$edit}'");
    echo "<script>
                alert('Updated Successfully!');
                window.location.href='gift_details.php';
                </script>";
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
                if($edit == 0){
                    ?>
                    <h4>Add Gift</h4>
                    <form action="" method="post" enctype="multipart/form-data">
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Gift Title</label>
                            <input type="text" class="form-control" id="" aria-describedby="emailHelp" name="gift_title">
                        </div>

                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Gift Image</label>
                            <input type="file" class="form-control" id="" aria-describedby="emailHelp" name="gift_image">
                        </div>

                        <button type="submit" name="add_gift" class="btn btn-primary">Submit</button>
                    </form>
                    <?php
                } else {
                    ?>
                    <h4>Edit Gift</h4>
                    <form action="" method="post" enctype="multipart/form-data">
                        <?php
                        $gift_details = $db_handle->runQuery("select * from gift_list where id = '$edit'");
                        ?>
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Gift Title</label>
                            <input type="text" class="form-control" id="" aria-describedby="emailHelp" name="gift_title" value="<?php echo $gift_details[0]['gift_title'];?>">
                        </div>

                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Gift Image</label>
                            <input type="file" class="form-control" id="" aria-describedby="emailHelp" name="gift_image">
                            <img src="<?php echo $gift_details[0]['gift_image'];?>" style="width: 250px;" class="mt-3">
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
                        <th scope="col">Gift Name</th>
                        <th scope="col">Gift Image</th>
                        <th scope="col">Edit</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    $fetch_gift = $db_handle->runQuery("select * from gift_list");
                    $no_fetch_gift = $db_handle->numRows("select * from gift_list");
                    for ($i=0; $i < $no_fetch_gift; $i++){
                        ?>
                        <tr>
                            <th><?php echo $i+1;?></th>
                            <td><?php echo $fetch_gift[$i]['gift_title'];?></td>
                            <td><a href="<?php echo $fetch_gift[$i]['gift_image'];?>" target="_blank">Image</a></td>
                            <td><a class="btn btn-primary" href="gift_details.php?id=<?php echo $fetch_gift[$i]['id'];?>">Edit</a></td>
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
