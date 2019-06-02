<?php

if (!isset($_GET['keyboard_id']))
{
	die("Error, keyboard id not specified...");
}
$keyboard_id = htmlspecialchars($_GET['keyboard_id']);

//selects everything from keybaord and person where the ids match
//SELECT k.*, p.* FROM keyboard k LEFT JOIN person p ON k.user_id = p.user_id WHERE k.user_id = 1;

//slects everything from what a user posted
//SELECT c.*, p.* FROM commentPost c LEFT JOIN person p ON c.user_id = p.user_id WHERE c.user_id = 1;

require('dbConnect.php');
$db = get_db();
$stmt = $db->prepare('SELECT k.*, c.* FROM keyboard k LEFT JOIN commentPost c ON k.keyboard_id = c.keyboard_id_CP WHERE c.keyboard_id_CP=:id');
$stmt->bindValue(':id', $keyboard_id, PDO::PARAM_INT);
$stmt->execute();
$keyboard_rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
$keyboard_code = $keyboard_rows[0]['keyboard_name'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="style.css">
    <title>Document</title>
</head>
<body>

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
    $comment = $keyboard_row['messagec'];
    $userK = $keyboard_row['username_K'];
?>
<div class="border keyList">
    <div class="jumbotron text-center">
        <h1><?php echo $name; ?></h1>
        <h4><a href="homepage.php?username=<?php echo $user_K ?>"><?php echo $user_K; ?></a></h4>
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
break;
}
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
                    $comment = $keyboard_row['messageC'];
                    $userCP = $keyboard_row['username_CP'];
                    echo "<tr>";
                    echo "<td>$comment</td>";
                    echo "<td>$userCP</td>";
                    echo "</tr>";
                }
                ?>
            </tbody>
          </table>
        </div>
    
</body>
</html>