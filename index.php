<?php 
session_start(); /*start session */

    if(isset($_COOKIE['username'])) { #if the cookie is set we use it for fill_username
        $fill_username = $_COOKIE['username'];

    } else {
        if(isset($_SESSION['username'])) { #if the cookie isn't set, then we use the session variable 
        $fill_username = $_SESSION['username'];
    } else {
            $fill_username = ""; #if neither are set, fill_username becomes an empty string
        }

    }

    if(isset($_POST['Submit'])) {

        #$logins = array('Test' => '123456');
        $logins = array(); #holds login info

        $acc_file =  fopen("user_database/user_account.txt","r"); #open file containing account information

        /*Read through file line by line and build associative array with the contents */
        if($acc_file) { 
            while (($line = fgets($acc_file))  !== false) {

                $info = explode(',', $line); #Separate each line
                /*
                $info[0] = username
                $info[1] = password
                */ 
                $logins[$info[0]] = $info[2]; #add credentials to associative array
            }
        }

        /* Check and assign submitted Username and Password to new variable */
        $Username = isset($_POST['username']) ? $_POST['username'] : '';
        $Password = isset($_POST['password']) ? $_POST['password'] : '';
        

    #Check if credentials are in logins array
    if(array_key_exists($Username, $logins) && trim($logins[$Username]) == trim($Password)) { #Credentials are found
        if($_POST['remember_me'] == true) { #if Remember me is set to true, set it.
            $cookie_name = "username";
            $cookie_value = $Username;
            setcookie($cookie_name, $cookie_value, time() + (86400 * 30), "/"); #86400 = 1 day
        } else {
            if(isset($_COOKIE['username'])) { #if the cookie is set and remember me is false, then destroy the cookie
                setcookie("username", $Username, time() - 3600, "/");
            }
        }
        //save username to session variable for leader's board
        $_SESSION['user_name'] = $Username; 
        header("location:level_difficulty.php"); #goto index.php
		exit(); #end php script
    } else {
        print("credentials not found in array<br>");
    }
}
?>

<?php include 'common/common-meta-header.php'; ?>

<div class="icon">
    <img src="images/login.jpg">
</div>

<div class="input-div">

    <form class="input" action="" method="POST" name="login_form">
        <fieldset>
            <table> <!-- This table will contain the fields for the form-->

                <!--Username label & textfield row-->
                <tr> 
                    <td>
                        <label for="username">Username:</label>
                    </td>
                    <td>
                        <input name="username" type="text" size="16" value="<?php echo htmlentities($fill_username) ?>">
                    </td>
                </tr>

                <!--Password label & textfield row-->
                <tr>
                    <td>
                        <label for="password">Password:</label>
                    </td>

                    <td>
                        <input type="password" name="password" type="text" size="16">
                    </td>

                </tr>

                <!--Remember me checkbox row-->
                <tr>
                    <td>
                        <input name="remember_me" id="remember_me" type="checkbox" value="true">
                        <label for="remember_me">Remember Me</label>
                    </td>
                </tr>

                <!--Submit button row-->
                <tr>
                    <td colspan="2" class="centered">
                        <input name="Submit" type="submit" class="submit-btn" value="Login">
                    </td>

                </tr>

                <!--Goto signup page row-->
                <tr>
                    <td colspan="2" class="centered">
                        <a href="./signup.php"> Don't have an account? Sign up!</a>
                    </td>

                </tr>
            </table>
        </fieldset>
    </form>

</div>

<!-- shared page bottom HTML -->
<?php include 'common/common-footer.php'; ?>