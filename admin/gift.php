<?php
session_start();
require_once('../include/dbController.php');
$db_handle = new DBController();
date_default_timezone_set("Asia/Hong_Kong");
$fetch_pro = $db_handle->runQuery("SELECT * FROM `gifts`");


if (isset($_POST['update_pro'])) {
    $g1 = $db_handle->checkValue($_POST['g1']);
    $g2 = $db_handle->checkValue($_POST['g2']);
    $g3 = $db_handle->checkValue($_POST['g3']);
    $g4 = $db_handle->checkValue($_POST['g4']);
    $g5 = $db_handle->checkValue($_POST['g5']);
    $g6 = $db_handle->checkValue($_POST['g6']);
    $g7 = $db_handle->checkValue($_POST['g7']);
    $g8 = $db_handle->checkValue($_POST['g8']);
    $g9 = $db_handle->checkValue($_POST['g9']);

    $update = $db_handle->insertQuery("UPDATE `gifts` SET `gift1`='$g1',`gift2`='$g2',`gift3`='$g3',`gift4`='$g4',`gift5`='$g5',`gift6`='$g6',`gift7`='$g7',`gift8`='$g8',`gift9`='$g9' WHERE id = '1'");
    if ($update) {
        echo "<script>
alert('Data Updated Successfully!');
window.location.href = 'index.php';
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
                <h2>Gift Winning Probability (%)</h2>
                <form action="" method="post">
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Gift 1</label>
                        <input type="number" class="form-control" id="" aria-describedby="emailHelp" name="g1"
                               value="<?php echo $fetch_pro[0]['gift1']; ?>">
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Gift 2</label>
                        <input type="number" class="form-control" id="" aria-describedby="emailHelp" name="g2"
                               value="<?php echo $fetch_pro[0]['gift2']; ?>">
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Gift 3</label>
                        <input type="number" class="form-control" id="" aria-describedby="emailHelp" name="g3"
                               value="<?php echo $fetch_pro[0]['gift3']; ?>">
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Gift 4</label>
                        <input type="number" class="form-control" id="" aria-describedby="emailHelp" name="g4"
                               value="<?php echo $fetch_pro[0]['gift4']; ?>">
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Gift 5</label>
                        <input type="number" class="form-control" id="" aria-describedby="emailHelp" name="g5"
                               value="<?php echo $fetch_pro[0]['gift5']; ?>">
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Gift 6</label>
                        <input type="number" class="form-control" id="" aria-describedby="emailHelp" name="g6"
                               value="<?php echo $fetch_pro[0]['gift6']; ?>">
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Gift 7</label>
                        <input type="number" class="form-control" id="" aria-describedby="emailHelp" name="g7"
                               value="<?php echo $fetch_pro[0]['gift7']; ?>">
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Gift 8</label>
                        <input type="number" class="form-control" id="" aria-describedby="emailHelp" name="g8"
                               value="<?php echo $fetch_pro[0]['gift8']; ?>">
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Gift 9</label>
                        <input type="number" class="form-control" id="" aria-describedby="emailHelp" name="g9"
                               value="<?php echo $fetch_pro[0]['gift9']; ?>">
                    </div>


                    <button type="submit" name="update_pro" class="btn btn-primary">Submit</button>
                </form>
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
