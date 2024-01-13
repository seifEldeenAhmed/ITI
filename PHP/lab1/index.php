<?php
// phpinfo();
/*-	Show your phpinfo on browser.

-   Use constant to display your website name which mustn’t change across your pages.

-   Show your server name, address and port.
    also the filename and path of the currently executing script.

-   Your brother is 10 years old, If you know that :
    age less than 5 --> Print Msg --> Stay at home,
    age equal 5 --> Print Msg --> Go to Kindergarden,
    age between 6 & 12 --> Print Msg --> Go to grade :XXX
    (Use switch case).*/
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP</title>
</head>
<body>
        <ul>
            <li>Server name <?php echo"$_SERVER[SERVER_NAME]"; ?></li>
            <li>Server address <?php echo"$_SERVER[SERVER_ADDR]"; ?></li>
            <li>Server port <?php echo"$_SERVER[SERVER_PORT]"; ?></li>
            <li><?php echo __FILE__; ?></li>
        </ul>
        <?php 
        define('BROTHERAGE',10);
        switch(BROTHERAGE){
            case BROTHERAGE <5:
                echo 'Stay at home';
                break;
            case BROTHERAGE ==5:
                echo 'Go to Kindergarden';
                break;
            case BROTHERAGE >6 and BROTHERAGE<12:
                echo 'Go to grade'." ".BROTHERAGE-6;
                break;
        }
        ?>
</body>
</html>