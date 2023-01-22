<?php include "php/read_users.php"; ?>
<!DOCTYPE html>
<html>
<head>
    <title>Create</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
<div class="container">
    <div class="box">
        <h1 class="display-4 text-center mb-3">Users</h1><hr>
        <?php if (isset($_GET['success'])){?>
            <div class="alert alert-success" role="alert">
                <?php echo $_GET['success']; ?>
            </div>
        <?php } ?>
        <?php
            if (mysqli_num_rows($result)):?>
        <table class="table table-bordered border-primary ">
            <thead class="table-dark">
            <tr>
                <th scope="col">#</th>
                <th scope="col">Username</th>
                <th scope="col">Password</th>
                <th scope="col">Role</th>
                <th scope="col">CRUD ? 🤖</th>
            </tr>
            </thead>
            <tbody>
            <?php
            $i = 0;
            while($rows = mysqli_fetch_assoc($result)):
                $i++;
                ?>
            <tr>
                <th scope="row"><?= $i ?></th>
                <td><?= $rows['username'] ?></td>
                <td><?= $rows['password'] ?></td>
                <td><?= $rows['role'] ?></td>
                <td>
                    <a
                            href="update_user.php?id=<?= $rows['id'] ?>"
                            class="btn btn-success">Update 🖊️</a>
                    <a href="php/delete_user.php?id=<?= $rows['id'] ?>" class="btn btn-danger">Delete ❌</a>
                </td>
            </tr>
            <?php endwhile ?>
            </tbody>
        </table>
            <?php endif;?>
        <div class="link-right">
            <a href="create_users.php" class="link-primary">CREATE</a>
        </div>
        <div class="link-right">
            <a href="../index.php" class="link-primary">Login</a>
        </div>
    </div>
</div>
</body>
</html>