<?php

    $commentID = $_GET['comment_id'];
    $keyboardID = $_GET['keyboard_id'];
    require('dbConnect.php');
    $db = get_db();
    $stmt = $db->prepare("DELETE FROM commentPOST WHERE comment_id=$commentID;");
    $stmt->execute();
    header("Location: keyboardPage.php?keyboard_id=$keyboardID");
    die();

?>