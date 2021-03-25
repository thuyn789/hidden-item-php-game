<?php session_start(); #start session?>

<?php include 'common/common-meta-header.php'; ?>

<div class="container">
    <div class="icon">
        <img src="images/Signup.jpg">
    </div>

    <div class="input-div">
        <form class="input" action="signup-submit.php" method="POST" name="signup_form">
            <fieldset>
                <table>
                    <!--Username row-->
                    <tr>
                        <td>
                            <label for="username">Username:</label>
                        </td>

                        <td>
                            <input name="username" type="text" size="16" placeholder="Username">
                        </td>
                    </tr>

                    <!--Email row-->
                    <tr>
                        <td>
                            <label for="email">Email:</label>
                        </td>

                        <td>
                            <input name="email" type="text" size="16" placeholder="Email">
                        </td>
                    </tr>

                    <!--Password row-->
                    <tr>
                        <td>
                            <label for="password">Password:</label>
                        </td>

                        <td>
                            <input type="password" name="password" type="text" size="16" placeholder="Password">
                        </td>

                    </tr>

                    <!--Confirm password row-->
                    <tr>
                        <td>
                            <label for="confirm_password">Confirm Password:</label>
                        </td>

                        <td>
                            <input type="password" id="confirm_password" name="confirm_password" type="text" size="16" placeholder="Confirm Password">
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
                            <a href="index.php">Already Registered? Login In</a>
                        </td>
                    </tr>
                </table>
            </fieldset>
        </form>
    </div>
</div>

<?php include 'common/common-footer.php'; ?>