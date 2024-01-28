<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form</title>
</head>
<?php
$missing_name = $missing_email = $missing_gender= $missing_agree = '';
if (isset($_POST['submit'])) {
    print_r($_POST);
    if (empty($_POST['fname'])) {
        $missing_name = 'The Name is required';
    }
    if (empty($_POST['email'])) {
        $missing_email = 'The Email is required';
    }
    if (empty($_POST['gender'])) {
        $missing_gender = 'The Gender is required';
    }
    if(!isset($_POST['agree'])){
        $missing_agree = 'The Agreement is required';
    }
}
?>

<body>
    <form action='#' method="post">
        <span style="color:red">* required field</span><br>
        <label for="fname">First name:</label><br>
        <input type="text" name="fname" value="<?php echo !empty($_POST['fname'])? $_POST['fname']:''  ?>"><span name='span' style="color: red;">* <?php echo $missing_name ?></span><br>
        <label for="email">Email:</label><br>
        <input type="text" id="email" name="email" value="<?php echo !empty($_POST['email'])? $_POST['email']:''  ?>"><span name='span' style="color: red;">* <?php echo $missing_email ?></span><br>
        <label for="groupNo">group #</label><br>
        <input type="number" id="groupNo" name="groupNo" value="<?php echo !empty($_POST['groupNo'])? $_POST['groupNo']:''  ?>"><br>
        <label for="class detail">class details</label><br>
        <textarea name="class_detail"><?php echo !empty($_POST['class_detail'])? $_POST['class_detail']:''  ?></textarea><br>
        <label for="email">Gender:</label><br>
        <input type="radio" name="gender" value="female" <?php if(isset($_POST['gender'])&&$_POST['gender']=='female') echo 'checked' ?>>Female
        <input type="radio" name="gender" value="male" <?php if(isset($_POST['gender'])&&$_POST['gender']=='male') echo 'checked' ?>>Male
        <span name='span' style="color: red;">* <?php echo $missing_gender ?></span><br>
        <label for="courses">Selected Courses:</label>
        <select name="courses[]" id="courses" multiple>
            <option value="PHP">PHP</option>
            <option value="MySQL">MySQL</option>
            <option value="HTML">HTML</option>
            <option value=".NET">.NET</option>
        </select><br>
        <label for="agree">agree for the following terms</label>
        <input type="checkbox" name="agree"><span name='span' style="color: red;">* <?php echo $missing_agree ?></span><br>
        <input type="submit" value="submit" name="submit">

    </form>

    <?php
    if (!empty($_POST['fname'])) {
        echo "Your input name is " . $_POST['fname'] . "<br>";
    }
    if (!empty($_POST['email'])) {
        echo "Your input email is " . $_POST['email'] . "<br>";
    }
    if (!empty($_POST['class_detail'])) {
        echo "Your input class_detail is" . $_POST['class_detail'] . "<br>";
    }
    if (!empty($_POST['gender'])) {
        echo "Your input gender is " . $_POST['gender'] . "<br>";
    }
    if (!empty($_POST['courses'])) {
        echo "Your Courses are ";
        foreach ($_POST['courses'] as $selectedOption){
            echo $selectedOption . " & ";
        }
        echo "<br>";
    }
    ?>
</body>

</html>