<?php
    require "dbConnect.php";
    $db = get_db();

    $switch = htmlspecialchars($_POST['switch']);
    $size = htmlspecialchars($_POST['size']);
    $typeK = htmlspecialchars($_POST['type']);
    $forsale = htmlspecialchars($_POST['forsale']);
    $descK = htmlspecialchars($_POST['desc']);
    $photo = htmlspecialchars($_POST['photo']);
    $name = htmlspecialchars($_POST['keyboardName']);
    $user = htmlspecialchars($_POST['username']);

    $stmt = $db->prepare('INSERT INTO keyboard(switch, sizeK, typeK, 
    forsale, descriptionK, photo, keyboard_name, username_K) VALUES (:switch, 
    :size, :typeK, :forsale, :descK, :photo, :keyboardName, :user);');

    $stmt->bindValue(':switch', $switch, PDO::PARAM_STR);
    $stmt->bindValue(':size', $size, PDO::PARAM_STR);
    $stmt->bindValue(':type', $typeK, PDO::PARAM_STR);
    $stmt->bindValue(':forsale', $forsale, PDO::PARAM_STR);
    $stmt->bindValue(':desc', $descK, PDO::PARAM_STR);
    $stmt->bindValue(':photo', $phot, PDO::PARAM_STR);
    $stmt->bindValue(':name', $name, PDO::PARAM_STR);
    $stmt->bindValue(':user', $user, PDO::PARAM_STR);
    $stmt->execute();

    $new_page = "homepage.php";

    header("Location: $new_page");
    die();
?>

