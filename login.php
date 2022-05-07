<?php
require_once './utils/functions.php';
require_once './components/components.php';
require_once './database/connection.php';

session_start();

if (isset($_COOKIE['id']) && isset($_COOKIE['key_id'])) {
    $id = $_COOKIE['id'];
    $key_id = $_COOKIE['key_id'];

    $sql = "SELECT username FROM users WHERE id = '$id'";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);

    if ($key_id === hash('sha256', $row['username'])) {
        $_SESSION['login'] = true;
    }
}

if (isset($_SESSION['login'])) {
    header("Location: dashboard.php");
    exit();
}

if ($_POST) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // check if username exists
    $sql = "SELECT * FROM users WHERE username = '$username'";
    $result = mysqli_query($conn, $sql);
    $resultCheck = mysqli_num_rows($result);

    if ($resultCheck < 1) {
        echo "<script>alert('Username not found! Please try another username.';</script>";
    } else {
        // fetching user data
        $row = mysqli_fetch_assoc($result);
        $hashedPwdCheck = password_verify($password, $row['password']);

        if ($hashedPwdCheck == false) {
            echo "<script>alert('Password Incorrect! Please try again.');</script>";
        } elseif ($hashedPwdCheck == true) {
            // set session variables
            $_SESSION['login'] = true;
            $_SESSION['u_id'] = $row['id'];
            $_SESSION['u_name'] = $row['name'];
            $_SESSION['u_username'] = $row['username'];
            $_SESSION['u_level'] = $row['level'];

            // check remember me
            if (isset($_POST['remember'])) {
                setcookie('id', $row['id'], time() + 60);
                setcookie('key_id', hash('sha256', $row['username']), time() + 60);
            }

            // conditional redirect for role switch case
            switch ($_SESSION['u_level']) {
                case 'admin':
                    header("location:./dashboard/admin/");
                    break;
                case 'cashier':
                    header("location:./dashboard/cashier/");
                    break;
                case 'owner':
                    header("location:./dashboard/owner/");
                    break;
                default:
                    header("location:./dashboard");
                    break;
            }

            // redirect user to dashboard
            // echo "<script>alert('Login Successful!');</script>";
            // header("Location: dashboard.php");
        } else {
            echo "<script>AlertDanger('Error! Please try again.');</script>";
            header("Location: login.php");
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <!-- SEO -->
    <?php SEO("Masuk | PinjamMobil"); ?>

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