<?php include('templates/header.php') ?>

<?php
// connect to db
include ('config/db_conn.php');
$title = $content = "";
$errors = array('title'=>'', 'content'=>'');
$role = isset($_SESSION['role']) ? $_SESSION['role'] : 'Public';


if(isset($_POST['submit'])){
    // check title
    if (empty($_POST['title'])){
        $errors['title'] = 'A title is required <br>';
    } else {
        $title = $_POST['title'];
        if(!preg_match('/^[a-zA-Z0-9\s]+$/', $title)){
            $errors['title'] = 'Title must be letters and spaces only';
        }
    }
    // check content
    if (empty($_POST['content'])){
        $errors['content'] = 'At least one word is required <br>';
    } else {
        $content = $_POST['content'];
        if(!preg_match('/^([a-zA-Z\s]+)(,\s*[a-zA-Z\s]*)*$/', $content)){
            $errors['content'] = 'content must be a comma separated list';
        }
    }

    if (array_filter($errors)){
        echo 'errors in the form';
    } else {
        if (isset($conn)) {
            $title = mysqli_real_escape_string($conn, $_POST['title']);
            $content = mysqli_real_escape_string($conn, $_POST['content']);
            $date_now = date("Y/m/d");
            // create sql
            $sql = "INSERT INTO articles(title,content,author, created_at, updated_at) VALUES('$title', '$content', '$role', '$date_now', '$date_now')";

            // save to db and check
            if (mysqli_query($conn, $sql)){
                header('Location: home.php');
            } else {
                echo 'query error: ' . mysqli_error($conn);
            }
        }
//            $email = mysqli_real_escape_string($conn, $_POST['email']);
//            $title = mysqli_real_escape_string($conn, $_POST['title']);
//            $ingredients = mysqli_real_escape_string($conn, $_POST['ingredients']);
//
//            // create sql
//            $sql = "INSERT INTO pizza(title,email,ingredients) VALUES('$title', '$email', '$ingredients')";
//
//            // save to db and check
//            if (mysqli_query($conn, $sql)){
//                header('Location: index.php');
//            } else {
//                echo 'query error: ' . mysqli_error($conn);
//            }
    }

} // end of post check


?>

<!doctype html>
<html lang="en">


<?php //include('templates/header.php') ?>
<section class="container grey-text">
    <h4 class="center">Add Articles</h4>
    <form action="<?php echo $_SERVER['PHP_SELF'] ?>" class="white" method="POST">
        <label>Title: </label>
        <input type="text" name="title" value="<?php echo htmlspecialchars($title); ?>">
        <div class="red-text"><?php echo $errors['title']; ?></div>
        <label>Content</label>
        <input type="text" name="content" value="<?php echo htmlspecialchars($content); ?>">
        <div class="red-text"><?php echo $errors['content']; ?></div>
        <div class="center">
            <input type="submit" name="submit" value="submit" class="btn brand z-depth-0">
        </div>
    </form>
</section>


<?php

include('templates/footer.php');
?>
</html>