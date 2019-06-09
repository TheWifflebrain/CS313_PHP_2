<?php
    session_start();
    if (isset($_SESSION['username']))
    {
        $usernameS = $_SESSION['username'];
    }
    $keyID = htmlspecialchars($_GET['keyboard_id']);
    $cID = htmlspecialchars($_GET['comment_id']);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="style.css">
    <title>Edit Comment</title>
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
                        <h3 class="panel-title">Edit Comment</h3>
                    </div>
                    <div class="panel-body">
                        <form method="POST" action="editCommentHandler.php?keyboard_id=<?php echo $keyID ?>&comment_id=<?php echo $cID; ?>">
                            <div class="form-group">
                                <input type="text" name="comment" id="comment" class="form-control input-sm" placeholder="Edit Comment">
                            </div>
                            <input type="hidden" name="username_id" value="<?php echo $usernameS?>">
                            <input type="hidden" name="keyboard_id" value="<?php echo $keyID?>">
                            <input type="submit" name="Submit" value="Submit" class="btn btn-info btn-block">
                        </form>
                    </div>
                    <p class="panel-title">*If you leave fields blank then it will keep your previous entry</p>
                </div>
            </div>
        </div>
    </div>
</body>
</html>