<?php
require("password.php");
	session_start();
	$badLogin = false;

	if (isset($_POST['username']) && isset($_POST['pwd']))
	{
		// they have submitted a username and password for us to check
		$username = $_POST['username'];
		$password = $_POST['pwd'];
		// Connect to the DB
		require("dbConnect.php");
		$db = get_db();
		$query = 'SELECT passwordU FROM person WHERE username=:username';
		$statement = $db->prepare($query);
		$statement->bindValue(':username', $username);
		$result = $statement->execute();
		if ($result)
		{
			$row = $statement->fetch();
			$hashedPasswordFromDB = $row['passwordU'];
			// now check to see if the hashed password matches
			if (password_verify($password, $hashedPasswordFromDB))
			{
				// password was correct, put the user on the session, and redirect to home
				$_SESSION['username'] = $username;
				header("Location: listKeyboard.php");
				die(); // we always include a die after redirects.
			}
			else
			{
                $badLogin = true;
            
			}
		}
		else
		{
            $badLogin = true;
		}
	}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="style.css">
    <title>Login</title>
</head>
<body>
<?php

if ($badLogin)
{
	echo "Incorrect username or password!<br /><br />\n";
}
?>

<div class="container">
        <div class="row centered-form">
        <div class="col-xs-12 col-sm-8 col-lg-12 centered-form">
        	<div class="panel panel-default">
        		<div class="panel-heading">
			    		<h3 class="panel-title">Login!</h3>
			 			</div>
			 			<div class="panel-body">
			    		<form method="POST" action="login.php">
			    	
                		<div class="form-group">
			    				<input type="text" name="username" id="username" class="form-control input-sm" placeholder="Username">
			    			</div>

			    			<div class="form-group">
			    				<input type="password" name="pwd" id="pwd" class="form-control input-sm" placeholder="Password">
							</div>
			    			
			    			<input type="submit" name="login" value="login" class="btn btn-info btn-block">

			    		
			    		</form>
			    		</div>
	    			</div>
    		</div>
    	</div>
    </div>
</body>
</html>