<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign UP</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/7.1.0/mdb.min.css" rel="stylesheet" />
    
</head>

<body>
    <?php
    include 'config.php';

    if (isset($_POST['signup'])) {
        if (!empty($_POST['upassword']) || !empty($_POST['uname'])) {
            $u_user = $_POST['uname'];
            $u_password = $_POST['upassword'];
            $sql = "INSERT INTO customer VALUES ('$u_user','$u_password');";
            $query = mysqli_query($conn, $sql);
            header("Location: login.php");
            die();
        } else {
            echo 'fields must not be empty';
        }
    } ?>
    <section class="vh-100" style="background-color: #508bfc;">
        <div class="container py-5 h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-12 col-md-8 col-lg-6 col-xl-5">
                    <div class="card shadow-2-strong" style="border-radius: 1rem;">
                        <div class="card-body p-5 text-center">

                            <h3 class="mb-5">Sign up</h3>
                            <form action="<?php $_SERVER['PHP_SELF'] ?>" method="post">
                                <div class="form-outline mb-4">
                                    <input name="uname" type="text" id="typeEmailX-2" class="form-control form-control-lg" />
                                    <label class="form-label" for="typeEmailX-2">username</label>
                                </div>

                                <div class="form-outline mb-4">
                                    <input name="upassword" type="password" id="typePasswordX-2" class="form-control form-control-lg" />
                                    <label class="form-label" for="typePasswordX-2">Password</label>
                                </div>

                                <input type="submit" name="signup" value="signup">

                            </form>
                            <hr class="my-4">

                            <button class="btn btn-lg btn-block btn-primary" style="background-color: #dd4b39;" type="submit"><i class="fab fa-google me-2"></i> Sign in with google</button>
                            <button class="btn btn-lg btn-block btn-primary mb-2" style="background-color: #3b5998;" type="submit"><i class="fab fa-facebook-f me-2"></i>Sign in with facebook</button>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</body>

</html>