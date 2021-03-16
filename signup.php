<!-- shared meta data HTML -->
<?php include 'meta-data.html'; ?>

<body>
	<!-- shared banner HTML -->
	<div id="bannerarea">
		<?php include 'common_header.html';?>
	</div>

	<!-- your HTML output follows -->

	<form action="signup-submit.php" method="post" name="signup">
		<fieldset>
			<legend>New User Signup:</legend>
			
			<strong class="column">Name:</strong>
			<input type="text" name="name" size="16"/> <br/><br/>
			
			<strong class="column">Gender:</strong>
			<label><input type="radio" name="gender" value="M"/>Male</label>
			<label><input type="radio" name="gender" value="F" checked="checked"/>Female</label> <br/><br/>

			<strong class="column">Age:</strong>
			<input type="text" name="age" maxlength = "2" size="6"/> <br/><br/>
			
			<strong class="column">Personality Type:</strong>
			<input type="text" name="personality" maxlength = "4" size="6"/>
			<a href="http://www.humanmetrics.com/cgi-win/JTypes2.asp">
				Don't know your type?
			</a> <br/><br/>

			<strong class="column">Favorite OS:</strong>
			<select name="fav_os">
				<option>Windows</option>
				<option>Mac OS X</option>
				<option>Linux</option>
			</select> <br/><br/>
			
			<strong class="column">Seeking age:</strong>
			<input type="text" name="age_min" placeholder="min" maxlength = "2" size="6"/>
			to
			<input type="text" name="age_max" placeholder="max" maxlength = "2" size="6"/> <br/><br/>

			<strong class="column">Seek Gender(s):</strong>
			<input type="checkbox" id="seek_male" name="seek_male" value="M" checked="checked">
			<label for="seek_male"> Male</label>
			<input type="checkbox" id="seek_female" name="seek_female" value="F">
			<label for="seek_female"> Female</label><br/><br/>

			<input type="submit" value="Sign Up"/>
		</fieldset>
	</form>

	<!-- shared page bottom HTML -->
	<div>
		<?php include 'common.php';?>
	</div>
</body>
</html>