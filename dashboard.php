<?php
    require_once './utils/functions.php';
    require_once './components/components.php';

    session_start();
    if(!isset($_SESSION['login'])){
        echo "<script>alert('You are not logged in! Please login first.');</script>";
        header("Location: login.php");
        exit();
    }


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <!-- SEO -->
    <?php SEO("Dasbor | PinjamMobil"); ?>

    <!-- TailwindCSS -->
    <?php TailwindCSS(); ?>

    <!-- Bootstrap Icons -->
    <?php BootstrapIcons(); ?>
</head>
<body>
    <a href="logout.php">Logout</a>
    <h1>halo</h1>
</body>
</html>