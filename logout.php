<?php session_start(); #start session?>

<?php include 'common/common-meta-header.php'; ?>
<div class="logout-title">
	<h3>Thank you for playing our game.</h3> <br/>

	<p>You can now safely close the window.</p>
</div>
<?php
    session_unset(); //Remove all session variables
    session_destroy(); //Destroy the session
    setcookie("username", "", time() - 3600, "/");
    setcookie("score", 0, time() - 3600, "/");//set score
?>

<?php include 'common/common-footer.php'; ?>