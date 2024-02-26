<?php
    ob_start();
    session_start();
    $user = '';

    $gallery = "SELECT * FROM tblGallery";
    $gallery_script_run = mysqli_query($connection, $gallery);
    $row_gallery = mysqli_num_rows($gallery_script_run);

    $student = "SELECT * FROM tblStudent";
    $student_script_run = mysqli_query($connection, $student);
    $row_student = mysqli_num_rows($student_script_run);
//
//    $educator = "SELECT * FROM tblEducator";
//    $educator_script_run = mysqli_query($connection, $educator);
//    $row_educator = mysqli_num_rows($educator_script_run);


    $admin = "SELECT * FROM tblUsers";
    $admin_script_run = mysqli_query($connection, $admin);
    $row_admin = mysqli_num_rows($admin_script_run);


    $review = "SELECT * FROM tblReview";
    $review_script_run = mysqli_query($connection, $review);
    $row_review = mysqli_num_rows($review_script_run);

    $courses = "SELECT * FROM tblCourses";
    $courses_script_run = mysqli_query($connection, $courses);
    $row_courses = mysqli_num_rows($courses_script_run);

    $exam = "SELECT * FROM tblExam";
    $exam_script_run = mysqli_query($connection, $exam);
    $row_exam = mysqli_num_rows($exam_script_run);

    $registration = "SELECT * FROM tblRegister";
    $registration_script_run = mysqli_query($connection, $registration);
    $row_registration = mysqli_num_rows($registration_script_run);

    $fee = "SELECT * FROM tblFee";
    $fee_script_run = mysqli_query($connection, $fee);
    $row_fee = mysqli_num_rows($fee_script_run);

    $category = "SELECT * FROM tblCategory";
    $category_script_run = mysqli_query($connection, $category);
    $row_category = mysqli_num_rows($category_script_run);

    $expenses = "SELECT * FROM tblExpenses";
    $expenses_script_run = mysqli_query($connection, $expenses);
    $row_expenses = mysqli_num_rows($expenses_script_run);

    $exam = "SELECT * FROM tblExam";
    $exam_script_run = mysqli_query($connection, $exam);
    $row_exam = mysqli_num_rows($exam_script_run);

    $message = "SELECT * FROM tblMessage";
    $message_script_run = mysqli_query($connection, $message);
    $row_message = mysqli_num_rows($message_script_run);

    $messageToClasses = "SELECT * FROM tblMessageToClasses";
    $messageToClasses_script_run = mysqli_query($connection, $messageToClasses);
    $row_messageToClasses= mysqli_num_rows($messageToClasses_script_run);

   ?>

<div class="list-group">
    <a href="index.php" class="list-group-item list-group-item-action active">
        <i class="fa fa-tachometer"></i> Dashboard
    </a>

    <a href="gallery.php" class="list-group-item list-group-item-action">
        <i class="fa fa-camera"></i> Gallery
        <button type="button" class="btn btn-primary fa-pull-right btn-sm">
            <span class="badge badge-light text-danger"><?php echo $row_gallery; ?></span>
        </button>
    </a>

    <a href="student.php" class="list-group-item list-group-item-action">
        <i class="fa fa-user"></i> Students
        <button type="button" class="btn btn-primary fa-pull-right btn-sm">
            <span class="badge badge-light text-danger"><?php echo $row_student; ?></span>
        </button>
    </a>

    <a href="educator.php" class="list-group-item list-group-item-action">
        <i class="fa fa-user"></i> Educators
        <button type="button" class="btn btn-primary fa-pull-right btn-sm">
            <span class="badge badge-light text-danger"><?php echo  $row_educator; ?></span>
        </button>
    </a>

        <a href="back_up.php" class="list-group-item list-group-item-action">
            <i class="fa fa-user"></i> Admin
            <button type="button" class="btn btn-primary fa-pull-right btn-sm">
                <span class="badge badge-light text-danger"><?php echo  $row_admin; ?></span>
            </button>
        </a>

    <a href="review.php" class="list-group-item list-group-item-action">
        <i class="fa fa-star"></i> Reviews
        <button type="button" class="btn btn-primary fa-pull-right btn-sm">
            <span class="badge badge-light text-danger"><?php echo  $row_review; ?></span>
        </button>
    </a>

    <a href="course.php" class="list-group-item list-group-item-action">
        <i class="fa fa-life-ring"></i> Courses
        <button type="button" class="btn btn-primary fa-pull-right btn-sm">
            <span class="badge badge-light text-danger"><?php echo  $row_exam; ?></span>
        </button>
    </a>

    <a href="registration.php" class="list-group-item list-group-item-action">
        <i class="fa fa-lightbulb"></i> Registration
        <button type="button" class="btn btn-primary fa-pull-right btn-sm">
            <span class="badge badge-light text-danger"><?php echo  $row_registration; ?></span>
        </button>
    </a>

    <a href="fee.php" class="list-group-item list-group-item-action">
        <i class="fa fa-money-bill"></i> Fees
        <button type="button" class="btn btn-primary fa-pull-right btn-sm">
            <span class="badge badge-light text-danger"><?php echo  $row_fee; ?></span>
        </button>
    </a>

    <a href="category.php" class="list-group-item list-group-item-action">
        <i class="fa fa-sort"></i> Category
        <button type="button" class="btn btn-primary fa-pull-right btn-sm">
            <span class="badge badge-light text-danger"><?php echo  $row_category; ?></span>
        </button>
    </a>

    <a href="expenses.php" class="list-group-item list-group-item-action">
        <i class="fa fa-money-bill"></i> Expenses
        <button type="button" class="btn btn-primary fa-pull-right btn-sm">
            <span class="badge badge-light text-danger"><?php echo  $row_expenses; ?></span>
        </button>
    </a>

    <a href="exam.php" class="list-group-item list-group-item-action">
        <i class="fa fa-question"></i> Exam
        <button type="button" class="btn btn-primary fa-pull-right btn-sm">
            <span class="badge badge-light text-danger"><?php echo  $row_exam; ?></span>
        </button>
    </a>

    <a href="message.php" class="list-group-item list-group-item-action">
        <i class="fa fa-envelope"></i> Messages
        <button type="button" class="btn btn-primary fa-pull-right btn-sm">
            <span class="badge badge-light text-danger"><?php echo  $row_message; ?></span>
        </button>
    </a>

    <a href="messageToClasses.php" class="list-group-item list-group-item-action">
        <i class="fa fa-window-close"></i> Complaints
        <button type="button" class="btn btn-primary fa-pull-right btn-sm">
            <span class="badge badge-light text-danger"<?php echo  $row_messageToClasses; ?></span>
        </button>
    </a>


</div>