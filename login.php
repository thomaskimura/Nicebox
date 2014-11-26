<?php
  //Set values for page
  $page_title = "Become A Member | Nicebox";

	include 'includes/header.php';
?>

<div class="container padding-bottom-x3">
	<div class="centerColumn">
    <h1 class="centerText">Become a Member</h1>
		<p class="centerText biggerText">
      Register to keep track of your transactions and receive a email newsletter from us.
    </p>
    <p class="centerText">Already a member? <a href="signin.php">Login</a>.</p>

    <form name="form" class="form-field" id="form">

      <div class="container">
        <div class="large12">
          <p><label for="email">Email:</label>
          <input class="bigText" type="email" id="email" placeholder="email@nicebox.co" name="email"/></p>
        </div>
      </div>

      <div class="container">
        <div class="large6">
          <p><label for="password" id="checkPasswordMatch">Password:</label>
            <input
            class="bigText"
            type="password"
            id="password"
            placeholder="&#8226;&#8226;&#8226;&#8226;&#8226;&#8226;"
            name="password"/>
          </p>
        </div>

        <div class="large6">
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

      <div class="container">
        <div class="large1 smallShift1 centerText">
          </i><input type="checkbox" class="check" name="newsletter" id="checkNewsletter">
        </div>
        <div class="large5 small9">
          <p>I wish to receive an email newsletter. (We won't spam <i class="twa twa-joy"></i>.)</p>
        </div>
      </div>

      <div class="container">
        <div class="large1 smallShift1 centerText">
          <input type="checkbox" class="check" name="promos" id="checkPromo">
        </div>
        <div class="large5 small9">
          <p>I wish to receive promotional offers and sales.</p>
        </div>
      </div>

    <div class="container">
      <div class="large12">
          <p class="centerText bigText" id="errorMessage"></p>
          <a class="centerText nb-button bigButton noUnderline margin-small fullButton" onClick="register();">Register</a>
      </div>
    </div>

    </form>



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


// Add Parse keys
Parse.initialize(
"7yVoqLQgw9OE8NKjUk8wqbGyctsIDGQ1ly7J9ull", "5pmFpMRz683J17nuquBWA3Sw6TBYy267CLYi5Q5o");

// Register to parse function
function register() {
  // Get values
  var password = $("#password").val();
  var confirmPassword = $("#confirmPassword").val();

  // Register if passwords match
  if (password != confirmPassword){
    $("#checkPasswordMatch").html("Uh oh, passwords do not match.");
  }
  else{
    // Call addUser()
    addUser();
  }
}

// Add user function
function addUser() {
  // Get values
  var email = this.$("#email").val();
  var password = this.$("#confirmPassword").val();
  var newsletter = this.$("#checkNewsletter").is(':checked');
  var promo = this.$("#checkPromo").is(':checked');

  // Create user
  var user = new Parse.User();

  // Set values
  user.set("username",email);
  user.set("password", password);
  user.set("email", email);
  user.set("newsletter", newsletter);
  user.set("promo", promo);

  // Save users
  user.signUp(null, {
    success: function(user) {
      // Hooray! Let them use the app now.
      window.open('welcome.php','_self');
    },
    error: function(user, error) {
      // Show the error message somewhere and let the user try again.
      console.log("Error: " + error.code + " " + error.message);
      $("#errorMessage").html(" " + error.message);
      $("#errorMessage").addClass("activeError");
    }
  });
}
</script>

<?php include 'includes/footer.php'; ?>
