<?php
require "dbConnect.php";
    $db = get_db();
    $keyID = htmlspecialchars($_GET['keyboard_id']);
    $user = htmlspecialchars($_POST['username_id']);


    $switch = htmlspecialchars($_POST['switch']);
    $size = htmlspecialchars($_POST['size']);
    $typeK = htmlspecialchars($_POST['type']);
    $forsale = htmlspecialchars($_POST['forsale']);
    $descK = htmlspecialchars($_POST['desc']);
    $photo = htmlspecialchars($_POST['photo']);
    $name = htmlspecialchars($_POST['keyboardName']);

    if(!isset($switch) || trim($switch) == ""){
        $stmt = $db->prepare('SELECT keyboard.switch FROM keyboard WHERE keyboard_id=:id');
        $stmt->bindValue(':id', $keyID, PDO::PARAM_INT);
        $stmt->execute();
        $keyboard_rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
        //$keyboard_code = $keyboard_rows[0]['keyboard_name'];
        $switch = $keyboard_row['switch'];
    }

    if(!isset($size) || trim($size) == ""){
        $stmt = $db->prepare('SELECT keyboard.sizeK FROM keyboard WHERE keyboard_id=:id');
        $stmt->bindValue(':id', $keyID, PDO::PARAM_INT);
        $stmt->execute();
        $keyboard_rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
        //$keyboard_code = $keyboard_rows[0]['keyboard_name'];
        $size = $keyboard_row['sizeK'];
    }

    if(!isset($typeK) || trim($typeK) == ""){
        $stmt = $db->prepare('SELECT keyboard.typeK FROM keyboard WHERE keyboard_id=:id');
        $stmt->bindValue(':id', $keyID, PDO::PARAM_INT);
        $stmt->execute();
        $keyboard_rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
        //$keyboard_code = $keyboard_rows[0]['keyboard_name'];
        $typeK = $keyboard_row['typeK'];
    }

    if(!isset($forsale) || trim($forsale) == ""){
        $stmt = $db->prepare('SELECT keyboard.forsale FROM keyboard WHERE keyboard_id=:id');
        $stmt->bindValue(':id', $keyID, PDO::PARAM_INT);
        $stmt->execute();
        $keyboard_rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
        //$keyboard_code = $keyboard_rows[0]['keyboard_name'];
        $forsale = $keyboard_row['forsale'];
    }

    if(!isset($descK) || trim($descK) == ""){
        $stmt = $db->prepare('SELECT keyboard.descriptionK FROM keyboard WHERE keyboard_id=:id');
        $stmt->bindValue(':id', $keyID, PDO::PARAM_INT);
        $stmt->execute();
        $keyboard_rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
        //$keyboard_code = $keyboard_rows[0]['keyboard_name'];
        $descK = $keyboard_row['descriptionK'];
    }

    if(!isset($photo) || trim($photo) == ""){
        $stmt = $db->prepare('SELECT keyboard.photo FROM keyboard WHERE keyboard_id=:id');
        $stmt->bindValue(':id', $keyID, PDO::PARAM_INT);
        $stmt->execute();
        $keyboard_rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
        //$keyboard_code = $keyboard_rows[0]['keyboard_name'];
        $photo = $keyboard_row['photo'];
    }

    if(!isset($name) || trim($name) == ""){
        $stmt = $db->prepare('SELECT keyboard.keyboard_name FROM keyboard WHERE keyboard_id=:id');
        $stmt->bindValue(':id', $keyID, PDO::PARAM_INT);
        $stmt->execute();
        $keyboard_rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
        //$keyboard_code = $keyboard_rows[0]['keyboard_name'];
        $name = $keyboard_row['keyboard_name'];
    }



    $stmt = $db->prepare("UPDATE keyboard
    SET switch=:switch, sizeK=:size, typeK=:typeK,forsale=:forsale, descriptionK=:descK,
     photo=:photo, keyboard_name=:keyboardName
    WHERE keyboard_id=$keyID;");

    $stmt->bindValue(':switch', $switch, PDO::PARAM_STR);
    $stmt->bindValue(':size', $size, PDO::PARAM_STR);
    $stmt->bindValue(':typeK', $typeK, PDO::PARAM_STR);
    $stmt->bindValue(':forsale', $forsale, PDO::PARAM_STR);
    $stmt->bindValue(':descK', $descK, PDO::PARAM_STR);
    $stmt->bindValue(':photo', $photo, PDO::PARAM_STR);
    $stmt->bindValue(':keyboardName', $name, PDO::PARAM_STR);
    $stmt->execute();

    header("Location: homepage.php?username=$usernameS");
    die();
?>