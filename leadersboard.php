<?php 
session_start(); /*start session */

?>

<?php include 'common/common-meta-header.php'; ?>

<?php
// define variables and set to empty values
$username = $current_data = $save_str1 = "";
$users = array();
$score = 0;
$error = 0;

	//Check if the input file exists, 
if(file_exists("user_database/user_leaderboard.txt")){
	$data_file = "user_database/user_leaderboard.txt";
}

//***save current user's data to leadersboard.txt
if (isset($_POST['Submit'])) {
	$username = $_SESSION["user_name"];
	$score = $_SESSION["score"];
	$save_str1 = $username . "," . $score . "\n";
	file_put_contents($data_file, $save_str1, FILE_APPEND);
}

//***Save all user's data to "users" array and sort them
//Assign all info to $current_data
$current_data = file_get_contents($data_file);

//Break up inputted data using end-of-line character
//assign all broken down data to array $lines
$lines = explode("\n", $current_data);

	//this 'for' loop will look for the user
for($i=0; $i < count($lines); $i++){
	$detail_info = explode(",", $lines[$i]);
	/* $detail_info[0] = username
	$detail_info[1] = score */

	$users[$detail_info[0]] = $detail_info[1];
}

//sort "user" array in descending order
arsort($users);

?>

<!-- your HTML output follows -->
<!-- Display all users with their score -->
<div class="leadersboard_title">
	<h1>Leader's Board</h1>
</div>
<div class="input">
	<div class="info_box">
		<table id='customers'>
			<tr>
				<th>Rank</th>
				<th>Username</th>
				<th>Score</th>
			</tr>
			<?php
			$rank = 1; 
			foreach($users as $name => $value) {
				?>
				<tr>
					<td><?= $rank ?></td>
					<td><?= $name ?></td>
					<td><?= $value ?></td>
				</tr>
				<?php
				$rank++;
			}
			?>
		</table>

		<!--Information div-->
		<div>
			<!--Logout button-->
			<br/><br/>
			<form class="input logout_div" action="logout.php" method="POST" name="login_form">
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
<!-- shared page bottom HTML -->
<?php include 'common/common-footer.php'; ?>