    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>User</title>
        <style>
            .card {
                box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
                max-width: 300px;
                margin: auto;
                text-align: center;
            }

            .title {
                color: grey;
                font-size: 18px;
            }

            button {
                border: none;
                outline: 0;
                display: inline-block;
                padding: 8px;
                color: white;
                background-color: #000;
                text-align: center;
                cursor: pointer;
                width: 100%;
                font-size: 18px;
            }

            a {
                text-decoration: none;
                font-size: 22px;
                color: black;
            }

            button:hover,
            a:hover {
                opacity: 0.7;
            }
        </style>
    </head>

    <body>
        <?php
        if (isset($_GET['id'])) {
            include 'config.php';
            // var_dump($_GET);
            // echo $_GET['id'];
            $sql = "SELECT user_id, user_name, user_email, user_gender, user_agree FROM users WHERE user_id=" . $_GET['id'];
            $query = mysqli_query($conn, $sql);
            $user=mysqli_fetch_assoc($query);
        }
        ?>
        <?php
        ?>
        <?php if ($user) { ?>
            <div class="card">
                <img src="<?php echo $user['user_gender']=='male' ? 'business-avatars-set\male.jpg':'business-avatars-set\female.jpg' ?>" alt="John" style="width:100%">
                <h1><?php echo $user['user_name'] ?></h1>
                <p class="title"><?php echo $user['user_email'] ?></p>
                <p>ID: <?php echo $user['user_id'] ?></p>
                <p>Gender: <?php echo $user['user_gender'] ?></p>
                <p>Accepted our terms</p>
                <a href="#"><i class="fa fa-dribbble"></i></a>
                <a href="#"><i class="fa fa-twitter"></i></a>
                <a href="#"><i class="fa fa-linkedin"></i></a>
                <a href="#"><i class="fa fa-facebook"></i></a>
                <p><button>Contact</button></p>
            </div>
        <?php } ?>

    </body>

    </html>