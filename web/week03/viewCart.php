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
		$total = ($key0 * $prices[0]) + ($key1 * $prices[1]) + ($key2 * $prices[2]);
    	header('Location: checkout.php');
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

<p class="text-center display-1">Your Cart</p>
    
<nav class="navbar navbar-expand-sm bg-dark navbar-dark sticky-top">
	<ul class="navbar-nav">
		<li class="nav-item">
			<a class="title nav-link" href="items.php">Go Back To Cart</a>
		</li>

        <li class="nav-item">
			<a class="title nav-link" href="checkout.php">Check Out</a>
		</li>

		<li class="nav-item">
			<a class="title nav-link">Total: $<?php echo number_format($total, 2); ?></a>
		</li>

	<ul>
</nav>

<h3>In Your Cart: </h3>
<?php
if($key0 != 0){
?>
	<img class="mx-auto d-block" src="<?php echo $pics[0]; ?>" alt="keeb0">
	<h3 class="text-xl-center display-4"><?php echo $key0; ?>x <?php echo $keyboards[0]; ?> at $<?php echo number_format($prices[0] * $key0, 2); ?></h3>
<?php
}
?>

<?php
if($key1 != 0){
?>
	<img class="mx-auto d-block" src="<?php echo $pics[1]; ?>" alt="keeb0">
	<h3 class="text-xl-center display-4"><?php echo $key1; ?>x <?php echo $keyboards[1]; ?> at $<?php echo number_format($prices[1] * $key1, 2); ?></h3>
<?php
}
?>

<?php
if($key2 != 0){
?>
	<img class="mx-auto d-block" src="<?php echo $pics[2]; ?>" alt="keeb0">
	<h3 class="text-xl-center display-4"><?php echo $key2; ?>x <?php echo $keyboards[2]; ?> at $<?php echo number_format($prices[2] * $key2, 2); ?></h3>
<?php
}
?>

<br>
<h5 class="text-xl-center display-2">Your total is: $<?php echo number_format($total, 2); ?></h5>

<form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
	<div class="row justify-content-center">
    	<input type="submit" name="submit" class="btn btn-dark" value="Proceed to Checkout">
	</div>

</form>

</body>
</html>