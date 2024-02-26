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
                        <h2 class="text-center text-white bg-primary mt-2">Add Student</h2><hr>

                        <form action="" method="post" enctype="multipart/form-data">
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label text-danger" for="name">Name</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" placeholder="Enter Name"
                                           name="name" id="name" required>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label text-danger" for="surname">Surname</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" placeholder="Enter Surname"
                                           name="surname" id="surname" required>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label text-danger" for="address">Address</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" placeholder="Enter Address"
                                           name="address" id="address" required>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label text-danger" for="class">Class</label>
                                <div class="col-sm-10">
                                    <select name="class" class="form-control" id="class" required>
                                        <option value="1">Class 1</option>
                                        <option value="2">Class 2</option>
                                        <option value="3">Class 3</option>
                                        <option value="4">Class 4</option>
                                        <option value="5">Class 5</option>
                                        <option value="6">Class 6</option>
                                        <option value="7">Class 7</option>
                                        <option value="8">Class 8</option>
                                        <option value="9">Class 9</option>
                                        <option value="10">Class 10</option>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label text-danger" for="course">Course</label>
                                <div class="col-sm-10">
                                    <select name="courses" class="form-control" id="course" required>
                                        <?php
                                            $getCourses = "SELECT * FROM tblCourses";
                                            $courseQuery = mysqli_query($connection, $getCourses);

                                            while ($rowsCourse = mysqli_fetch_array($courseQuery)) {
                                                $courseId = $rowsCourse['course_id'];
                                                $courseName = $rowsCourse['course_name'];
                                        ?>
                                        <option value="<?php echo $courseId; ?>"><?php echo $courseName; ?></option>

                                        <?php } ?>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label text-danger" for="medium">Medium</label>
                                <div class="col-sm-10">
                                    <select name="medium" class="form-control" id="medium" required>
                                        <option value="marathi">MARATHI</option>
                                        <option value="semi">SEMI</option>
                                        <option value="cbse">CBSE</option>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label text-danger" for="gender">Gender</label>
                                <div class="col-sm-10">
                                    <select name="gender" class="form-control" id="gender" required>
                                        <option value="female">Female</option>
                                        <option value="male">Male</option>
                                        <option value="other">Other</option>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label text-danger" for="phone_number">Phone Number</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" placeholder="Enter Phone Number"
                                           name="phoneNo" id="phone_number" required>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label text-danger" for="email">Email</label>
                                <div class="col-sm-10">
                                    <input type="email" class="form-control" placeholder="Enter Email"
                                           name="email" id="email" required>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label text-danger" for="school">School</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" placeholder="Enter Email"
                                           name="school" id="school" required>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label text-danger" for="fees">Fees</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" placeholder="Enter Fees"
                                           name="fees" id="fees" required>
                                </div>
                            </div>


                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label text-danger" for="password">Password</label>
                                <div class="col-sm-10">
                                    <input type="password" class="form-control" placeholder="Enter Password"
                                           name="password" id="password" required>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label text-danger">Subject</label>
                                <div class="col-sm-10">
                                    <?php
                                        $subject = "SELECT * FROM tblSubject";
                                        $runSubjectQuery = mysqli_query($connection, $subject);

                                        while ($rowsSubject = mysqli_fetch_array($runSubjectQuery)) {
                                            $subjectId = $rowsSubject['subject_id'];
                                            $subjectName = $rowsSubject['subject_name'];
                                    ?>
                                    <div class="form-check form-check-inline">
                                        <label for="" class="form-check-label">
                                            <input class="form-check-input" type="checkbox" name="sub[]"
                                            value="<?php echo $subjectName; ?>"/> <?php echo $subjectName; ?>
                                        </label>
                                    </div>
                                    <?php } ?>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label text-danger" for="exam_mark">Competitive Exam</label>
                                <div class="col-sm-10">
                                    <?php
                                    $subject = "SELECT * FROM tblCompetitive";
                                    $runSubjectQuery = mysqli_query($connection, $subject);

                                    while ($rowsSubject = mysqli_fetch_array($runSubjectQuery)) {
                                        $competitive_id = $rowsSubject['competitive_id'];
                                        $examName = $rowsSubject['exam_name'];
                                        ?>
                                        <div class="form-check form-check-inline">
                                            <label for="" class="form-check-label">
                                                <input class="form-check-input" type="checkbox" name="com[]"
                                                       value="<?php echo $examName; ?>" id="exam_mark"/>
                                                <?php echo $examName; ?>
                                            </label>
                                        </div>
                                    <?php } ?>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label text-danger" for="dob">Date of Birth</label>
                                <div class="col-sm-10">
                                    <input type="date" class="form-control" name="dob" id="dob" required>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label text-danger" for="image">Image</label>
                                <div class="col-sm-10">
                                    <input type="file" class="form-control-file btn btn-danger" placeholder="Enter Image"
                                           name="image" id="image" required>
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="offset-sm-2 col-sm-10">
                                    <button class="btn btn-outline-primary btn-block" name="submit"
                                            type="submit">Add Student</button>
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
if (isset($_POST['submit'])) {

    $studentName = $_POST['name'];
    $studentSurname = $_POST['surname'];
    $studentAddress = $_POST['address'];
    $studentClass = $_POST['class'];
    $studentBatch = $_POST['course'];
    $studentMedium = $_POST['medium'];
    $studentGender = $_POST['gender'];
    $studentMobile = $_POST['phone_number'];
    $studentEmail = $_POST['email'];
    $studentSchool = $_POST['school'];
    $studentFee = $_POST['fees'];
    $studentPassword = $_POST['password'];
    $dob = $_POST['dob'];
    $studentPassword = $_POST['student_password'];

    $imageName = $_FILES['add_image']['name'];
    $imageSize = $_FILES['add_image']['size'];
    $tmp_name = $_FILES['add_image']['tmp_name'];
    $error = $_FILES['add_image']['error'];

    $sub = $_POST['sub'];
    $checkSub = "";

    foreach ($sub as $subject) {
        $checkSub .= $subject . ",";
    }

    $com = $_POST['com'];
    $checkCom = "";

    foreach ($com as $competitive) {
        $checkCom .= $competitive . ",";
    }

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

                $add_student =
                    "INSERT INTO tblStudent (
                        name, surname, address, class, batch, medium, gender, mobile, email, school,  fee, password, subject, c_exam, dob, image, date
                        )
                    VALUES (
                            '$studentName', '$studentSurname', '$studentAddress', '$studentClass', '$studentBatch', '$studentMedium', '$studentGender', '$studentMobile', 
                            '$studentEmail', '$studentSchool', '$studentFee', '$studentPassword', '$sub', '$com', '$dob', '$new_image_name', NOW()
                     )";

                $runQuery = mysqli_query($connection, $add_student);

                if ($runQuery) {
                    echo "<script> alert('Student added to database!')</script>";
                    echo "<script> window.open('student.php', '_self')</script>";
                }else {
                    echo "<script> alert('Student could not be added to database! Contact Admin.', '_self')</script>";
                }

            }else {
                echo "<script> alert('Unrecognized extension!')</script>";
                echo "<script> window.open('gallery.php', '_self')</script>";
            }

        }
    }


//    $sub = implode(",", $_POST['sub']);
//    $com = implode(",", $_POST['com']);
//
//    $studentTempImage = $HTTP_POST_FILES['uploadImage']['temporaryName'];
//    $uploadImage = 'student_'. date('Y-m-d-H-i-s') . '_' . uniqid() . '.jpg';
//
//    $studentSubject = $_POST['student_subject'];
//    $studentExamMark = $_POST['student_exam_mark'];
//    $studentDob = $_POST['student_dob'];
//
//    move_uploaded_file($studentTempImage, "../images/student/$uploadImage");
//
//    $add_image = "INSERT INTO tblStudent
//    (student_name, student_surname, student_address, student_class, student_exam, student_medium, student_gender, student_mobile, student_email, student_fee, student_username,
//     student_password, student_subject, student_exam_mark, student_dob, student_image, student_date)
//    VALUES
//        ('$studentName', '$studentSurname', '$studentAddress', '$studentClass', '$studentExam', '$studentLanguage', '$studentGender', '$studentMobile', '$studentEmail',
//         '$studentFee', '$studentUsername', '$studentPassword', '$studentSubject', '$studentExamMark', '$studentDob', '' ,'$studentDate')";
//
//    $insertPro = mysqli_query($connection, $add_image);
//
//    if ($insertPro) {
//        echo "<script> alert('Image added to gallery!')</script>";
//        echo "<script> window.open('gallery.php', '_self')</script>";
//    }
}
?>