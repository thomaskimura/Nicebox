<?php
	//Set values for page
	$page_title = "Welcome About | Nicebox";

	include 'includes/header.php';
?>


<div class="padding">
	<div class="container">

		<div class="centerColumn">
			<h1 class="centerText">Welcome Aboard</h1>
			<p class="centerText bigText">Thank's for signing up <span id="name"></span>! We look forward to a long and fruitful relationship <i class="twa twa-information-desk-person"></i>.</p>
			</p>
		</div>

	<div class="centerColumn">
		<p class="biggerText centerText">
			Are you ready? Pick a box and place an order. <i class="twa twa-point-down"></i>
		</p>
			<p class="centerText">
			<a href="checkout5.php" class="nb-button bigButton noUnderline margin-x fullButton margin-small">Small Box ($5)</a>
			<a href="checkout10.php" class="nb-button bigButton noUnderline margin-x fullButton margin-small">Medium Box ($10)</a>
			<a href="checkout20.php" class="nb-button bigButton noUnderline margin-x fullButton margin-small">Large Box ($20)</a>
		</p>
		<p class="centerText"><a onClick="logout();" href="">Logout</a></p>
	</div>

	</div>
</div>


<?php
include 'includes/footer.php';
?>

<script src="http://code.jquery.com/jquery-latest.min.js"></script>
<script src="//www.parsecdn.com/js/parse-1.3.1.min.js"></script>

<script>
// Add Parse keys
Parse.initialize(
	"7yVoqLQgw9OE8NKjUk8wqbGyctsIDGQ1ly7J9ull", "5pmFpMRz683J17nuquBWA3Sw6TBYy267CLYi5Q5o");

// Redirect if no user found
var currentUser = Parse.User.current();
if (currentUser) {}
	else {
		window.open('signin.php','_self');
	}

// Get and display username
var currentUser = Parse.User.current();
currentUser.fetch().then(function(fetchedUser) {
	var name = fetchedUser.getUsername();
	// Fill html with name
	$("#name").html(name);
});

// Function to logout user
function logout(){
	Parse.User.logOut();
	window.open('signin.php','_self');
}
</script>
