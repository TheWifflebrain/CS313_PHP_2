<?php
    require "dbConnect.php";
    $db = get_db();

    $username = htmlspecialchars($_POST['userCP']);
    $keyID = htmlspecialchars($_POST['keyID']);
    $messageC = htmlspecialchars($_POST['commentC']);

    $stmt = $db->prepare('INSERT INTO commentPost(keyboard_id_CP,
    username_CP, messageC) VALUES (:keyID, :username, :messageC);');

    $stmt->bindValue(':keyID', $keyID, PDO::PARAM_INT);
    $stmt->bindValue(':username', $username, PDO::PARAM_STR);
    $stmt->bindValue(':messageC', $messageC, PDO::PARAM_STR);
    $stmt->execute();

    header("Location: keyboardPage.php?keyboard_id=$keyID");
    die();
?>