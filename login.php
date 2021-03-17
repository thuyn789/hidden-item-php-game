<?php session_start(); /*start session */

if(isset($_POST['Submit'])) {

    #$logins = array('Test' => '123456');
    $logins = array();


    $acc_file =  fopen("./text_files/accounts.txt","r");

    if($acc_file) {
        while (($line = fgets($acc_file))  !== false) {

            $info = explode(',', $line); #Separate each line
            /*
            $info[0] = username
            $info[1] = password
            */ 
            $logins[$info[0]] = $info[1]; #add credentials to associative array
        }
    }

    print_r($logins);


    /* Check and assign submitted Username and Password to new variable */
		$Username = isset($_POST['username']) ? $_POST['username'] : '';
		$Password = isset($_POST['password']) ? $_POST['password'] : '';
        print($Username . "," . $Password);
    
    #Check if credentials are in logins array
    if(array_key_exists($Username, $logins) && trim($logins[$Username]) == trim($Password)) {
        header("location:index.php");
		exit;
    } else {
        print("credentials not found in array<br>");
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