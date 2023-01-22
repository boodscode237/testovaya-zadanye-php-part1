<?php
// connect to db
include ('config/db_conn.php');

// write query for all articles
$sql = 'SELECT id, title, content, author, created_at FROM articles ORDER BY created_at';

//    make query and get result
$result = mysqli_query($conn, $sql);

//    fetch the resulting rows
$articles = mysqli_fetch_all($result, MYSQLI_ASSOC);

mysqli_free_result($result);

// close the connection
mysqli_close($conn);


?>

<?php include('templates/header.php'); ?>
    <div class="container">
        <h4 class="center grey-text">Articles</h4>
        <div class="row">
            <?php foreach ($articles as $article): ?>
                <div class="col s6 md3">
                    <div class="card z-depth-0">
                        <img src="img/article.jpg" class="article-img">
                        <div class="card-content center">
                            <h6>
                                <?php echo htmlspecialchars($article['title']); ?>
                            </h6>
                            <div>
                                <p>
                                    <?php echo htmlspecialchars($article['content']); ?>
                                </p>
                            </div>
                            <div>
                                <p>
                                    Created by: <?php echo htmlspecialchars($article['author']); ?>
                                </p>
                            </div>
                            <div>
                                <p>
                                    <?php echo htmlspecialchars($article['created_at']); ?>
                                </p>
                            </div>

                        </div>
                        <?php if (isset($role)) :
                            if ($role == 'super_user' || $role == 'admin' || $role == 'editor'): ?>
                            <div class="card-action right-align">
                                <a href="details.php?id=<?php echo $article['id']; ?>" class="brand-text">more info</a>
                            </div>
                            <?php endif; ?>
                        <?php endif;?>
                    </div>
                </div>

            <?php endforeach; ?>
        </div>
    </div>
<?php include('templates/footer.php'); ?>