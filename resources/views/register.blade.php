<!DOCTYPE html>
<html>
<head>
	<title>register</title>
</head>
<body>
	<form method="post" action="register">
		<table>
			<tr>
				<td>First Name</td>
				<td><input type="text" name="firstName"></td>			
			</tr>
			<tr>
				<td>Last Name</td>
				<td><input type="text" name="lastName"></td>
			</tr>
			<tr>
				<td>Username/Email</td>
				<td><input type="text" name="userName"></td>
			</tr>
			<tr>
				<td>Password</td>
				<td><input type="Password" name="password" autocomplete="new-password"></td>
			</tr>
			<tr>
				<td><input type="hidden" name="_token" value="{{{ csrf_token() }}}"></td>
				<td><input type="submit" name="register" value="register"></td>
			</tr>
		</table>
	</form>
</body>
</html>