<?php

if (!isset($_GET['keyboard_id']))
{
	die("Error, keyboard id not specified...");
}
$check = 1;
$keyboard_id = htmlspecialchars($_GET['keyboard_id']);
require('dbConnect.php');
$db = get_db();
$stmt = $db->prepare('SELECT k.*, c.* FROM keyboard k LEFT JOIN commentPost c ON k.keyboard_id = c.keyboard_id_CP WHERE c.keyboard_id_CP=:id ORDER BY comment_id DESC');
$stmt->bindValue(':id', $keyboard_id, PDO::PARAM_INT);
$stmt->execute();
$keyboard_rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
$keyboard_code = $keyboard_rows[0]['keyboard_name'];
if(!$keyboard_rows){
  $stmt = $db->prepare('SELECT * FROM keyboard WHERE keyboard_id=:id');
  $stmt->bindValue(':id', $keyboard_id, PDO::PARAM_INT);
  $stmt->execute();
  $keyboard_rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
  $keyboard_code = $keyboard_rows[0]['keyboard_name'];
  $check=0;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="style.css">
    <title>Keyboard Page</title>
</head>
<body>
<?php
    require("navbar.php");
?>
    
<?php
foreach ($keyboard_rows as $keyboard_row)
{
    $switch = $keyboard_row['switch'];
    $size = $keyboard_row['sizek'];
    $type = $keyboard_row['typek'];
    $forsale = $keyboard_row['forsale'];
    $desc = $keyboard_row['descriptionk'];
    $photo = $keyboard_row['photo'];
    $name = $keyboard_row['keyboard_name'];
    $userK = $keyboard_row['username_k'];
    $keyID = $keyboard_row['keyboard_id'];
?>
<div class="border keyList">
    <div class="jumbotron text-center">
        <h1><?php echo $name; ?></h1>
        <h4><a href="homepage.php?username=<?php echo $userK ?>"><?php echo $userK; ?></a></h4>
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
              <tr>
                <?php if($userK == $usernameS){?>
                  <input id="keyboard_id" type="hidden" name="keyboard_id" value="<?php echo $keyID; ?>">
                  
                  <td><a href="editKeyboard.php?keyboard_id=<?php echo $keyID; ?>"><input type="submit" name="Edit" value="Edit" class="btn btn-info btn-block"></a></td>
                  <td><input onclick="doublecheck()" type="button" name="Remove" value="Remove" class="btn btn-info btn-block"></td>
                <?php } ?>
              </tr>
            </tbody>
          </table>
        </div>
    </div>
<?php
break;
}
?>

<?php
if($check == 1){
?>

<div>
         <h3 class="text-center">Comments</h3> 
    </div>
<div class="container">           
          <table class="table table-striped">
            <tbody>
              <?php
                foreach ($keyboard_rows as $keyboard_row)
                {
                    $comment = $keyboard_row['messagec'];
                    $userCP = $keyboard_row['username_cp'];
                ?>
                    <tr>
                    <td><?php echo $comment; ?></td>
                    <td><a href="homepage.php?username=<?php echo $userCP ?>"><?php echo $userCP; ?></a></td>
                    </tr>
                <?php
                }
                ?>
            </tbody>
          </table>
        </div>
<?php
}
?>
<script type="text/javascript" src="doublecheck.js"></script>
</body>
</html>