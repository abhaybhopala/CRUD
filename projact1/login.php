

<!DOCTYPE html>
<html lang="en">
<head>
     <title>Log IN</title>
	 <link rel="stylesheet" href="style.css">
</head>
<body style='background-color: #e6f0ff'> 
<div class="header">
  	<h2>Login 👋</h2>
  </div>
 
  <form method="post" action="login_db.php">
  
  	<div class="input-group">
  		<label>Email</label>
  		<input type="email" name="email" id="email" placeholder="Email" required ;>
  	</div>
  	<div class="input-group">
  		<label>Password</label>
  		<input type="password" name="password" id="password" placeholder="password" required >
  	</div>
  	<div class="input-group">
  		<button type="submit" class="btn" name="login_btn">Login</button>
  	</div>
  	
	  <p>
  		Only Admin can login
  	</p>

  </form>
</body>
</html>