<?php
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
    $nameERR = $emailERR = $addressERR = $cityERR = $stateERR = $zipERR = "";
    $name = $email = $address = $city = $state = $zip = "";
    
    if(isset($_POST['submit'])){

        $_SESSION['name'] = htmlentities($_POST['name']);
        $_SESSION['email'] = htmlentities($_POST['email']);
        $_SESSION['address'] = htmlentities($_POST['address']);
        $_SESSION['city'] = htmlentities($_POST['city']);
        $_SESSION['state'] = htmlentities($_POST['state']);
        $_SESSION['zip'] = htmlentities($_POST['zip']);
        $name = $_SESSION['name'];
        $email = $_SESSION['email'];
        $address = $_SESSION['address'];
        $city =  $_SESSION['city'];
        $state = $_SESSION['state'];
        $zip =$_SESSION['zip'];

        if(empty($name)){
            $nameERR = "*Name is required.";
        }

        if(empty($email)){
            $emailERR = "*Email is required.";
        }

        if(empty($address)){
            $addressERR = "*Address is required.";
        }

        if(empty($city)){
            $cityERR = "*City is required.";
        }

        if(empty($state)){
            $stateERR = "*State is required.";
        }

        if(empty($zip)){
            $zipERR = "*Zip code is required.";
        }

        if(!empty($name) && !empty($email) && !empty($city) && !empty($state) && !empty($zip) && !empty($address)){
            header('Location: confirm.php');
        }
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
       <input type="text" name="name" placeholder="John Doe"><span class="text-danger"><?php echo $nameERR ?></span>
       <input type="text" name="email" placeholder="email@email.com"><span class="text-danger"><?php echo $emailERR ?></span>
       <input type="text" name="address" placeholder="123 Street"><span class="text-danger"><?php echo $addressERR ?></span>
       <input type="text" name="city" placeholder="Rexburg"><span class="text-danger"><?php echo $cityERR ?></span>
       <input type="text" name="state" placeholder="ID"><span class="text-danger"><?php echo $stateERR ?></span>
       <input type="text" name="zip" placeholder="83440"><span class="text-danger"><?php echo $zipERR ?></span>
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