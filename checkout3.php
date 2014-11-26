<?php
//Set values for page
$page_title = "Checkout | Nicebox";

include 'includes/header.php';
?>

<?php require_once('config.php'); ?>

<div class="container padding-bottom-x3">
  <div class="centerColumn">
    <h1 class="centerText">Small Box</h1>
    <p class="centerText biggerText">You are purchasing the Small Box. Fill out the below form and hit that button.</p>

    <form action="pay3.php" name="form" class="form-field" id="form" method="POST">

      <div class="container">
        <div class="large12">
          <p><label for="email">Email:</label>
            <input class="bigText" type="email" id="email" placeholder="email@nicebox.co" name="email"/>
          </p>
        </div>
      </div>

      <div class="container">
        <div class="large12"><h5>Shipping Details</h5></div>
        <div class="large6">
          <p><label for="name">Recipents name:</label>
            <input class="bigText" type="text" id="name" placeholder="John Doe" name="name"/>
          </p>
        </div>
        <div class="large6">
          <p><label for="address">Address:</label>
            <input class="bigText" type="text" id="address" placeholder="43 Street Rd" name="address"/>
          </p>
        </div>
      </div>

      <div class="container">
        <div class="large6">
          <p><label for="city">City:</label>
            <input class="bigText" type="text" id="city" placeholder="Toronto" name="city"/>
          </p>
        </div>
        <div class="large6">
          <p><label for="postalCode">Postal Code:</label>
            <input class="bigText" type="text" id="postalCode" placeholder="A1A 1A1" name="postalCode"/>
          </p>
        </div>
      </div>

      <div class="container">
        <div class="large12">
          <p class="centerText bigText" id="errorMessage"></p>
          <p class="centerTextMobile">
            <a href="checkout10.php" class="nb-button bigButton noUnderline margin-small margin-xR fullButton">Upgrade to Medium Box</a>
            <a id="checkoutButton" class="nb-button bigDarkButton darkBlueButton noUnderline margin-small margin-xR fullButton" onClick="addCustomer();">Continue</a>
            <a id="customButton" class="hide nb-button bigDarkButton darkBlueButton noUnderline margin-small fullButton">Purchase ($3)</a>
          </p>
        </div>
      </div>

    </form>

  </div>
</div>


<script src='http://code.jquery.com/jquery-latest.min.js'></script>
<script src='//www.parsecdn.com/js/parse-1.3.1.min.js'></script>
<script>
  // Add Parse keys
  Parse.initialize(
  "7yVoqLQgw9OE8NKjUk8wqbGyctsIDGQ1ly7J9ull", "5pmFpMRz683J17nuquBWA3Sw6TBYy267CLYi5Q5o");

  // Check validate first
  function addCustomer() {
    if (!$('input:text').filter(function () {
        return $.trim(this.value) != ""
      }).length) {
        $("#errorMessage").html("Fill out the above form.");
        $("#errorMessage").addClass("activeError");
      } else{
        // Save customer when filled out
        saveCustomer();
        // Show purchase button
        $("#customButton").removeClass("hide");
        $("#checkoutButton").addClass("hide");
    }
  }

  // Save Customer
  function saveCustomer() {
    // Get values
    var email = this.$("#email").val();
    var name = this.$("#name").val();
    var address = this.$("#address").val();
    var city = this.$("#city").val();
    var postalCode = this.$("#postalCode").val();

    // Create customer
    var customerClass = Parse.Object.extend("customerClass");
    var customerObject = new customerClass();

    // Set values
    customerObject.set("email",email);
    customerObject.set("name",name);
    customerObject.set("address", address);
    customerObject.set("city", city);
    customerObject.set("postalCode", postalCode);

    // Save users
    customerObject.save();
  }
</script>


<?php include 'includes/footer.php'; ?>

<form action="pay3.php" method="POST" id="payment-form">
  <script src="https://checkout.stripe.com/checkout.js"></script>
  <script>
    // Global variable
    var email;

    // Check email on keyup
    $("#email").keyup(function(){
      // Get email and form
      var $form = $('#payment-form');
      var email = $("#email").val();
      // Append email to payment-form
      $form.append($('<input type="hidden" name="email" />').val(email));
    });


    var handler = StripeCheckout.configure({
      key: 'pk_test_VzJc4gJBR7SeNdBIZFN6xnNH',
      token: function(token) {
        var $form = $('#payment-form');
        // Use the token to create the charge with a server-side script.
        // You can access the token ID with `token.id`
        // Append and sumbit token in payment-form
        var token = token.id;
        $form.append($('<input type="hidden" name="stripeToken" />').val(token));
        $form.submit();
      }
    });


    $('#customButton').on('click', function(e) {
      var email = $("#email").val();
      // Open Checkout with further options
      handler.open({
        // load form with email already entered
        email: email,
        name: 'Nicebox',
        description: 'Small Box ($3.00)',
        amount: 300
      });
      e.preventDefault();
    });


    // Close Checkout on page navigation
    $(window).on('popstate', function() {
      handler.close();
    });

  </script>
</form>
