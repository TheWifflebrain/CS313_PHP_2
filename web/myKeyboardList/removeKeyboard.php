<?php
    $keyID = $_GET['keyID'];

    $stmt = $db->prepare('DELETE FROM keyboard WHERE keyboard_id=:id;');
    $stmt->bindValue(':id', $keyID, PDO::PARAM_INT);
    $stmt->execute();
    header("Location: frontpage.php");
    die();

?>