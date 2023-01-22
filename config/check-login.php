<?php
session_start();
include('db_conn.php');

if (
    isset($_POST['username']) &&
    isset($_POST['password']) &&
    isset($_POST['role'])
){
    $username = validate($_POST['username']);
    $password = validate($_POST['password']);
    $role = validate($_POST['role']);

    if (empty($username)){
        header("Location: ../index.php?error=User Name is required");
    } else if (empty($password)){
        header("Location: ../index.php?error=User Password is required");
    }else {
        $sql = "SELECT * FROM users WHERE username='$username' AND password='$password'";
        if (isset($conn)) {
            $result = mysqli_query($conn, $sql);
            if (mysqli_num_rows($result) === 1){
                // the username will be unique
                $row = mysqli_fetch_assoc($result);
                if ($row['password'] == $password && $row['role'] == $role) {
                    $_SESSION['name'] = $row['name'];
                    $_SESSION['id'] = $row['id'];
                    $_SESSION['role'] = $row['role'];
                    $_SESSION['username'] = $row['username'];
                    header("Location: ../home.php");

                }
                else{
                    header("Location: ../index.php?error=incorrect role or password");
                }
            }
            else{
                header("Location: ../index.php?error=incorrect username or password");
            }
        }

    }

} else {
    header("Location: ../index.php");
}

