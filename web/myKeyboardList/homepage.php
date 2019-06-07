<?php
	session_start();
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
$stmt = $db->prepare('SELECT k.*, p.* FROM keyboard k LEFT JOIN person p on k.username_K = p.username WHERE k.username_K=:user');
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
if ($file === "homepage.php?username='$usernameS'")
{
?>
<div class="container">
        <div class="row centered-form">
        <div class="col-xs-12 col-sm-8 col-lg-12 centered-form">
        	<div class="panel panel-default">
        		<div class="panel-heading">
			    		<h3 class="panel-title">Add Keyboard</h3>
			 			</div>
			 			<div class="panel-body">
			    		<form method="POST" action="addKeyboard.php">
			    		
              <div class="form-group">
			    				<input type="text" name="keyboardName" id="keyboardName" class="form-control input-sm" placeholder="Keyboard Name" required>
			    		</div>
              <div class="form-group">
			    				<input type="text" name="desc" id="desc" class="form-control input-sm" placeholder="Description" required>
			    		</div>
              <div class="form-group">
			    				<input type="text" name="switch" id="switch" class="form-control input-sm" placeholder="Switch" required>
			    		</div>
              <div class="form-group">
			    				<input type="text" name="size" id="size" class="form-control input-sm" placeholder="Size" required>
			    		</div>
              <div class="form-group">
			    				<input type="text" name="type" id="type" class="form-control input-sm" placeholder="Type" required>
			    		</div>
              <div class="form-group">
			    				<input type="text" name="forsale" id="forsale" class="form-control input-sm" placeholder="For Sale" required>
			    		</div>
              <div class="form-group">
			    				<input type="text" name="photo" id="photo" class="form-control input-sm" placeholder="Photo URL" required>
			    		</div>
              <div class="form-group">
			    				<input type="text" name="username1" id="username1" class="form-control input-sm" placeholder="username" required>
			    		</div>
              <input type="hidden" name="username_id" value="<?php echo $curr_username?>">
			    			
			    			<input type="submit" name="Add" value="Add" class="btn btn-info btn-block">
			    		
			    		</form>
			    		</div>
	    			</div>
    		</div>
    	</div>
    </div>
    <?php
    }
    ?>
</body>
</html>