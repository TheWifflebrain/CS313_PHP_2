<?php
  if (!isset($_GET['keyboard_id']))
  {
    die("Error, keyboard id not specified...");
  }
  $check = 1;
  $keyboard_id = htmlspecialchars($_GET['keyboard_id']);
  require('dbConnect.php');
  $db = get_db();
  $stmt = $db->prepare('SELECT k.keyboard_id, k.switch, k.sizeK, k.typeK, k.forsale, k.descriptionK, k.photo, k.keyboard_name, 
                        k.username_K, c.keyboard_id_CP, c.messageC, c.username_CP, c.comment_id
                        FROM keyboard k LEFT JOIN commentPost c ON k.keyboard_id = c.keyboard_id_CP 
                        WHERE c.keyboard_id_CP=:id ORDER BY comment_id DESC');
  $stmt->bindValue(':id', $keyboard_id, PDO::PARAM_INT);
  $stmt->execute();
  $keyboard_rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
  $keyboard_code = $keyboard_rows[0]['keyboard_name'];
  if(!$keyboard_rows)
  {
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
      <?php if($userK == $usernameS){?>
        <input id="keyboard_id" type="hidden" name="keyboard_id" value="<?php echo $keyID; ?>">      
        <a href="editKeyboard.php?keyboard_id=<?php echo $keyID; ?>"><input type="submit" name="Edit Keyboard" value="Edit Keyboard" class="btn btn-warning btn-sm"></a>
        <input onclick="doublecheck()" type="button" name="Remove Keyboard" value="Remove Keyboard" class="btn btn-danger btn-sm">
      <?php } ?>
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
            $cID = $keyboard_row['comment_id'];
            $userCP = $keyboard_row['username_cp'];
        ?>
        <tr>
          <td><?php echo $comment; ?></td>
          <td><a href="homepage.php?username=<?php echo $userCP ?>"><?php echo $userCP; ?></a></td>
        </tr>
        <?php if($userCP == $usernameS)
          {
        ?>
          <input id="keyboard_id" type="hidden" name="keyboard_id" value="<?php echo $keyID; ?>">     
          <input id="comment_id" type="hidden" name="comment_id" value="<?php echo $cID; ?>"> 
          <td>
            <input onclick="editComment()" type="submit" name="Edit Comment" value="Edit Comment" class="btn btn-warning btn-sm float-left">
            <input onclick="doublecheck2()" type="button" name="Remove Comment" value="Remove Comment" class="btn btn-danger btn-sm float-left">
          </td>
        <?php 
          }
        ?>          
        <?php
          }
        ?>
      </tbody>
    </table>
  </div>
<?php
  }
?>
  <form method="POST" action="addcomment.php?keyboard_id=<?php echo $keyID; ?>">           
    <div class="container">
      <table class="table table-striped">
        <tbody>
          <tr>
            <div class="form-group">
              <input type="text" name="commentC" id="commentC" class="form-control input-sm" placeholder="Add Comment" required>
            </div>
          </tr>
          <tr>
            <input id="keyboard_id" type="hidden" name="keyboard_id" value="<?php echo $keyID; ?>"> 
            <input id="userCP" type="hidden" name="userCP" value="<?php echo $usernameS; ?>">     
            <td>
              <input type="submit" name="Add Comment" value="Add Comment" class="btn btn-dark btn-block">
            </td>
          </tr>
        </tbody>
      </table>
    </div>
  </form>
<script type="text/javascript" src="doublecheck.js"></script>
</body>
</html>