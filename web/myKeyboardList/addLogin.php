<?php

if(isset($_POST['login'])){
    session_start();
    require "dbConnect.php";
    $db = get_db();

    $username = $_POST['username'];
    $password = $_POST['pwd'];

    if(empty($username) || empty($password)){
        header("Location: login.php?error=incorrectUsernameOrPassword");
        exit();
    }
    else{
        try{
            $statement = $db->prepare("SELECT '$password' FROM person WHERE username ='$username'");
            $statement->execute();

            $count=0;
            while ($row = $statement->fetch(PDO::FETCH_ASSOC))
            {
                $checker=$row['passwordU'];
                $pass=password_verify($password, $checker);
                $count++;
            }
            if($pass){
                session_start();
                $_SESSION['loggedin'] = true;
                $_SESSION['username'] = $username;
            }
        }
        catch(Exception $ex)
        {
            echo "Error with DB. Details: $ex";
            die();
        }
        header("Location: homepage.php?username=$username");
        die(); 
    }   
}
?>