<?php
    require_once './utils/functions.php';
    require_once './components/components.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>PinjamMobil | Naufal Akbar Nugroho</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="author" content="Naufal Akbar Nugroho">
    <meta name="description" content="Car Rental App with PHP Native by Naufal Akbar Nugroho">
    <meta property="og:title" content="PinjamMobil | Naufal Akbar Nugroho">
    <meta property="og:description" content="Car Rental App with PHP Native by Naufal Akbar Nugroho">
    <meta property="og:image" content="/some-image.png">
    <!-- <meta property="og:url" content="/this-page.html"> -->
    <!-- <meta property="og:site_name" content="Your Site Name"> -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:image:alt" content="image description">
    <!-- <link href="style.css" rel="stylesheet"> -->
    <link rel="apple-touch-icon" sizes="180x180" href="./public/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="./public/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="./public/favicon-16x16.png">
    <link rel="icon" href="./public/favicon.ico">
    <link rel="manifest" href="./public/site.webmanifest">

    <!-- TailwindCSS -->
    <?php TailwindCSS(); ?>

    <!-- Bootstrap Icons -->
    <?php BootstrapIcons(); ?>
</head>
<body>
    <?php Navbar(); ?>
    <?php HomePage(); ?>
    <?php Footer(); ?>

    <!-- Dark Mode Function -->
    <?php DarkMode(); ?>
</body>
</html>