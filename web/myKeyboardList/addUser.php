<?php 
if(isset($_POST['signUp'])){

    session_start();
    require "dbConnect.php";
    $db = get_db();
 
    $fName=$_POST['fName'];
    $lName=$_POST['lName'];
    $username=$_POST['username'];
    $email=$_POST['email'];
    $password=$_POST['pwd'];
    $rptpassword=$_POST['rpt-pwd'];
    $hashed_password=password_hash($password, PASSWORD_DEFAULT);

    if($password == ""){
        header("Location: signUp.php?error=passwordcheck");
        exit();
    }
    else if($password !== $rptpassword){
        header("Location: signUp.php?error=passwordcheck&uid=".$username."&mail=".$email);
        exit();
    }
    else if($fName == ""){
        header("Location: signUp.php?error=FirstNamecheck");
        exit();
    }
    else if($lName == ""){
        header("Location: signUp.php?error=lastNamecheck");
        exit();
    }
    else if($email == ""){
        header("Location: signUp.php?error=emailcheck");
        exit();
    }
    else if($username == ""){
        header("Location: signUp.php?error=usernamecheck");
        exit();
    }
    
    else{

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
            echo "Error connecting to DB. Details: $ex";
            die();
        }
        header("Location: signUp.php");
        die(); 
    }
}
?>