<?php 
session_start(); /*start session */
?>

<?php include 'common/common-meta-header.php'; ?>
<div class="level_diff_title">
    <h1>Please choose your level of difficulty</h1>

    <p>
        This game will take you on a tour to a house full of mysteries <br/>
        Buckle up and discover what is hidden inside the house
    </p>
    
</div>
<div class="input">
    <div id="cf4" class="hover">
        <img  class="bottom shadow" src="images/Ta.jpg" alt="no images">
        <img  class="top shadow" src="images/fly.jpg" alt="no images">

    </div>
    <div class="info_box">
        <form class="input level_form" action="level1.php" method="POST" name="level_form">
            <fieldset>
                <legend>Difficulty Level:</legend>
                <table > <!-- This table will contain the fields for the form-->
                    <!--Difficulty label-->
                    <tr>
                        <td>
                            <label for="level"><strong>Difficulty:</strong></label>
                        </td>

                        <td >
                            <select name="difficulty"style="margin-top:15px;" >
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
        <!--Logout button-->
        <div>
            <form class="input logout_div" action="logout.php" method="POST" name="logout_form">
                <table>
                    <tr>
                        <td colspan="2" class="centered">
                            <input name="Submit" type="submit" class="submit-btn logout-button" value="Logout">
                        </td>
                    </tr>
                </table>
            </form>
        </div>
    </div>
    
</div>

<?php
//Set session variable
$_SESSION["score"] = 0;
$_SESSION["difficulty"] = 0;
?>

<!-- shared page bottom HTML -->
<?php include 'common/common-footer.php'; ?>