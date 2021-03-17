<html>
<head>
<title>
    Signup-Submit
</title>
<link rel="stylesheet" href="./style.css">
</head>
<body>
    Sign-up submit goes here<br>
    <?php 
        if(strcmp($_REQUEST['password'], $_REQUEST['confirm_password']) != 0) {
            echo "<p class='error'>Sorry, the passwords did not match. Please try again</p>";
            echo "<a href='./signup.php'>Return to Sign up </a>";
        } else {
            $name = $_REQUEST['username'];
            $pass = $_REQUEST['password'];
            $str = nl2br("Thank you " . $name . "\n");
            
            echo $str;
            echo "<a href='./login.php'>Return to login </a>";
            $save_str1 = $name . "," . $pass . "\n";
            file_put_contents("./text_files/accounts.txt", $save_str1, FILE_APPEND);
        }

    
    ?>



    <!--
    <p>Thank you <?php  $_REQUEST['username']?>!</p>
    <a href='./login.php'>Return to login</a>
    -->

</body>
</html>