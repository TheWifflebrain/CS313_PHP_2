<?php
    //$keyID = $_GET['keyID'];
    $keyID = $_GET['keyboard_id'];
    echo $keyID;
    $stmt = $db->prepare("DELETE FROM keyboard WHERE keyboard_id=$keyID;");
    $stmt->execute();
    header("Location: frontpage.php");
    die();

?>