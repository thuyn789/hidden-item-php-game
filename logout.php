<?php 
    session_start(); #start session


?>

<html>
<head>
<title>
    Logout Page
</title>
    <link rel="stylesheet" href="./style.css">
</head>
<body>
    Thank you for playing our game.<br><br>

    You can now safely close the window.

    <?php
        session_unset(); #Remove all session variables

        session_destroy(); #Destroy the session
    
    ?>
</body>
</html>