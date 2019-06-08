<?php
session_start();
if (isset($_SESSION['username']))
{
    $usernameS = $_SESSION['username'];
}
    require "dbConnect.php";
    $db = get_db();

    $keyID = htmlspecialchars($_GET['keyID']);
    $messageC = htmlspecialchars($_POST['commentC']);

    $stmt = $db->prepare('INSERT INTO commentPost(keyboard_id_CP,
    username_CP, messageC) VALUES (:keyID, :username, :messageC);');

    $stmt->bindValue(':keyID', $keyID, PDO::PARAM_INT);
    $stmt->bindValue(':username', $usernameS, PDO::PARAM_STR);
    $stmt->bindValue(':messageC', $messageC, PDO::PARAM_STR);
    $stmt->execute();

    header("Location: keyboardPage.php?keyboard_id=$keyID");
    die();
?>