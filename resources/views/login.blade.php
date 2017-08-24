<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
</head>
<body>
	<form action="login" method="post">
		<table>
			<tr>
				<td>user name </td>
				<td><input type="text" name="userName"></td>
			</tr>
			<tr>
				<td>password </td>
				<td><input type="password" name="password" autocomplete="new-password"></td>
			</tr>
			<tr>
				<td><input type="submit" name="submit"/></td>
				<td><input type="checkbox" name="remember">Remember me!</td>
				<td><a href="{{ url('/register') }}">Register</a></td>
				<td><input type="hidden" name="_token"	value="{{{ csrf_token()}}}"></td>
			</tr>
			<tr>
				@if(! empty($err_msg))
					<td><p style="color:red;">{{ $err_msg}}</p></td>
				@endif
			</tr>
		</table>
	</form>
</body>
</html>