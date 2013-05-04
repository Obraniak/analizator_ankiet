<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<title>Login</title>
	</head>
	<body>
		<h1>Jednolity system obs³ugi ankiet</h1>
		<h2>Politechnika Wroc³awska</h2>
		<?php echo form_open('authentication'); ?>
		<label for="username">Login:</label>
		<input type="text" size="20" id="username" name="username"/>
		<br/>
		<label for="password">Has³o:</label>
		<input type="password" size="20" id="passowrd" name="password"/>
		<br/>
		<input type="submit" value="Zaloguj"/>
		</form>
	</body>
</html>
