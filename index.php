<!---->
<?php //echo md5('1234')?>
<?php include('templates/header.php'); ?>


<form class="border shadow p-3 rounded" style="width: 450px;" method="POST" action="config/check-login.php">
    <h1 class="text-center p-3">LOGIN</h1>
    <?php if (isset($_GET['error'])): ?>
        <div class="alert alert-danger" role="alert">
            <?php echo $_GET['error'] ?>
        </div>
    <?php endif; ?>
    <div class="mb-3">
        <label
                for="username"
                class="form-label">Username</label>
        <input
                type="text"
                class="form-control"
                name="username"
                id="username"
        >
    </div>
    <div class="mb-3">
        <label
                for="password"
                class="form-label">Password</label>
        <input
                type="password"
                class="form-control"
                name="password"
                id="password"
        >
    </div>

    <div class="mb-0">
        <label class="form-label">Select user type</label>
    </div>
    <div class="mb-3">
        <select class="browser-default" aria-label="Default select example" name="role">
            <option value="public" selected>public</option>
            <option value="admin">admin</option>
            <option value="super_user">super_user</option>
            <option value="editor">editor</option>
        </select>
    </div>

    <button type="submit"
            class="btn btn-primary">Submit</button>
</form>


<?php include('templates/footer.php'); ?>