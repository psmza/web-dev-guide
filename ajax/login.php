<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
</head>
<body>
    <!-- Login Form Goes Here -->
	<!-- Inside the <body> section -->
	<div id="message"></div>
	<div id="form_login">
		<label for="username">Username:</label>
		<input type="text" id="username" name="username" required><br><br>
		<label for="password">Password:</label>
		<input type="password" id="password" name="password" required><br><br>
		<input id="btn_login" type="submit" value="Login">
	</div>
	<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
	<script src="script.js"></script>
</body>
</html>
