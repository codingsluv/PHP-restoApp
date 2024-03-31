<?php 
    require_once("services/database.php");
    session_start();
    
    $login_notif = "";

    if(isset($_SESSION['is_login']) && $_SESSION['is_login'] == true) {
        header("Location: index.php");
    }

    if(isset($_POST['login'])) {
        $username = $_POST['username'];
        $password = $_POST['password'];

        $select_admin_query = "SELECT * FROM admin WHERE username = '$username' AND password = '$password'";

        $select_admin = $db->query($select_admin_query);

        if($select_admin->num_rows > 0) {
            $admin = $select_admin->fetch_assoc();

            $_SESSION['is_login'] = true;
            $_SESSION['username'] = $admin['username'];
            header("Location: index.php");
        } else {
            $login_notif = "Akun tidak ditemukan";
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css"/>
    <title>Login</title>
</head>
<body>
    <div class="super-center">
        <h1>LOGIN ADMIN</h1>
        <i><?= $login_notif ?></i>
        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
                <label for="username">Username</label>
                <input type="text" name="username" id="username">
                <label for="password">Password</label>
                <input type="password" name="password" id="password">
            <button type="submit" name="login">LOGIN</button>
        </form>
    </div>
</body>
</html>
