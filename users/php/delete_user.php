<?php

if(isset($_GET['id'])){
    include "../../config/db_conn.php";


    $id = validate($_GET['id']);

    $sql = "DELETE FROM users
	        WHERE id=$id";
    $result = mysqli_query($conn, $sql);
    if ($result) {
        header("Location: ../read_users.php?success=successfully deleted");
    }else {
        header("Location: ../read_users.php?error=unknown error occurred");
    }

}else {
    header("Location: ../read_users.php");
}