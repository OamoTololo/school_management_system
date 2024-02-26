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

    $deleteStudent = "DELETE FROM tblStudent WHERE id = '$deleteId'";
    $runQuery = mysqli_query($connection, $deleteStudent);

    if($runQuery) {
        echo "<script> alert('Student successfully deleted from database.')</script>";
        echo "<script> window.open('student.php', '_self')</script>";
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
                    <h2 class="text-center text-white bg-primary mt-2">Students</h2>
                    <div align="right" class="mb-3">
                        <a href="addStudent.php" class="btn btn-outline-primary">Add Student</a>
                    </div>

                    <table class="table table-border" id="tableToExcel">
                        <thead class="thead-dark">
                        <tr>
                            <th>Student Number</th>
                            <th>Name</th>
                            <th>Surname</th>
                            <th>Class</th>
                            <th>Course</th>
                            <th>Image</th>
                            <th>
                                <i class="fa fa-eye"></i>
                            </th>
                            <th>
                                <i class="fa fa-pencil-square"></i>
                            </th>
                            <th>
                                <i class="fa fa-trash"></i>
                            </th>
                        </tr>
                        <tbody>
                        <?php
                        $student = "SELECT * FROM tblStudent ORDER BY student_id DESC";
                        $runStudent = mysqli_query($connection, $student);
                        $i = 0;

                        while($rowStudent = mysqli_fetch_array($runStudent)) {
                            $student_id = $rowStudent['id'];
                            $name = $rowStudent['name'];
                            $surname = $rowStudent['surname'];
                            $class = $rowStudent['class'];
                            $batch = $rowStudent['batch'];
                            $image = $rowStudent['image'];
                            $i++;


                                $course = "SELECT * FROM tblCourses WHERE course_id = '$batch'";
                                $runCourse = mysqli_query($connection, $course);
                                $rowCourse = mysqli_fetch_array($runCourse);

                                $course_Id = $rowCourse['course_id'];
                                $course_name = $rowCourse['course_name'];


                            ?>
                            <tr>
                                <td><?php echo $i; ?></td>
                                <td><?php echo ucfirst($name); ?></td>
                                <td><?php echo ucfirst($surname); ?></td>
                                <td><?php echo $class; ?></td>
                                <td><?php echo $course_name; ?></td>
                                <td>
                                    <img class="img-fluid" src="../images/student/<?php echo $image; ?>"
                                         width="100px;" alt="Gallery Images">
                                </td>
                                <td>
                                    <a class="btn btn-primary" href="studentDetails.php?id=<?php echo $student_id; ?>">
                                        <i class=" fa fa-pencil-square"></i>
                                    </a>
                                </td>
                                <td>
                                    <a class="btn btn-warning" href="editStudent.php?id=<?php echo $student_id; ?>">
                                        <i class=" fa fa-pencil-square"></i>
                                    </a>
                                </td>
                                <td>
                                    <a class="btn btn-danger" href="student.php?del=<?php echo $student_id; ?>">
                                        <i class=" fa fa-pencil-square"></i>
                                    </a>
                                </td>
                            </tr>
                        <?php } ?>
                        </tbody>
                    </table>
                </div>
                <button class="btn btn-danger offset-md-4" id="btn" type="button">Export to Excel</button>
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