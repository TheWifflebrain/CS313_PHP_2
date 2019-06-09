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

    if(!isset($switch) || $switch == null)
    {
        $stmt = $db->prepare('SELECT keyboard.switch FROM keyboard WHERE keyboard_id=:id');
        $stmt->bindValue(':id', $keyID, PDO::PARAM_STR);
        $stmt->execute();
        $row = $stmt->fetch();
        $switch = $row['switch'];   
    }

    if(!isset($size) || $size==null)
    {
        $stmt = $db->prepare('SELECT keyboard.sizeK FROM keyboard WHERE keyboard_id=:id');
        $stmt->bindValue(':id', $keyID, PDO::PARAM_STR);
        $stmt->execute();
        $row = $stmt->fetch();
        $size = $row['sizek'];
    }

    if(!isset($typeK) || $typeK==null)
    {
        $stmt = $db->prepare('SELECT keyboard.typeK FROM keyboard WHERE keyboard_id=:id');
        $stmt->bindValue(':id', $keyID, PDO::PARAM_STR);
        $stmt->execute();
        $row = $stmt->fetch();
        $typeK = $row['typek'];
    }

    if(!isset($forsale) || empty($forsale))
    {
        $stmt = $db->prepare('SELECT keyboard.forsale FROM keyboard WHERE keyboard_id=:id');
        $stmt->bindValue(':id', $keyID, PDO::PARAM_STR);
        $stmt->execute();
        $row = $stmt->fetch();
        $forsale = $row['forsale'];
    }

    if(!isset($descK) || $descK==null)
    {
        $stmt = $db->prepare('SELECT keyboard.descriptionK FROM keyboard WHERE keyboard_id=:id');
        $stmt->bindValue(':id', $keyID, PDO::PARAM_STR);
        $stmt->execute();
        $row = $stmt->fetch();
        $descK = $row['descriptionk'];
    }

    if(!isset($photo) || $photo==null)
    {
        $stmt = $db->prepare('SELECT keyboard.photo FROM keyboard WHERE keyboard_id=:id');
        $stmt->bindValue(':id', $keyID, PDO::PARAM_STR);
        $stmt->execute();
        $row = $stmt->fetch();
        $photo = $row['photo'];
    }

    if(!isset($name) || $name==null)
    {
        $stmt = $db->prepare('SELECT keyboard.keyboard_name FROM keyboard WHERE keyboard_id=:id');
        $stmt->bindValue(':id', $keyID, PDO::PARAM_STR);
        $stmt->execute();
        $row = $stmt->fetch();
        $name = $row['keyboard_name'];
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

    header("Location: homepage.php?username=$user");
    die();
?>