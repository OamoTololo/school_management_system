 <?php

    $db['db_host'] = 'localhost';
    $db['db_user'] = 'root';
    $db['db_password'] = 'O@mO2335243';
    $db['db_name'] = 'school_management_system';

    foreach ($db as $key => $value) {
        define(strtoupper($key), $value);
    }

    $connection = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);

 ?>