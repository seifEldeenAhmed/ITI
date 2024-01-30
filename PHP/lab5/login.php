<?php
$error = '';
if (isset($_POST['signin'])) {
    include_once 'config.php';
    if (empty($_POST['upassword'] || empty($_POST['uname']))) {
        echo 'fields cant be empty';
    } else {
        $searchuname = $_POST['uname'];
        $searchupass = $_POST['upassword'];
        $sql = "SELECT * FROM `customer` WHERE `c_user`='$searchuname'";
        $query = mysqli_query($conn, $sql);
        if (!mysqli_num_rows($query)) {
            echo 'Sign up first please';
            // header('location:signup.php');
        } else {
            $cust = mysqli_fetch_assoc($query);
            foreach ($cust as $key => $value) {
                if ($cust['c_password'] != $searchupass) {
                    $error = 'wrong password';
                } else {
                    session_start();
                    $_SESSION['uname'] = $searchuname;
                    $_SESSION['upassword'] = $searchupass;
                    header('location:home.php');
                }
            }
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LOGIN</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/7.1.0/mdb.min.css" rel="stylesheet" />
</head>

<body class="d-flex justify-content-center mt-5">
    <form class="col-lg-10" method="post" action="login.php">
        <!-- Email input -->
        <div class="form-outline mb-4">
            <input type="text" name="uname" id="form2Example1" class="form-control" required />
            <label class="form-label" for="form2Example1">Email address</label>
        </div>

        <!-- Password input -->
        <div class="form-outline mb-4">
            <input type="password" name="upassword" id="form2Example2" class="form-control" required />
            <label class="form-label" for="form2Example2">Password</label>
        </div>
        <span><?php echo $error; ?></span>

        <!-- 2 column grid layout for inline styling -->
        <div class="row mb-4">
            <div class="col d-flex justify-content-center">
                <!-- Checkbox -->
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="" id="form2Example31" />
                    <label class="form-check-label" for="form2Example31"> Remember me </label>
                </div>
            </div>

            <div class="col">
                <!-- Simple link -->
                <a href="#!">Forgot password?</a>
            </div>
        </div>

        <!-- Submit button -->
        <input type="submit" name="signin" class="btn btn-primary btn-block mb-4">

        <!-- Register buttons -->
        <div class="text-center">
            <p>Not a member? <a href="signup.php">Register</a></p>
        </div>
    </form>
</body>

</html>