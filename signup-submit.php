<!-- shared meta data HTML -->
<?php include 'meta-data.html'; ?>

<body>
	<!-- shared banner HTML -->
	<div id="bannerarea">
		<?php include 'common_header.html';?>
	</div>
	
	<?php
    // define variables and set to empty values
	$name = $gender = $age = $personality = "";
	$fav_os = $age_min = $age_max = $current_data = "";
	$seek_male = $seek_female = "";
	$error = 0;

	//Check if the input file exists, 
	//if not, create and refresh the page capture data
	if(file_exists("data/singles.txt")){
		$data_file = "data/singles.txt";
	}else{
		$data_file = fopen("data/singles.txt", "w");
	}

	//check the request method and assign data from forms to local variable
	if ($_SERVER["REQUEST_METHOD"] == "POST") {

		//Validate if all forms has been filed completely and valid
		$validator = 0;

		if (isset($_POST["name"])) {
			$name = test_input($_POST["name"]);
			$validator++;
		}

		if (isset($_POST["gender"])) {
			$gender = test_input($_POST["gender"]);
			$validator++;
		}

		if (isset($_POST["age"])) {
			$age = test_input($_POST["age"]);
			$validator++;
		}

		if (isset($_POST["personality"])) {
			$personality = test_input($_POST["personality"]);
			$validator++;
		}

		if (isset($_POST["fav_os"])) {
			$fav_os = test_input($_POST["fav_os"]);
			$validator++;
		}

		if (isset($_POST["age_min"])) {
			$age_min = test_input($_POST["age_min"]);
			$validator++;
		}

		if (isset($_POST["age_max"])) {
			$age_max = test_input($_POST["age_max"]);
			$validator++;
		}

		if (isset($_POST["seek_male"])) {
			$seek_male = test_input($_POST["seek_male"]);
			$validator++;
		}

		if (isset($_POST["seek_female"])) {
			$seek_female = test_input($_POST["seek_female"]);
			$validator++;
		}

		//When all forms have been filled and valid,
		//or at least one form is filled
		//save all data to text file
		if($error == 0 && $validator >= 7){
			//format and save all info to current_data
			$current_data = $name.",".$gender.",".$age.",".$personality.",".$fav_os.",".$age_min.",".$age_max.",".$seek_male.$seek_female."\n";
			
			//Write all info to text file data_file
			//echo $current_data
			file_put_contents($data_file, $current_data, FILE_APPEND);
		}
	}

	//check if the user's name is registered
	function is_registered() {
		//Assign all info to $data
		$data = file_get_contents($data_file);

		//Break up inputted data using end-of-line character
		//assign all broken down data to array $lines
		$lines = explode("\n", $data);

		//this 'for' loop will look for the user
		for($i=0; $i < count($lines); $i++){
			$detail_info = explode(",", $lines[$i]);
			if(strcmp($name, $detail_info[0]) === 0){
				return true;
			}
		}
	}

	//Test function
	function test_input($data) {
		$data = trim($data);
		$data = stripslashes($data);
		$data = htmlspecialchars($data);
		return $data;
	}

	?>

	<!-- your HTML output follows -->
	<?php
	if($error == 1){
		echo "This name is been registered. Please login to find your matches";
	}else{
		?>
		<p class="greetings">Thank you!</p>
		<p>
			Welcome to NerdLuv,
			<?php
			echo " ".$name."!";
			?>
		</p>
		<?php
	}
	?>

	<p>Now <a href="matches.php">log in to see your matches!</a></p>

	<!-- shared page bottom HTML -->
	<div>
		<?php include 'common.php';?>
	</div>
</body>
</html>