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

        $name = $_SESSION['name'];
        $email = $_SESSION['email'];
        $address = $_SESSION['address'];
        $city = $_SESSION['city'];
        $state = $_SESSION['state'];
        $zip = $_SESSION['zip'];
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

<p class="text-center display-1">Thank You! <?php echo $name; ?></p> 
<br>
<p class="text-center display-2">It will be shipped to <?php echo $address; ?>, <?php echo $city; ?>, <?php echo $state; ?> <?php echo $zip; ?></p>
<br>
<p class="text-center display-4">Check your email for shipping updates.</p>
<br>
<p class="text-center display-4">It usually takes about 3 days to ship</p>
    
</body>
</html>