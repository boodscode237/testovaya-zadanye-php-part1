<?php include "php/update_user.php"; ?>
<!DOCTYPE html>
<html>
<head>
    <title>Update User</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
          integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
<div class="container">
    <form action="php/update_user.php" method="post">
        <h1 class="display-4 text-center mb-3">Update User</h1><hr>
        <?php if (isset($_GET['error'])){?>
            <div class="alert alert-danger" role="alert">
                <?php echo $_GET['error']; ?>
            </div>
        <?php } ?>
        <div class="mb-3">
            <label for="username" class="form-label">User Name</label>
            <input type="text" class="form-control" id="username" value="<?=$row['username'];?>" name="username" aria-describedby="emailHelp">
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <input type="text" class="form-control" value="<?=$row['password'];?>" id="password" name="password">
        </div>
        <input type="text" name="id" value="<?=$row['id']?>" hidden>
        <div class="mb-3">
            <select name="role" multiple value="<?=$row['role'];?>" class="form-select form-select-lg mb-3" aria-label=".form-select-lg example">
                <option value="super_user" selected>super_user</option>
                <option value="admin">admin</option>
                <option value="public">public</option>
                <option value="editor">editor</option>
            </select>
        </div>
        <button type="submit" name="update-user" class="btn btn-primary">Update User</button>
        <a href="read_users.php" class="link-primary">view</a>
    </form>
</div>
</body>
</html>