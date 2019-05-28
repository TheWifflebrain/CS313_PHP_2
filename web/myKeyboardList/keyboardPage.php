<?php

if (!isset($_GET['keyboard_id']))
{
	die("Error, keyboard id not specified...");
}
$keyboard_id = htmlspecialchars($_GET['keyboard_id']);

require('dbConnect.php');
$db = get_db();

$stmt = $db->prepare('SELECT k.*, c.* FROM keyboard k LEFT JOIN commentPost c ON k.keyboard_id = c.keyboard_id WHERE c.keyboard_id=:id');
$stmt->bindValue(':id', $keyboard_id, PDO::PARAM_INT);
$stmt->execute();
$keyboard_rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
//var dump
$keyboard_code = $keyboard_rows[0]['messageC'];

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

<h1><?php echo $keyboard_code;?><h1>

<?php
foreach ($keyboard_rows as $keyboard_row)
{
    $comment = $keyboard_row['messageC'];
    echo "<p>$comment</p>";
}
?>
    
</body>
</html>