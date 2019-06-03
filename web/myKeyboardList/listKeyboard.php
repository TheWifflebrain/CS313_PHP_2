<?php
require('dbConnect.php');
$db = get_db();
$query = 'SELECT keyboard_id, switch, sizeK, typeK, forsale, descriptionK, photo, keyboard_name, username_K FROM keyboard';
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

<?php
        require("navbar.php");
?>


<h1 class="jumbotron text-center jumbo">New Keyboards</h1>

<?php
foreach ($db->query('SELECT * FROM "keyboard"') as $row)
{
    $id = $row['keyboard_id'];
    $switch = $row['switch'];
    $size = $row['sizek'];
    $type = $row['typek'];
    $forsale = $row['forsale'];
    $desc = $row['descriptionk'];
    $photo = $row['photo'];
    $name = $row['keyboard_name'];
    $user = $row['username_K'];
?>
<div class="border keyList">
    <div class="jumbotron text-center">
        <h1><a href="keyboardPage.php?keyboard_id=<?php echo $id ?>"><?php echo $name; ?></a></h1>
        <h4><a href="homepage.php?username=<?php echo $user ?>"><?php echo $user; ?></a></h4>
    </div>
        
        <div>
        <img class="img-thumbnail mx-auto d-block img-fluid" src="<?php echo $photo; ?>">
        </div>
        
        <div>
         <h4><?php echo $desc; ?></h4> 
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
                <td><?php echo $switch; ?></td>
                <td><?php echo $type; ?></td>
                <td><?php echo $size; ?></td>
                <td><?php echo $forsale; ?></td>
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