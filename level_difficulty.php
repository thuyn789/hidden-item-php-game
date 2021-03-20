<?php 
session_start(); /*start session */
?>

<?php include 'common/common-meta-header.php'; ?>

<h1>Please choose your level of difficulty</h1>

<p>
    This game will take you on a tour to a house full of mysteries <br/>
    Buckle up and discover what is hidden inside the house
</p>

<div class="inputs">

    <form class="input" action="level1.php" method="POST" name="level_form">
        <fieldset>
            <legend>Difficulty Level:</legend>
            <table> <!-- This table will contain the fields for the form-->
                <!--Difficulty label-->
                <tr>
                    <td>
                        <label for="level">Difficulty:</label>
                    </td>

                    <td>
                        <select name="difficulty">
                            <option value="50">Easy (50 points)</option>
                            <option value="100">Normal (100 points)</option>
                            <option value="200">Hard (200 points)</option>
                        </select> <br/><br/>
                    </td>

                </tr>

                <!--Submit button row-->
                <tr>
                    <td colspan="2" class="centered">
                        <input name="submit" type="submit" class="submit-btn" value="Play Game">
                    </td>
                </tr>

            </table>
        </fieldset>
    </form>

</div>

<?php
//Set session variable
$_SESSION["username"] = $_COOKIE['username'];
$_SESSION["score"] = 0;
$_SESSION["difficulty"] = 0;
?>

<!--Logout button-->
<div>
    <form class="input" action="logout.php" method="POST" name="login_form">
        <table>
            <tr>
                <td colspan="2" class="centered">
                    <input name="Submit" type="submit" class="submit-btn" value="Logout">
                </td>
            </tr>
        </table>
    </form>
</div>

<?php include 'common/common-footer.php'; ?>