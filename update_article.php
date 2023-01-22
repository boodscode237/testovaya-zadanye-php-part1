<?php include('templates/header.php') ?>

<?php
// connect to db
include ('config/db_conn.php');
$sname = "localhost";
$uname = "john";
$password = "test1234";

$db_name = "blog";

$conn = mysqli_connect($sname, $uname, $password, $db_name);

if (!$conn){
    echo "Connection failed!";
}
$title = $content = $id = "";
$errors = array('title'=>'', 'content'=>'');
$role = $_SESSION['role'] ?? 'Public';

if (isset($_GET['id'])){
    $id = validate($_GET['id']);
    $sql = "SELECT * FROM articles WHERE id=$id";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) > 0){
        $row = mysqli_fetch_assoc($result);
    }else{
        header("Location: details.php");
    }
} else if (isset($_POST['update-article'])){
    $conn = mysqli_connect($sname, $uname, $password, $db_name);
    $title = validate($_POST['title']);
    $content = validate($_POST['content']);
    $id = validate($_POST['id']);
    if($title && $content){
        $sql = "update articles 
                    set title='$title', content='$content'
                    where id='$id'";
        $result = mysqli_query($conn, $sql);
        if ($result){
            header("Location: home.php");
        }
    } else {
        // failure
        echo 'query error: ' . mysqli_error($conn);
    }
}


?>

<!doctype html>
<html lang="en">


<section class="container grey-text">
    <h4 class="center">Update Article</h4>
    <form action="<?php echo $_SERVER['PHP_SELF'] ?>" class="white" method="POST">
        <label>Title: </label>
        <input type="text" name="title" value="<?=$row['title'];?>">
        <div class="red-text"><?php echo $errors['title']; ?></div>
        <label>Content</label>
        <input type="text" name="content" value="<?=$row['content'];?>">
        <div class="red-text"><?php echo $errors['content']; ?></div>
        <input type="hidden" name="id_to_delete" value="<?=$row['id'];?>">
        <div class="center">
            <input type="submit" name="update-article" value="update article" class="btn brand z-depth-0">
        </div>
    </form>
</section>


<?php

include('templates/footer.php');
?>
</html>