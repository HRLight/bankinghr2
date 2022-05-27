<?php
use Phppot\Member;
if (! empty($_POST["signup-btn"])) {
    require_once './Model/Member.php';
    $member = new Member();
    $registrationResponse = $member->registerMember();
}
?>
<HTML>
<HEAD>
<TITLE>User Registration</TITLE>
<link href="assets/css/phppot-style.css" type="text/css"
	rel="stylesheet" />
<link href="assets/css/user-registration.css" type="text/css"
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
								Name<span class="required error" id="name-info"></span>
							</div>
							<input class="input-box-330" type="text" name="name"
								id="name">
									</div>
								</div>	


						<div class="row">
						<div class="inline-block">
							<div class="form-label">
								Middle Name<span class="required error" id="middlename-info"></span>
							</div>
							<input class="input-box-330" type="text" name="middlename"
								id="middlename">
									</div>
								</div>	

						<div class="row">
						<div class="inline-block">
							<div class="form-label">
								Last Name<span class="required error" id="lastname-info"></span>
							</div>
							<input class="input-box-330" type="text" name="lastname"
								id="name">
									</div>
								</div>	
								
								<div class="row">
						<div class="inline-block">
							<div class="form-label">
								Contact<span class="required error" id="contact-info"></span>
							</div>
							<input class="input-box-330" type="text" name="contact"
								id="contact">
									</div>
								</div>
								
								<div class="row">
						<div class="inline-block">
							<div class="form-label">
								Address<span class="required error" id="address-info"></span>
							</div>
							<input class="input-box-330" type="text" name="address"
								id="address">
									</div>
								</div>
								
								<div class="row">
						<div class="inline-block">
							<div class="form-label">
								Gender<span class="required error" id="gender-info"></span>
							</div>
							<input class="input-box-330" type="text" name="gender"
								id="gender">
									</div>
								</div>
								
								<div class="row">
						<div class="inline-block">
							<div class="form-label">
								Birthday<span class="required error" id="birthdate-info"></span>
							</div>
							<input class="input-box-330" type="text" name="birthdate"
								id="birthdate">
									</div>
								</div>
								
								<div class="row">
						<div class="inline-block">
							<div class="form-label">
								Citizenship<span class="required error" id="citizenship-info"></span>
							</div>
							<input class="input-box-330" type="text" name="citizenship"
								id="citizenship">
									</div>
								</div>
								
									<div class="row">
						<div class="inline-block">
							<div class="form-label">
								Barangay Id<span class="required error" id="barangay_id-info"></span>
							</div>
							<input class="input-box-330" type="text" name="barangay_id"
								id="barangay_id">
									</div>
								</div>


					<div class="row">
						<div class="inline-block">
							<div class="form-label">
								Username<span class="required error" id="username-info"></span>
							</div>
							<input class="input-box-330" type="text" name="username"
								id="username">
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
								Confirm Password<span class="required error"
									id="confirm-password-info"></span>
							</div>
							<input class="input-box-330" type="password"
								name="confirm-password" id="confirm-password">
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


	$("#name").removeClass("error-field");
	$("#middlename").removeClass("error-field");
	$("#lastname").removeClass("error-field");
	$("#contact").removeClass("error-field");
	$("#address").removeClass("error-field");
	$("#gender").removeClass("error-field");
	$("#birthdate").removeClass("error-field");
	$("#citizenship").removeClass("error-field");
	$("#barangay_id").removeClass("error-field");
	$("#username").removeClass("error-field");
	$("#email").removeClass("error-field");
	$("#password").removeClass("error-field");
	$("#confirm-password").removeClass("error-field");

	
	var Name = $("#name").val();
	var Middlename = $("#middlename").val();
	var Lastname = $("#lastname").val();
	var Contact = $("#contact").val();
	var Address = $("#address").val();
	var Gender = $("#gender").val();
	var Birthdate = $("#birthdate").val();
	var Citizenship = $("#citizenship").val();
	var Barangay_id = $("#barangay_id").val();
	var UserName = $("#username").val();
	var email = $("#email").val();
	var Password = $('#signup-password').val();
    var ConfirmPassword = $('#confirm-password').val();
	var emailRegex = /^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9](?:[a-zA-Z0-9-]{0,61}[a-zA-Z0-9])?(?:\.[a-zA-Z0-9](?:[a-zA-Z0-9-]{0,61}[a-zA-Z0-9])?)*$/;

	$("#username-info").html("").hide();
	$("#email-info").html("").hide();


	if (Name.trim() == "") {
		$("#name-info").html("required.").css("color", "#ee0000").show();
		$("#name").addClass("error-field");
		valid = false;
	}
	
	if (Middlename.trim() == "") {
		$("#middlename-info").html("required.").css("color", "#ee0000").show();
		$("#middlename").addClass("error-field");
		valid = false;
	}
	
	if (Lastname.trim() == "") {
		$("#lastname-info").html("required.").css("color", "#ee0000").show();
		$("#lastname").addClass("error-field");
		valid = false;
	}
	
	
	
	if (Contact.trim() == "") {
		$("#contact-info").html("required.").css("color", "#ee0000").show();
		$("#contact").addClass("error-field");
		valid = false;
	}
	
	if (Address.trim() == "") {
		$("#address-info").html("required.").css("color", "#ee0000").show();
		$("#address").addClass("error-field");
		valid = false;
	}
	
	if (Gender.trim() == "") {
		$("#gender-info").html("required.").css("color", "#ee0000").show();
		$("#gender").addClass("error-field");
		valid = false;
	}
	
	if (Birthdate.trim() == "") {
		$("#birthdate-info").html("required.").css("color", "#ee0000").show();
		$("#birthdate").addClass("error-field");
		valid = false;
	}
	
	if (Citizenship.trim() == "") {
		$("#citizenship	-info").html("required.").css("color", "#ee0000").show();
		$("#citizenship	").addClass("error-field");
		valid = false;
	}
	
	if (Barangay_id.trim() == "") {
		$("#barangay_id-info").html("required.").css("color", "#ee0000").show();
		$("#barangay_id").addClass("error-field");
		valid = false;
	}

	if (UserName.trim() == "") {
		$("#username-info").html("required.").css("color", "#ee0000").show();
		$("#username").addClass("error-field");
		valid = false;
	}
	if (email == "") {
		$("#email-info").html("required").css("color", "#ee0000").show();
		$("#email").addClass("error-field");
		valid = false;
	} else if (email.trim() == "") {
		$("#email-info").html("Invalid email address.").css("color", "#ee0000").show();
		$("#email").addClass("error-field");
		valid = false;
	} else if (!emailRegex.test(email)) {
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
	if (ConfirmPassword.trim() == "") {
		$("#confirm-password-info").html("required.").css("color", "#ee0000").show();
		$("#confirm-password").addClass("error-field");
		valid = false;
	}
	if(Password != ConfirmPassword){
        $("#error-msg").html("Both passwords must be same.").show();
        valid=false;
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
