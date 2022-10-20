<?php
session_start();
if (isset($_SESSION["fullname"])) {
    $fullname = $_SESSION["fullname"];
    session_write_close();
} else {
    //redirecting the customer to index page
    session_unset();
    session_write_close();
    $url = "index.php";
    header("Location: $url");
}

?>
<HTML>
<HEAD>
<TITLE>Welcome</TITLE>
<link href="assets/css/phppot-style.css" type="text/css"
	rel="stylesheet" />
<link href="assets/css/customer-registration.css" type="text/css"
	rel="stylesheet" />
</HEAD>
<BODY>
	<div class="phppot-container">
		<div class="page-header">
			<span class="login-signup"><a href="logout.php">Logout</a></span>
		</div>
		<div class="page-content">Welcome <?php echo $fullname;?></div>
	</div>
</BODY>
</HTML>
