<?php
use Phppot\Member;
if (! empty($_POST["signup-btn"])) {
    require_once './Model/Customer.php';
    $member = new Member();
    $registrationResponse = $member->registerMember();
}
?>
<HTML>
<HEAD>
<TITLE>Customer Registration</TITLE>
<link href="assets/css/phppot-style.css" type="text/css"
	rel="stylesheet" />
<link href="assets/css/customer-registration.css" type="text/css"
	rel="stylesheet" />
<script src="vendor/jquery/jquery-3.3.1.js" type="text/javascript"></script>
</HEAD>
<BODY>
	<div class="phppot-container">
		<div class="sign-up-container">
			<div class="login-signup">
				<a href="index.php">Login</a>
			</div>
			<div class="">
				<form name="sign-up" action="" method="post"
					onsubmit="return signupValidation()">
					<div class="signup-heading">Registration</div>
				<?php
    if (! empty($registrationResponse["status"])) {
        ?>
                    <?php
        if ($registrationResponse["status"] == "error") {
            ?>
				    <div class="server-response error-msg"><?php echo $registrationResponse["message"]; ?></div>
                    <?php
        } else if ($registrationResponse["status"] == "success") {
            ?>
                    <div class="server-response success-msg"><?php echo $registrationResponse["message"]; ?></div>
                    <?php
        }
        ?>
				<?php
    }
    ?>
				<div class="error-msg" id="error-msg"></div>
					<div class="row">
						<div class="inline-block">
							<div class="form-label">
								Full name<span class="required error" id="fullname-info"></span>
							</div>
							<input class="input-box-330" type="text" name="fullname"
								id="fullname">
						</div>
					</div>
					<div class="row">
						<div class="inline-block">
							<div class="form-label">
								Email<span class="required error" id="email-info"></span>
							</div>
							<input class="input-box-330" type="email" name="email" id="email">
						</div>
					</div>
					<div class="row">
						<div class="inline-block">
							<div class="form-label">
								Password<span class="required error" id="signup-password-info"></span>
							</div>
							<input class="input-box-330" type="password"
								name="signup-password" id="signup-password">
						</div>
					</div>

					<div class="row">
						<div class="inline-block">
							<div class="form-label">
								Country<span class="required error" id="country-info"></span>
							</div>
							<input class="input-box-330" type="country" name="country" id="country">
						</div>
					</div>

					<div class="row">
						<div class="inline-block">
							<div class="form-label">
								City<span class="required error" id="city-info"></span>
							</div>
							<input class="input-box-330" type="city" name="city" id="city">
						</div>
					</div>

					<div class="row">
						<div class="inline-block">
							<div class="form-label">
								Contact number<span class="required error" id="phone-info"></span>
							</div>
							<input class="input-box-330" type="phone" name="phone" id="phone">
						</div>
					</div>

					<div class="row">
						<div class="inline-block">
						<label for="avatar">Register with your picture:</label>
							<input type="file"
       							id="avatar" name="avatar"
       							accept="image/png, image/jpeg">
							</div>
					</div>

					<div class="row">
						<div class="inline-block">
						<label for="role">User role:</label>
						<select name="role" id="role">
							<option value="role">1</option>
							<option value="role">2</option>
						</select>
							</div>
					</div>



					<div class="row">
						<input class="btn" type="submit" name="signup-btn"
							id="signup-btn" value="Sign up">
					</div>
				</form>
			</div>
		</div>
	</div>

	<script>
function signupValidation() {
	var valid = true;

	$("#fullname").removeClass("error-field");
	$("#email").removeClass("error-field");
	$("#password").removeClass("error-field");
	$("#country").removeClass("error-field");
	$("#city").removeClass("error-field");
	$("#phone").removeClass("error-field");
	

	var fullname = $("#fullname").val();
	var email = $("#email").val();
	var Password = $('#signup-password').val();
	var Country = $("#country").val();
	var City = $("#city").val();
	var Phone = $("#phone").val();
    
	var emailRegex = /^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9](?:[a-zA-Z0-9-]{0,61}[a-zA-Z0-9])?(?:\.[a-zA-Z0-9](?:[a-zA-Z0-9-]{0,61}[a-zA-Z0-9])?)*$/;

	$("#fullname-info").html("").hide();
	$("#email-info").html("").hide();
	$("#country-info").html("").hide();
	$("#city-info").html("").hide();
	$("#phone-info").html("").hide();

	if (fullname.trim() == "") {
		$("#fullname-info").html("required.").css("color", "#ee0000").show();
		$("#fullname").addClass("error-field");
		valid = false;
	}

	
	if (Country.trim() == "") {
		$("#country-info").html("required.").css("color", "#ee0000").show();
		$("#country").addClass("error-field");
		valid = false;
	}

	
	if (City.trim() == "") {
		$("#city-info").html("required.").css("color", "#ee0000").show();
		$("#city").addClass("error-field");
		valid = false;
	}

	
	if (Phone.trim() == "") {
		$("#phone-info").html("required.").css("color", "#ee0000").show();
		$("#phone").addClass("error-field");
		valid = false;
	}

	if (email == "") {
		$("#email-info").html("required").css("color", "#ee0000").show();
		$("#email").addClass("error-field");
		valid = false;
	} 
	
	else if (email.trim() == "") {
		$("#email-info").html("Invalid email address.").css("color", "#ee0000").show();
		$("#email").addClass("error-field");
		valid = false;
	} 
	
	else if (!emailRegex.test(email)) {
		$("#email-info").html("Invalid email address.").css("color", "#ee0000")
				.show();
		$("#email").addClass("error-field");
		valid = false;
	}

	if (Password.trim() == "") {
		$("#signup-password-info").html("required.").css("color", "#ee0000").show();
		$("#signup-password").addClass("error-field");
		valid = false;
	}

	if (valid == false) {
		$('.error-field').first().focus();
		valid = false;
	}
	return valid;
}
</script>
</BODY>
</HTML>
