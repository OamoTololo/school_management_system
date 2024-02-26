<?php
ob_start();
session_start();
require_once ('includes/db.php');

try {
    if (isset($_POST['login-submit-button'])) {

        $username = mysqli_real_escape_string($connection, $_POST['username']);
        $password = mysqli_real_escape_string($connection, $_POST['password']);

        $get_user = "SELECT * FROM tblUsers WHERE username = '$username' AND user_password = '$password'";
        $run_user = mysqli_query($connection, $get_user);

        $check_user = mysqli_num_rows($run_user);

        if ($check_user == 1) {
            $_SESSION['username'] = $username;
            header('Location: index.php');
        }else {
            echo "<script>window.alert('Email or Password is incorrect...Try Again!!!')</script>";
        }
    }
}catch (Exception $e)
{
    echo "<script>window.alert('Login failed!!! Contact Admin.')</script>";
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
            <form class="" method="post" action="">
                <h3 class="text-danger text-center mb-4"><strong>Admin Area</strong></h3>
                <h2 class="text-danger text-center">Sign In</h2><hr>

                <label class="text-danger">Username</label>
                <input type="text" class="form-control" name="username" placeholder="Username" required /><br>
                <label class="text-danger">Password</label>
                <input type="password" class="form-control" name="password" placeholder="Password" required
                /><br>

                <button class="btn btn-danger btn-block" type="submit" name="login-submit-button">Submit</button>
            </form>
        </div>
        <div class="col-md-4"></div>
    </div>
</div>
</body>

</html>