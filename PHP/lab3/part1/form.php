<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form</title>
    <style>
        
    table {
        border-collapse: collapse;
        width: 100%;
    }

    th, td {
        border: 1px solid #dddddd;
        text-align: left;
        padding: 8px;
    }
    </style>
</head>

<body>
    
    <?php
    if (!empty($_POST['fname'])&&!empty($_POST['email'])
    &&!empty($_POST['gender'])&&isset($_POST['agree'])) {
        require_once 'config.php';
       $u_name=$_POST['fname'];
       $u_email=$_POST['email'];
       $u_gender=$_POST['gender'];
       $u_agree=1;
        
       $insert_to_table="INSERT INTO `users`(`user_name`, `user_email`,
       `user_gender`,`user_agree`) 
       VALUES('$u_name','$u_email','$u_gender','$u_agree')
       ";
       if (!mysqli_query($conn, $insert_to_table)) {
        
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
      }
      else{
        header("location: ". $_SERVER['PHP_SELF']);
    }
    }
    // unset($_POST);
    echo '<a href="form.html"><button>Add new user</button></a>';
    include_once 'config.php';
    $sql = "SELECT * FROM users";
    $result = mysqli_query($conn, $sql);
    echo '<table>';
    echo '<tr>';
    echo '<th>#</th>';
    echo '<th>Name</th>';
    echo '<th>Email</th>';
    echo '<th>Gender</th>';
    echo '<th>Acceptance</th>';
    echo '<th>Action</th>';
    echo '</tr>';
    if (mysqli_num_rows($result) > 0) {
        // output data of each row
        while($row = mysqli_fetch_assoc($result)) {
          echo '<tr>';
          foreach ($row as $key => $value) {
            echo '<td>';
            echo "$row[$key]";
            echo '</td>';
          }
          echo '</tr>'; 
        }
    }
    echo '</table>';
    include_once 'term_session.php';

    
    ?>
</body>

</html>