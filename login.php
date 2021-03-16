<?php session_start(); /*start session */

if(isset($_POST['Submit'])) {

    $logins = array('Test' => '123456');

    /* Check and assign submitted Username and Password to new variable */
		$Username = isset($_POST['username']) ? $_POST['username'] : '';
		$Password = isset($_POST['password']) ? $_POST['password'] : '';

    /* Check Username and Password existence in defined array */		
		if (isset($logins[$Username]) && $logins[$Username] == $Password){
			/* Success: Set session variables and redirect to Protected page  */
			$_SESSION['UserData']['Username']=$logins[$Username];
			header("location:index.php");
			exit;
        } else {
            $msg="Invalid Login Info";   
        }
}
?>

<!doctype html>
<html>
<head>
<title>
    Login page
</title>
<link rel="stylesheet" href="./style.css">
</head>
<body>
    Login Credentials go here.
    <h1 class="title">Log in!</h1>

    <div class="inputs">

        <form class="input" action="" method="POST" name="login_form">
            <fieldset>
            <table>
                <tr>
                    <td>
                        <label for="username">Username:</label>
                    </td>
                    <td>
                        <input name="username" type="text" size="16">
                    </td>
                </tr>

                <tr>
                    <td>
                        <label for="password">Password:</label>
                    </td>

                    <td>
                        <input name="password" type="text" size="16">
                    </td>

                </tr>

                <tr>
                    <td colspan="2" class="centered">
                        <input name="Submit" type="submit" class="submit-btn">
                    </td>

                </tr>

                <tr>
                    <td colspan="2" class="centered">
                        <a href="./signup.php"> Don't have an account? Sign up!</a>
                    </td>

                </tr>


            </table>
            </fieldset>
        </form>

    </div>
   
</body>
</html>