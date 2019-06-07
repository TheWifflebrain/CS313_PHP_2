<?php
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
			echo  "The hashed password is $hashedPasswordFromDB 123";
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
                header("Location: login.php?invalidcredentials");
                die();
			}
		}
		else
		{
            $badLogin = true;
            header("Location: login.php?invalidcredentials");
            die();
		}
	}
?>