<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>my chat-forum</title>
    <link rel="stylesheet" href="css\loginPage.css">
</head>
<body>
    <div class="page-content">
		<div class="form-v4-content">
			<div class="form-left">
				<h2>INFOMATION</h2>
				<p class="text-1">Welcome to my chat forum,In this forum you are free to share your personal opinions without being judged.freeee for allll</p>
				<p class="text-2"> login and share your opinions with the world.<span>  NOTE:Please follow community guidelines</span> </p>
				<div class="form-left-last">
					<a href="index.php"><input type="submit" name="account" class="account" value="Register Here" ></a>
					
				</div>
			</div>
            <form class="form-detail" method="POST"role="search" action="pages/login.php" id="myform">
				<h2>Login now</h2>
				<div class="form-group">
					<div class="form-row form-row-1">
						<label for="first_name">User Name</label>
						<input type="text" class="form-control" name="username"placeholder="Username">
					</div>
				</div>
				<div class="form-group">
					<div class="form-row form-row-1 ">
						<label for="password">Password</label>
                        <input type="password" class="form-control" name="password"placeholder="Password" required>
					</div>
				</div>
				<div class="form-row-last">
					<input type="submit">
				</div>
			</form>
		</div>
	</div>
    
</body>
</html>