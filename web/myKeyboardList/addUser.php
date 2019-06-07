<?php 
require("password.php");
//need to use another query to see if a user name is already in the database
if(isset($_POST['signUp'])){
    $fName=$_POST['fName'];
    $lName=$_POST['lName'];
    $username=$_POST['username'];
    $email=$_POST['email'];
    $password=$_POST['pwd'];
    $rptpassword=$_POST['rpt-pwd'];

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
        $hashed_password=password_hash($password, PASSWORD_DEFAULT);

        require("dbConnect.php");
        $db = get_db();

        $query = 'INSERT INTO person(fName, lName, email, username, passwordU) 
                        VALUES(:fName, :lName, :email, :username, :passwordU)';
        $statement =$db->prepare($query);
        $statement->bindValue(':fName', $fName);
        $statement->bindValue(':lName', $lName);
        $statement->bindValue(':email', $email);
        $statement->bindValue(':username', $username);
        echo "the hashed password is $hashed_password";
        $statement->bindValue(':passwordU', $hashed_password);
        $statement->execute();

        header("Location: listKeyboard.php");
        die();
 
    }
}
?>