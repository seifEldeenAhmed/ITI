<?php 
session_start();

?>

<?php
if (isset($_POST['logout'])) {
    $_SESSION = array();
    if (ini_get("session.use_cookies")) {
        $params = session_get_cookie_params();
        setcookie(session_name(), '', time() - 42000,
            $params["path"], $params["domain"],
            $params["secure"], $params["httponly"]
        );
    }

    
    // Finally, destroy the session.
    session_destroy();
    header('location:login.php');
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
</head>
<body>
    <h1>hello <?php echo $_SESSION['uname']; ?></h1>
    <form action="<?php $_SERVER["PHP_SELF"] ?>" method="post">
    <input type="submit" value="logout" name="logout">
</form>
</body>
</html>