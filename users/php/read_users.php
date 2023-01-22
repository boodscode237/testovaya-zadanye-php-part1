<?php

include "../db_conn.php";
$sname = "localhost";
$uname = "john";
$password = "test1234";

$db_name = "blog";

$conn = mysqli_connect($sname, $uname, $password, $db_name);

if (!$conn){
    echo "Connection failed!";
}

$sql = "select * from users order by id desc";
$result = mysqli_query($conn, $sql);
