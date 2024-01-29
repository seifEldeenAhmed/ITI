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

    th,
    td {
      border: 1px solid #dddddd;
      text-align: left;
      padding: 8px;
    }
    button{
      /* padding :6px; */
      margin: 10px;
    }
  </style>
</head>

<body>
  <?php
  if (isset($_POST['delete'])) {
    include_once 'config.php';
    print_r($_POST);
    $id_to_delete=$_POST['id_to_delete'];
    $sql = "DELETE FROM users WHERE user_id=$id_to_delete";
    $query = mysqli_query($conn, $sql);
    if (mysqli_query($conn, $sql)) {
      header("location:form.php");
    } else {
      echo 'this user is not found' . mysqli_error($conn);
    }
  }
  ?>
  <?php
  if (isset($_POST['update'])) {
    include_once 'config.php';
    print_r($_POST);
    $u_name = $_POST['fname'];
    $u_email = $_POST['email'];
    $u_gender = $_POST['gender'];
    $u_agree = 1;
    $u_id=$_POST['id'];
    $sql = "UPDATE `users` SET 
            `user_name`='$u_name',
            `user_email`='$u_email',
            `user_gender`='$u_gender',
            `user_email`='$u_email'
     WHERE `user_id`=$u_id";
    $query = mysqli_query($conn, $sql);
    if (mysqli_query($conn, $sql)) {
      header("location:form.php");
      exit();
    } else {
      echo 'this user is not found' . mysqli_error($conn);
    }
  }
  ?>
  <?php
  if (
    !empty($_POST['fname']) && !empty($_POST['email'])
    && !empty($_POST['gender']) && isset($_POST['agree'])
  ) {
    require_once 'config.php';
    $u_name = $_POST['fname'];
    $u_email = $_POST['email'];
    $u_gender = $_POST['gender'];
    $u_agree = 1;

    $insert_to_table = "INSERT INTO `users`(`user_name`, `user_email`,
       `user_gender`,`user_agree`) 
       VALUES('$u_name','$u_email','$u_gender','$u_agree')
       ";
    if (!mysqli_query($conn, $insert_to_table)) {

      echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    } else {
      header("location: " . $_SERVER['PHP_SELF']);
    }
  }
  // unset($_POST);
  echo '<a href="form.html"><button>Add new user</button></a>';
  include_once 'config.php';
  $sql = "SELECT user_id, user_name, user_email, user_gender, user_agree FROM users";
  $result = mysqli_query($conn, $sql);
  ?>

  <table>
    <tr>
      <th>#</th>
      <th>Name</th>
      <th>Email</th>
      <th>Gender</th>
      <th>Acceptance</th>
      <th>Action</th>
    </tr>


    <?php
    if (mysqli_num_rows($result)) {
      while ($row = mysqli_fetch_assoc($result)) { ?>
        <tr>
          <?php foreach ($row as $key => $value) { ?>
            <td>
              <?php echo $row[$key]; ?>
            </td>
          <?php } ?>
          <td style="display: flex; justify-content:center; align-items: center; flex-direction:column">
            <a href="user.php?id=<?php echo $row['user_id'] ?>">
              <button>View</button>
            </a>
            <form action="form.php" method="POST">
              <input type="hidden" name="id_to_delete" value="<?php echo $row['user_id'] ?>">
              <input type="submit" name="delete" value="Delete">
            </form>
            <a href="update.php?id=<?php echo $row['user_id'] ?>">
              <button>Update</button>
            </a>
          </td>
        </tr>

      <?php } ?>
    <?php } ?>
  </table>


</body>

</html>