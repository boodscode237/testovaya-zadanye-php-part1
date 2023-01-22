<?php
$sname = "localhost";
$uname = "john";
$password = "test1234";

$db_name = "blog";

$conn = mysqli_connect($sname, $uname, $password, $db_name);

if (!$conn){
    echo "Connection failed!";
}
function validate($data): string
{
    $data = trim($data);
    $data = stripslashes($data);
    return htmlspecialchars($data);
}
if(isset($_GET['id'])){
//    include "../../config/db_conn.php";


    $id = validate($_GET['id']);

    $sql = "SELECT * FROM users WHERE id=$id";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) > 0){
        $row = mysqli_fetch_assoc($result);
    }else{
        header("Location: read_users.php");
    }

    }else if (isset($_POST['update-user'])){
        $conn = mysqli_connect($sname, $uname, $password, $db_name);
        $username = validate($_POST['username']);
        $password = validate($_POST['password']);
        $id = validate($_POST['id']);
        $role = validate($_POST['role']);
        $user_data = 'username='.$username.'&password='.$password.'&role='.$role;
        if($username && $role && $password){
            $sql = "update users 
                    set username='$username', password='$password', role='$role' 
                    where id='$id'";
            $result = mysqli_query($conn, $sql);
            if ($result){
                header("Location: ../read_users.php");
            }
        } else {
            header("Location: ../update_user.php?id=$id&error=username password and role are required");
        }
}

