<?php
	session_start();
	$badLogin = false;

	if (isset($_POST['username']) && isset($_POST['pwd']))
	{
		$username = $_POST['username'];
		$password = $_POST['pwd'];
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
			if (password_verify($password, $hashedPasswordFromDB))
			{
				$_SESSION['username'] = $username;
				header("Location: listKeyboard.php");
				die(); 
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