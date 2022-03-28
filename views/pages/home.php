<?php
session_start();
if ($_SESSION['user']) {
    header('Location: /views/pages/profile.php');
}

?>
<?php require_once '../templates/header.php'?>
<?php
require_once '../templates/head.php';
?>
<body>
<?php
require_once '../templates/navbar.php';
?>
<div class="container mt-4">
    <div class="jumbotron">
        <h1 class="display-4">Hello there</h1>
        <p class="lead">blblbbll</p>
        <hr class="my-4">
        <p>IT USE..</p>
        <a class="btn btn-primary btn-lg" href="/views/pages/login.php" role="button">Sign In</a>

    </div>
</div>
</body>
</html>
