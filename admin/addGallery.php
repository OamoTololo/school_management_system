<?php
ob_start();
session_start();

//When variable session is not found
if (!isset($_SESSION['username'])) {
    //redirect user to login page
    header('Location: index.php');
}

require_once ('includes/top.php');
require_once ('includes/db.php');

if ($_GET['id']) {
    $edit_id = $_GET['id'];

    $gallery = "SELECT * FROM tblGallery WHERE gallery_id = '$edit_id'";
    $runGallery = mysqli_query($connection, $gallery);
    $galleryRow = mysqli_fetch_array($runGallery);

    $galleryId = $galleryRow['gallery_id'];
    $galleryTitle = $galleryRow['gallery_title'];
    $galleryImage = $galleryRow['gallery_image'];
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
                    <h2 class="text-center text-white bg-primary mt-2">Add image to Gallery</h2><hr>

                    <form action="" method="post" enctype="multipart/form-data">
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label text-danger" for="title">Image Title:</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" placeholder="Enter Image Title"
                                       name="add_title" id="title" required>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label text-danger" for="image">Image:</label>
                            <div class="col-sm-10">
                                <input type="file" class="form-control-file btn btn-danger" placeholder="Enter Image"
                                       name="add_image" id="image" required>
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="offset-sm-2 col-sm-10">
                                <button class="btn btn-outline-primary btn-block" name="submit"
                                        type="submit" value="upload">Add Image</button>
                            </div>
                        </div>
                    </form>
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

<?php
   if (isset($_POST['submit']) && isset($_FILES['add_image'])) {

       $imageTitle = $_POST['add_title'];
       $imageName = $_FILES['add_image']['name'];
       $imageSize = $_FILES['add_image']['size'];
       $tmp_name = $_FILES['add_image']['tmp_name'];
       $error = $_FILES['add_image']['error'];

       if ($error === 0) {
           if ($imageSize > 12500000) {
               echo "<script> alert('Image is too large to be added!!!')</script>";
               echo "<script> window.open('gallery.php', '_self')</script>";
           } else {
               $image_extension = pathinfo($imageName, PATHINFO_EXTENSION);
               $image_extension_lowercase = strtolower($image_extension);

               $allowed_extensions = array("jpg", "jpeg", "png");

               if (in_array($image_extension_lowercase, $allowed_extensions)) {
                   $new_image_name = uniqid("IMG-", true) . '.' . $image_extension_lowercase;
                   $image_upload_path = '../images/gallery/' . $new_image_name;
                   move_uploaded_file($tmp_name, $image_upload_path);

                   $add_image = "INSERT INTO tblGallery (gallery_title, gallery_image) VALUES ('$imageTitle ', '$new_image_name')";
                   $insertPro = mysqli_query($connection, $add_image);

                   if ($insertPro) {
                        echo "<script> alert('Image added to gallery!')</script>";
                        echo "<script> window.open('gallery.php', '_self')</script>";
                    }else {
                       echo "<script> alert('Image not added to gallery! Contact Admin.', '_self')</script>";
                   }

               }else {
                   echo "<script> alert('Unrecognized extension!')</script>";
                   echo "<script> window.open('gallery.php', '_self')</script>";
               }

           }
       } else {
           echo "<script> alert('Image is unable to be loaded.')</script>";
           echo "<script> window.open('gallery.php', '_self')</script>";
       }

   }
?>