<?php
require_once('config.php');

$token  = $_POST['stripeToken'];
$email  = $_POST['email'];

$customer = Stripe_Customer::create(array(
	'email' => $email,
	'card'  => $token
));

$charge = Stripe_Charge::create(array(
	'customer' => $customer->id,
	'amount'   => 300,
	'currency' => 'cad'
));
?>

<?php
//Set values for page
$page_title = "Payment Complete | Nicebox";

include 'includes/header.php';
?>

<div class="container padding-bottom-x3">
	<div class="centerColumn">
		<div class="svg-container">
			<center>
				<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" id="Layer_1" x="0" y="0" width="717" viewBox="0 0 717 400" enable-background="new 0 0 717 400" xml:space="preserve"><style type="text/css">
				.st0{fill:#6EA1E0;stroke:#3B6EAD;stroke-width:5;stroke-miterlimit:10;}
				.st1{fill:#E0E6EC;}
				.st2{fill:#4A8AD8;}
				.st3{fill:#E9EDF2;}
				.st4{fill:#EDC8B3;}
				.st5{fill:none;stroke:#F0D1C0;stroke-width:5;stroke-linecap:round;stroke-miterlimit:10;}
				.st6{fill:#3B6EAD;stroke:#355581;stroke-width:5;stroke-miterlimit:10;}
				.st7{fill:none;stroke:#E9EDF2;stroke-width:5;stroke-linecap:round;stroke-miterlimit:10;}
				.st8{fill:#F0D1C0;}
				.st9{fill:none;stroke:#3B6EAD;stroke-width:5;stroke-linecap:round;stroke-miterlimit:10;}
				.st10{fill:#2A4468;}
				.st11{fill:none;stroke:#40669A;stroke-width:5;stroke-linecap:round;stroke-miterlimit:10;}
				.st12{fill:none;stroke:#6EA1E0;stroke-width:5;stroke-linecap:round;stroke-miterlimit:10;}
				.st13{fill:#355581;}
				.st14{opacity:0.2;fill:#3B6EAD;}
				.st15{fill:#6EA1E0;}
				.st16{fill:#3B6EAD;}
				.st17{fill:none;stroke:#3B6EAD;stroke-width:5;stroke-miterlimit:10;}
				.st18{fill:#40669A;}
				</style><g class="floating" id="Box"><path class="st15" d="M326.4 189.4c-12-6.8-25.4-5.8-30 2.3 -4.6 8.1 1.4 20.2 13.4 27s28.1 1.1 30-2.3C342 212.4 338.4 196.2 326.4 189.4zM328.3 209.5c-0.7 0.6-3.8 1.9-7.6 1.9 -2.3 0-4.4-0.5-6.2-1.5 -2.8-1.6-5.2-3.9-6.4-6.4 -0.6-1.2-1.5-3.6-0.3-5.6 0.9-1.7 3.1-2.6 5.9-2.6 2.5 0 5.3 0.8 7.9 2.2C327.1 200.8 328.6 208 328.3 209.5z"/><path class="st16" d="M327.6 187.2c-5.5-3.1-11.6-4.8-17.2-4.8 -7.4 0-13.4 2.9-16.3 8.1 -5.3 9.3 1.2 22.2 14.3 29.7 4.1 2.3 8.9 2.8 14.2 2.8 0 0 0 0 0 0 8.2 0 17.2-2.5 19.3-6.1C345.1 211.4 340.5 194.5 327.6 187.2zM337.6 214.4c-0.8 1.2-7.1 3.6-14.9 3.6h0c-4.4 0-8.4-0.3-11.7-2.2 -10.6-6-16.3-16.5-12.5-23.2 2-3.5 6.3-5.4 11.9-5.4 4.7 0 10 1.2 14.7 3.9C336.2 197.4 339.1 211.9 337.6 214.4z"/><path class="st15" d="M377.2 216.4c1.9 3.4 18 9.1 30 2.3 12-6.8 18-18.9 13.4-27 -4.6-8.1-18-9.1-30-2.3C378.6 196.2 375 212.5 377.2 216.4zM395.5 197.6c2.6-1.4 5.3-2.2 7.9-2.2 2.8 0 4.9 1 5.9 2.6 1.1 2 0.3 4.4-0.3 5.6 -1.2 2.4-3.5 4.8-6.4 6.4 -1.7 1-3.8 1.5-6.2 1.5 -3.8 0-6.9-1.3-7.6-1.9C388.4 208 389.9 200.8 395.5 197.6z"/><path class="st16" d="M375 216.9c2 3.6 11 6.1 19.3 6.1 0 0 0 0 0 0 5.3 0 10.1-0.5 14.2-2.8 13.2-7.5 19.6-20.7 14.3-30 -2.9-5.1-8.8-7.9-16.3-7.9 -5.6 0-11.7 1.5-17.2 4.6C376.5 194.1 371.9 211.4 375 216.9zM391.8 191.5c4.7-2.7 10-4.2 14.7-4.2 5.6 0 9.9 2 11.9 5.5 3.8 6.8-1.9 16.9-12.5 22.9 -3.3 1.9-7.3 2.2-11.7 2.2 0 0 0 0 0 0 -7.8 0-14.1-2.3-14.9-3.6C377.9 211.9 380.8 197.8 391.8 191.5z"/><path class="st0" d="M374.8 219.3c-5.1 5.8-26.6 5.3-32.3 0 -2.9-2.6-2.9-12.3 0-14.9 5.7-5.3 27.2-5.8 32.3 0C377.3 207.3 377.3 216.4 374.8 219.3z"/><path class="st2" d="M435.5 217.7c0-2.6-2.1-4.7-4.7-4.7H286.2c-2.6 0-4.7 2.1-4.7 4.7v144.7c0 2.6 2.1 4.7 4.7 4.7h144.7c2.6 0 4.7-2.1 4.7-4.7V217.7z"/><circle class="st13" cx="392" cy="290.9" r="5.4"/><circle class="st13" cx="325" cy="290.9" r="5.4"/><rect x="341" y="245.5" class="st0" width="35" height="122"/><rect x="341" y="214.5" class="st0" width="35" height="31"/><line class="st17" x1="434.5" y1="245.5" x2="281.5" y2="245.5"/><path class="st17" d="M435 218.2c0-2.6-2.1-4.7-4.7-4.7H285.7c-2.6 0-4.7 2.1-4.7 4.7v144.7c0 2.6 2.1 4.7 4.7 4.7h144.7c2.6 0 4.7-2.1 4.7-4.7V218.2z"/><circle class="st15" cx="397.6" cy="309.3" r="7.3"/><circle class="st15" cx="319.4" cy="309.3" r="7.3"/><rect x="281.5" y="247" class="st14" width="154" height="9"/><path class="st6" d="M375.9 303.7c0 9.6-7.8 17.4-17.4 17.4 -9.6 0-17.4-7.8-17.4-17.4h17.4H375.9z"/></g><rect id="Diamond3" x="484.5" y="146" class="st8 fade4" width="13" height="13"/><rect id="Diamond2" x="403.5" y="79" class="st18 fade3" width="13" height="13"/><rect id="Diamond1" x="170.5" y="197" class="st15 fade4" width="13" height="13"/><circle id="Circle8" class="st3 fade5" cx="629" cy="147.8" r="5"/><circle id="Circle7" class="st16 fade4" cx="464" cy="38.8" r="5"/><circle id="Circle6" class="st15 fade2" cx="398" cy="29.2" r="9.5"/><circle id="Circle5" class="st10 fade3" cx="365" cy="166.8" r="5"/><circle id="Circle4" class="st4 fade4" cx="270" cy="179.8" r="5"/><circle id="Circle3" class="st10 fade3" cx="256" cy="33.8" r="5"/><circle id="Circle2" class="st1 fade3" cx="235" cy="135.2" r="9.5"/><circle id="Circle1" class="st18 fade5" cx="65" cy="108.8" r="5"/><g class="fade5" id="X3"><line class="st12" x1="608.3" y1="92.7" x2="601.2" y2="99.7"/><line class="st12" x1="608.3" y1="99.7" x2="601.2" y2="92.7"/></g><g class="fade2" id="X2"><line class="st7" x1="403.9" y1="135.7" x2="396.9" y2="142.7"/><line class="st7" x1="403.9" y1="142.7" x2="396.9" y2="135.7"/></g><g class="fade3" id="X1"><line class="st5" x1="169.9" y1="96.6" x2="162.9" y2="103.7"/><line class="st5" x1="169.9" y1="103.7" x2="162.9" y2="96.6"/></g><g class="fade4" id="Cross3"><line class="st11" x1="546.9" y1="230" x2="536.9" y2="230"/><line class="st11" x1="541.9" y1="235" x2="541.9" y2="225"/></g><g class="fade3" id="Cross2"><line class="st9" x1="513.4" y1="95.2" x2="503.4" y2="95.2"/><line class="st9" x1="508.4" y1="100.2" x2="508.4" y2="90.2"/></g><g class="fade5" id="Cross1"><line class="st12" x1="305.4" y1="107.8" x2="305.4" y2="117.8"/><line class="st12" x1="310.4" y1="112.8" x2="300.4" y2="112.8"/></g></svg>
			</center>
		</div>

		<p class="centerText biggerText"><?php echo 'Successfully charged $3.00!'; ?></p>


	</div>
</div>

<?php include 'includes/footer.php'; ?>
