  
<!DOCTYPE html>
<html>
<head>
<meta name="csrf-token" content="{{ csrf_token() }}" />
	<title>Login Page</title>
</head>
<body>

	<a href="/home"> Back</a> |
	<a href="/logout"> Logout </a> 

	<h2>Edit User</h2>

	<form method="post">
	@csrf
	<table>
		<tr>
			<td>Id</td>
			<td><input type="text" name="id" value = "{{$user['id']}}" ></td>
		</tr>
		<tr>
			<td>Username</td>
			<td><input type="text" name="uname" value = "{{$user['name']}}"></td>
		</tr>
		
		<tr>
			<td>Email</td>
			<td><input type="email" name="email" value = "{{$user['email']}}"></td>
		</tr>
		<tr>
		<td>Type</td>
					<td>
						<select name='type'>
							<option value="admin" @if($user['type'] == 'admin') selected @endif > ADMIN </option>
							<option value="user"  @if($user['type'] == 'user') selected @endif > USER </option>
						</select>
					</td>
				</tr>
		
		<tr>
			<td></td>
			<td><input type="submit" name="Submit" value="edit"></td>
		</tr>
	</table>
	</form>
</body>
</html>