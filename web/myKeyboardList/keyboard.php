<?php
require('dbConnect.php');
$db = get_db();

$query = 'SELECT keyboard_id, switch, sizek, typek, forsale, descriptionk, 
photo, keyboard_name, user_id FROM keyboard';
$stmt = $db->prepare($query);
$stmt->execute();
$courses = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Keyboard</title>
</head>
<body>
<h1>Keyboards in Database</h1>
<?php
foreach ($keyboards as $keyboard)
{
    $id = $keyboard['keyboard_id'];
    $switch = $keyboard['switch'];
    $size = $keyboard['sizeK'];
    $type = $keyboard['typeK'];
    $forsale = $keyboard['forsale'];
    $desc = $keyboard['descriptionK'];
    $photo = $keyboard['photo'];
    $name = $keyboard['keyboard_name'];

    echo "<li><p>$name - $type</a></p></li>";
    
}

foreach ($db->query('SELECT * FROM "keyboard"') as $row)
            {
              echo "<tr>";
              echo "<td>" . $row["keyboard_id"];
              echo "<td>" . $row["switch"];
              echo "<td>" . $row["sizeK"];
            }
?>


    
</body>
</html>