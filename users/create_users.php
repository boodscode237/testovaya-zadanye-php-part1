<!DOCTYPE html>
<html>
<head>
    <title>Create Users</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
<div class="container">
    <form action="php/create_users.php" method="post">
        <?php if (isset($_GET['error'])){?>
        <div class="alert alert-danger" role="alert">
            <?php echo $_GET['error']; ?>
        </div>
        <?php } ?>
    <h1 class="display-4 text-center mb-3">Create Users</h1><hr>
        <div class="mb-3">
            <label for="username" class="form-label">User Name</label>
            <input type="text" class="form-control" id="username" value="<?php
            if (isset($_GET['username'])) echo($_GET['username'])
            ?>" name="username" aria-describedby="emailHelp">
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <input type="text" class="form-control" value="<?php
            if (isset($_GET['password'])) echo($_GET['password'])
            ?>" id="password" name="password">
        </div>
        <div class="mb-3">
            <select name="role" multiple value="<?php
            if (isset($_GET['role'])) echo($_GET['role'])
            ?>" class="form-select form-select-lg mb-3" aria-label=".form-select-lg example">
                <option value="super_user" selected>super_user</option>
                <option value="admin">admin</option>
                <option value="public">public</option>
                <option value="editor">editor</option>
            </select>
        </div>
        <button type="submit" name="create-user" class="btn btn-primary">Create</button>
        <a href="read_users.php" class="link-primary">view</a>
    </form>
</div>
</body>
</html>