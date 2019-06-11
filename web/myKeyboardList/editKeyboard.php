<?php
    session_start();
    if (isset($_SESSION['username']))
    {
        $usernameS = $_SESSION['username'];
    }
    $keyID = htmlspecialchars($_GET['keyboard_id']);
?>
<?php
$stmt = $db->prepare('SELECT * FROM keyboard WHERE keyboard_id=:id');
$stmt->bindValue(':id', $keyID, PDO::PARAM_INT);
$stmt->execute();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="style.css">
    <title>Edit</title>
</head>
<body>
<?php
    require("navbar.php");
?>
    <div class="container">
        <div class="row centered-form">
            <div class="col-xs-12 col-sm-8 col-lg-12 centered-form">
        	<div class="panel panel-default">
        	    <div class="panel-heading">
		        <h3 class="panel-title">Edit Keyboard</h3>
		    </div>
		    <div class="panel-body">
			<form method="POST" action="editKeyboardHandler.php?keyboard_id=<?php echo $keyID ?>">
                            <div class="form-group">
<?php
                            $result = $sth->fetch(PDO::FETCH_ASSOC);
                            $result = $result['keyboard_name'];
                            echo    "<input type='text' name='keyboardName' id='keyboardName' class='form-control input-sm' value='$result'>"
?>
                            <!-- <input type="text" name="keyboardName" id="keyboardName" class="form-control input-sm" placeholder="Keyboard Name"> -->
                            </div>
                            <div class="form-group">
                                <input type="text" name="desc" id="desc" class="form-control input-sm" placeholder="Description">
                            </div>
                            <div class="form-group">
                                <input type="text" name="switch" id="switch" class="form-control input-sm" placeholder="Switch">
                            </div>
                            <div class="form-group">
                                <input type="text" name="size" id="size" class="form-control input-sm" placeholder="Size">
                            </div>
                            <div class="form-group">
                                <input type="text" name="type" id="type" class="form-control input-sm" placeholder="Custom or Pre-Built">
                            </div>
                            <div class="form-group">
                                <input type="text" name="forsale" id="forsale" class="form-control input-sm" placeholder="For Sale">
                            </div>
                            <div class="form-group">
                                <input type="text" name="photo" id="photo" class="form-control input-sm" placeholder="Photo URL">
                            </div>
                            <input type="hidden" name="username_id" value="<?php echo $usernameS?>">
                            <input type="hidden" name="keyboard_id" value="<?php echo $keyID?>">
                            <input type="submit" name="Add" value="Add" class="btn btn-info btn-block">
		        </form>
		    </div>
                    <p class="panel-title">*If you leave fields blank then it will keep your previous entry</p>
	    	</div>
    	    </div>
    	</div>
    </div>
</body>
</html>