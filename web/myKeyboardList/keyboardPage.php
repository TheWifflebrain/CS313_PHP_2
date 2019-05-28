<?php

if (!isset($_GET['keyboard_id']))
{
	die("Error, keyboard id not specified...");
}
$keyboardP_id = htmlspecialchars($_GET['keyboard_id']);

require('dbConnect.php');
$db = get_db();

$stmt = $db->prepare('SELECT * FROM keyboard FULL OUTER JOIN commentPost ON commentPost.keyboard_id = keyboard.keyboard_id');
$stmt->bindValue(':id', $keyboardP_id, PDO::PARAM_INT);
$stmt->execute();
$keyboard_rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
$keyboardP = $keyboard_rows[0]['keyboard_name'];

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>

<h1><?php echo $keyboardP;?><h1>

<?php
foreach ($keyboard_rows as $keyboard_row)
{
    echo "<p>$keyboard_row['comment']</p>";
}
?>
    
</body>
</html>