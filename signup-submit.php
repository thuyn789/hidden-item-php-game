<?php 
    session_start(); #start session
?>

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
        if(strcmp($_REQUEST['password'], $_REQUEST['confirm_password']) != 0) { #if the passwords don't match, go back to signup page
            echo "<p class='error'>Sorry, the passwords did not match. Please try again</p>";
            echo "<a href='./signup.php'>Return to Sign up </a>";
        } else { #otherwise, create save_string and save to accounts.txt file
            $name = $_REQUEST['username'];
            $pass = $_REQUEST['password'];

            echo "<a href='./login.php'>Return to login </a>";
            $save_str1 = $name . "," . $pass . "\n";
            file_put_contents("./text_files/accounts.txt", $save_str1, FILE_APPEND);
        
            $_SESSION['username'] = $name; #create session variable for username
            
        
        }

    
    ?>



    <!--
    <p>Thank you <?php  $_REQUEST['username']?>!</p>
    <a href='./login.php'>Return to login</a>
    -->

</body>
</html>