<?php
    $keyID = $_GET['keyboard_id'];
    $stmt = $db->prepare('DELETE FROM keyboard WHERE keyboard_id=$keyID;');
    $stmt->execute();
    header("Location: frontpage.php");
    die();

?>