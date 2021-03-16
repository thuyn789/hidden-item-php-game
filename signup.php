<?php session_start(); /*start session */
    if(isset($_POST['submit'])) {
        //Check if password and confirm_password are the same.
        /* Check and assign submitted Username and Password to new variable 
		$username = isset($_POST['username']) ? $_POST['username'] : '';
		$password = isset($_POST['password']) ? $_POST['password'] : '';
        $confirm_password = isset($_Post['confirm_password']) ? $_POST['confirm_passowrd'] : '';
        */
        $username = $_REQUEST['username'];
        $password = $_REQUEST['password'];
        $confirm_password = $_REQUEST['confirm_password'];



        if(strcmp($password, $confirm_password) !== 0) {   
            $str = nl2br($password . "," . $confirm_password);
            print($str);


        } else {
            $write_str = nl2br($username . "," . $password . "\n");
            file_put_contents("./text_files/accounts.txt", $write_str, FILE_APPEND);
            echo "Thank you for signing up!";
        }
    }



?>


<!doctype html>
<html lang="en">
<head>
<title>
    Sign Up Page
</title>
<link rel="stylesheet" href="./style.css">
</head>
<body>
Sign up page goes here

    <h1 class="title">Sign up!</h1>

    <div class="inputs">
        <form class="input" action="" method="POST" name="signup_form">
            <fieldset>
                <table>
                    <!--Username-->
                    <tr>
                        <td>
                            <label for="username">Username:</label>
                        </td>

                        <td>
                            <input name="username" type="text" size="16">
                        </td>
                    </tr>

                    <!--Password row-->
                    <tr>
                        <td>
                            <label for="password">Password:</label>
                        </td>
    
                        <td>
                            <input name="password" type="text" size="16">
                        </td>
    
                    </tr>


                    <!--Confirm password row-->
                    <tr>
                        <td>
                            <label for="confirm_password">Confirm Password:</label>
                        </td>
    
                        <td>
                            <input id="confirm_password" name="confirm_password" type="text" size="16">
                        </td>
                    </tr>

                    <!--Submit row-->
                    <tr>
                        <td colspan="2" class="centered">
                            <input id="submit-btn" class="submit-btn" name="submit" type="submit" value="Sign up!">
                        </td>

                    </tr>
                    
                    <!--Go to login-->
                    <tr>
                        <td colspan="2" class="centered" align="center">
                            <a href="login.php">Login in</a>
                        </td>
                    </tr>
                </table>



            </fieldset>

        </form>
    </div>


</body>
</html>