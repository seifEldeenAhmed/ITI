<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form</title>
    
</head>
<?php
if ($_GET['id']) {
    require_once 'config.php';
    $sql="SELECT user_id, user_name, user_email, user_gender, user_agree, user_class_details FROM users WHERE user_id=" .$_GET['id'];
    $query =mysqli_query($conn,$sql);
    $result=mysqli_fetch_assoc($query);
    require_once 'term_session.php';
}

?>
<body>
    <form action='form.php' method="post" style="padding: 10px;">
        <span style="color:red">* required field</span><br>
        <input type="hidden" name="id" value="<?php echo $result['user_id'] ?>">
        <label for="fname" >First name:</label><br>
        <input type="text" name="fname" required value="<?php echo $result['user_name']? $result['user_name']:''  ?>"><span name='span' style="color: red;" >* </span><br>
        <label for="email">Email:</label><br>
        <input type="text" id="email" name="email" required value="<?php echo $result['user_email']? $result['user_email']:''  ?>"><span name='span' style="color: red;" >* </span><br>
        <label for="groupNo">group #</label><br>
        <input type="number" id="groupNo" name="groupNo"><br>
        <label for="class detail">class details</label><br>
        <textarea name="class_detail"></textarea><br>
        <label for="email">Gender:</label><br>
        <input type="radio" name="gender" value="female"<?php echo $result['user_gender']=='female'&&$result['user_gender']? 'checked':''  ?>>Female
        <input type="radio" name="gender" value="male" <?php echo $result['user_gender']=='male'&&$result['user_gender']? 'checked':''  ?>>Male
        <span name='span' style="color: red;">* </span><br>
        <label for="courses">Selected Courses:</label>
        <select name="courses[]" id="courses" multiple>
            <option value="PHP">PHP</option>
            <option value="MySQL">MySQL</option>
            <option value="HTML">HTML</option>
            <option value=".NET">.NET</option>
        </select><br>
        <label for="agree">agree for the following terms</label>
        <input type="checkbox" name="agree" required <?php echo $result['user_agree']? 'checked':'' ?>><span name='span' style="color: red;" >* </span>
        <br>
        <input type="submit" value="update" name="update">
    </form>
    <!-- <a href="table.php"><button class="redirect">Show records</button></a> -->

</body>
</html>