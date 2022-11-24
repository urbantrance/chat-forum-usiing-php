<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>my chat forum</title>
	
    <link rel="stylesheet" href="css\loginPage.css"/>
</head>
<body class="form-v4">
	<div class="page-content">
		<div class="form-v4-content">
			<div class="form-left">
				<h2>CHAT FORUM</h2>
				<p class="text-1">Welcome to my chat forum,In this forum you are free to share your personal opinions without being judged.freeee for allll</p>
				<p class="text-2"><span>let's be friends..</span> sign up to make new friends all over the world. Please follow community guidelines</p>
				<div class="form-left-last">
					<a href="signin.php"><input type="submit" name="account" class="account" value="have an account?" ></a>
				</div>
			</div>
			<form class="form-detail" method="POST" class="form-signin" action="functions/register.php">
				<h2>REGISTER FORM</h2>
				<div class="form-group">
					<div class="form-row form-row-1">
						<label for="first_name">First Name</label>
						<input type="text" name="fname"placeholder="First Name" class="input-text" required >
					</div>
					<div class="form-row form-row-1">
						<label for="last_name">Last Name</label>
						<input type="text" name="lname"placeholder="Last Name"class="form-control" required class="input-text">
					</div>
				</div>
				
				<div class="form-row">
					<label for="gender">Gender</label>
				<select class="form-control" name="gender" required>
					<option>Gender</option>
					<option value="Male">Male</option>
					<option value="Female">Female</option>
					<option value="Other">Other</option> 
				 </select> 
				</div>
				
				<div class="form-row">
					<label for="username">Your username</label>
					<input input type="text" placeholder="Username" name="username" class="input-text" required>
				</div>
				<div class="form-group">
					<div class="form-row form-row-1 ">
						<label for="password">Password</label>
						<input type="password" placeholder="Password" name="password" class="input-text" required>
					</div>
					
				</div>
				<div class="form-row-last">
					<input type="submit" name="register" value="Register" class="btn btn-success" style="width:100%;">

				</div>
			</form>
		</div>
	</div>
	
</body>
</html>
