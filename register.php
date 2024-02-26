<?php
ob_start();
session_start();
require_once ('includes/db.php');

if (isset($_POST['register-submit-button'])) {

    $name = mysqli_real_escape_string($connection, $_POST['studentName']);
    $surname = mysqli_real_escape_string($connection, $_POST['studentSurname']);
    $gender = mysqli_real_escape_string($connection, $_POST['studentGender']);
    $username = mysqli_real_escape_string($connection, $_POST['studentUsername']);
    $password = mysqli_real_escape_string($connection, $_POST['studentPassword']);

    $insert_student_info = "INSERT INTO student (studentName, studentSurname, studentGender, studentUsername, studentPassword) values ($name, $surname, $gender, $username, 
                                                 $password)";
    $insert_statement = $connection->prepare($insert_student_info);
    $query_execution = $insert_statement->execute($name, $surname, $gender, $username, $password);

    if ($query_execution) {
        echo "User added to database.";
    }else {
        echo "User not added to database.";
    }
//
//    $get_user = "INSERT * FROM student WHERE user_name = '$username' AND user_password = '$password'";
//    $run_user = mysqli_query($connection, $get_user);
//
//    $check_user = mysqli_num_rows($run_user);
//
//    if ($check_user == 1) {
//        $_SESSION['userName'] = $username;
//        echo "<script>window.open('index.php', '_self')</script>";
//    }else {
//        echo "<script>window.alert('Email or Password is incorrect...Try Again!!!')</script>";
//    }
}
?>

<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <title>School Record Keeper</title>

    <link rel="stylesheet" href="css/bootstrap.min.css"/>
    <link rel="stylesheet" href="css/custom.css"/>
    <link rel="stylesheet" href="css/all.min.css"/>
    <link href="https://fonts.googleapis.com/css?family=Raleway:300,400" rel="stylesheet"/>

    <script>
        body{
            font-family: 'Raleway', sans-serif;
        }
    </script>
    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/all.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>

</head>

<body>
<div class="container-fluid">
    <div class="row mt-5">
        <div class="col-md-4"></div>
        <div class="col-md-4">
            <form class="" method="post" action="register.php">
                <h3 class="text-danger text-center mb-4"><strong>Student Area</strong></h3>
                <h2 class="text-danger text-center">Register</h2><hr>

                <label class="text-danger">Name</label>
                <input type="text" class="form-control" name="studentName" placeholder="Name" required /><br>
                <label class="text-danger">Surname</label>
                <input type="text" class="form-control" name="studentSurname" placeholder="Surname" required/><br>
                <label class="text-danger">Gender</label>
                <input type="text" class="form-control" name="studentGender" placeholder="Gender" required /><br>
                <label class="text-danger">Username</label>
                <input type="text" class="form-control" name="studentUsername" placeholder="Username" required/><br>
                <label class="text-danger">Password</label>
                <input type="password" class="form-control" name="studentPassword" placeholder="Password" required/><br>

                <button class="btn btn-danger btn-block" type="submit" name="register-submit-button">Submit</button>
            </form>
        </div>
        <div class="col-md-4"></div>
    </div>
</div>
</body>

</html>