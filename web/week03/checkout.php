<?php
		//require("sVariables.php");
		session_start();
		$key0 = $_SESSION['inCart0'];
		$key1 = $_SESSION['inCart1'];
		$key2 = $_SESSION['inCart2'];

		if(!ctype_digit($key0)){
			$key0 = 0;
		}
		if(!ctype_digit($key1)){
			$key1 = 0;
		}
		if(!ctype_digit($key2)){
			$key2 = 0;
		}
	$keyboards = array("Massdrop Alt", "Kono Kira", "GMK Mizu",
                    "Plank", "DSA Keycaps");
	$prices = array(180, 180, 250, 170, 90);
	$pics = array("altpic.jpg", "Kirapic.jpg", "GMKMizuPic.jpg",
					"orthoPic.png", "keycapPic.jpg");

    $total = ($key0 * $prices[0]) + ($key1 * $prices[1]) + ($key2 * $prices[2]);
    
    if(isset($_POST['submit'])){
        $_SESSION['name'] = htmlentities($_POST['name']);
        $_SESSION['email'] = htmlentities($_POST['email']);
        $_SESSION['address'] = htmlentities($_POST['address']);
        $_SESSION['city'] = htmlentities($_POST['city']);
        $_SESSION['state'] = htmlentities($_POST['state']);
        $_SESSION['zip'] = htmlentities($_POST['zip']);
    	header('Location: confirm.php');
	}
					
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="shopStyle.css">
    <title>Mechanical Keyboards</title>
</head>
<body>
    

<p class="text-center display-1">Checkout</p>

<form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
        <div class="row justify-content-center">
       <input type="text" name="name" placeholder="John Doe"><br>
       <input type="text" name="email" placeholder="email@email.com">
       <input type="text" name="address" placeholder="123 Street">
       <input type="text" name="city" placeholder="Rexburg">
       <input type="text" name="state" placeholder="ID">
       <input type="text" name="zip" placeholder="83440">
       </div>
        <br>
        <br>
    <div class="row justify-content-center">
        <input type="submit" name="submit" class="btn btn-dark btn-lg" value="Complete Purchase">
    </div>
</form>

<div class="row justify-content-center">
    <a href="viewCart.php" class="btn btn-info btn-lg">Back to Cart</a>
</div>
    

</body>
</html>