<?php
require "dbConnect.php";
    $db = get_db();
    $keyID = htmlspecialchars($_POST['keyboard_id']);
    $cID = htmlspecialchars($_GET['comment_id']);
    $messageC = htmlspecialchars($_POST['comment']);

    if(!isset($messageC) || $messageC == null){
        $stmt = $db->prepare('SELECT commentPost.messageC FROM commentPost WHERE comment_id=:id');
        $stmt->bindValue(':id', $cID, PDO::PARAM_INT);
        $stmt->execute();
        $row = $stmt->fetch();
        $messageC = $row['messageC'];   
    }


    $stmt = $db->prepare("UPDATE commentPost
    SET messageC=:messageC
    WHERE comment_id=$cID;");

    $stmt->bindValue(':messageC', $messageC, PDO::PARAM_STR);
    $stmt->execute();

    header("Location: keyboardPage.php?keyboard_id=$keyID");
    die();
?>