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
                    <input type="password" class="form-control" name="password" placeholder="Password" required /><br>

                    <button class="btn btn-danger btn-block" type="submit" name="login-submit-button">Submit</button>
                </form>
            </div>
            <div class="col-md-4"></div>
        </div>
    </div>
</body>

</html>