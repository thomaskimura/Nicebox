<?php
  //Set values for page
  $page_title = "Become A Member | Nicebox";

	include 'includes/header.php';
?>

	<div class="container padding-bottom-x3">
		<div class="centerColumn">
      <h1 class="centerText">Become a Member</h1>
			<p class="centerText biggerText">Register to keep track of your transactions.</p>

    <form name="form" class="form-field" id="form">

      <div class="row">
          <p><label for="email">Email:</label>
            <input class="bigText" type="email" id="email" placeholder="email@nicebox.co" name="email"/></p>
      </div>

      <div class="row">
        <div class="large6small12">
          <p><label for="password" id="checkPasswordMatch">Password:</label>
            <input 
            class="bigText" 
            type="password" 
            id="password" 
            placeholder="&#8226;&#8226;&#8226;&#8226;&#8226;&#8226;" 
            name="password"/>
          </p>
        </div>
        <div class="large6small12">
          <p><label for="confirm-password">Confrim Password:</label>
            <input 
            class="bigText" 
            type="password" 
            id="confirmPassword" 
            placeholder="&#8226;&#8226;&#8226;&#8226;&#8226;&#8226;" 
            name="confirmPassword" 
            onChange="checkPasswordMatch();"/>
          </p>
        </div>
      </div>

      <p>
        <a class="nb-button bigButton noUnderline" onClick="register();">Register</a>
      </p>

    </form>

    <p class="centerText bigText" id="errorMessage"></p>

		</div>
	</div>


<script src="http://code.jquery.com/jquery-latest.min.js"></script>
<script src="//www.parsecdn.com/js/parse-1.3.1.min.js"></script>

<script>
// Function to check password
function checkPasswordMatch() {
  var password = $("#password").val();
  var confirmPassword = $("#confirmPassword").val();

  if (password != confirmPassword){
    $("#checkPasswordMatch").html("Uh oh, passwords do not match.");
  }
  else{
    $("#checkPasswordMatch").html("WooHoo, passwords match.");}
}

// Check password on keyup
$(document).ready(function () {
   $("#confirmPassword").keyup(checkPasswordMatch);
});


// ----------------  //
// Add user to Parse //
// ----------------  //

// Add Parse keys
Parse.initialize(
"7yVoqLQgw9OE8NKjUk8wqbGyctsIDGQ1ly7J9ull", "5pmFpMRz683J17nuquBWA3Sw6TBYy267CLYi5Q5o");

function register() {
  var password = $("#password").val();
  var confirmPassword = $("#confirmPassword").val();

  if (password != confirmPassword){
    $("#checkPasswordMatch").html("Uh oh, passwords do not match.");
  }
  else{
    addUser();
  }
}

function addUser() {
  // Get values
  var email = this.$("#email").val();
  var password = this.$("#confirmPassword").val();

  // Create user
  var user = new Parse.User();

  // Set values
  user.set("username",email);
  user.set("password", password);
  user.set("email", email);

  // Save users
  user.signUp(null, {
    success: function(user) {
      // Hooray! Let them use the app now.
      window.open("index.php","_self");
    },
    error: function(user, error) {
      // Show the error message somewhere and let the user try again.
      console.log("Error: " + error.code + " " + error.message);
      $("#errorMessage").html(" " + error.message);
    }
  });
}


</script>

<?php include 'includes/footer.php'; ?>
