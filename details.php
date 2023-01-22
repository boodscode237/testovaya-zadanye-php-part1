<?php
include ('config/db_conn.php');

if (isset($_POST['delete'])){
    if (isset($conn)) {
        $id_to_delete = mysqli_real_escape_string($conn, $_POST['id_to_delete']);
        $sql = "DELETE FROM articles WHERE id = $id_to_delete";
        if(mysqli_query($conn, $sql)){
            // success
            header('Location: index.php');
        } else {
            // failure
            echo 'query error: ' . mysqli_error($conn);
        }

    }
}


// check get request id parameter
if (isset($_GET['id'])){
    if (isset($conn)) {
        $id = mysqli_real_escape_string($conn, $_GET['id']);
        $sql = "SELECT * FROM articles WHERE id = $id";



        // get query result
        $result = mysqli_query($conn, $sql);

        // fetch result in array format
        $article = mysqli_fetch_assoc($result);
//        $id_auth = $article['$author_id'];
//
//        $author = "select distinct username from users where users.id = $id_auth";
//        $auth_result = mysqli_query($conn, $author);
//        $author_id = mysqli_fetch_assoc($auth_result);
//        $article['author'] = $author_id;


        // free result and close connection
        mysqli_free_result($result);
//        mysqli_free_result($author);
        mysqli_close($conn);
    }
}

?>
<!doctype html>
<html lang="en">
<?php include('templates/header.php'); ?>
<div class="container center grey-text">
    <?php if (isset($article)):?>
        <h4><?php echo htmlspecialchars($article['title']); ?></h4>
        <p><?php echo 'Created by: ' . htmlspecialchars($article['author']); ?></p>
        <p><?php echo 'Date: ' . date($article['created_at']); ?></p>
        <p><?php echo htmlspecialchars($article['ingredients']); ?></p>

        <!-- DELETE FORM -->
        <form action="details.php" method="POST">
            <input type="hidden" name="id_to_delete" value="<?php echo $article['id']; ?>">

            <input type="submit" name="delete" value="Delete" class="btn brand z-depth-0">
            <div class="card-action right-align">
                <a href="update_article.php?id=<?php echo $article['id']; ?>" class="brand-text">UPDATE</a>
            </div>
        </form>
    <?php else: ?>
        <h5>Article not found</h5>
    <?php endif;?>
</div>
<?php include('templates/footer.php'); ?>

</html>