<?php 
    if(isset($_POST['signUp'])){
        $fName=$_POST['fName'];
        $lName=$_POST['lName'];
        $username=$_POST['username'];
        $email=$_POST['email'];
        $password=$_POST['pwd'];
		$rptpassword=$_POST['rpt-pwd'];
		$taken;

        if(!isset($password) || $password == ""){
            header("Location: signUp.php?error=passwordcheck");
            die();
        }
        else if($password !== $rptpassword){
            header("Location: signUp.php?error=passwordcheck&uid=".$username."&mail=".$email);
            die();
        }
        else if(!isset($fName) || $fName == ""){
            header("Location: signUp.php?error=FirstNamecheck");
            die();
        }
        else if(!isset($lName) || $lName == ""){
            header("Location: signUp.php?error=lastNamecheck");
            die();
        }
        else if(!isset($email) || $email == ""){
            header("Location: signUp.php?error=emailcheck");
            die();
        }
        else if(!isset($username) || $username == ""){
            header("Location: signUp.php?error=usernamecheck");
            die();
        }
    
        else{
            $fName=htmlspecialchars($fName);
            $lName=htmlspecialchars($lName);
            $username=htmlspecialchars($username);
            $email=htmlspecialchars($email);
            $password=$_POST['pwd'];
            $hashed_password=password_hash($password, PASSWORD_DEFAULT);

            require("dbConnect.php");
            $db = get_db();
            $query0 = "SELECT person.username FROM person WHERE username='$username'";
            $statement0 =$db->prepare($query0);
            $result0 = $statement0->execute();
            if($result0 != null)
            {
				$taken = 1;
            }

            try{
                $query = 'INSERT INTO person(fName, lName, email, username, passwordU) 
                                VALUES(:fName, :lName, :email, :username, :passwordU)';
                $statement =$db->prepare($query);
                $statement->bindValue(':fName', $fName);
                $statement->bindValue(':lName', $lName);
                $statement->bindValue(':email', $email);
                $statement->bindValue(':username', $username);
                $statement->bindValue(':passwordU', $hashed_password);
                $statement->execute();
            }
            catch(Exception $ex)
            {
                header("Location: signUp.php?somethingwentwrong");
                die();
            }

            //logging in
            session_start();
            $query2 = 'SELECT passwordU FROM person WHERE username=:username';
            $statement2 = $db->prepare($query2);
            $statement2->bindValue(':username', $username);
            $result = $statement2->execute();
            if($result)
            {
                $row = $statement2->fetch();
                $hashedPasswordFromDB = $row['passwordu'];
                if (password_verify($password, $hashedPasswordFromDB))
                {
                    $_SESSION['username'] = $username;
                    header("Location: frontpage.php");
                    die(); 
                }
                else{
                    header("Location: signUp.php");
                    die();
                }
            }
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
    <title>Sign Up</title>
</head>
<body>
<div class="container">
    <div class="row centered-form">
        <div class="col-xs-12 col-sm-8 col-lg-12 centered-form">
        	<div class="panel panel-default">
				<div class="panel-heading">
					<?php if($taken==1){ ?>
						<h3 class="bg-warning">Username Taken</h3>
					<?php } ?>
				 </div>
				 
        		<div class="panel-heading">
			    	<h3 class="panel-title">Sign Up!</h3>
			 	</div>
			 	<div class="panel-body">
					<form method="POST" action="signUp.php">
						<div class="row">
							<div class="col-xs-6 col-sm-6 col-lg-6">
								<div class="form-group">
									<input type="text" name="fName" id="fName" class="form-control input-sm" placeholder="First Name">
								</div>
							</div>
							<div class="col-xs-6 col-sm-6 col-lg-6">
								<div class="form-group">
									<input type="text" name="lName" id="lName" class="form-control input-sm" placeholder="Last Name">
								</div>
							</div>
						</div>
						<div class="form-group">
							<input type="text" name="username" id="username" class="form-control input-sm" placeholder="Username">
						</div>
						<div class="form-group">
							<input type="email" name="email" id="email" class="form-control input-sm" placeholder="Email Address">
						</div>
						<div class="row">
							<div class="col-xs-6 col-sm-6 col-lg-6">
								<div class="form-group">
									<input type="password" name="pwd" id="pwd" class="form-control input-sm" placeholder="Password">
								</div>
							</div>
							<div class="col-xs-6 col-sm-6 col-lg-6">
								<div class="form-group">
									<input type="password" name="rpt-pwd" id="rpt-pwd" class="form-control input-sm" placeholder="Confirm Password">
								</div>
							</div>
						</div>
						<input type="submit" id="signUp" name="signUp" value="signUp" class="btn btn-info btn-block">
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
</body>
</html>