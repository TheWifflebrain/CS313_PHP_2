<?php
require('dbConnect.php');
$db = get_db();

$query = 'SELECT keyboard_id, switch, sizeK, typeK, forsale, descriptionK, photo, keyboard_name, user_id FROM keyboard';
$stmt = $db->prepare($query);
$stmt->execute();
$keyboards = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="style.css">
    <title>Keyboard</title>
</head>
<body>
<h1>New Keyboards</h1>

<?php
foreach ($db->query('SELECT * FROM "keyboard"') as $keyboard)
{
    $id = $keyboard['keyboard_id'];
    $switch = $keyboard['switch'];
    $size = $keyboard['sizeK'];
    $type = $keyboard['typeK'];
    $forsale = $keyboard['forsale'];
    $desc = $keyboard['descriptionK'];
    $photo = $keyboard['photo'];
    $name = $keyboard['keyboard_name'];
?>
<div class="border keyList">
<div class="jumbotron text-center">
    <h1><?php echo $keyboard["keyboard_name"]; ?></h1>
        </div>
        
        <div>
        <img nclass="img-thumbnail" src="<?php echo $keyboard["photo"]; ?>">
        </div>
        
        <div>
         <h3><?php echo $keyboard["descriptionK"]; ?></h3> 
        </div>
          
        <div class="container">           
          <table class="table table-striped">
            <thead>
              <tr>
                <th>Switch</th>
                <th>Type</th>
                <th>Size</th>
                <th>For Sale</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td><?php echo $keyboard["switch"]; ?></td>
                <td><?php echo $keyboard["type"]; ?></td>
                <td><?php echo $keyboard["size"]; ?></td>
                <td><?php echo $keyboard["forsale"]; ?></td>
              </tr>
            </tbody>
          </table>
        </div>
    </div>
<?php
}
?>


    
</body>
</html>