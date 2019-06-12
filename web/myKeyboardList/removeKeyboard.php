<?php
    $keyboardID = $_GET['keyboard_id'];
    require('dbConnect.php');
    $db = get_db();
    $stmt = $db->prepare("DELETE FROM keyboard WHERE keyboard_id=$keyboardID;");
    $stmt->execute();
    header("Location: frontpage.php");
    die();
?>