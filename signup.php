<?php
    session_start(); #start session

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
        <form class="input" action="./signup-submit.php" method="POST" name="signup_form">
            <fieldset>
                <table>
                    <!--Username row-->
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