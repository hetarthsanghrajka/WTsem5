
<!DOCTYPE html>
<html>
<head>
	<title>Reset Password</title>
</head>
<body>
	
	<?php

		$selector = $_GET["selector"];
		$validator = $_GET["validator"];

		if (empty($selector) || empty($validator))
		{
			echo "Could not validate your request";
			
		}
		else 
		{
				?>

				<form action="includes/reset-password.inc.php" method="post">
					<input type="hidden" name="selector" value="<?php echo $selector ?>	">
					<input type="hidden" name="validator" value="<?php echo $validator ?>">
					<input type="password" name="pwd" placeholder="Enter a New Password">
					<input type="password" name="pwd-repeat" placeholder="Repeat new Password">
					<button type="submit" name="reset-password-submit">Reset Password</button>
					
				</form>

				<?php 				
		}
	?>
	
</body>
</html>