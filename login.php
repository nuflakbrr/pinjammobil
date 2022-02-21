<?php
    require_once './utils/functions.php';
    require_once './components/components.php';
    require_once './database/connection.php';

    if($_POST){
        $username=$_POST['username'];
        $password=$_POST['password'];

        // check if username exists
        $sql = "SELECT * FROM users WHERE username = '$username'";
        $result = mysqli_query($conn, $sql);
        $resultCheck = mysqli_num_rows($result);

        if($resultCheck < 1){
            echo "<script>alert('Username not found! Please try another username.';</script>";
        } else {
            // fetching user data
            $row = mysqli_fetch_assoc($result);
            $hashedPwdCheck = password_verify($password, $row['password']);

            if($hashedPwdCheck == false){
                echo "<script>alert('Password Incorrect! Please try again.');</script>";
            } elseif($hashedPwdCheck == true){
                // set session variables
                $_SESSION['u_id'] = $row['id'];
                $_SESSION['u_name'] = $row['name'];
                $_SESSION['u_username'] = $row['username'];
                $_SESSION['u_level'] = $row['level'];

                // redirect user to dashboard
                echo "<script>alert('Login Successful!');</script>";
                echo "<script>window.location.href = 'dashboard.php';</script>";
            } else {
                echo "<script>AlertDanger('Error! Please try again.');</script>";
                echo "<script>window.location.href = 'login.php';</script>";
            }
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <!-- SEO -->
    <?php SEO("Masuk | PinjamMobil", ""); ?>
    
    <!-- TailwindCSS -->
    <?php TailwindCSS(); ?>

    <!-- Bootstrap Icons -->
    <?php BootstrapIcons(); ?>
</head>
<body>
    <!-- Navbar Components -->
    <?php Navbar(); ?>

    <!-- LoginPage Components -->
    <?php LoginPage(); ?>

    <!-- Footer Components -->
    <?php Footer(); ?>

    <!-- Dark Mode Function -->
    <?php DarkMode(); ?>
</body>
</html>