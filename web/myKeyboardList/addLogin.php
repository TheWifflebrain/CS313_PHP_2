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
            //$statement = $db->prepare("SELECT passwordU FROM person WHERE username ='$username'");
            //$statement->execute();

            //$count=0;
            //while ($row = $statement->fetch(PDO::FETCH_ASSOC))
            //{
              //  $checker=$row['passwordU'];
                //$password=password_verify($password, $checker);
                //count++;
               // $hashed_password=password_hash($password, PASSWORD_DEFAULT);
               // if($hashed_password == $checker){
               //     session_start();
              //      $_SESSION['loggedin'] = true;
              //      $_SESSION['username'] = $username;
               // }
               $sql = "SELECT * FROM person WHERE username=?;";
               $stmt = mysql_stmt_init($conn);
               if(!mysql_stmt_prepare($stmt, $sql)){
                header("Location: login.php?incorrectUsernameOrPassword");
                exit();
               }
               else{
                   mysql_stmt_bind_param($stmt, "s",$username);
                   mysql_stmt_execute($stmt);
                   $result = mysql_stmt_get_result($stmt);
                   if($row = mysql_fetch_assoc($result)){
                       $pwdCheck = password_verify($password, $row['passwordU']);
                       if($pwdCheck==false){
                        header("Location: login.php?incorrectUsernameOrPassword");
                        exit();
                       }
                       else if($pwdCheck ==true){
                           session_start();
                           $_SESSION['username'] = $row['username'];
                           header("Location: homepage.php?username=$username");
                           exit();
                       }
                       else{
                        header("Location: login.php?incorrectUsernameOrPassword");
                        exit();
                       }
                   } 
               }
            }
            
        }
        catch(Exception $ex)
        {
            echo "Error with DB. Details: $ex";
            header("Location: login.php?incorrectUsernameOrPassword");
            exit();
        } 
        header("Location: homepage.php?username=$username");
        exit();
    }   
}
?>