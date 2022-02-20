<?php
    require_once './utils/functions.php';
    require_once './components/components.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <!-- SEO -->
    <?php SEO("Daftar | PinjamMobil", ""); ?>
    
    <!-- TailwindCSS -->
    <?php TailwindCSS(); ?>

    <!-- Bootstrap Icons -->
    <?php BootstrapIcons(); ?>
</head>
<body>
    <!-- Navbar Components -->
    <?php Navbar(); ?>

    <!-- RegisterPage Components -->
    <?php RegisPage(); ?>

    <!-- Footer Components -->
    <?php Footer(); ?>

    <!-- Dark Mode Function -->
    <?php DarkMode(); ?>
</body>
</html>