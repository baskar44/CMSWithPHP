<?php

//Connecting to the database

//Creating the required constants
$db['db_host'] = "localhost";
$db['db_user'] = "root";
$db['db_pass'] = "";
$db['db_name'] = "cmsWithPHP";

foreach($db as $key => $value) {
    define(strtoupper($key), $value);
}

//Connecting to the database...
$connection = mysqli_connect(DB_HOST,DB_USER,DB_PASS,DB_NAME);

?>
