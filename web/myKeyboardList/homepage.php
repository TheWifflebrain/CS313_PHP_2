<?php
  $file = pathinfo($_SERVER['PHP_SELF'], PATHINFO_FILENAME);
  if (isset($_SESSION['username']))
  {
    $usernameS = $_SESSION['username'];
  }
  if (!isset($_GET['username']))
  {
    die("Error, username not specified...");
  }
  $username = htmlspecialchars($_GET['username']);

  require('dbConnect.php');
  $db = get_db();
  $stmt = $db->prepare('SELECT k.keyboard_id, k.switch, k.sizeK, k.typeK, k.forsale, k.descriptionK, k.photo, k.keyboard_name, k.username_K,
   p.username FROM keyboard k LEFT JOIN person p on k.username_K = p.username WHERE k.username_K=:user');
  $stmt->bindValue(':user', $username, PDO::PARAM_INT);
  $stmt->execute();
  $username_rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
  $username_code = $username_rows[0]['username'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="../css/bootstrap.min.css">
  <link rel="stylesheet" href="style.css">
  <title>Homepage</title>
</head>
<body>
<?php
  require("navbar.php");
?>
<div class="jumbotron text-center jumbo">
  <h1><?php echo $username; ?>'s Homepage</h1>
</div>
<?php
  foreach ($username_rows as $username_row)
  {
    $switch = $username_row['switch'];
    $size = $username_row['sizek'];
    $type = $username_row['typek'];
    $forsale = $username_row['forsale'];
    $desc = $username_row['descriptionk'];
    $photo = $username_row['photo'];
    $name = $username_row['keyboard_name'];
    $user = $username_row['username_K'];
    $id = $username_row['keyboard_id'];
?>
  <div class="border keyList">
    <div class="jumbotron text-center">
      <h1><a href="keyboardPage.php?keyboard_id=<?php echo $id ?>"><?php echo $name; ?></a></h1>
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