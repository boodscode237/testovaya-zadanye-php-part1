<?php
$sname = "localhost";
$uname = "john";
$password = "test1234";

$db_name = "blog";

$conn = mysqli_connect($sname, $uname, $password, $db_name);

if (!$conn){
    echo 'Connection error: ' . mysqli_connect_error();
}

function validate($data): string
{
    $data = trim($data);
    $data = stripslashes($data);
    return htmlspecialchars($data);
}