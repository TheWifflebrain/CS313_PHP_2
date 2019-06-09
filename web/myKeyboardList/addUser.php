<?php 
    if(isset($_POST['signUp']))
    {
        $fName=$_POST['fName'];
        $lName=$_POST['lName'];
        $username=$_POST['username'];
        $email=$_POST['email'];
        $password=$_POST['pwd'];
        $rptpassword=$_POST['rpt-pwd'];
        $regex = "^(?=.[A-Za-z])(?=.\d)[A-Za-z\d]{8,}$";

        if($password !== $rptpassword)
        {
            header("Location: signUp.php?error=passwordcheck");
            die();
        }
        else if(!preg_match($regex, $password))
        {
            header("Location: signUp.php?error=passwordrequirements");
            die();
        }
        else
        {
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
            if(!$result0)
            {
                header("Location: signUp.php?taken=1");
                die();
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
                    header("Location: signUp.php?couldnotfind");
                    die();
                }
            }
        }
    }
?>