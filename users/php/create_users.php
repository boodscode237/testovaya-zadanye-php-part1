<?php

if (isset($_POST['create-user'])){
    include "../../config/db_conn.php";
    function validate($data): string
    {
        $data = trim($data);
        $data = stripslashes($data);
        return htmlspecialchars($data);
    }

    $username = validate($_POST['username']);
    $password = validate($_POST['password']);
    $role = validate($_POST['role']);

    $user_data = 'username='.$username.'&password='.$password.'&role='.$role;

    if(empty($username)){
        header('Location: ../create_users.php?error=username is required&$user_data');
    } else if(empty($password)){
        header('Location: ../create_users.php?error=password is required&$user_data');
    } else {
        $sql = "insert into users(username, password, role) values('$username', '$password', '$role')";
        if (isset($conn)) {
            $result = mysqli_query($conn, $sql);
            if ($result){
                header('Location: ../read_users.php?success=successfully created');
            } else {
                header('Location: ../create_users.php?error=unknown error occurred&$user_data');
            }
        }

    }
}

