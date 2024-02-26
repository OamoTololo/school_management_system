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

    $deleteGalleryImage = "DELETE FROM tblGallery WHERE gallery_id = '$deleteId'";
    $runDeleteScript = mysqli_query($connection, $deleteGalleryImage);

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

    <div class="row mt-2">
        <div class="col md-9">
            <small class="text-center text-primary">
                <h3>Some of Our Successful Students.....</h3>
            </small><hr>

            <table class="table table-bordered">
                <thead class="thead-dark">
                    <tr>
                        <th>ID</th>
                        <th>Student Name</th>
                        <th>Student Surname</th>
                        <th>Class</th>
                        <th>Batch</th>
                        <th>Image</th>
                    </tr>
                </thead>
                <tbody>
                <tr>
                    <th>1</th>
                    <th>Oamogetswe</th>
                    <th>Mgidi</th>
                    <th>10</th>
                    <th>10/CBSE/ENG</th>
                    <th><img src="images/Amo.jpg" class="img-fluid" width="190px;"></th>
                </tr>

                <tr>
                    <th>2</th>
                    <th>Tiisetso</th>
                    <th>Kutumela</th>
                    <th>10</th>
                    <th>10/CBSE/ENG</th>
                    <th><img src="images/slider01.jpg" class="img-fluid" width="100px;"></th>
                </tr>
                <tr>
                    <th>3</th>
                    <th>Lethabo</th>
                    <th>Makaneta</th>
                    <th>10</th>
                    <th>10/CBSE/ENG</th>
                    <th><img src="images/slider01.jpg" class="img-fluid" width="100px;"></th>
                </tr>
                </tbody>
            </table>

        </div>
    </div>

    <div class="container-fluid">
        <div class="row bg-dark mt-2 mb-0">
            <?php include ('includes/footer.php');?>
        </div>
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