<?php session_start(); #start session?>

<?php include 'common/common-meta-header.php'; ?>


<?php 
//Check if user get to this page legitimately by going through signup.php
if(isset($_POST["submit"])){
    if(strcmp($_REQUEST['password'], $_REQUEST['confirm_password']) !== 0) { #if the passwords don't match, go back to signup page
    echo "<p class='error'>Sorry, the passwords did not match. Please try again</p>";
    echo "<a href='signup.php'>Return to Sign up </a>";
    } else { #otherwise, create save_string and save to user_account.txt file
        $name = $email = $pass = $save_str1 = "";

            //Check if the input file exists, 
            //if not, create and refresh the page capture data
        if(file_exists("user_database/user_account.txt")){
            $data_file = "user_database/user_account.txt";
        }else{
            $data_file = fopen("user_database/user_account.txt", "w");
        }

        $name = $_REQUEST['username'];
        $email = $_REQUEST['email'];
        $pass = $_REQUEST['password'];

        //
        if(is_registered($data_file, $name)){
            echo "You already registered. <br/>";
            echo "<a href='./index.php'>Please login here </a>";
        }else{
           echo "<a href='./index.php'>Return to login </a>";
           $save_str1 = $name . "," . $email. "," . $pass . "\n";
           file_put_contents($data_file, $save_str1, FILE_APPEND);

            $_SESSION['username'] = $name; #create session variable for username
            $_SESSION['score'] = 0; #initialize user's score for current session 
        }
    }
}else{
    //If user gets here by typing the URL
    //send them back to sign up page
    header("location: signup.php");
}

//This function is to check if the user's name is registered
function is_registered($file, $user_name) {
    //Assign all info to $data
    $data = file_get_contents($file);

    //Break up inputted data using end-of-line character
    //assign all broken down data to array $lines
    $lines = explode("\n", $data);

        //this 'for' loop will look for the user
    for($i=0; $i < count($lines); $i++){
        $detail_info = explode(",", $lines[$i]);
        if(strcmp($user_name, $detail_info[0]) === 0){
            return true;
        }
    }
}
?>

    <!--
    <p>Thank you <?php  $_REQUEST['username']?>!</p>
    <a href='./login.php'>Return to login</a>
-->

<?php include 'common/common-footer.php'; ?>