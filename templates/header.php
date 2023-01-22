<?php

session_start();

if ($_SERVER['QUERY_STRING'] == 'noname'){
unset($_SESSION['username']);
}

$name = $_SESSION['username'] ?? 'Guest';
$role = $_SESSION['role'] ?? 'Public';

// get cookie
//$role = $_COOKIE['role'] ?? 'Unknown';
//echo $_COOKIE['username'];

?>


<head>
    <title>Testovaya zadanya</title>
    <!-- Compiled and minified CSS -->
    <link type="text/css" rel="stylesheet" href="css/materialize.min.css"  media="screen,projection"/>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <style type="text/css">
        .brand{
            background: #44547e !important;
        }
        .brand-text{
            color: #569096 !important;
        }
        form{
            max-width: 460px;
            margin: 20px auto;
            padding: 20px;
        }
        img {
            width: 100px;
            margin: 40px auto -30px;
            display: block;
            position: relative;
            top: -30px;
        }

        img {
            -webkit-transition: all 1s ease; /* Safari and Chrome */
            -moz-transition: all 1s ease; /* Firefox */
            -ms-transition: all 1s ease; /* IE 9 */
            -o-transition: all 1s ease; /* Opera */
            transition: all 1s ease;
        }
        img:hover {
            -webkit-transform:scale(1.5); /* Safari and Chrome */
            -moz-transform:scale(1.5); /* Firefox */
            -ms-transform:scale(1.5); /* IE 9 */
            -o-transform:scale(1.5); /* Opera */
            transform:scale(1.5);
        }
    </style>
</head>
<body class="grey lighten-4">
<nav class="white z-depth-0">
    <div class="container">
        <a href="index.php" class="brand-logo brand-text">TESTOVAYA LOGIN HERE</a>
        <ul id="nav-mobile" class="right hide-on-small-and-down">
            <li class="white-text btn brand teal lighten-2">
                <span>Hello <?php echo htmlspecialchars($name); ?></span>
                <span>(<?php echo htmlspecialchars($role); ?>)</span>
            </li>
            <?php
                if ($role === 'super_user'){
                    echo '<li><a href="users/read_users.php" class="btn brand z-depth-0">Users</a></li>';
                    echo '<li><a href="add_articles.php" class="btn brand z-depth-0">Articles</a></li>';
                    echo '<li><a href="home.php" class="btn brand z-depth-0">Home</a></li>';
                }
                if ($role === 'editor'){
                    echo '<li><a href="add_articles.php" class="btn brand z-depth-0">Articles</a></li>';
                    echo '<li><a href="home.php" class="btn brand z-depth-0">Home</a></li>';
                }
                if($role === 'admin'){
                    echo '<li><a href="users/read_users.php" class="btn brand z-depth-0">Users</a></li>';
                    echo '<li><a href="home.php" class="btn brand z-depth-0">Home</a></li>';
                }
                if($role === 'public'){
                    echo '<li><a href="home.php" class="btn brand z-depth-0">Home</a></li>';
                }
            ?>
        </ul>
    </div>
</nav>
