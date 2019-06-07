<?php
	session_start();
	$badLogin = 0;

	if (isset($_POST['username']) && isset($_POST['pwd']))
	{
		$username = $_POST['username'];
		$password = $_POST['pwd'];
		require("dbConnect.php");
		$db = get_db();
		$query = 'SELECT passwordu FROM person WHERE username=:username';
		$statement = $db->prepare($query);
		$statement->bindValue(':username', $username);
		$result = $statement->execute();
		if ($result)
		{
			$row = $statement->fetch();
			$hashedPasswordFromDB = $row['passwordu'];
			if (password_verify($password, $hashedPasswordFromDB))
			{
				echo "The hashed password is $hashedPasswordFromDB...";
				$_SESSION['username'] = $username;
				header("Location: frontpage.php");
				die(); 
			}
			else
			{
                $badLogin = 1;
            
			}
		}
		else
		{
            $badLogin = 2;
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

<div class="container">
        <div class="row centered-form">
        <div class="col-xs-12 col-sm-8 col-lg-12 centered-form">
        	<div class="panel panel-default">
			<?php
			if ($badLogin == 1)
			{
			?>
				<h3 class="bg-warning">Incorrect password or username</h3><br/><br/>
			<?php
			}			
			if ($badLogin == 2)
			{
			?>
				<h3 class="bg-warning">Cannot connect to database</h3><br/><br/>
			<?php
			}
			?>
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
						<br/>
						<br/>
						<div>
							<h4 class="panel-body">Don't have an account</h4>
							<a href="signUp.php"><input type="submit" name="Sign Up" value="Sign Up" class="btn btn-info btn-block"></a>	
						</div>
			    		</div>
	    			</div>
    		</div>
    	</div>
    </div>
</body>
</html>