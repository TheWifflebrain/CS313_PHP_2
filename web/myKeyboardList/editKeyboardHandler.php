<?php
require "dbConnect.php";
    $db = get_db();
    $keyID = htmlspecialchars($_GET['keyID']);

    $switch = htmlspecialchars($_POST['switch']);
    $size = htmlspecialchars($_POST['size']);
    $typeK = htmlspecialchars($_POST['type']);
    $forsale = htmlspecialchars($_POST['forsale']);
    $descK = htmlspecialchars($_POST['desc']);
    $photo = htmlspecialchars($_POST['photo']);
    $name = htmlspecialchars($_POST['keyboardName']);
    $user = htmlspecialchars($_POST['username_id']);

    $stmt = $db->prepare("UPDATE keyboard
    SET switch='$switch', size='$size', type='$type',forsale='$forsale', descriptionK='$desck', photo='$photo', name='$name'
    WHERE keyboard_id=$keyID;");

    $stmt->bindValue(':switch', $switch, PDO::PARAM_STR);
    $stmt->bindValue(':size', $size, PDO::PARAM_STR);
    $stmt->bindValue(':typeK', $typeK, PDO::PARAM_STR);
    $stmt->bindValue(':forsale', $forsale, PDO::PARAM_STR);
    $stmt->bindValue(':descK', $descK, PDO::PARAM_STR);
    $stmt->bindValue(':photo', $photo, PDO::PARAM_STR);
    $stmt->bindValue(':keyboardName', $name, PDO::PARAM_STR);
    $stmt->bindValue(':user', $user, PDO::PARAM_STR);
    $stmt->execute();

    header("Location: homepgage.php?username=$usernameS");
    die();
?>