<?php
    require_once './utils/functions.php';
    require_once './components/components.php';
    require_once './database/connection.php';

    if($_POST){
        $name=$_POST['name'];
        $username=$_POST['username'];
        $password=$_POST['password'];
        $roles=$_POST['roles'];

        // check if username already exists
        $sql = "SELECT * FROM users WHERE username = '$username'";
        $result = mysqli_query($conn, $sql);
        $resultCheck = mysqli_num_rows($result);

        if($resultCheck > 0){
            echo "<script>alert('Username already exists!', 'Please try another username.');</script>";
        } else {
            // hashing password
            $hashedPwd = password_hash($password, PASSWORD_DEFAULT);

            // insert user into database
            $sql = "INSERT INTO users (name, username, password, level) VALUES ('$name', '$username', '$hashedPwd', '$roles')";
            $result = mysqli_query($conn, $sql);

            if($result){
                echo "<script>alert('User successfully registered! Please login now.');</script>";
                echo "<script>window.location.href = 'login.php';</script>";
            } else {
                echo "<script>alert('Error!');</script>";
                mysqli_error($conn);
                echo "<script>window.location.href = 'register.php';</script>";
            }
        }
    }
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