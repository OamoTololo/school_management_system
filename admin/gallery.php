<?php
ob_start();
session_start();

//When variable session is not found
if (!isset($_SESSION['username'])) {
    //redirect user to login page
    header('Location: login.php');
}

require_once ('includes/top.php');
require_once ('includes/db.php');

if(isset($_GET['del'])) {
    $deleteId = $_GET['del'];

    $deleteQuery = "DELETE FROM tblGallery WHERE gallery_id = '$deleteId'";
    $runDeleteScript = mysqli_query($connection, $deleteQuery);

    if($runDeleteScript) {
        echo "<script> alert('Image deleted successfully')</script>";
        echo "<script> window.open('gallery.php', '_self')</script>";
    }
}
?>

<div class="container-fluid">

    <div class="row mt-2">
        <div class="col-lg-12 mt-2">
            <?php include('includes/navbar.php'); ?>
        </div>
    </div>

    <div class="row mt-1">
        <div class="col-md-3 mt-2">
            <?php include('includes/sidebar.php'); ?>
        </div>

        <div class="col-md-9">
            <div class="row">
                <div class="col-md-12">
                    <h2 class="text-center text-white bg-primary mt-2">Gallery Images</h2>
                    <div align="right">
                        <a href="addGallery.php" class="btn btn-outline-primary mb-1">Add Image</a><hr>
                    </div>
                    <table class="table table-border" id="tableToExcel">
                        <thead class="thead-dark">
                            <tr>
                                <th>ID</th>
                                <th>Title</th>
                                <th>Image</th>
                                <th>
                                    <a href="editGallery.php"><i class="fa fa-pencil-square"></i></a>
                                </th>
                                <th>
                                    <i class="fa fa-trash"></i>
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                $gallery = "SELECT * FROM tblGallery ORDER BY gallery_id DESC";
                                $runGallery = mysqli_query($connection, $gallery);
                                $i = 0;

                                while($rowGallery = mysqli_fetch_array($runGallery)) {
                                    $gallery_id = $rowGallery['gallery_id'];
                                    $gallery_title = $rowGallery['gallery_title'];
                                    $gallery_image = $rowGallery['gallery_image'];
                                    $i++;

                            ?>
                            <tr>
                                <td><?php echo $i; ?></td>
                                <td><?php echo ucfirst($gallery_title); ?></td>
                                <td>
                                    <img class="img-fluid" src="../images/gallery/<?php echo $gallery_image;  ?>"
                                        width="100px;" alt="Gallery Images" />
                                </td>
                                <td>
                                    <a class="btn btn-warning" href="editGallery.php?id=<?php echo $gallery_id; ?>">
                                        <i class="fa fa-pencil-square"></i>
                                    </a>
                                </td>
                                <td>
                                    <a class="btn btn-danger" href="gallery.php?del=<?php echo $gallery_id; ?>">
                                        <i class="fa fa-trash"></i>
                                    </a>
                                </td>
                            </tr>
                        <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid">
        <div class="row bg-dark mt-2 mb-0">
            <?php include ('includes/footer.php');?>
        </div>
    </div>

</div>

</body>
</html>

<script>
    $(document).ready(function () {
        $('.#tableToExcel').dataTable();
    });
</script>

<script>
    $("#btn").click(function () {
        $("#tableToExcel").table2excel({
            name: "Worksheet name",
            fileName: "gallery.xls"
        });
    });
</script>