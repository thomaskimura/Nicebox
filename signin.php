<?php
	//Set values for page
	$page_title = "Become A Member | Nicebox";

	include 'includes/header.php';
?>

<div class="container padding-bottom-x3">
	<div class="centerColumn">
		<h1 class="centerText">Login</h1>

		<form name="form" class="form-field" id="form">

			<div class="container">
				<div class="large12">
					<p><label for="email">Email:</label>
					<input class="bigText" type="email" id="email" placeholder="email@nicebox.co" name="email"/></p>
				</div>
			</div>

			<div class="container">
				<div class="large12">
					<p><label for="password" id="checkPasswordMatch">Password:</label>
						<input
						class="bigText"
						type="password"
						id="password"
						placeholder="&#8226;&#8226;&#8226;&#8226;&#8226;&#8226;"
						name="password"/>
					</p>
				</div>
			</div>

		<div class="container">
			<div class="large12">
					<p class="centerText bigText" id="errorMessage"></p>
					<a class="centerText nb-button bigButton noUnderline margin-small fullButton" onClick="signin();">Signin</a>
					<p class="centerText bigText" id="errorMessage"></p>
					<p class="centerText">Not a member? <a href="login.php">Signup</a>.</p>
			</div>
		</div>

		</form>



		</div>
	</div>




<?php include 'includes/footer.php'; ?>

<script src='http://code.jquery.com/jquery-latest.min.js'></script>
<script src='//www.parsecdn.com/js/parse-1.3.1.min.js'></script>

<script>
// Add Parse keys
Parse.initialize(
	'7yVoqLQgw9OE8NKjUk8wqbGyctsIDGQ1ly7J9ull', '5pmFpMRz683J17nuquBWA3Sw6TBYy267CLYi5Q5o');

// Check current user
var currentUser = Parse.User.current();
if (currentUser) {
	// Redirect if logged in
	window.open('welcome.php','_self');
} else {
	// Do something if not logged in
}

// Signin the user
function signin(){
	// Get values
	var email = this.$('#email').val();
	var password = this.$('#password').val();

	// Log the user in
	Parse.User.logIn(email, password, {
		success: function(user) {
			// Do stuff after successful login
			// Set the current user
			Parse.User.become('session-token-here').then(function (user) {}, function (error) {});
			window.open('welcome.php','_self');
		},
		error: function(user, error) {
			// The login failed. Check error to see why.
			// Display error message in console, and on screen
			console.log("Error: " + error.code + " " + error.message);
			$("#errorMessage").html(" " + error.message);
			$("#errorMessage").addClass("activeError");
		}
	});
}

</script>
