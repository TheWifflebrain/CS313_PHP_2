<?php
require "dbConnect.php";
    $db = get_db();
    $keyID = htmlspecialchars($_GET['keyboard_id']);
    $cID = htmlspecialchars($_GET['comment_id']);


    $stmt = $db->prepare("UPDATE commentPost
    SET messageC=:messageC
    WHERE comment_id=$cID;");

    $stmt->bindValue(':messageC', $cID, PDO::PARAM_STR);
    $stmt->execute();

    header("Location: keyboardPage.php?keyboard_id=$keyID");
    die();
?>