<?php
session_start();
include('../include/dbController.php');
$db_handle = new DBController();

if (isset($_POST['update'])) {
    $product_id=$_POST['product_id'];
    $name=$_POST['name'];
    $description=$_POST['description'];
    $price=$_POST['price'];
    $discount_price=$_POST['discount_price'];
    $shelf_no=$_POST['shelf_no'];



    $updated_at = date('Y-m-d h:i:s');

    $image='';

    $add_image='';
    if (!empty($_FILES['image']['name'])){
        $RandomAccountNumber = mt_rand(1, 99999);
        $file_name = $RandomAccountNumber."_" . $_FILES['image']['name'];
        $file_size = $_FILES['image']['size'];
        $file_tmp = $_FILES['image']['tmp_name'];

        $file_type = strtolower(pathinfo($file_name, PATHINFO_EXTENSION));
        if (
            $file_type != "jpg" && $file_type != "png" && $file_type != "jpeg"
            && $file_type != "gif"
        ) {
            $attach_files = '';
        } else {
            $prev_image="../".$_POST['prev_image'];
            unlink($prev_image);

            move_uploaded_file($file_tmp, "../assets/images/product/" .$file_name);
            $image = "assets/images/product/" . $file_name;
            $add_image=",image='".$image."'";

        }
    }

    $insert = $db_handle->insertQuery("UPDATE `product` SET `name`='$name',`description`='$description',`price`='$price',`discount_price`='$discount_price',`product_shelf`='$shelf_no',`updated_at`='$updated_at'".$add_image." WHERE id='$product_id'");

    if($insert){
        echo "<script>
                alert('Product updated.');
                window.location.href='product.php';
                </script>";
    }else{
        echo "<script>
                alert('Something went wrong.');
                window.location.href='product.php';
                </script>";
    }
}

if (isset($_GET['delete_product_id'])) {
    $product_id=$_GET['delete_product_id'];
    $image="../".$_GET['image'];

    unlink($image);

    $delete = $db_handle->insertQuery("DELETE FROM `product` WHERE id='$product_id'");

    echo "<script>
                alert('Product Delete.');
                window.location.href='product.php';
                </script>";

}
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Product - CLSOPENBOX</title>

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

                <!-- Page Heading -->
                <h1 class="h3 mb-2 text-gray-800">Product Data</h1>

                <!-- DataTales Example -->
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Product Data</h6>
                    </div>

                    <?php
                    if (isset($_GET['product_id'])) {
                        $data = $db_handle->runQuery("SELECT * FROM product where id={$_GET['product_id']}");
                        ?>
                        <div class="card shadow mb-4">
                            <div class="card-header py-3">
                                <h6 class="m-0 font-weight-bold text-primary">Edit Product</h6>
                            </div>
                            <div class="card-body">
                                <form method="post" action="" enctype="multipart/form-data">
                                    <input type="hidden" value="<?php echo $data[0]["id"]; ?>" name="product_id" required>
                                    <input type="hidden" value="<?php echo $data[0]["image"]; ?>" name="prev_image" required>
                                    <div class="mb-3">
                                        <label class="form-label">Product Name</label>
                                        <input type="text" class="form-control" name="name"
                                               value="<?php echo $data[0]["name"]; ?>" placeholder="" required>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Description</label>
                                        <textarea class="form-control" rows="3" name="description"
                                                  required><?php echo $data[0]["description"]; ?></textarea>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Image</label>
                                        <input class="form-control" type="file" accept="image/png, image/jpeg"
                                               name="image">
                                    </div>
                                    <div class="mb-3">
                                        <img src="../<?php echo $data[0]["image"]; ?>" class="img-fluid" alt=""/>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Price</label>
                                        <input type="text" class="form-control" placeholder="" name="price"
                                               value="<?php echo $data[0]["price"]; ?>" required>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Discount Price</label>
                                        <input type="text" class="form-control" placeholder="" name="discount_price"
                                               value="<?php echo $data[0]["discount_price"]; ?>" required>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Product Shelf No</label>
                                        <input type="text" class="form-control" placeholder="" name="shelf_no"
                                               value="<?php echo $data[0]["product_shelf"]; ?>" required>
                                    </div>
                                    <div class="mb-3">
                                        <button type="submit" class="btn btn-primary btn-lg" name="update">Submit
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <?php
                    } else {
                        ?>
                        <div class="card-body">
                            <div class="text-center mb-4">
                                <a href="add_product.php" class="btn btn-primary">Add Product</a>
                            </div>
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                    <tr>
                                        <th>SL</th>
                                        <th>Name</th>
                                        <th>Description</th>
                                        <th>Image</th>
                                        <th>Price</th>
                                        <th>Discount Price</th>
                                        <th>Product Shelf</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tfoot>
                                    <tr>
                                        <th>SL</th>
                                        <th>Name</th>
                                        <th>Description</th>
                                        <th>Image</th>
                                        <th>Price</th>
                                        <th>Discount Price</th>
                                        <th>Product Shelf</th>
                                        <th>Action</th>
                                    </tr>
                                    </tfoot>
                                    <tbody>
                                    <?php
                                    $data = $db_handle->runQuery("SELECT * FROM product order by id desc");
                                    $row_count = $db_handle->numRows("SELECT * FROM product order by id desc");
                                    for ($i = 0; $i < $row_count; $i++) {
                                        ?>
                                        <tr>
                                            <td><?php echo $i + 1; ?></td>
                                            <td><?php echo $data[$i]["name"]; ?></td>
                                            <td><?php echo $data[$i]["description"]; ?></td>
                                            <td><a href="../<?php echo $data[$i]["image"]; ?>" target="_blank">image</a>
                                            </td>
                                            <td><?php echo $data[$i]["price"]; ?></td>
                                            <td><?php echo $data[$i]["discount_price"]; ?></td>
                                            <td><?php echo $data[$i]["product_shelf"]; ?></td>
                                            <td>
                                                <a href="product.php?product_id=<?php echo $data[$i]["id"]; ?>"
                                                   class="btn btn-primary">Edit</a>
                                                <a href="product.php?delete_product_id=<?php echo $data[$i]["id"]; ?>&image=<?php echo $data[$i]["image"]; ?>"
                                                   class="btn btn-danger">Delete</a>
                                            </td>
                                        </tr>
                                    <?php } ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <?php
                    }
                    ?>
                </div>

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
